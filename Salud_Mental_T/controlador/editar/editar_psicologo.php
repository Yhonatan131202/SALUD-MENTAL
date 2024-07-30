<?php
require_once '../../modelo/conexion.php';

// Utilizar la función conectar() para obtener la conexión
$conexion = conectar();

// Verificar si se ha enviado el formulario de actualización
if(isset($_POST['id_psicologo'])) {
    // Obtener el ID del psicólogo a actualizar
    $Id_Director = $_POST['id_psicologo'];

    // Obtener el resto de los datos del formulario
    $Servidor_Social = $_POST['nombre'];
    $Profesion = $_POST['profesion'];
    $Gmail = $_POST['Gmail'];
    $Telefono = $_POST['telefono'];
    $Descripcion = $_POST['descripcion'];

    // Procesar la imagen solo si se ha enviado una nueva imagen
    if ($_FILES['Nueva_Foto']['error'] === UPLOAD_ERR_OK) {
        // Obtener la imagen cargada y convertirla en una cadena binaria
        $Foto = addslashes(file_get_contents($_FILES['Nueva_Foto']['tmp_name']));

        // Actualizar la información incluyendo la nueva imagen
        $sql = "UPDATE psicologos_csmc SET foto='$Foto', nombre = '$Servidor_Social', profesion ='$Profesion', Gmail ='$Gmail', telefono = '$Telefono', descripcion = '$Descripcion' WHERE id_psicologo = '$Id_Director'";
    } else {
        // Si no se proporciona una nueva imagen, mantener la imagen existente
        $sql = "UPDATE psicologos_csmc SET nombre = '$Servidor_Social', profesion ='$Profesion', Gmail ='$Gmail', telefono = '$Telefono', descripcion = '$Descripcion' WHERE id_psicologo = '$Id_Director'";
    }

    // Ejecutar la consulta de actualización
    $result = mysqli_query($conexion, $sql);

    // Verificar si la consulta se ejecutó con éxito
    if(!$result){
        // En caso de error, mostrar un mensaje de error
        echo 'Error al actualizar los datos.';
    } else {
        // Si la actualización fue exitosa, redireccionar a la página deseada
        header("Location: ../../vista/contenido_administrador/directorio_administrador.php");
        exit(); // Asegurémonos de que no haya salida adicional que pueda interferir con la redirección
    }
} else {
    // Si no se ha enviado el formulario de actualización, redireccionar a alguna página de error o regresar
    header("Location: ../../vista/contenido_administrador/directorio_administrador.php");
    echo "error al actualizar los datos";
    exit();
}
?>