<?php
require_once '../../modelo/conexion.php';

// Utilizar la función conectar() para obtener la conexión
$conexion = conectar();

function contarDatosTablas($conexion) {
    // Verificar si la conexión se estableció correctamente
    if ($conexion) {
        // Realizar la consulta para contar los datos en la tabla 'files'
        $resultado_files = $conexion->query("SELECT * FROM director_csmc");

        // Realizar la consulta para contar los datos en la tabla 'social'
        $resultado_social = $conexion->query("SELECT * FROM ft_social_csmc");

        // Realizar la consulta para contar los datos en la tabla 'psychologists'
        $resultado_psychologists = $conexion->query("SELECT * FROM psicologos_csmc");

        // Verificar si las consultas fueron exitosas
        if ($resultado_files && $resultado_social && $resultado_psychologists) {
            // Obtener el número de filas de cada consulta
            $total_files = mysqli_num_rows($resultado_files);
            $total_social = mysqli_num_rows($resultado_social);
            $total_psychologists = mysqli_num_rows($resultado_psychologists);

            // Calcular el total general sumando los totales de todas las tablas
            $total_general = $total_files + $total_social + $total_psychologists;

            // Devolver el resultado
            return array(
                'director' => $total_files,
                'sociales' => $total_social,
                'psicologos' => $total_psychologists,
                'general' => $total_general
            );
        } else {
            // Manejo de error si alguna de las consultas no fue exitosa
            return "Error al realizar alguna de las consultas";
        }
    } else {
        // Manejo de error si la conexión no se establece
        return "Error al conectar a la base de datos";
    }
}

// Uso de la función
$datosTotales = contarDatosTablas($conexion);
?>