<?php

require_once '../../modelo/conexion.php'; 

$conexion = conectar();

$sqlDirector = "SELECT * FROM director_csmc ORDER BY id_director ASC";
$resultadoDirector = mysqli_query($conexion, $sqlDirector);

$sqlPsicologos = "SELECT * FROM psicologos_csmc ORDER BY id_psicologo ASC";
$resultadoPsicologos = mysqli_query($conexion, $sqlPsicologos);

$sqlSociales = "SELECT * FROM ft_social_csmc ORDER BY id_ft_Social ASC";
$resultadoSociales = mysqli_query($conexion, $sqlSociales); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="..\..\CSS\contenido_general\directorio_usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="encabezado">
      <div class="cont_encavezado">
        <div class="cont_img">
            <img src="..\..\img\logo_saludmental-removebg-preview (2).png" alt="">
        </div>
        <div class="cont_nom">
            <h3>Centro de Salud Mental Comunitario</h3>
            <span>Pampas - Tayacaja</span>
        </div>

        <div class="cont_en">
            <a href="#ubic" title="Conoce donde nos Encontramos">
                <i class="fa-solid fa-location-dot"></i>
            </a>
            <div class="cont_encabe">
                <span>Ubicanos :</span>
                <span>Jr. La Mar Número 421</span>
            </div>
        </div>
        <div class="cont_en">
            <a href="mailto:csmctayacaja@gmail.com" target="_blank" title="Envianos un correo!!!">
                <i class="fa-solid fa-envelope"></i>
            </a>
            <div class="cont_encabe">
                <span>@Gmail : </span>
                <span>csmctayacaja@gmail.com</span>
            </div>
        </div>
        <div class="cont_en">
            <a href="https://web.facebook.com/p/Centro-de-Salud-Mental-Comunitario-Tayacaja-100049269259790/?_rdc=1&_rdr" target="_blank" title="Visistanos al Faceboock">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <div class="cont_encabe">
                <span>Facebook :</span> <br>
                <span>CSMC-Tayacaja</span>
            </div>
        </div>
        <div class="cont_en">
            <a href="https://api.whatsapp.com/send?phone=975512553&text=Hola, deseo sacar una cita." target="_blank" title="Comunicate con la Tecnica en Farmacia del CSMC - tayacaja">
                <i class="fa-solid fa-phone-volume"></i>
            </a>
            <div class="cont_encabe">
                <span>Llamanos : </span> <br>
                <span>+51 975512553</span>
            </div>
        </div>
      </div>
        <div class="sub_menu">
          <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <!--menu header-->
    <header>
        <div class="cont_menu">
            <div class="libro">
                <a href="libro_de_reclamaciones.php">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Libro de Reclamaciones</span>
                </a>
            </div>
           
            <nav>
                <a href="../../../index.php" class="menu"><span>Inicio</span></a>
                <a href="nosotros_usuario.php" class="menu"><span>Nosotros</span></a>
                <a href="servicios_usuarios.php" class="menu"><span>Servicios</span></a>
                <a href="#" class="menu"><span>Directorio</span> </a>
            </nav>

            <div class="acceso">
                <a href="../inicio_sesion.php">
                    <i class="fa-solid fa-fingerprint"></i>
                    <span>Acceso</span>
                </a>
            </div>
        </div>
    </header>
    <!--parte donde se mostrara todo el contenido-->
    
    <main>
    <div class="cont_directorio">
        <h3>DIRECTOR DEL CSMC - TAYACAJA</h3>
        <div class="info_directorio_director">
            <?php while ($filaDirector = mysqli_fetch_array($resultadoDirector)) { ?>
                <div class="perfil perfil_director">

                    <div class="perfil_img">
                        <img src="data:image/;base64,<?php echo base64_encode($filaDirector['foto']); ?>">
                        <div style="height: 155px;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-1.41,78.47 C152.64,184.05 375.00,33.06 500.84,96.22 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
                    </div>
                    <div class="perfil_info">
                        <h4><?php echo $filaDirector['nombre']; ?></h4>
                        <h4><?php echo $filaDirector['profesion']; ?></h4>
                        <span>Tlf : <?php echo $filaDirector['telefono']; ?></span>
                        <span><?php echo $filaDirector['Gmail']; ?></span>
                        <p class="descripcion"><?php echo $filaDirector['descripcion']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="cont_directorio">
        <h3>PSICÓLOGOS Y MÉDICOS  DEL CSMC - TAYACAJA</h3>
        <div class="info_directorio">
            <?php while ($filaPsicologos = mysqli_fetch_array($resultadoPsicologos)) { ?>
                <div class="perfil">

                    <div class="perfil_img">
                        <img src="data:image/;base64,<?php echo base64_encode($filaPsicologos['foto']); ?>">
                        <div style="height: 155px;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-1.41,78.47 C152.64,184.05 375.00,33.06 500.84,96.22 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
                    </div>
                    <div class="perfil_info">
                        <h4><?php echo $filaPsicologos['nombre']; ?></h4>
                        <h4><?php echo $filaPsicologos['profesion']; ?></h4>
                        <span>Tlf : <?php echo $filaPsicologos['telefono']; ?></span>
                        <span><?php echo $filaPsicologos['Gmail']; ?></span>
                        <p class="descripcion"><?php echo $filaPsicologos['descripcion']; ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <div class="cont_directorio">
        <h3>PERSONAL ASISTENCIAL Y ADMINISTRATIVOS DEL CSMC - TAYACAJA</h3>
        <!--tabla del personal asistencial-->
        <div class="page-content">
            <div class="records table-responsive">
                <div>
                    <table width="100%">
                        <thead>
                            <tr>
                                <th><span class="las la-sort"></span> Personal Asistencial y Administrativo</th>
                                <th><span class="las la-sort"></span> Especialización</th>
                                <th><span class="las la-sort"></span> N° Telefónico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($filaSociales = mysqli_fetch_array($resultadoSociales)){ 
                            ?>
                            <tr>
                                <td>
                                    <div class="client">
                                        <div class="client-img bg-img"><img src="data:image/;base64,<?php echo base64_encode($filaSociales['foto']); ?>"></div>
                                        <div class="client-info">
                                            <h4><?php echo $filaSociales['nombre']; ?></h4>
                                            <small><?php echo $filaSociales['Gmail']; ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $filaSociales['profesion']; ?>
                                </td>
                                <td>
                                    <?php echo $filaSociales['telefono']; ?>
                                </td>
                            </tr>
                            <?php } ?>                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </main>

    <!--insertando el pie de pagina-->
    <footer>
    <div class="fin_pag">
      <div class="cont_fin1">
        <div class="cont_fin_img">
          <img src="..\..\img\logo_saludmental-removebg-preview (2).png" alt="">
          <div class="cont_fin_img1">
            <h3>Centro de Salud Mental Comunitario</h3>
            <span>Pampas - Tayacaja</span>
          </div>
        </div>
        <p>
        El Centro de Salud Mental Comunitario de Tayacaja proporciona servicios integrales, 
        terapias y recursos para promover la salud mental, fortaleciendo el bienestar emocional en la comunidad.
        </p>
        <div class="fin_links">
          <a href="https://web.facebook.com/p/Centro-de-Salud-Mental-Comunitario-Tayacaja-100049269259790/?_rdc=1&_rdr" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="" target="_blank"><i class="fa-brands fa-twitter"></i></a>
          <a href="" target="_blank"><i class="fa-brands fa-instagram"></i></a>
          <a href="" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>
      <div class="cont_fin2">
        <h2>Enlaces</h2>
        <div class="fin_enclaces">
            <a href="../../../index.php">Inicio</a>
            <a href="Salud_Mental_T\vista\contenido_general\nosotros_usuario.php">Nosotros</a>
            <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php">Servicios</a>
            <a href="Salud_Mental_T\vista\contenido_general\estadisticas_usuarios.php">Estadísticas</a>
        </div>
      </div>
      <div class="cont_fin4">
        <img src="../../img/logo_Minsa.png">
        <div class="cont_fin4_contactos">
          <h3>Contactenos en:</h3>
          <span><i class="fa-solid fa-phone-volume"></i> : +51 975512553</span>
          <span><i class="fa-solid fa-envelope"></i> : csmctayacaja@gmail.com</span>
        </div>
      </div>
    </div>
    <div class="fin_pag1"><span> Copyright @2024 | Designed by CSMC - TAYACAJA</span></div>
  </footer>
</body>
</html>