<?php
//hacemos llamado al imput de formulario
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    
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

    $sqlInserta = "INSERT INTO usuario (nombre, contraseña) 
                            VALUES ('$usuario', '$contraseña')";
        if ($conexion->query($sqlInserta) === TRUE) {
            header("location: ../vista/contenido_administrador/inicio_administrador.php");
            echo "Nuevo registro creado exitosamente<br>";
        } else {
            echo "Error al insertar: " . $sqlInserta . "<br>" . $conexion->error;
        }

mysqli_close($conexion);
?>