<?php
require_once '../../modelo/conexion.php';

// Utilizar la función conectar() para obtener la conexión
$conexion = conectar();
function contarDatosTabla($conexion) {
    // Verificar si la conexión se estableció correctamente
    if ($conexion) {
        // Realizar la consulta para contar los datos en la tabla
        $resultado = $conexion->query("SELECT COUNT(*) AS total FROM documentos");
        
        // Verificar si la consulta fue exitosa
        if ($resultado) {
            // Obtener el número de filas
            $fila = $resultado->fetch_assoc();
            $total = $fila['total'];
            // Devolver el resultado
            return $total;
        } else {
            // Manejo de error si la consulta no fue exitosa
            return "Error al realizar la consulta";
        }
    } else {
        // Manejo de error si la conexión no se establece
        return "Error al conectar a la base de datos";
    }
}

// Uso de la función
$totalDatos = contarDatosTabla($conexion);
?>