<?php
if (
    basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__) &&
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
) {
    header("Location: index.php");
    exit();
}

ob_start();
session_start();
require_once '../modelo/respuestas.php';

$Usuario = new Users(null);
$Cliente = new Prospectos(null);

// Manejo de la solicitud POST para registrar un nuevo usuario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8'); // <--- obligatorio
    $Correo     = $_POST['Correo'] ?? null;
    $contraseña = $_POST['contrasena'] ?? null;

    if(!$Correo || !$contraseña) {
        echo json_encode(['error' => 'Faltan datos requeridos']);
        exit;
    }

    try {
        if(isset($_SESSION['tipo_cuenta']) && $_SESSION['tipo_cuenta'] == 0){
            $Tipo = 0;
            if($Usuario->buscarIDUsuarioPorEmail($Correo)){
                echo json_encode(['unsuccess'=>true]);
                exit;
            }
            $Usuario->agregarUsuarioCookie($Correo, $contraseña, $Tipo);
            echo json_encode(['success'=>true]);
            exit;
        } else {
            $Nombre     = $_POST['nombre'] ?? null;
            $Telefono   = $_POST['telefono'] ?? null;
            $Edad       = $_POST['edad'] ?? null;
            $municipio  = ($_POST['municipio'] ?? '') === 'otro' ? ($_POST['otroMunicipio'] ?? null) : ($_POST['municipio'] ?? null);

            if(!$Nombre || !$Telefono || !$Edad || !$municipio){
                echo json_encode(['error' => 'Faltan datos del usuario']);
                exit;
            }

            if($Usuario->buscarIDUsuarioPorEmail($Correo) || $Cliente->buscarProspectoPorEmail($Correo)){
                echo json_encode(['unsuccess'=>true]);
                exit;
            }

            $Usuario->agregarUsuarioCookie($Correo, $contraseña, 1);
            $idUsuario = $Usuario->buscarIDUsuarioPorEmail($Correo);
            $Cliente->agregarProspectoCookie($Nombre, $Correo, $Telefono, $Edad, $municipio, $idUsuario['IDUser']);

            echo json_encode(['success'=>true]);
            exit;
        }
    } catch(Exception $e){
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}


// Manejo de la solicitud GET para cargar el formulario de registro
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    //header('Content-Type: text/html; charset=utf-8');

    $esAdmin = false; // Por defecto, no es administrador

    if(isset($_SESSION['tipo_cuenta']) && $_SESSION['tipo_cuenta'] == 0){
        $esAdmin = true; // Usuario es administrador
    }else {
        $esAdmin = false; // Usuario es normal
    }
    // Generar el formulario HTML según el tipo de usuario
    if($esAdmin == true){
        $HTMLform = '
            <form id="registerFormAdmin">
                <div class="mb-3">
                    <label for="email" style="color:white" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="Correo" autocomplete="username" name="Correo" required>
                </div>
                <div class="mb-3">
                    <label for="Password" style="color:white" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="Password" name="contrasena" autocomplete="new-password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" style="color:white" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="confirmar" name="confirmar" autocomplete="new-password" required>
                </div>
                <button type="submit" class="btn btn-success">Crear Cuenta</button>
            </form>
                ';
    } else {
        $HTMLform = '
            <form id="registerForm">
            <div class="mb-3">
                <label for="email" class="form-label" style="color:white">Correo</label>
                <input type="email" placeholder="Hola@correo.com" class="form-control" id="email" maxlength="100" name="Correo" autocomplete="username" required />
            </div>
            <div class="mb-3">
                <div class="mb-3">
                <label for="nombre" class="form-label" style="color:white">Nombre</label>
                <input type="text" placeholder="Juan Orozco" class="form-control" id="nombre" name="nombre" required />
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label" style="color:white">telefono</label>
                <input type="tel" pattern="[0-9]{10}" placeholder="3345667878" class="form-control" id="phone" name="telefono" required />
            </div>
            <div class="mb-3">
                <label for="age" class="form-label" style="color:white">edad</label>
                <input type="number" min="18" placeholder="18" max="70" class="form-control" id="age" name="edad" required />
            </div>
            <div class="mb-3">
                <label for="municipio" class="form-label" style="color:white">Municipio</label>
                <select id="municipio" name="municipio" class="form-select" required>
                    <option value="">Selecciona un municipio</option>
                    <option value="Guadalajara">Guadalajara</option>
                    <option value="Zapopan">Zapopan</option>
                    <option value="Tlaquepaque">Tlaquepaque</option>
                    <option value="Tonalá">Tonalá</option>
                    <option value="Tlajomulco de Zúñiga">Tlajomulco de Zúñiga</option>
                    <option value="El Salto">El Salto</option>
                    <option value="Ixtlahuacán de los Membrillos">Ixtlahuacán de los Membrillos</option>
                    <option value="Juanacatlán">Juanacatlán</option>
                    <option value="Zapotlanejo">Zapotlanejo</option>
                    <option value="otro" id="OtroMun">Otro Municipio</option>   
            </select>
            <div class ="mt-2">
                <input type="text" class="form-control" id="otroMunicipio" name="otroMunicipio" placeholder="Especifica otro municipio" autocomplete="off" hidden  />
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label" style="color:white">Contraseña</label>
                <input type="password" class="form-control" id="Password" name="contrasena" autocomplete="new-password" required />
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label" style="color:white">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmar" autocomplete="new-password" required />
            </div>
            <button type="submit" class="btn btn-success w-100" style="color:white">Crear Cuenta</button>
            </form>
                ';
            }
        echo $HTMLform;
        exit;
}



?>