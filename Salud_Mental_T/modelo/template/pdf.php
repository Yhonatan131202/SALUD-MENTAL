<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

// Contenido HTML
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de libro de reclamaciones</title>
    <style>
        /* Estilos CSS */
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        .title{text-align: center;}
        .mb-1{margin-bottom: .5rem;}
        .mb-2{margin-bottom: 1rem;}
        .logo{float: left;}
        h1,h2, h3{margin: 0;}
        .p-2{padding: 1rem;}
    </style>
</head>
<body>
    <div class="title">
        <img class="logo" src="http://localhost/Salud_Mental_Tayacaja/Salud_Mental_T/img/logo_saludmental-removebg-preview%20(2).png" width="80px" height="80px">
        <div class="mb-2 p-2">
            <h1>Centro de Salud Mental Comunitario</h1>
            <span>(Tayacaja)</span>
        </div>
    </div>
    <div style="border: 1px solid green; padding-bottom: 0" class="mb-2 p-2">
        <div style="display: inline-block; width:49%; margin-top:3rem">
            <h3 style="margin: 2rem 0">Grafico por distritos</h3>
            <img id="graf" src="http://localhost/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/grafic/pastel.php" alt="" width="100%">
        </div>
        <div style="display: inline-block; width:49%; margin-top:3rem">
            <h3 style="margin: 2rem 0">Grafico por seguro</h3>
            <img id="graf2" src="http://localhost/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/grafic/pastel2.php" alt="" width="100%">
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Nombre del Reclamante</th>
                <th>fecha</th>
                <th>N° DNI</th>
                <th>N° Telefónico</th>
                <th>Distrito</th>
                <th>T. seguro</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Supongo que $rta ya está definida y contiene los datos
            while ($filas = mysqli_fetch_array($rta)){ 
                $fecha = DateTime::createFromFormat("Y-m-d H:i:s", $filas["fecha_creacion"]);
                $filas["fecha"] = $fecha->format("d/m/Y");
            ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $filas["nombre"] ?> <?= $filas["apellido_paterno"] ?> <?= $filas["apellido_materno"] ?></td>
                <td><?= $filas["fecha"] ?></td>
                <td><?= $filas["numero_de_documento"] ?></td>
                <td><?= $filas["telefono"] ?></td>
                <td><?= $filas["distrito"] ?></td>
                <td><?= $filas["tipo_de_seguro"] ?></td>
            </tr>
            <?php } ?>                        
        </tbody>
    </table>
</body>
</html>';

// Inicializar Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Opcional: Configura el tamaño y la orientación del papel
$dompdf->setPaper('A4', 'landscape'); // 'landscape' para horizontal, 'portrait' para vertical

// Renderiza el HTML como PDF
$dompdf->render();

// Salida del PDF generado al navegador
$dompdf->stream("reporte.pdf");
?>
