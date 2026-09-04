<?php
// Iniciar sesión (si no hay, la crea; si hay, la abre)
session_start();

// Vaciar variables
$_SESSION = array();

// Eliminar cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión actual
session_destroy();

// Iniciar una nueva sesión limpia
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <title>Inicio de Sesión - Test Vocacional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
      <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Audiowide&display=swap&display=swap&Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body class="vh-100 vw-100">
  <div class="Background position-fixed top-0 start-0 w-100 h-100" 
       style="background-image: url('../assets/images/login.png');">
  </div>
  <div class="Overlay position-fixed top-0 start-0 w-100 h-100">
  </div>

<div class="container-fluid justify-content-center align-items-center vh-100 vw-100" style="z-index: -1;">
    <div class="row justify-content-center align-items-center vh-100 vh-100">
        <!-- form del login -->
        <div class="col-md-6 col-lg-4">
            <form id="LoginForm">
            <div class="card shadow rounded-4" style="background-color: #0191e7">
                <div class="card-body p-4 rounded-4" >
                    <h3 class="card-title text-center mb-4" style="font-family:'Orbitron', sans-serif; color:white;">Iniciar Sesión</h3>
                    
                        <div class="mb-3">
                            <label for="correo" class="form-label" style="color:white">Correo</label>
                            <input type="email" class="form-control rounded-5" id="correo" name="correo" autocomplete="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="passw" class="form-label" style="color:white">Contraseña</label>
                            <input type="password" class="form-control rounded-5" id="passw" name="passw" autocomplete="current-password" required>
                        </div>
                        
                    <div id="loginAlert" class="mt-3"></div>
                    <div class="mt-3 text-center">
                        <a href="join.php" style="color:white ">¿No tienes cuenta? Regístrate</a>
                    </div>
                </div>
            </div>
            <div  class="d-flex justify-content-center mt-4" style="transition: padding 0.3s cubic-bezier(.4,2,.6,1);">
                <button id="btnContinuar" type="submit" class="col-8 btn rounded-5"  style="background-color: #0191e7; z-index:1;">
                    <p id="txtbtn" class="h5 m-0" style="color:white; transition: font-size 0.3s cubic-bezier(.4,2,.6,1);">
                    Entrar
                    <i style="color:white" class="bi bi-arrow-right-circle"></i>
                    </p>
                </button>        
            </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Añadir animación al botón de continuar
document.getElementById('btnContinuar').addEventListener('mouseenter', function() {
    document.getElementById('btnContinuar').classList.add('p-3');
    document.getElementById('txtbtn').classList.remove('h5');
    document.getElementById('txtbtn').classList.add('h3');

}); 
// Eliminar animación al salir del botón de continuar 
document.getElementById('btnContinuar').addEventListener('mouseleave', function() {
    document.getElementById('btnContinuar').classList.remove('p-3');
    document.getElementById('txtbtn').classList.remove('h3');
    document.getElementById('txtbtn').classList.add('h5');
});

// Función para iniciar sesión mediante fetch
function IniciarSesion(formData) {
    fetch('../Controlador/usuario.php', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        // Enviar los datos del formulario como FormData
        body: formData
        })
    .then(response => response.json())
    .then(data => {
        // Verificar si la respuesta es exitosa
          if (data.success) {
            window.location.href = '../Vista/TestVocacional.php'; // Redirigir al test vocacional
            } else {
            document.getElementById('loginAlert').innerHTML = `<div class="alert alert-danger">Usuario o contraseña incorrectos</div>`;
            //console.error('Error al enviar los datos:', error);
            } 
    })
    .catch(error => {
        document.getElementById('loginAlert').innerHTML = `<div class="alert alert-danger">Error al iniciar sesion: ${error.message}</div>`;
        //console.error('Error al enviar los datos:', error);
    }); 
}   
// Manejar el evento de envío del formulario
document.getElementById('LoginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío tradicional del formulario

    const form = event.target;
    const formData = new FormData(form);
    const password = formData.get('contrasena');
    const Email = formData.get('Correo');
    //console.log("Datos del formulario:", formData);
    IniciarSesion(formData);
});

</script>
</body>
</html>
