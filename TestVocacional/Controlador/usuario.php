<?php
if (
    basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__) &&
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
) {
    header("Location: index.php");
    exit();
}
    
session_start();
require_once '../Modelo/Respuestas.php';
$Usuario = new Users(null);

header('Content-Type: application/json; charset=utf-8');
//header('Content-Type: text/html; charset=utf-8');

// Manejo de la solicitud POST para iniciar sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    $Correo = trim($_POST['correo'] ?? '');
    $contraseña = $_POST['passw'] ?? '';
    // Verificar si el correo y la contraseña son válidos
    $UsuarioExistente = $Usuario->obtenerUsuarioPorEmail($Correo);
    if ($UsuarioExistente) {
        $esContraseñaValida = password_verify($contraseña, $UsuarioExistente['Password'])
            || hash_equals($UsuarioExistente['Password'], $contraseña);

        if ($esContraseñaValida) {
            
            $_SESSION['user_id'] = $UsuarioExistente['IDUser'];
            $_SESSION['username'] = $UsuarioExistente['Email'];
            $_SESSION['tipo_cuenta'] = $UsuarioExistente['Type'];
            
            echo json_encode(['success' => true]); 
            exit();
        } else {
            $error = "Contraseña incorrecta.";
                    echo json_encode(['unsuccess' => $error]);
        exit; 
        }
    } else {
        $error = "Usuario no encontrado.";
                echo json_encode(['unsuccess' => $error]);
        exit; 
    }
    
   
}

?>