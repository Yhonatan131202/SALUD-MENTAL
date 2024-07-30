<?php
//session_start();
    function conectar(){
        $conexion = new mysqli('localhost','root','','csmc_tayacaja_reporte');

        $conexion->set_charset("utf8");
        if ($conexion -> connect_error){
        echo "conexion fallida";
        }else{
            //echo "conexion exitosa<br>";
            return $conexion;
        }
    }
    //$conectado = conectar();
?>