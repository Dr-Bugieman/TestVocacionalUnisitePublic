<?php
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Crear Usuario</title>
     <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Audiowide&display=swap&display=swap&Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100 vw-100">
<div class="Background position-fixed top-0 start-0 w-100 h-100" 
    style="  
    background-image: url('../assets/images/login.png');">
</div>
<div  class="Overlay position-fixed top-0 start-0 w-100 h-100">
</div> 

<div class="container">
  <div class="row justify-content-center align-items-center min-vh-100">
    
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card shadow rounded-4 p-4" style="background-color: #0191e7">
        <h3 class="text-center mb-4" style="color:white">Crear Cuenta</h3>
        <!-- Aquí se cargará el formulario de registro -->
        <div id="ContenedorRegistro">

        </div>
        <!-- Mensaje de alerta para mostrar errores o éxito -->
        <div id="registerAlert" class="mt-3"></div>
        <div class="text-center mt-3">
          <a href="login.php" style="color:white">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
      </div>
    </div>
    
  </div>
</div>

<script>

// Cargar el formulario de registro al inicio mediante fetch
// y manejar el evento de envío del formulario
function cargarFrom(){
  fetch('../Controlador/registro.php', {
  headers: {
    'X-Requested-With': 'XMLHttpRequest'
  }
})
        .then(response => response.text())
        .then(data => {
          // Aquí se carga el formulario de registro en el contenedor
          document.getElementById('ContenedorRegistro').innerHTML = data;
          
          if(document.getElementById('registerForm')){
            //console.log('Formulario de usuario normal cargado');
            const municipioSelect = document.getElementById('municipio');
            if(municipioSelect){
                municipioSelect.addEventListener('change', function(){
            const otroMunicipioInput = document.getElementById('otroMunicipio');
            if(this.value === 'otro'){
                otroMunicipioInput.hidden = false;
                otroMunicipioInput.required = true;
            } else {
                otroMunicipioInput.hidden = true;
                otroMunicipioInput.required = false;
                otroMunicipioInput.value = '';
            }
        });
    }

    // Manejar el evento de envío del formulario de usuario normal
      registerForm.addEventListener('submit', function(e){
      
    e.preventDefault();
    const formData = new FormData(registerForm);
    const password = formData.get('contrasena');
    const confirmPassword = formData.get('confirmar');
console.log('Formulario de usuario normal enviado');
    if(password !== confirmPassword){
        document.getElementById('registerAlert').innerHTML = '<div class="alert alert-danger">Las contraseñas no coinciden.</div>';
        return;
    }
    enviarDatosUsuario(formData);
  });

          // Si el formulario es de administrador, manejar su envío
          } else if(document.getElementById('registerFormAdmin')){
            console.log('Formulario de administrador cargado');
            registerFormAdmin.addEventListener('submit', function(e){
                e.preventDefault();
                const formData = new FormData(registerFormAdmin);
                const password = formData.get('contrasena');
                const confirmPassword = formData.get('confirmar');

                if(password !== confirmPassword){
                    document.getElementById('registerAlert').innerHTML = '<div class="alert alert-danger">Las contraseñas no coinciden.</div>';
                    return;
                }
                enviarDatosUsuario(formData);
            });
          }
        }).catch(error => {
            console.error('Error al cargar el formulario:', error);
        })
}
// Llamar a la función para cargar el formulario al inicio
document.addEventListener('DOMContentLoaded', function() {
    cargarFrom();
});   
            
// Función para enviar los datos del usuario al servidor
function enviarDatosUsuario(formData) {
    console.log('Enviando datos del formulario...');
    fetch('../Controlador/registro.php', {
    method: 'POST',
    headers: { 'X-Requested-With': 'XMLHttpRequest' },
    body: formData
})
.then(response => response.text())  // primero como texto
.then(text => {
    console.log('Respuesta cruda:', text);
    return JSON.parse(text);          // luego parsear
})
.then(data => {
     if (data.success) {
            //si la respuesta fue exitosa, mostrar mensaje de éxito mediante una alerta
            document.getElementById('registerAlert').innerHTML = `
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <h4 class="alert-heading">¡Registro exitoso!</h4>
                    <p>Tu cuenta ha sido registrada correctamente. Cierra este mensaje para continuar al inicio de sesión.</p>
                    <hr>
                    <button type="button" class="btn-close" aria-label="Cerrar" onclick="cerrarAlerta()"></button>
                </div>
            `;
            //si la respuesta fue unsuccessful, mostrar mensaje de error
        } else if (data.unsuccess) { 
            document.getElementById('registerAlert').innerHTML = `
                <div class="alert alert-danger">
                    Error: correo ya registrado. Ingresa uno nuevo.
                </div>
            `;
            document.getElementById('email').value = '';
        } else if(data.error){
        document.getElementById('registerAlert').innerHTML = `
            <div class="alert alert-danger">${data.error}</div>`;
    }
})
.catch(error => {
    console.error('Error en fetch:', error);
});

}

// Función para cerrar la alerta y redirigir al inicio de sesión
function cerrarAlerta() {
    document.getElementById('registerAlert').style.display = 'none';
    //console.log("La alerta fue cerrada");
    window.location.href = 'login.php';
}
  
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
