<?php
session_start();
if(!isset($_SESSION['tipo_cuenta'])){
    header("Location: login.php");
    exit();
}
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test Vocacional</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Audiowide&display=swap&display=swap&Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100 vw-100">
  <!-- Fondo de pantalla -->
  <div id="carouselFadeBackground" class="carousel slide carousel-fade position-fixed top-0 start-0 w-100 h-100" 
       style="z-index:-3;">
    <div class="carousel-inner h-100">
      <div class="carousel-item active h-100">
        <img src="../assets/images/dis2.png" class="d-block w-100 h-100 object-fit-cover" alt="Diseño 2">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/cien.png" class="d-block w-100 h-100 object-fit-cover" alt="Ciencias">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/inf.png" class="d-block w-100 h-100 object-fit-cover" alt="Informática">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/dere.png" class="d-block w-100 h-100 object-fit-cover" alt="Derecho">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/adm2.png" class="d-block w-100 h-100 object-fit-cover" alt="Administración">
      </div>
    </div>
  </div>
    <!-- Carrusel de logos(fondo de pantalla) -->
    <div id="carouselFadeLogoLeft" class="carousel slide carousel-fade position-fixed top-0 end-0 w-25 h-25" 
       style="z-index:1; transform: rotate(180deg) ">
    <div class="carousel-inner h-100">
      <div class="carousel-item active h-100" style="">
        <img src="../assets/images/daw.png" class="d-block w-100" alt="Diseño 2">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/dre.png" class="d-block w-100" alt="Ciencias">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/ing.png" class="d-block w-100 " style="transform: rotate(45deg) scale(0.7) " alt="Informática">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/unnn.png" class="d-block w-100" alt="Derecho">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/ss.png" class="d-block w-100" style="transform: rotate(25deg)" alt="Administración">
      </div>
    </div>
  </div>
  <!-- Carrusel de logos(fondo de pantalla) -->
    <div id="carouselFadeLogoRight" class="carousel slide carousel-fade position-fixed bottom-0 start-0 w-25 h-25" 
       style="z-index:1;">
    <div class="carousel-inner h-100">
      <div class="carousel-item active h-100">
        <img src="../assets/images/daw.png" class="d-block w-100" alt="Diseño 2">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/dre.png" class="d-block w-100" alt="Ciencias">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/ing.png" class="d-block w-100 " style="transform: rotate(45deg) scale(0.7) " alt="Informática">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/unnn.png" class="d-block w-100" alt="Derecho">
      </div>
      <div class="carousel-item h-100">
        <img src="../assets/images/ss.png" class="d-block w-100" style="transform: rotate(25deg)" alt="Administración">
      </div>
    </div>
  </div>
<div class="Overlay position-fixed top-0 start-0 w-100 h-100" >
</div>
<div class="Logo position-fixed d-block top-0 start-0 m-3" 
     style="background-image: url('../assets/images/logo.png');">
</div>

  <div class="container py-5" style="z-index: 2;">
    <!-- Encabezado -->
    <div class="row mb-4 justify-content-center">
      <div class="col-sm-12 col-md-8 col-lg-6  justify-content-center align-items-center text-center px-5 py-3">
        <h1 class="fw-bold" style="font-family:'Orbitron', sans-serif; color:white">Test Vocacional UNISITE</h1>                                                      
        <p class="h4 fw-bold" style="font-family:'Roboto', sans-serif; color:white">Contesta sinceramente las siguientes preguntas conforme tus intereses para conocer tu perfil vocacional.</p>
      </div>
    </div>

    <!-- Tarjetas en slider-style -->
    <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div id="Targeta"class="card text-center rounded-4" id="pregunta-card">
          <div class="card-header rounded-4 p-0">
            <div class="progress rounded-4" style="height: 25px;">
              <div class="progress-bar fw-bold rounded-4"  style="background-color: #0191e7" id ="preguntaActual"></div>
            </div>
          </div>
          <div class="card-body">
            <!-- Aquí se cargará el contenido de la pregunta -->
            <div id="contenido-pregunta"></div>
            <div class="card-footer rounded-4 d-flex justify-content-between">
              <button class="mx-0 btn btn-secondary btn-md rounded-5" id="btn-anterior" style="transition: all 0.3s cubic-bezier(.4,2,.6,1);">Anterior</button>
              <button class="mx-0 btn btn-md rounded-5" id="btn-siguiente"  style="background-color: #0191e7; color:white; transition: all 0.3s cubic-bezier(.4,2,.6,1);">Siguiente</button>
            </div>
          </div>
        </div>  
      </div>
    </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Variables para el estado del test
  // Pregunta actual comienza en 1
