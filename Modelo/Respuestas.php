<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
    header("Location: index.php");
}

function cargarDatosJson($archivo) {
    $contenido = file_get_contents(__DIR__ . '/../assets/DB/' . $archivo);
    $datos = json_decode($contenido, true);

    if (!is_array($datos)) {
        return [];
    }

    return $datos;
}

function leerCookieJson($nombre) {
    if (!isset($_COOKIE[$nombre])) {
        return [];
    }

    $datos = json_decode(rawurldecode($_COOKIE[$nombre]), true);
    return is_array($datos) ? $datos : [];
}

function guardarCookieJson($nombre, $datos) {
    setcookie($nombre, rawurlencode(json_encode($datos)), time() + 31536000, '/');
    $_COOKIE[$nombre] = rawurlencode(json_encode($datos));
}

function obtenerUsuarioJson() {
    $usuario = cargarDatosJson('Usuario.json');

    if (isset($usuario['Correo'], $usuario['Contraseña'])) {
        return [[
            'IDUser' => 1,
            'Email' => $usuario['Correo'],
            'Password' => $usuario['Contraseña'],
            'Type' => 0,
            'esUsuarioJson' => true
        ]];
    }

    return [];
}

// Clase para manejar las preguntas del test vocacional
class preguntas {
    private $Preguntas;
    private $pdo;

    public function __construct($pdo) {
        $this->Preguntas = [];
        $this->pdo = $pdo;
    }
    public function getPreguntas() {
        return $this->Preguntas;
    }

    public function obtenerPreguntas() {
        $this->Preguntas = cargarDatosJson('Preguntas.Json');
        return $this->Preguntas;
    }

    public function obtenerAreaPreguntas() {
        $preguntas = $this->obtenerPreguntas();
        $areas = [];

        foreach ($preguntas as $pregunta) {
            $areas[] = [
                'IDPregunta' => $pregunta['IDPregunta'],
                'Area' => $pregunta['Area']
            ];
        }

        return $areas;
    }
}

// Clase para manejar las respuestas del test vocacional

class resultados {
    private $Area1;
    private $Area2;
    private $Area3;
    private $Area4;
    private $Area5;
    private $pdo;

    public function __construct($pdo) {
        $this->Area1 = 0;
        $this->Area2 = 0;
        $this->Area3 = 0;
        $this->Area4 = 0;
        $this->Area5 = 0;
        $this->pdo = $pdo;
    }
    public function setAreas($Area1, $Area2, $Area3, $Area4, $Area5) {
        $this->Area1 = $Area1;
        $this->Area2 = $Area2;
        $this->Area3 = $Area3;
        $this->Area4 = $Area4;
        $this->Area5 = $Area5;
    }

    public function agregarResultados($IDProspecto, $Fecha) {
        $resultados = leerCookieJson('unisite_resultados');
        $ids = array_column($resultados, 'IdResultados');
        $id = $ids ? max($ids) + 1 : 1;
        $resultado = [
            'IdResultados' => $id,
            'IdProspecto' => $IDProspecto,
            'Fecha' => $Fecha,
            'ResultadoArea1' => $this->Area1,
            'ResultadoArea2' => $this->Area2,
            'ResultadoArea3' => $this->Area3,
            'ResultadoArea4' => $this->Area4,
            'ResultadoArea5' => $this->Area5
        ];
        $resultados[] = $resultado;
        guardarCookieJson('unisite_resultados', $resultados);
        $_SESSION['ResultadoActual'] = $resultado;

        return $id;
    }

}

// Clase para manejar las áreas del test vocacional
class areas {
    private $areas;
    private $pdo;
    private $NombreArea;
    private $AreasRelacionadas;

    public function __construct($pdo) {
        $this->areas = [];
        $this->NombreArea = [];
        $this->AreasRelacionadas = [];
        $this->pdo = $pdo;
    }

    public function getAreas() {
        return $this->areas;
    }

        public function obtenerAreas() {
        return cargarDatosJson('Areas.Json');
    }
}

// Clase para manejar los usuarios del sistema
class users {
    private $Usuarios;
    private $pdo;

    public function __construct($pdo) {
        $this->Usuarios = [];
        $this->pdo = $pdo;
    }

    public function obtenerUsuarioPorEmail($Email) {
        $usuarios = array_merge(obtenerUsuarioJson(), leerCookieJson('unisite_usuarios'));

        foreach ($usuarios as $usuario) {
            if (strcasecmp($usuario['Email'], $Email) === 0) {
                return $usuario;
            }
        }

        return false;
         
    }

    public function buscarIDUsuarioPorEmail($Email) {
        $usuario = $this->obtenerUsuarioPorEmail($Email);
        return $usuario ? ['IDUser' => $usuario['IDUser']] : false;
    }

    public function agregarUsuarioCookie($Email, $Contrasena, $TipoCuenta) {
        $usuarios = leerCookieJson('unisite_usuarios');
        $ids = array_column($usuarios, 'IDUser');
        $id = $ids ? max($ids) + 1 : 1;
        $usuarios[] = [
            'IDUser' => $id,
            'Password' => password_hash($Contrasena, PASSWORD_DEFAULT),
            'Email' => $Email,
            'Type' => $TipoCuenta
        ];
        guardarCookieJson('unisite_usuarios', $usuarios);
        return $id;
    }

    public function buscarUsuarioPorId($idUsuario) {
        foreach (leerCookieJson('unisite_usuarios') as $usuario) {
            if ($usuario['IDUser'] == $idUsuario) {
                return $usuario;
            }
        }

        return false;
    }

}

// Clase para manejar los prospectos del test vocacional
class prospectos {
    private $prospectos;
    private $pdo;

    public function __construct($pdo) {
        $this->prospectos = [];
        $this->pdo = $pdo;
    }

    public function getProspectos() {
        return $this->prospectos;
    }

    public function obtenerProspectos() {
        $this->prospectos = leerCookieJson('unisite_prospectos');
        return $this->prospectos;
    }

    public function agregarProspectoCookie($Name, $Email, $Telefono, $Edad, $ZonaGeografica, $IDUsuario) {
        $prospectos = leerCookieJson('unisite_prospectos');
        $ids = array_column($prospectos, 'IdProspecto');
        $id = $ids ? max($ids) + 1 : 1;
        $prospectos[] = [
            'IdProspecto' => $id,
            'Nombre' => $Name,
            'Edad' => $Edad,
            'Telefono' => $Telefono,
            'Email' => $Email,
            'IdUser' => $IDUsuario,
            'ZonaGeografica' => $ZonaGeografica
        ];
        guardarCookieJson('unisite_prospectos', $prospectos);
        return $id;
    }

    public function addIdRespuesta($Email, $IDRespuestas) {
        $prospectos = leerCookieJson('unisite_prospectos');
        $actualizado = false;

        foreach ($prospectos as &$prospecto) {
            if (strcasecmp($prospecto['Email'], $Email) === 0) {
                $prospecto['IdResultados'] = $IDRespuestas;
                $actualizado = true;
                break;
            }
        }

        if ($actualizado) {
            guardarCookieJson('unisite_prospectos', $prospectos);
        }

        return $actualizado;
    }

    public function buscarProspectoPorEmail($email) {
        foreach (leerCookieJson('unisite_prospectos') as $prospecto) {
            if (strcasecmp($prospecto['Email'], $email) === 0) {
                return ['IdProspecto' => $prospecto['IdProspecto']];
            }
        }

        return false;
    }

}



?>

