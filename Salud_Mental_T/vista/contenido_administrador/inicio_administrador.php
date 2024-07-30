<?php
    session_start();
    //Verificamos si el usuario ha iniciado sesion
    if(!isset($_SESSION['usuario'])) {
        header("Location: ../vista/inicio_sesion.php");
        exit;
    }

    require_once '../../controlador/contar/contarDirectorio.php';
    require_once '../../controlador/contar/contarDocumentos.php';
    require_once '../../controlador/contar/contarReclamaciones.php';
    require_once '../../controlador/contar/contarVideos.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio-CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="..\..\CSS\contenido_administrador\inicio_admin.css">
</head>
<body>
    <!--en este apartado se realizara el boton que desplegara al menu si en caso la pantall es menor -->
    <div class="menu">
        <i class="fa-solid fa-list"></i>
        <i class="fa-solid fa-xmark"></i>
    </div>
    <!--se realizara una barra lateral como el menu del directorio-->
    <div class="barra_lateral">

        <div><!--este div es el encargado de mostrar el icono de despliege y el nombre de la entidad-->

            <div class="nombre_pagina">
                <i id = "abrir" class="fa-regular fa-hospital"></i>
                <span>CSMC - Tayacaja</span>
            </div>
            <!--este sera el boton que permitira al administrador agregar a un usuario si en caso es necesario-->
            <a href="../registrate.php">
                <button class = "btn">
                    <i class="fa-solid fa-plus"></i><span>Nuevo Usuario</span>
                </button>
            </a>

        </div>
        <!--la etiqueta nav es la encargado de contener el contenido del menu de navegacion-->
        <nav class="navegacion">
            <ul>
                <!--la eqtiqueta li almacenara los cada opcion del menu-->
                <li>
                    <a href="#">
                    <i class="fa-solid fa-house-user"></i><span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="directorio_administrador.php">
                    <i class="fa-solid fa-address-book"></i><span>Directorio</span>
                    </a>
                </li>
                <li>
                    <a href="documentos_admin.php">
                    <i class="fa-solid fa-file-pdf"></i><span>Documentos</span>
                    </a>
                </li>
                <li>
                    <a href="videos_admin.php ">
                    <i class="fa-brands fa-youtube"></i><span>Videos</span>
                    </a>
                </li>
                <li>
                    <a href="reclamaciones_admin.php">
                    <i class="fa-solid fa-book-medical"></i><span>Reclamaciones</span>
                    </a>
                </li>
                <li>
                    <a href="reportFilter.php">
                    <i class="fa-solid fa-book-medical"></i><span>Reportes</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!--en el siguiente div se relacionara como el pie de la barra de menu-->
        <div>

            <!--primero se crea la barra de separacion-->
            <div class="linea_divicion"></div>
            
            <!--creamos la opcion de cerrar sesion-->
            <nav class ="cerrar_sesion">
                <ul>
                    <li>
                        <a href="..\..\modelo\logout.php">
                        <i class="fas fa-sign-out-alt fa-lg"></i><span>Cerrar Sesion</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!--otro apartado para mostrar el usuario que entro como administrador-->

        </div>

    </div>
    <!--en esta parte contendra el contenido -->
    <div class="contenido">
        <header>
            <img src="..\..\img\logo_saludmental-removebg-preview (2).png" class = "img_1">
            <div class ="gent_tit">
                <h1>Centro de Salud Mental Comunitario</h1>
                <small>(Tayacaja)</small>
            </div>
            <img src="..\..\img\logo_red_salud-removebg-preview.png" class = "img_2">
        </header>   

        <main>
            <div class="sub_tit">
                <span>Bienvenido : <?php echo $_SESSION['usuario'];?></span>
            </div>  
                
            <div class="contenedor_cuadros">

                <div class="analytics">
                    <div class="card">
                        <div class="card-head">
                            <i class="fa-solid fa-address-book"></i>
                            <h2><?php echo $datosTotales['general']; ?></h2> 
                        </div>
                        <div class="card-progress">
                            <small>Directorio</small>
                            <div class="card-indicator"> 
                                <div class="indicator one" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <i class="fa-solid fa-file-pdf"></i>
                            <h2><?php echo $totalDatos; ?></h2>
                        </div>
                        <div class="card-progress">
                            <small>Documentos</small>
                            <div class="card-indicator">
                                <div class="indicator two" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <i class="fa-brands fa-youtube"></i>
                            <h2><?php echo $totalDatosVideo ;?></h2>
                        </div>
                        <div class="card-progress">
                            <small>Videos</small>
                            <div class="card-indicator">
                                <div class="indicator three" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <i class="fa-solid fa-book-medical"></i>
                            <h2><?php echo $totalDatosReclamo;?></h2>
                        </div>
                        <div class="card-progress">
                            <small>Reclamaciones</small>
                            <div class="card-indicator">
                                <div class="indicator four" ></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </main>
    </div>


    <!--aqui esa el scripu que dara las funciones de los efectos-->
    <script src = "..\..\Js\funcion_menu.js"></script>
</body>
</html>