let preguntaActual = 1;
const carousel = new bootstrap.Carousel(document.getElementById('carouselFadeBackground'));
const logoleft = new bootstrap.Carousel(document.getElementById('carouselFadeLogoLeft'));
const logoright = new bootstrap.Carousel(document.getElementById('carouselFadeLogoRight'));


// Estado actual
// Calculamos el slide actual basado en la pregunta actual
// Cada slide contiene 16 preguntas, por lo que el slide cambia cada 16 preguntas
let slideActual = Math.floor((preguntaActual - 1) / 16);

// Función para actualizar el carrusel y los logos
// Esta función se llama cada vez que se cambia la pregunta
function actualizarCarrusel() {
    // Actualizamos el slide actual basado en la pregunta actual
    const nuevoSlide = Math.floor((preguntaActual - 1) / 16);
    // Si el nuevo slide es diferente al actual, cambiamos el slide
    if (nuevoSlide !== slideActual) {
        // Actualizamos el carrusel y los logos
        if (nuevoSlide > slideActual) { 

            carousel.next();
            logoleft.next();
            logoright.next();
        } else {
            carousel.prev();      
            logoleft.prev();
            logoright.prev();
        }
        // Actualizamos el estado del slide actual
        slideActual = nuevoSlide;
    }
}

// Función para añadir efectos de hover a los botones
// Esta función se llama al cargar la página y cada vez que se cambia la pregunta
function setHoverEffect(mainId, otherId) {
    const mainBtn = document.getElementById(mainId);
    const otherBtn = document.getElementById(otherId);

    if (!mainBtn || !otherBtn) return; // si alguno no existe, no hacemos nada

    // Añadimos los eventos de hover al botón principal
    mainBtn.addEventListener('mouseenter', function () {
        mainBtn.classList.add('p-3');
        otherBtn.classList.add('p-2');
    });

    // Eliminar animación al salir del botón principal
    mainBtn.addEventListener('mouseleave', function () {
        mainBtn.classList.remove('p-3');
        otherBtn.classList.remove('p-2');
    });
}

  // Función para cargar la pregunta desde el servidor
  // Esta función se llama al cargar la página y cada vez que se cambia la pregunta
  function cargarPregunta(id) {
    fetch(`../Controlador/TestVoc.php?id=${id}`, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'}
    })
      .then(res => res.text())
      .then(data => {
        // Actualizamos el contenido de la pregunta dependiendo de la pregunta actual
        if(id == 80) {
          document.getElementById("contenido-pregunta").innerHTML = data;
          document.getElementById("btn-siguiente").innerHTML = "Finalizar Test"; // Asegura que no se pueda ir más allá de la última pregunta
          document.getElementById("preguntaActual").style.width = ((id / 80) * 100) + "%";
        
        } else if (id == 81){
          id=80
          document.getElementById("contenido-pregunta").innerHTML = data;
          document.getElementById("btn-siguiente").hidden = true; // Oculta el botón de siguiente en la última pregunta
          document.getElementById("btn-anterior").hidden = true; // Oculta el encabezado de pregunta
        } else {
          document.getElementById("contenido-pregunta").innerHTML = data;
          document.getElementById("preguntaActual").style.width = ((id / 80) * 100) + "%";
          //document.getElementById("preguntaActual").innerHTML = "Pregunta " + id +" de  80";
        }
        // Si se ha cargado este boton ocultamos preguntas y animamos el botón de terminar
        if(document.getElementById("Terminar")){
        document.getElementById("preguntaActual").classList.add("bg-success");
        document.getElementById("Terminar").addEventListener('mouseenter', function () {
          document.getElementById("Terminar").classList.add('p-3');
        });
        document.getElementById("Terminar").addEventListener('mouseleave', function () {
          document.getElementById("Terminar").classList.remove('p-3');
        });
        }
        // Añadimos los efectos de hover a los botones
        setHoverEffect('btnInteresa', 'btnNoInteresa');
        setHoverEffect('btnNoInteresa', 'btnInteresa');
      });

  }

