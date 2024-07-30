<?php
//hacemos llamado al imput de formulario
    $titulo = $_POST["titulo"];
    $url = $_POST["url"];
    
    include "conexion.php";
    $conexion = conectar();

//indicamos el nombre de la base datos
$datab = "csmc_tayacaja";
//indicamos selecionar ala base datos
$db = mysqli_select_db($conexion,$datab);

if (!$db)
{
echo "No se ha podido encontrar la Tabla";
}
else
{
echo "<h3>Tabla seleccionada:</h3>" ;
}

// Función para obtener el ID del video de un enlace de YouTube
function obtenerIdVideo($enlace) {
    $regex = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    preg_match($regex, $enlace, $match);
    return $match ? $match[1] : null;
}

// Validar el formato del enlace de YouTube
$idVideo = obtenerIdVideo($url);

// Construir la URL del iframe
$urlIframe = "https://www.youtube.com/embed/" . $idVideo;

$sqlInserta = "INSERT INTO videos (titulo, url) 
                            VALUES ('$titulo', '$urlIframe')";
                    
    if ($conexion->query($sqlInserta) === TRUE) {
        header("location: ../vista/contenido_administrador/videos_admin.php");
        echo "Nuevo registro creado exitosamente<br>";
    } else {
        echo "Error al insertar: " . $sqlInserta . "<br>" . $conexion->error;
    }


mysqli_close($conexion);
    
?>