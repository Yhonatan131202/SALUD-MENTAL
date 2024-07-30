<?php
    session_start();
    //Verificamos si el usuario ha iniciado sesion
    if(!isset($_SESSION['usuario'])) {
        header("Location: ../vista/inicio_sesion.php");
        exit;
    }
    // Incluir archivo de conexión
    require_once '../../modelo/conexion.php';

    // Utilizar la función conectar() para obtener la conexión
    $conexion = conectar();

    // Verificar si la conexión se estableció correctamente
    if ($conexion) {
        $tmp = array();
        $res = array();

        $sel = $conexion->query("SELECT * FROM documentos ORDER BY id_documento desc");
        while ($row = $sel->fetch_assoc()) {
            $tmp = $row;
            array_push($res, $tmp);
        }
    } else {
        // Manejo de error si la conexión no se establece
        echo "Error al conectar a la base de datos";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos-CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="..\..\CSS\contenido_administrador\documentos_admin.css">
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
                    <a href="#">
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
                <span>Bienvenido a Nuestros Documentos : <?php echo $_SESSION['usuario'];?></span>
            </div>

            <div class="documentos">
                <div class="tit_docs">
                    <h2>Documentos Registrados</h2>
                    <div class="btn_docs"><button id="abrir_modal" >Nuevo Documento</button></div>
                </div>
                <div class="cont_doc">
                    <div class="doc_tabla"><span>Nombre de Documentos</span></div>
                    <div class="doc_tabla"><span>Opciones</span></div>
                </div>
                <?php foreach ($res as $val) { ?>

                <div class="cont_doc">
                    <div class="doc_tabla_mostrar"><span><?php echo $val['titulo'] ?></span></div>
                    <div class="doc_tabla_mostrar">
                        
                        <a href="../../modelo/<?php echo($val['archivo']); ?>" target="_blank">Ver Documento</a>
                        
                        <form action="../../modelo/eliminar_documentos.php" method="get">
                                <!-- Incluir el ID del video como un campo oculto -->
                                <input type="hidden" name="id_documento" value="<?= $val['id_documento'] ?>">

                                <!-- Botón de envío del formulario con confirmación JavaScript -->
                                <button class = "elimar_fila" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar el Documento?');">
                                    Eliminar
                                </button>
                        </form>
                    </div>
                </div>

                <?php } ?>
            </div>

            <!--modal para subir los documentos-->
            <div class="modal_docs">
                <div class="cont_modal_docs">
                    <span class = "cerrar_modal_docs"><i class="fa-solid fa-xmark"></i></span>
                    <h2>Subir Nuevo Documento</h2>
                    <form action="../../modelo/nuevo_documento.php" method="post" enctype="multipart/form-data">
                        <h4>Seleccioanr archivo pdf : </h4>

                        <input type="file" id="pdf" name="pdf" accept=".pdf" class="subir" require>

                        <label for="pdf">
                                <span class="imagen_name"><span class="subir_nombre">Ningún Archivo Seleccionado</span></span>
                                <span class="imagen_boton"><i class="fa-solid fa-upload"></i>Subir Archivo</span>
                        </label>
                        <div class="button1">
                            <button type="submit">Cargar PDF</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>

    </div>

    <!--aqui esa el scripu que dara las funciones de los efectos-->
    <script src = "..\..\Js\funcion_menu.js"></script>
    <script src = "..\..\Js\documentos.js"></script>
</body>
</html>