<?php
    require_once 'conexion.php';

    // Utilizar la función conectar() para obtener la conexión
    $conexion = conectar();
    
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $tipo_de_documento = $_POST['tipo_de_documento'];
    $numero_de_documento = $_POST['numero_de_documento'];
    $dirección = $_POST['dirección'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $tipo_de_seguro = $_POST['tipo_de_seguro'];
    $telefono = $_POST['telefono'];
    $gmail = $_POST['gmail'];
    $causa_de_reclamo = $_POST['causa_de_reclamo'];
    $descripcion = $_POST['descripcion'];
    
    
    
    // Preparar la consulta SQL
    $sql = "INSERT INTO libro_reclamaciones (nombre, apellido_paterno, apellido_materno, tipo_de_documento, numero_de_documento, departamento, provincia, distrito, telefono, gmail, causa_de_reclamo, descripcion, dirección, tipo_de_seguro) 
                                VALUES ('$nombre','$apellido_paterno','$apellido_materno','$tipo_de_documento','$numero_de_documento','$departamento','$provincia','$distrito','$telefono','$gmail','$causa_de_reclamo','$descripcion','$dirección','$tipo_de_seguro')";

    $result = mysqli_query($conexion, $sql);
    
    if(!$result){
        echo 'No se Inserto los datos';
    } else {
        header("Location: ../vista/contenido_general/libro_de_reclamaciones.php");
    }
?>