// Función enviar resultado de la respuesta al servidor
function obtenerSeleccionbtn(id, respuesta) {
            fetch("../Controlador/TestVoc.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded",
                  'X-Requested-With': 'XMLHttpRequest'
        },
        // Enviamos el ID de la pregunta y la respuesta seleccionada
        body: `IDPregunta=${id}&respuesta=${respuesta}`
    })
    .then(res => res.json())
    .then(data => {
        //console.log("Respuesta del servidor ", data);
    });
}
  

  // Al cargar la página, muestra la primera pregunta
  document.addEventListener("DOMContentLoaded", () => {
    cargarPregunta(preguntaActual);
  });

  //eventos para los botones de siguiente y anterior
  // evento para asegurar la seleccion de una respuesta antes de continuar
  document.getElementById("btn-siguiente").addEventListener("click", () => {
    if (!document.querySelector("#btnInteresa.active, #btnNoInteresa.active")) {
        alert("Por favor, selecciona una opción antes de continuar.");
        return; 
    }
    //aumentamos la pregunta actual y cargamos la siguiente pregunta
    preguntaActual++;
    cargarPregunta(preguntaActual);
    actualizarCarrusel();
});
// evento para el boton de anterior
document.getElementById("btn-anterior").addEventListener("click", () => {
    if (preguntaActual <= 1) return;
    if (preguntaActual === 80) {
        document.getElementById("btn-siguiente").innerHTML = "Siguiente"; // Cambia el texto del botón de siguiente
        document.getElementById("preguntaActual").classList.remove("bg-success");
    }
    //disminuimos la pregunta actual y cargamos la pregunta anterior
    preguntaActual--;
    cargarPregunta(preguntaActual);
    actualizarCarrusel();
});

// Evento para manejar la selección de respuestas
document.addEventListener("click", function(e) {
    if (e.target && (e.target.id === "btnInteresa" || e.target.id === "btnNoInteresa")) {
        // Marcar el botón como activo
        document.getElementById("btnInteresa").classList.remove("active");
        document.getElementById("btnNoInteresa").classList.remove("active");
        //console.log("Botón presionado:", e.target.id);
        e.target.classList.add("active");
        const respuesta = e.target.getAttribute("data-respuesta");
        // Enviar la respuesta al servidor
        obtenerSeleccionbtn(preguntaActual, respuesta);
        //console.log("Respuesta enviada:", respuesta);
        
    }
});

// Evento para manejar el botón de terminar el test
document.addEventListener("click", (e) => {
    if (e.target && e.target.id === "Terminar") {
        //console.log("Botón Terminar detectado y clickeado");
        // Enviar la solicitud para finalizar el test al servidor
        fetch("../Controlador/TestVoc.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded",
                      'X-Requested-With': 'XMLHttpRequest'
             },
            body: "accion=finalizarTest"
        })
        .then(res => res.text())
        .then(data => {
            //console.log("Servidor respondió:", data);
            //alert("Gracias por completar el test. Se guardaron tus resultados.");
            window.location.href = "../Vista/Resultados.php";
        })
        .catch(err => console.error("Error en fetch:", err));
    }
});

    // Asignamos efectos a cada par de botones
    setHoverEffect('btn-siguiente', 'btn-anterior');
    setHoverEffect('btn-anterior', 'btn-siguiente');




</script>
</body>
</html>