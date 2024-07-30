<?php
include "../../modelo/conexion.php";

// Obtener el id a eliminar desde la URL
$id = $_GET['id_reclamacion'];

$conexion = conectar();

// Construir la consulta SQL
$sqleliminar = "DELETE FROM libro_reclamaciones WHERE id_reclamacion = $id";

// Ejecutar la consulta
$rta = mysqli_query($conexion, $sqleliminar);

// Verificar el resultado y redirigir según corresponda
if (!$rta) {
    echo "No se pudo eliminar el registro: " . mysqli_error($conexion);
} else {
    // Redirigir a la página de administrador después de la eliminación
    header("location: ../../vista/contenido_administrador/reclamaciones_admin.php");
}

// Cerrar la conexión
mysqli_close($conexion);
?>