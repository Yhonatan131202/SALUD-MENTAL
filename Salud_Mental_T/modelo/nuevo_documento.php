
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (conexión a la base de datos)

    include "conexion.php";
    $conexion = conectar();

    $titulo = $_FILES["pdf"]["name"];
    $archivoTemporal = $_FILES["pdf"]["tmp_name"];

    // Directorio donde se guardarán los archivos
    $directorioDestino = "archivos/";

    // Verificar y crear el directorio si no existe
    if (!file_exists($directorioDestino)) {
        if (!mkdir($directorioDestino, 0755, true)) {
            die('Error al crear el directorio de destino');
        }
    }

    // Generar un nombre único para el archivo
    $nombreArchivo = uniqid() . '_' . $titulo;

    // Ruta completa del archivo en el sistema de archivos
    $rutaCompleta = $directorioDestino . $nombreArchivo;

    // Mover el archivo al directorio de destino
    if (move_uploaded_file($archivoTemporal, $rutaCompleta)) {
        // Insertar información en la base de datos
        $consulta = $conexion->prepare("INSERT INTO documentos (titulo, archivo) VALUES (?, ?)");
        $consulta->bind_param("ss", $titulo, $rutaCompleta);

        if ($consulta->execute()) {
            header("Location: ../vista/contenido_administrador/documentos_admin.php");
            echo "PDF cargado exitosamente.";
        } else {
            echo "Error al cargar el PDF en la base de datos: " . $consulta->error;
        }
    } else {
        echo "Error al mover el archivo al directorio de destino.";
    }

    // Cerrar la conexión
    $conexion->close();
}
?>


