<?php
if (
    basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__) &&
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
) {
    header("Location: index.php");
    exit();
}

session_start();
require_once '../modelo/respuestas.php';
header('Content-Type: text/html; charset=utf-8');
$db = null;

 //Ajax para cargar las preguntas del test vocacional
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
        $Resultados = $_SESSION['Resultados_Area'];
        $Areas = new Areas($db);
        $AreaInfo = $Areas->obtenerAreas();
        $Colores = ['#E5005B','#16968D','#6C4796','#ffae00ff','#009FE3'];
        $Colorestxt = ['#ffffff','#ffffff','#ffffff','#ffffff','#ffffff'];
        $_SESSION['Porcentaje'] = 0;
        $ResultadosDupla = $_SESSION['Resultados_Area'];
        $ResultadosPorcentaje = $_SESSION['Resultados_Area'];
        rsort($ResultadosDupla); // Ordena de mayor a menor
        $_SESSION['ResultadosOrdenados'] = $ResultadosDupla;
        // Calcular porcentaje
            for($i=0; $i < count($ResultadosPorcentaje); $i++){
            $ResultadosPorcentaje[$i] = round(($ResultadosPorcentaje[$i]*100)/16);
            $_SESSION['Porcentaje'] = $_SESSION['Porcentaje'] + $ResultadosPorcentaje[$i];
            }
        $_SESSION['ResultadosPorcentaje'] = $ResultadosPorcentaje;
        $indices_usados = [];

        // Mostrar resultados en orden descendente
        foreach ($ResultadosDupla as $valor_ordenado) {
            // Buscamos el índice en $Resultados que tenga este valor y que no hayamos usado aún
            foreach ($Resultados as $indice => $valor_original) {
                if ($valor_original === $valor_ordenado && !in_array($indice, $indices_usados)) {
                    // Marcar índice usado
                    $htmlscr = null;
                    $indices_usados[] = $indice;

                    // Aquí generas el HTML para este resultado(Area)
                    $htmlscr .= '
                    <div class="col-12 text-center my-3 px-5">
                        <p id="area'. ($indice + 1) .'" class="fw-bold mx-auto rounded-pill d-inline-block px-4 py-0" style="cursor: pointer;  background-color:'.$Colores[$indice].'; color:'.$Colorestxt[$indice].'; min-width:40%; max-width:40%; text-align:center; box-sizing:border-box;">
                            ' . htmlspecialchars($AreaInfo[$indice]['NomArea']) . '
                        </p>
                        <!-- Barra de progreso -->
                        <div class="progress mb-3" style="height: 25px;">
                            <div class="progress-bar fw-bold" style="width: ' . $ResultadosPorcentaje[$indice] . '%; background-color:'.$Colores[$indice].'; color:'.$Colorestxt[$indice].';">
                                ' . $ResultadosPorcentaje[$indice] . '%
                            </div>
                        </div>
                    </div>
                        <div id="toastInfo'. ($indice + 1) .'" class="toast border-0 shadow-lg p-2" style="background-color:'.$Colores[$indice].'; color:'.$Colorestxt[$indice].';">
                        <div class="toast-body">
                            <strong>Las Carreras relacionadas con esta area son: ' . htmlspecialchars($AreaInfo[$indice]['AreasRelacionadas']) . '</strong>
                        </div>
                    </div>
                    ';
            
                    break; // salir del foreach interno
                }
            }
    echo $htmlscr;
    }
}



?>
