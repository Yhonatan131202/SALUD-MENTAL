
<?php
require_once 'conexion.php';

$id_documento = $_GET['id_documento'];

// Utilizar la función conectar() para obtener la conexión
$conexion = conectar();

// Obtener la información del archivo de la base de datos
$sql = "SELECT * FROM documentos WHERE id_documento = '$id_documento'";
$result = mysqli_query($conexion, $sql);

if (!$result) {
    echo 'No se pudo obtener la información del archivo.';
    exit;
}
if (mysqli_num_rows($result) == 0) {
    echo 'No se encontró ningún registro con ese ID.';
    exit;
}
$row = mysqli_fetch_assoc($result);
$archivo_a_eliminar = $row['archivo']; // Obtenemos la URL del archivo desde la base de datos

// Eliminar el archivo físico de la carpeta
if (unlink($archivo_a_eliminar)) { // unlink() elimina el archivo
    // Eliminar la entrada de la base de datos
    $sql_delete = "DELETE FROM documentos WHERE id_documento = '$id_documento'";
    $result_delete = mysqli_query($conexion, $sql_delete);
    
    if ($result_delete) {
        echo 'Se eliminó el archivo y su registro de la base de datos correctamente.';
        header("Location: ../vista/contenido_administrador/documentos_admin.php");
    } else {
        echo 'No se pudo eliminar el registro de la base de datos.';
    }
} else {
    echo 'No se pudo eliminar el archivo físico de la carpeta.';
}
?>
