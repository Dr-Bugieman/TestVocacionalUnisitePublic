<?php
session_start();
if(!isset($_SESSION['tipo_cuenta'])){
    header("Location: login.php");
    exit();
}
if (!isset($_SESSION['Resultados_Area'])) {
    header("Location: testvocacional.php");
    exit();
}
?>
<!DOCTYPE html>
<style>
.toast {
  position: fixed;
  pointer-events: none;   /* no bloquea el hover */
  z-index: 2000;
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}
.toast.show {
  opacity: 0.95;
}
</style>
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
  <div class="Background position-fixed top-0 start-0 w-100 h-100" 
       style="background-image: url('../assets/images/adm.png');">
  </div>
  <div class="Logo position-fixed d-block top-0 start-0 m-3" 
     style="background-image: url('../assets/images/logo.png');">
  </div>
  <div class="Overlay position-fixed top-0 start-0 w-100 h-100">
  </div>

  <div class="container py-0" style="z-index: 1;">
    <div class="row m-0">
      <div class="col-12 text-center" style="color:white">
        <h1 class="fw-bold mt-5" style="font-family:'Orbitron', sans-serif;"  id="Titulo">Test Vocacional Unisite</h1>
        <p class="h5 fw-bold" style="font-family:'Roboto', sans-serif;"  id="Subtitulo">Tus resultados</p>
      </div>
    </div>
    <div class="container py-4">
      <div class="row mb-2">
        <div class="col-12 text-center" style="font-family:'Roboto', sans-serif; color:white" id ="ContenidosTexto">
          <h3>Resultados por Área</h3>
          <p class="h5 fw-bold">Áreas en las que destacas más según tus respuestas. Si quieres conocer mas, coloca tu mouse sobre el area que quieras conocer</p>
        </div>
      </div>
    <div class="col-lg-12 text-center mx-auto">
    <div class="card shadow rounded-4" id="ContenedorResultados">
    </div>
  </div>
  </div>
    

<!-- Bootstrap JS (debes tenerlo cargado) -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function isMobile() {
  return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

// Mueve el toast según la posición del cursor o en una posición fija en móvil
function moveToast(toast, e) {
  if (isMobile()) {
    // En móvil, mostramos toast centrado o en una posición fija (por ejemplo abajo-centro)
    toast.style.left = `50%`;
    toast.style.top = `auto`;
    toast.style.bottom = `30px`;
    toast.style.transform = 'translateX(-50%)';
  } else {
    // Comportamiento normal en desktop (con cursor)
    toast.style.transform = 'none'; // reset
    const offsetX = 20;
    const offsetY = 20;

    const toastWidth = toast.offsetWidth;
    const toastHeight = toast.offsetHeight;
    const maxX = window.innerWidth - toastWidth - 10;
    const maxY = window.innerHeight - toastHeight - 10;

    let newX = e.clientX + offsetX;
    let newY = e.clientY + offsetY;

    if (newX > maxX) newX = e.clientX - toastWidth - offsetX;
    if (newY > maxY) newY = e.clientY - toastHeight - offsetY;

    toast.style.left = `${newX}px`;
    toast.style.top = `${newY}px`;
  }
}

  // Inicializa los eventos para mostrar y mover los toasts
 function inicializarToasts() {
  for (let i = 1; i <= 5; i++) {
    const trigger = document.getElementById(`area${i}`);
    const toastEl = document.getElementById(`toastInfo${i}`);

    if (trigger && toastEl) {
      // Para desktop
      trigger.addEventListener('mouseenter', () => {
        toastEl.classList.add('show');
      });

      trigger.addEventListener('mouseleave', () => {
        toastEl.classList.remove('show');
      });

      trigger.addEventListener('mousemove', (e) => moveToast(toastEl, e));

      // Para móvil (touch)
      trigger.addEventListener('touchstart', (e) => {
        e.preventDefault(); // Evita doble disparo de eventos en algunos navegadores
        toastEl.classList.add('show');
        moveToast(toastEl, e.touches[0]);
      });

      trigger.addEventListener('touchend', () => {
        toastEl.classList.remove('show');
      });
    }
  }
}

  // Función para cargar los resultados desde el servidor
  function cargarResultados() {
    fetch(`../Controlador/Resultados.php`, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
      .then(res => res.text())
      .then(data => {
        // Insertar el HTML recibido en el contenedor
        document.getElementById("ContenedorResultados").innerHTML = data;
        inicializarToasts(); // ⬅️ se inicializan los eventos después de insertar el HTML
      });
  }

  // Cargar los resultados cuando el DOM esté listo
  document.addEventListener("DOMContentLoaded", () => {
    cargarResultados();
  });

</script>
 

</body>
</html>
