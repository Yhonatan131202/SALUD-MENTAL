<?php
    require_once 'conexion.php';

    // Utilizar la función conectar() para obtener la conexión
    $conexion = conectar();
    
    $Servidor_Social = $_POST['nombre'];
    $Profesion = $_POST['profesion'];
    $Gmail = $_POST['Gmail'];
    $Telefono = $_POST['telefono'];
    $Descripcion = $_POST['descripcion'];
    
    // Verificar si se ha subido una imagen
    if(isset($_FILES['foto2']) && $_FILES['foto2']['error'] === UPLOAD_ERR_OK) {
        // Obtener la imagen
        $Foto = addslashes(file_get_contents($_FILES['foto2']['tmp_name']));
    } else {
        // Establecer una imagen por defecto o dejar el campo de imagen en NULL
        $rutaImagenPredeterminada = '../img/perfil.jpg'; // Ruta a la imagen predeterminada
        $Foto = addslashes(file_get_contents($rutaImagenPredeterminada));
    }
    
    // Preparar la consulta SQL
    $sql = "INSERT INTO psicologos_csmc (foto, nombre, profesion, Gmail, telefono, descripcion) VALUES ('$Foto','$Servidor_Social','$Profesion','$Gmail','$Telefono','$Descripcion')";
    $result = mysqli_query($conexion, $sql);
    
    if(!$result){
        echo 'No se Inserto los datos';
    } else {
        header("Location: ../vista/contenido_administrador/directorio_administrador.php#direccion_ps");
    }
?>