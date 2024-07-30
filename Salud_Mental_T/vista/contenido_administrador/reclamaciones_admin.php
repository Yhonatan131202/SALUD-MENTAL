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
    <title>Reclamaciones-CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="..\..\CSS\contenido_administrador\reclamaciones_admin.css">
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
                    <a href="videos_admin.php">
                    <i class="fa-brands fa-youtube"></i><span>Videos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
            <div class="sub_tit">
                <span>Reclamaciones Recibidas :</span>
            </div>


                <div class="page-content">
                    <div class="records table-responsive">
                        <div>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th><span class="las la-sort"></span> Nombre del Reclamante</th>
                                        <th><span class="las la-sort"></span> N° DNI</th>
                                        <th><span class="las la-sort"></span> N° Telefónico</th>
                                        <th><span class="las la-sort"></span> Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include "../../modelo/conexion.php";
                                        $conexion = conectar();
                                        $sql = "SELECT * FROM libro_reclamaciones ORDER BY id_reclamacion desc"; 
                                    ?>

                                    <?php $rta = mysqli_query($conexion, $sql);
                                    while ($filas = mysqli_fetch_array($rta)){ ?>
                                
                                    <tr>
                                        <td>
                                            <div class="client-info">
                                                <h4><?php echo $filas['nombre'] ?> <?php echo $filas['apellido_paterno'] ?> <?php echo $filas['apellido_materno'] ?></h4>
                                                <small><?php echo $filas['gmail'] ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $filas['numero_de_documento'] ?>
                                        </td>
                                        <td>
                                            <?php echo $filas['telefono'] ?>
                                        </td>
                                        <td>
                                            <div class="actions">

                                                <button type="button" class="abrir_reclamo"><i class="fa-solid fa-eye"></i></button>

                                                <form action="../../controlador/elimar/eliminar_reclamo.php" method="get">
                                                    <!-- Incluir el ID del video como un campo oculto -->

                                                    <input type="hidden" name="id_reclamacion" id="id_reclamacion" value="<?= $filas['id_reclamacion'] ?>">

                                                    <!-- Botón de envío del formulario con confirmación JavaScript -->
                                                    <button class = "elimar_fila" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar el Reclamo Registrado?');">
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


                <!---apartado para el popud que se muestra de cada uno de los reclamos que se iran registrando-->    
                <?php
                $rta = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_array($rta)) { ?>

                    <div class="popup_reclamo">
                        <div class="cont_popup_reclamo">
                            <span class = "cerrar_popup_reclamo"><i class="fa-solid fa-xmark"></i></span>
                            <span class="fecha_registro"><?php echo $filas['fecha_creacion'] ?></span>
                            <div class="p_reclamo">
                                <h2><?php echo $filas['nombre'] ?> <?php echo $filas['apellido_paterno'] ?> <?php echo $filas['apellido_materno'] ?></h2>
                                <h3>Datos Generales Del Reclamante: </h3>
                                <div class="des_reclamo">
                                    <div class="seguro_dni"><?php echo $filas['tipo_de_documento'] ?> : <?php echo $filas['numero_de_documento'] ?></div>
                                    <div class="seguro_dni">Tipo de Seguro : <?php echo $filas['tipo_de_seguro'] ?> </div>
                                </div>
                                <div class="des_reclamo">
                                    <span>Direccion del Asegurado : </span>
                                    <?php echo $filas['departamento'] ?> - <?php echo $filas['provincia'] ?> - <?php echo $filas['distrito'] ?> - <?php echo $filas['dirección'] ?>
                                </div>
                                <div class="des_reclamo">
                                    <div class="tef_gmail">N° Telefonico : <?php echo $filas['telefono'] ?></div>
                                    <div class="tef_gmail">Correo Electronico :<?php echo $filas['gmail'] ?></div>
                                </div>
                                <h3>Descripción del Usuario Afectado: </h3>
                                <div class="des_reclamo">
                                    <div class="causa_reclamo">
                                        <div class="descrip"> Causa del Reclamo</div>
                                        <div class="descrip_cont"><?php echo $filas['causa_de_reclamo'] ?></div>
                                    </div>
                                    <div class="causa_reclamo">
                                        <div class="descrip"> Descripción del reclamante</div>
                                        <div class="descrip_cont"><?php echo $filas['descripcion'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php 
                } 
                ?> 
        </main>
    </div>


    <!--aqui esa el scripu que dara las funciones de los efectos-->
    <script src = "..\..\Js\funcion_menu.js"></script>
    <script src = "..\..\Js\reclamaciones.js"></script>
</body>
</html>