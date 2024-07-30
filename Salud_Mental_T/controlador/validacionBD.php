<?php
session_start();  
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    
    include "../modelo/conexion.php";
    $conectado = conectar();
    $sql = "SELECT nombre, contraseña FROM usuario WHERE nombre = '$usuario' AND contraseña = '$contraseña'";
    
    if ($conectado->query($sql)->num_rows > 0){
        $_SESSION["usuario"] = $usuario;
        header("location: ../vista/contenido_administrador/inicio_administrador.php");
        //echo ("accesedio correctamente");

    }else{
        header("location: ../../index.php");
        //echo ("error de conexion");
    }
    mysqli_close($conexion);
?>