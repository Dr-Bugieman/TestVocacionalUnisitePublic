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
header('Content-Type: text/html; charset=utf-8');
$db = null;
$ResultadosConstruct = new resultados($db);
$Preguntas = new preguntas($db);
$Areas = [0, 0, 0, 0, 0];
$AreasPregunta = $Preguntas -> obtenerAreaPreguntas();

 //Ajax para cargar las preguntas del test vocacional
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    //echo "<h1>Pregunta Vocacional</h1>";
    $id = intval($_GET['id']);
    if ($id <= 0){
        $id = 1; // Asegura que el ID sea al menos 1
    }
    $modelo = new preguntas($db);
    $preguntas = $modelo->obtenerPreguntas();
    
    // Buscar la pregunta con el ID especificado
    for ($i = 0; $i < count($preguntas); $i++) {

        if ($preguntas[$i]['IDPregunta'] == $id) {
            echo "<h5>¿A ti te Interesa...? </h5>";
            echo "<p class='h5' >{$preguntas[$i]['Pregunta']}</p>";
            echo "<div class='d-grid gap-2'>";
            echo "<div class='btn-group d-grid gap-2' role='group' required>";
            echo "<button type='button' style='transition: all 0.3s cubic-bezier(.4,2,.6,1);' class='btn btn-outline-primary rounded-5' id='btnInteresa' data-respuesta='1'>Me Interesa</button>";
            echo "<button type='button' style='transition: all 0.3s cubic-bezier(.4,2,.6,1);' class='btn btn-outline-primary rounded-5' id='btnNoInteresa' data-respuesta='0'>No Me Interesa</button>";
            echo "</div>";
            echo "</div>";
        }
    }
    // Mensaje de fin del test
    if ($id > 80 ){
        echo "<p class='h5'>Fin del test. Gracias por participar.</p>";
        echo "<div class='d-grid gap-2'>";
        echo "<button style='transition: all 0.3s cubic-bezier(.4,2,.6,1);' class='btn btn-success rounded-5' id='Terminar'>Mostrar Resultados</button>";
        echo "</div>";
    }
} 

//Ajax para guardar la respuesta del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IDPregunta']) && isset($_POST['respuesta'])) {
    header('Content-Type: application/json; charset=utf-8');
    if (!isset($_SESSION['respuestas'])) {
        $_SESSION['respuestas'] = [];
    }
    $_SESSION['respuestas'][$_POST['IDPregunta']] = intval($_POST['respuesta']); // acumula en sesión
    
    if ($IDPregunta > 80) {
        ob_clean(); // Limpia el buffer de salida
            echo json_encode([
                'success' => true,
                'message' => 'Respuesta guardada',
                'respuestas'=> $_SESSION['respuestas'] // útil para debug
            ]);
         exit;
     } 
     ob_clean(); // Limpia el buffer de salida
        echo json_encode([
            'success' => true,
            'message' => 'Respuesta guardada',
            'respuestas'=> $_SESSION['respuestas'] // útil para debug
        ]);
     exit;
}

// Ajax para finalizar el test y calcular resultados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'finalizarTest') {
    // Obtener respuestas acumuladas en sesión
    $respuestas = $_SESSION['respuestas'];

    // Calcular áreas en base a las respuestas
    foreach ($AreasPregunta as $preg) {
        $idPregunta = $preg['IDPregunta'];
        $areaIndex  = $preg['Area'] - 1; // ajusta a índice 0..n

        if (isset($respuestas[$idPregunta]) && $respuestas[$idPregunta] == 1) {
            $Areas[$areaIndex]++; // suma al área correspondiente
        }
    }

    // Guardar resultados finales en sesión
    $_SESSION['Resultados_Area'] = $Areas;

    // Guardar resultados en la BD
    $Date = date("Y-m-d");
    $ResultadosConstruct->setAreas($Areas[0], $Areas[1], $Areas[2], $Areas[3], $Areas[4]);
    $insertado = $ResultadosConstruct->agregarResultados($_SESSION['user_id'], $Date);

    // Respuesta al cliente
    echo json_encode([
        'success'    => $insertado ? true : false,
        'message'    => $insertado ? 'Test finalizado correctamente' : 'Error al guardar resultados',
        'Resultados' => $Areas
    ]);
    exit;
}

?>