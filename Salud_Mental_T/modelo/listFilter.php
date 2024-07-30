<?php
setlocale(LC_TIME, 'es_ES.UTF-8');

require_once "./conexion.php";
$conexion = conectar();

if(!isset($_GET['type']) or $_GET['type'] == 'all'){
    $sql = "SELECT * FROM libro_reclamaciones ORDER BY id_reclamacion desc"; 
}
if(isset($_GET['type'])){
    if($_GET['type'] == 'date'){
        $sql = "SELECT * FROM libro_reclamaciones WHERE fecha_creacion BETWEEN '".$_GET['dateIni']." 00:00:00' AND '".$_GET['dateFin']." 23:59:59'";
    }
    if($_GET['type'] == 'distrito'){
        $sql = "SELECT * FROM libro_reclamaciones WHERE distrito='".$_GET['dist']."'";
    }
    if($_GET['type'] == 'secure'){
        $sql = "SELECT * FROM libro_reclamaciones WHERE tipo_de_seguro='".$_GET['sec']."'";
    }
}

// echo $sql;

$rta = mysqli_query($conexion, $sql);

if(isset($_GET['v'])){
    $datos = [];
    while ($data = mysqli_fetch_assoc($rta)) {
        $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data['fecha_creacion']);
        $data['fecha'] = $fecha->format('d/m/Y');
        $datos[] = $data;
    }
    echo json_encode($datos);
}