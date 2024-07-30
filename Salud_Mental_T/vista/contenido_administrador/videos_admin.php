<?php
    session_start();
    //Verificamos si el usuario ha iniciado sesion
    if(!isset($_SESSION['usuario'])) {
        header("Location: ../vista/inicio_sesion.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos-CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="..\..\CSS\contenido_administrador\videos_admin.css">
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
                    <a href="inicio_administrador.php">
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
                    <a href="#">
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
           
            <div class="lista_videos">
                <span class = "sub">Bienvenido al Listado de videos: <?php echo $_SESSION['usuario'];?></span>
                
                <button class="abrir_popup" id = "miPopup_abrir">
                    <span class="sub_btn">AÑADIR VIDEO</span>
                </button>
            </div>
            
            <div class = "contenedor_videos">
                <?php include "../../modelo/conexion.php";
                $conexion = conectar(); ?>
                
                <?php 
                $sql = "SELECT * from videos order by id_video desc";
                $rta = mysqli_query($conexion, $sql);

                while ($mostrar = mysqli_fetch_row($rta)) { ?>
                
                <div class = "videos_cont">
                    
                    
                    <iframe  src="<?php echo $mostrar['2'] ?>" frameborder="0" allowfullscreen></iframe>
                    <div class = "tit_video"><?php echo $mostrar['1'] ?></div>
                     <!--parte para eliminar un registro-->
                    
                    

                    <form action="..\..\controlador\eliminar_video.php" method="get">
                        <!-- Incluir el ID del video como un campo oculto -->
                        <input type="hidden" name="id_videos" value="<?php echo $mostrar['0']  ?>">

                        <!-- Botón de envío del formulario con confirmación JavaScript -->
                        <button class = "elimar_fila" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este video?');">
                            Eliminar Video
                        </button>
                    </form>

                </div> 

                <?php } ?>
 
            </div>
            
            <!--contenido del popup o formulario creado-->
            <div class = "popup" >
                <div class = "popup_formulario">
                    <span class = "cerrar_popup"><i class="fa-solid fa-xmark"></i></span>
                    <div class="tit_form"><span>Ingresar video</span></div>
                        <form action="../../modelo/nuevos_videos.php" id="formulario" method="POST" onsubmit="return validarCampos()">
                            <div class = "cont_form_2">
                                <div class="cont_img">
                                    <div class="cont_form_img"><img src="..\..\img\ayuda1.jpeg" alt=""></div>
                                    <label class="letra_from">Titulo del Video :</label>
                                    <div class="contenedor_in">
                                        <i class="fa-brands fa-youtube"></i>
                                        <input type="text" id="titulo" name="titulo"  placeholder="Titulo*">
                                    </div>
                                </div>
                                <div class="cont_img">
                                    <div class="cont_form_img"><img src="..\..\img\ayuda2.png" alt=""></div>
                                    <label class="letra_from">Ingresar URL :</label>
                                    <div class="contenedor_in">
                                        <i class="fa-solid fa-link"></i>
                                        <input type="text" id="url" name="url" class="palabraInput" value="" placeholder="URL* ">
                                    </div>
                                </div>
                            </div>
                            <div class = "btn_form">
                                <button type="submit" class="btn_form_ingresar"  id="signUP" name="insertar" value="enviar" ><span class="sub_btn">Insertar</span></button>
                            </div>
                        </form>
                </div>    
            </div>
        </main>
    </div>


    <!--aqui esa el scripu que dara las funciones de los efectos-->
    <script src = "..\..\Js\funcion_menu.js"></script>
    <script src = "..\..\Js\popup.js"></script>
</body>
</html>