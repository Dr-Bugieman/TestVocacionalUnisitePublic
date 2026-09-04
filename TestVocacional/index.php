<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="144x144"  href="assets/favicon/android-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <title>Inicio de Sesión - Test Vocacional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
     <link rel="stylesheet" href="assets/styles/styles.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Audiowide&display=swap&display=swap&Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100 vw-100">
<div class="Background position-fixed top-0 start-0 w-100 h-100" 
    style="background-image: url('assets/images/Inicio.png');">
</div>
<div class="Overlay position-fixed top-0 start-0 w-100 h-100">
</div>

<div class="container-fluid d-flex flex-column justify-content-center align-items-center vh-100 vw-100" style="z-index: -1;"> 
    <div class="row vw-100 vh-30 justify-content-center align-items-center pb-5">
        <div class="col-sm-12 col-md-8 col-lg-6"> 
            <div class=" px-4 py-2">
                <h1 class="display-1" style="font-family:'Audiowide', snas-serif; color:white"> Unisite </h1>
            </div>
        </div>
    </div>
    <div class="row vw-100 vh-70 justify-content-center align-items-center pt-5">
        <div class="col-md-8 col-lg-6">
            <div class=" rounded-4" ">
                <div class=" px-4 py-2">
                    <h1 class="display-1" style="font-size: 8rem; font-family:'Orbitron', sans-serif; color:white;">Test Vocacional</h1>
                </div>
                <div class=" p-4">
                    <div class="col-4 p-1 rounded-5 btn" style="background-color: #0191e7" onclick="location.href='vista/login.php'" >
                        <div id="btnContinuar" class="fw-bold btn-sm d-flex justify-content-center align-items-center rounded-5 p-1" style="Color:white;   transition: padding 0.3s cubic-bezier(.4,2,.6,1);">
                            <p id="txtbtn" class="h3 m-0" style="transition: font-size 0.3s cubic-bezier(.4,2,.6,1);">Continuar 
                                <i style="color:white" class="bi bi-arrow-right-circle">
                                </i>
                            </p>
                        </div>
                    </div> 
                </div>
</body>

<script>
    document.getElementById('btnContinuar').addEventListener('mouseenter', function() {
    document.getElementById('btnContinuar').classList.add('p-3');
    document.getElementById('txtbtn').classList.remove('h3');
    document.getElementById('txtbtn').classList.add('h2');
});  
document.getElementById('btnContinuar').addEventListener('mouseleave', function() {
    document.getElementById('btnContinuar').classList.remove('p-3');
    document.getElementById('txtbtn').classList.remove('h2');
    document.getElementById('txtbtn').classList.add('h3');
});
</script>

</html>