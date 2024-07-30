<?php
require './quickchart-php/QuickChart.php';
require_once '../conexion.php';

$conexion = conectar();

$filter = '';

if(isset($_GET['type'])){
  if($_GET['type'] == 'date'){
    $filter = "WHERE fecha_creacion BETWEEN '".$_GET['dateIni']." 00:00:00' AND '".$_GET['dateFin']." 23:59:59' ";
  }
  if($_GET['type'] == 'distrito'){
    $filter = "WHERE distrito = '".$_GET['dist']."'";
  }
  if($_GET['type'] == 'secure'){
    $filter = "WHERE tipo_de_seguro = '".$_GET['sec']."'";
  }
}

$sql = "SELECT distrito, COUNT(*) AS cantidad
        FROM libro_reclamaciones ".$filter."
        GROUP BY distrito;";

$rta = mysqli_query($conexion, $sql);

$label = [];
$size = [];

while($filas = mysqli_fetch_array($rta)){
    array_push($label, '"'.$filas['distrito'].'"');
    array_push($size, $filas['cantidad']);
}
// Crear un objeto QuickChart
$qc = new QuickChart(array(
    'width' => 450,
    'height' => 300,
    'version' => '2.9.4',
));

$config = '{
  "type": "pie",
  "data": {
    "labels": ['.implode(", ", $label).'],
    "datasets": [{
      "data": ['.implode(", ", $size).'],
      "backgroundColor": ["#FF6384","#FF6414","#FF1421","#FF4752"]
    }]
  }
}';
// Configurar el gráfico
$qc->setConfig($config);

// echo $config;
// Mostrar la imagen
header('Content-Type: image/png');
echo $qc->toBinary();