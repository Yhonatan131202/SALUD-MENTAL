<?php
    session_start();
    //Verificamos si el usuario ha iniciado sesion
    if(!isset($_SESSION['usuario'])) {
        header("Location: ../vista/inicio_sesion.php");
        exit;
    }
    require_once "../../modelo/conexion.php";

    $conexion = conectar();
    $sql = "SELECT distrito FROM libro_reclamaciones GROUP BY distrito;";
    $distrito = mysqli_query($conexion, $sql);

    $sql2 = "SELECT tipo_de_seguro FROM libro_reclamaciones GROUP BY tipo_de_seguro;";
    $tipo_de_seguro = mysqli_query($conexion, $sql2);
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
                <div class="text-left">
                    <span>Reclamaciones Recibidas :</span>
                    <select style="font-size: 16px;" name="" id="tipeReport">
                        <option value="all">Todos</option>
                        <option value="date">Fechas</option>
                        <option value="distrito">Distritos</option>
                        <option value="secure">Tipo de seguro</option>
                    </select>
                    <div class="options">
                        <div id="date">
                            <div class="form-group">
                                <label for="">Fecha inicio</label>
                                <input id="dateIni" type="date">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha fin</label>
                                <input id="dateFin" type="date">
                            </div>
                        </div>
                        <div id="distrito">
                            <label for="">Seleccione un distrito</label>
                            <select name="" id="dist">
                                <?php while($filas = mysqli_fetch_array($distrito)){ ?>
                                <option><?= $filas['distrito'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id="secure">
                            <label for="">Tipo de seguro</label>
                            <select name="" id="sec">
                                <?php while($filas = mysqli_fetch_array($tipo_de_seguro)){ ?>
                                <option><?= $filas['tipo_de_seguro'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="btn-search">
                            <button id="buscar">Buscar</button>
                        </div>
                    </div>
                </div>
                <a id="download" class="btn-pdf" href="">
                    <i class="fa-solid fa-file-pdf"></i>
                     descargar
                </a>
            </div>
                <div class="page-content">
                    <div style="display:flex">
                        <div>
                            <h3>Grafico por distritos</h3>
                            <img id="graf" src="http://localhost/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/grafic/pastel.php" alt="">
                        </div>
                        <div>
                            <h3>Grafico por seguro</h3>
                            <img id="graf2" src="http://localhost/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/grafic/pastel2.php" alt="">
                        </div>
                    </div>
                    <div class="records table-responsive">
                        <div>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th><span class="las la-sort"></span> Nombre del Reclamante</th>
                                        <th><span class="las la-sort"></span> Fecha</th>
                                        <th><span class="las la-sort"></span> N° DNI</th>
                                        <th><span class="las la-sort"></span> N° Telefónico</th>
                                        <th><span class="las la-sort"></span> Distrito</th>
                                        <th><span class="las la-sort"></span> Tipo de seguro</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </main>
    </div>

    <!--aqui esa el scripu que dara las funciones de los efectos-->
    <script src = "..\..\Js\funcion_menu.js"></script>
    <script src = "..\..\Js\reclamacionesReport.js"></script>
</body>
</html>