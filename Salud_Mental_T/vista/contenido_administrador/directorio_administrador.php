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
    <title>Directorio-CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="..\..\CSS\contenido_administrador\directorio_administrador.css">
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
                    <a href="#">
                    <i class="fa-solid fa-address-book"></i><span>Directorio</span>
                    </a>
                </li>
                <li>
                    <a href="documentos_admin.php">
                    <i class="fa-solid fa-file-pdf"></i><span>Documentos</span>
                    </a>
                </li>
                <li>
                    <a href="videos_admin.php">
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
            <div class="sub_tit1">
                <span>Bienvenido a Nuestro Directorio : <?php echo $_SESSION['usuario'];?></span> 
            </div>
            <!--apartado para buscar en el lista del directorio-->
            <div class="buscar">
                <form class="from_buscar" action="" method="post">
                    <div class="cont_buscar">
                        <input type="text" placeholder="Buscar..." name="buscar">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i>Buscar</button>
                    </div>
                </form>
            </div>

            <!--primer apartado del director-->
            <div class="personal">
                <h2>DIRECTOR</h2>
                <div class="btn_direc"> <button id="abrir_direc">Añadir Director</button> </div>
                <!--apartado para mostrar al director de la base de datos-->
                <div class="direct_info">
                    <?php include "../../modelo/conexion.php";
                    $conexion = conectar(); ?>
                    <?php
                        $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : '';
                        // Utilizar la conexión obtenida anteriormente
                        $sql = "SELECT * FROM director_csmc WHERE id_director LIKE '%$buscar%' OR foto LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR profesion LIKE '%$buscar%' OR Gmail LIKE '%$buscar%' OR telefono LIKE '%$buscar%' OR descripcion LIKE '%$buscar%' ORDER BY id_director ASC";
                        $rta = mysqli_query($conexion, $sql);
                        while ($filas = mysqli_fetch_array($rta)) { 
                    ?>

                    <div class="cont_info_direct">
                        <div class="cont_img_direc">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($filas['2']); ?>" alt="">
                        </div>
                        <div class="cont_datos_direc">
                            <h3><?php echo $filas['3'] ?></h3>
                            <div class="telefono_especializacion">
                                <div class="telf">Especialización : <?php echo $filas['4'] ?> </div>
                                <div class="telf">N° Telefónico : <?php echo $filas['6'] ?> </div>
                            </div>
                            <div class="gmail_direc"> Correo Electrónico : <?php echo $filas['5'] ?></div>
                            <div class="descripcion_director"><h4>Descripción : </h4><?php echo $filas['7'] ?></div>
                        </div>
                        <div class="opc_direc">
                            <button type="button" class="abrir_edic"><span>Editar</span><i class="fa-solid fa-pen-to-square"></i></button>

                            <form action="../../controlador/elimar/eliminar_direc.php" method="get">
                                <!-- Incluir el ID del video como un campo oculto -->
                                <input type="hidden" name="id_director" value="<?= $filas['id_director'] ?>">

                                <!-- Botón de envío del formulario con confirmación JavaScript -->
                                <button class = "elimar_fila" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar al Director?');">
                                    <span>Eliminar</span>
                                    <i class="fa-solid fa-trash"></i>  
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                <!--formulario para ingresar al director encargado-->
                
                <div class="popup1">
                    <div class="popup_cont">
                        <span class = "cerrar_popup1"><i class="fa-solid fa-xmark"></i></span>
                        <h2>Agregar Nuevo Director</h2>
                        <form enctype="multipart/form-data" action="../../modelo/nuevo_director.php" method="post" onsubmit="return validarCampos()">
                            <div class="cont_form">
                                <div class="formulario">
                                    <h4>Ingresar una Foto:</h4>
                                    <input type="file" class="subir" id="foto" name="foto" accept="image/*">
                                    <label for="foto">
                                        <span class="imagen_name"><span class="subir_nombre">Ningún Archivo Seleccionado</span></span>
                                        <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Subir Archivo</span>
                                    </label>
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Nombre Completo:</h4>
                                    <input class="input2" type="text" placeholder="Nombre y Apellido*" id="nombre" name="nombre">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Tipo de Especialización:</h4>
                                    <input class="input2" type="text" placeholder="Profesión*" id="profesion" name="profesion">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Gmail:</h4>
                                    <input class="input2" type="text" placeholder="Gmail@*" id="Gmail" name="Gmail">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Telefono:</h4>
                                    <input class="input2" type="text" placeholder="N° Telefonico*" id="telefono" name="telefono">
                                </div>
                                <div class="formulario">
                                    <h4>Ingrese una Pequeña Descripción:</h4>
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="btn_submit">
                                <button type="submit" id="signUP" name="insertar" value="enviar">Registar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--popud para editar los datos del director--->
                <?php
                $rta = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_array($rta)) { 
                ?>
                    <div class="popup_edicion">
                        <div class="popup_edicion_cont">
                            <span class = "cerrar_popup_edicion"><i class="fa-solid fa-xmark"></i></span>
                            <h2>Editar Datos Del Director</h2>
                            <form action="../../controlador/editar/editar_director.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_director" value="<?= $filas['id_director'] ?>">
                                <div class="cont_form">
                                    <div class="formulario">
                                        <h4>Ingresar Nueva Foto:</h4>
                                        <label class="subir_label">
                                            <span class="imagen_name"><span class="subir_nombre" >Ningún Archivo Seleccionado</span></span>
                                            <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Subir Archivo</span>
                                            <input type="file" class="subir" name="Nueva_Foto" accept="image/*">
                                        </label>
                                    </div>
                                    <!-- Campos de edición -->
                                    <div class="formulario">
                                        <h4>Ingresar Nombre Completo:</h4>
                                        <input class="input2" type="text" id="nombre_edit" name="nombre" value="<?= $filas['nombre'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Tipo de Especialización:</h4>
                                        <input class="input2" type="text" id="profesion_edit" name="profesion" value="<?= $filas['profesion'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Gmail:</h4>
                                        <input class="input2" type="text" id="Gmail_edit" name="Gmail" value="<?= $filas['Gmail'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Telefono:</h4>
                                        <input class="input2" type="text" id="telefono" name="telefono" value="<?= $filas['telefono'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Cambiar una Pequeña Descripción:</h4>
                                        <textarea name="descripcion" id="descripcion_edit" cols="30" rows="10"><?= $filas['descripcion'] ?></textarea>
                                    </div>
                                </div>
                                <div class="btn_submit">
                                    <button type="submit" id="signUP" name="guardar" value="guardar">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php 
                } 
                ?> 
            </div>


            <!--segundo apartado de los Psicologos-->
            <div class="personal">
                <h2>PSICÓLOGOS Y MEDICOS</h2>
                <div class="btn_direc"> <button id="abrir_Ps">Añadir Psicólogo o Medico</button> </div>
                <!--apartado para mostrar a los Psicólogo o Medico de la base de datos-->
                <div class="direct_info">
                    <?php
                        $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : '';
                        // Utilizar la conexión obtenida anteriormente
                        $sql = "SELECT * FROM psicologos_csmc WHERE id_psicologo LIKE '%$buscar%' OR foto LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR profesion LIKE '%$buscar%' OR Gmail LIKE '%$buscar%' OR telefono LIKE '%$buscar%' OR descripcion LIKE '%$buscar%' ORDER BY id_psicologo ASC";
                        $rta = mysqli_query($conexion, $sql);
                        while ($filas = mysqli_fetch_array($rta)) { 
                    ?>

                    <div class="cont_info_direct">
                        <div class="cont_img_direc">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($filas['2']); ?>" alt="">
                        </div>
                        <div class="cont_datos_direc">
                            <h3><?php echo $filas['3'] ?></h3>
                            <div class="telefono_especializacion">
                                <div class="telf">Especialización : <?php echo $filas['4'] ?> </div>
                                <div class="telf">N° Telefónico : <?php echo $filas['6'] ?> </div>
                            </div>
                            <div class="gmail_direc"> Correo Electrónico : <?php echo $filas['5'] ?></div>
                            <div class="descripcion_director"><h4>Descripción : </h4><?php echo $filas['7'] ?></div>
                        </div>
                        <div class="opc_direc">
                            <button type="button" class="abrir_edic_psicologo"><span>Editar</span> <i class="fa-solid fa-pen-to-square"></i></button>

                            <form action="../../controlador/elimar/eliminar_psicologo.php" method="get">
                                <!-- Incluir el ID del video como un campo oculto -->
                                <input type="hidden" name="id_psicologo" value="<?= $filas['id_psicologo'] ?>">

                                <!-- Botón de envío del formulario con confirmación JavaScript -->
                                <button class = "elimar_fila" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar al Psicólogo?');">
                                    <span>Eliminar</span>
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                <!--formulario para ingresar a nuevos psicologos-->
                <div class="popup2">
                    <div class="popup_cont2">
                        <span class = "cerrar_popup2"><i class="fa-solid fa-xmark"></i></span>
                        <h2>Agregar Nuevo Psicólogo o Medico</h2>
                        <form enctype="multipart/form-data" action="../../modelo/nuevo_psicologo.php" method="post" onsubmit="return validarCamposMedicos()">
                            <div class="cont_form">
                                <div class="formulario">
                                    <h4>Ingresar una Foto:</h4>
                                    <input type="file" class="subir" id="foto2" name="foto2" accept="image/*">
                                    <label for="foto2">
                                        <span class="imagen_name"><span class="subir_nombre">Ningún Archivo Seleccionado</span></span>
                                        <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Buscar Archivo</span>
                                    </label>
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Nombre Completo:</h4>
                                    <input class="input2" type="text" placeholder="Nombre y Apellido*" id="nombre2" name="nombre">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Tipo de Especialización:</h4>
                                    <input class="input2" type="text" placeholder="Profesión*" id="profesion2" name="profesion">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Gmail:</h4>
                                    <input class="input2" type="text" placeholder="Gmail@*" id="Gmail2" name="Gmail">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Telefono:</h4>
                                    <input class="input2" type="text" placeholder="N° Telefonico*" id="telefono2" name="telefono">
                                </div>
                                <div class="formulario">
                                    <h4>Ingrese una Pequeña Descripción:</h4>
                                    <textarea name="descripcion" id="descripcion2" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="btn_submit">
                                <button type="submit" id="signUP" name="insertar" value="enviar">Registar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--popup para editar los datos del psicologo-->
                <?php
                $rta = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_array($rta)) { 
                ?>
                    <div class="popup_edicion_psicologo">
                        <div class="popup_edicion_cont_psicologo">
                            <span class = "cerrar_popup_edicion_psicologo"><i class="fa-solid fa-xmark"></i></span>
                            <h2>Editar Datos Del Psicólogo</h2>
                            <form action="../../controlador/editar/editar_psicologo.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_psicologo" value="<?= $filas['id_psicologo'] ?>">
                                <div class="cont_form">
                                    <div class="formulario">
                                        <h4>Ingresar Nueva Foto:</h4>
                                        <label class="subir_label">
                                            <span class="imagen_name"><span class="subir_nombre" >Ningún Archivo Seleccionado</span></span>
                                            <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Subir Archivo</span>
                                            <input type="file" class="subir" name="Nueva_Foto" accept="image/*">
                                        </label>
                                    </div>
                                    <!-- Campos de edición -->
                                    <div class="formulario">
                                        <h4>Ingresar Nombre Completo:</h4>
                                        <input class="input2" type="text" id="nombre_edit" name="nombre" value="<?= $filas['nombre'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Tipo de Especialización:</h4>
                                        <input class="input2" type="text" id="profesion_edit" name="profesion" value="<?= $filas['profesion'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Gmail:</h4>
                                        <input class="input2" type="text" id="Gmail_edit" name="Gmail" value="<?= $filas['Gmail'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Telefono:</h4>
                                        <input class="input2" type="text" id="telefono" name="telefono" value="<?= $filas['telefono'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Cambiar la Descripción:</h4>
                                        <textarea name="descripcion" id="descripcion_edit" cols="30" rows="10"><?= $filas['descripcion'] ?></textarea>
                                    </div>
                                </div>
                                <div class="btn_submit">
                                    <button type="submit" id="signUP" name="guardar" value="guardar">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php 
                } 
                ?> 

            </div>
            

            
            <!--tercer apartado de los tabajadores sociales-->
            <div class="personal">
                <h2>PERSONAL ASISTENCIAL Y ADMINISTRATIVOS</h2>
                <div class="btn_direc"> <button id="abrir_social">Añadir Personal</button> </div>
                <!--apartado para mostrar al personal asistencial de la base de datos-->
                <div class="page-content">
                    <div class="records table-responsive">
                        <div>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th><span class="las la-sort"></span> Personal Asistencial y Administrativo</th>
                                        <th><span class="las la-sort"></span> Especialización</th>
                                        <th><span class="las la-sort"></span> N° Telefónico</th>
                                        <th><span class="las la-sort"></span> Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : '';
                                        // Utilizar la conexión obtenida anteriormente
                                        $sql = "SELECT * FROM ft_social_csmc WHERE id_ft_social LIKE '%$buscar%' OR foto LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR profesion LIKE '%$buscar%' OR Gmail LIKE '%$buscar%' OR telefono LIKE '%$buscar%' OR descripcion LIKE '%$buscar%' ORDER BY id_ft_social ASC";
                                        $rta = mysqli_query($conexion, $sql);
                                        while ($filas = mysqli_fetch_array($rta)) { 
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="client">
                                                <div class="client-img bg-img"><img src="data:image/jpg;base64,<?php echo base64_encode($filas['2']); ?>" alt=""></div>
                                                <div class="client-info">
                                                    <h4><?php echo $filas['3'] ?></h4>
                                                    <small><?php echo $filas['5'] ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $filas['4'] ?>
                                        </td>
                                        <td>
                                            <?php echo $filas['6'] ?>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <button type="button" class="abrir_edic_social"><i class="fa-solid fa-pen-to-square"></i></button>
                                                <form action="../../controlador/elimar/eliminar_ft_social.php" method="get">
                                                    <!-- Incluir el ID del video como un campo oculto -->
                                                    <input type="hidden" name="id_ft_social" value="<?= $filas['id_ft_social'] ?>">

                                                    <!-- Botón de envío del formulario con confirmación JavaScript -->
                                                    <button class = "elimar_fila" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar al Trabajador Social?');">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--formulario para ingresar al director encargado-->
                <div class="popup3">
                    <div class="popup_cont3">
                        <span class = "cerrar_popup3"><i class="fa-solid fa-xmark"></i></span>
                        <h2>Agregar Nuevo Trabajador Social</h2>
                        <form enctype="multipart/form-data" action="../../modelo/nuevo_ft_social.php" method="post" onsubmit="return validarCamposSocial()">
                            <div class="cont_form">
                                <div class="formulario">
                                    <h4>Ingresar una Foto:</h4>
                                    <input type="file" class="subir" id="foto3" name="foto3" accept="image/*">
                                    <label for="foto3">
                                        <span class="imagen_name"><span class="subir_nombre">Ningún Archivo Seleccionado</span></span>
                                        <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Buscar Archivo</span>
                                    </label>
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Nombre Completo:</h4>
                                    <input class="input2" type="text" placeholder="Nombre y Apellido*" id="nombre1" name="nombre">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Tipo de Especialización:</h4>
                                    <input class="input2" type="text" placeholder="Profesión*" id="profesion1" name="profesion">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Gmail:</h4>
                                    <input class="input2" type="text" placeholder="Gmail@*" id="Gmail1" name="Gmail">
                                </div>
                                <div class="formulario">
                                    <h4>Ingresar Telefono:</h4>
                                    <input class="input2" type="text" placeholder="N° Telefonico*" id="telefono1" name="telefono">
                                </div>
                                <!--
                                <div class="formulario">
                                    <h4>Ingrese una Pequeña Descripción:</h4>
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                                </div>-->
                            </div>
                            <div class="btn_submit">
                                <button type="submit" id="signUP" name="insertar" value="enviar">Registar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--popup para editar los datos del trabajador social-->
                <?php
                $rta = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_array($rta)) { 
                ?>
                    <div class="popup_edicion_social">
                        <div class="popup_edicion_cont_social">
                            <span class = "cerrar_popup_edicion_social"><i class="fa-solid fa-xmark"></i></span>
                            <h2>Editar Datos Del Trabajador Social</h2>
                            <form action="../../controlador/editar/editar_ft_social.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_ft_social" value="<?= $filas['id_ft_social'] ?>">
                                <div class="cont_form">
                                    <div class="formulario">
                                        <h4>Ingresar Nueva Foto:</h4>
                                        <label class="subir_label">
                                            <span class="imagen_name"><span class="subir_nombre" >Ningún Archivo Seleccionado</span></span>
                                            <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Subir Archivo</span>
                                            <input type="file" class="subir" name="Nueva_Foto" accept="image/*">
                                        </label>
                                    </div>
                                    <!-- Campos de edición -->
                                    <div class="formulario">
                                        <h4>Ingresar Nombre Completo:</h4>
                                        <input class="input2" type="text" id="nombre_edit" name="nombre" value="<?= $filas['nombre'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Tipo de Especialización:</h4>
                                        <input class="input2" type="text" id="profesion_edit" name="profesion" value="<?= $filas['profesion'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Gmail:</h4>
                                        <input class="input2" type="text" id="Gmail_edit" name="Gmail" value="<?= $filas['Gmail'] ?>">
                                    </div>
                                    <div class="formulario">
                                        <h4>Ingresar Telefono:</h4>
                                        <input class="input2" type="text" id="telefono" name="telefono" value="<?= $filas['telefono'] ?>">
                                    </div>
                                    <!--
                                    <div class="formulario">
                                        <h4>Ingrese una Pequeña Descripción:</h4>
                                        <textarea name="descripcion" id="descripcion_edit" cols="30" rows="10"><?//= $filas['descripcion'] ?></textarea>
                                    </div>
                                    -->
                                </div>
                                <div class="btn_submit">
                                    <button type="submit" id="signUP" name="guardar" value="guardar">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php 
                } 
                ?> 
            </div>
        </main>
    </div>


    <!--aqui esa el scripu que dara las funciones de los efectos-->
    <script src = "..\..\Js\funcion_menu.js"></script>
    <script src = "..\..\Js\directorio.js"></script>
</body>
</html>