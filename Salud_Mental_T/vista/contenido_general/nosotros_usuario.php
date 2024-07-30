<?php  
require_once '../../modelo/conexion.php';

$conexion=conectar();

$sqlFiles = "SELECT * FROM documentos ORDER BY id_documento ASC";
$resultado = mysqli_query($conexion, $sqlFiles);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="..\..\CSS\contenido_general\nosotros_usuario.css">
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
    <!--se ralizara el la barra de menu o navegacion-->
    <header id="miHeader">
        <div class="cont_menu">
            <div class="libro">
                <a href="libro_de_reclamaciones.php">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Libro de Reclamaciones</span>
                </a>
            </div>
           
            <nav>
                <a href="../../../index.php" class="menu"><span>Inicio</span></a>
                <a href="#" class="menu"><span>Nosotros</span></a>
                <a href="servicios_usuarios.php" class="menu"><span>Servicios</span></a>
                <a href="directorio_usuarios.php" class="menu"><span>Directorio</span> </a>
            </nav>

            <div class="acceso">
                <a href="../inicio_sesion.php">
                    <i class="fa-solid fa-fingerprint"></i>
                    <span>Acceso</span>
                </a>
            </div>
        </div>
    </header>

    <main>
       <!--primera parte del contenido slider o carrusel-->
        
       <div class="slider-frame">
            <ul id="slider-ul">
                <div class="img" id="img1"></div>
                <div class="img" id="img2"></div>
                <div class="img" id="img3"></div>
                <div class="img" id="img4"></div>
            </ul>
            <div class="control-btn prev-btn" onclick="prevSlide()"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="control-btn next-btn" onclick="nextSlide()"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
        
        <!--segunda parte que contendra la historia-->
        <div class="historia" id="historia_CSMC">
            <div class="conthistoria">
                <div class="cont_his_img">
                    <img src="../../img/fotos_csmc/img1.jpg" alt="">
                </div>
                <div class="cont_his">
                    <h1>Conoce Nuestra Historia</h1>
                    <p>
                        En el corazón de la ciudad, emerge un refugio de esperanza y curación: el Centro de Salud Mental Serenidad. 
                        Un edificio acogedor rodeado de jardines tranquilos y colores serenos. Aquí, profesionales apasionados trabajan 
                        para iluminar las mentes oscuras con compasión y atención personalizada.

                        Los pasillos resonan con historias de resiliencia y renacimiento. Pacientes encuentran consuelo en terapias 
                        innovadoras y espacios diseñados para inspirar la calma. En la sala de arte, las emociones encuentran expresión 
                        vibrante, mientras que en las sesiones grupales, la solidaridad florece.

                        Cada día, la Serenidad se convierte en un faro de apoyo, desterrando el estigma asociado con la salud mental. 
                        Es un lugar donde las sonrisas reemplazan lágrimas, y la confianza se construye con cada pequeño paso hacia la 
                        recuperación. En el Centro de Salud Mental Serenidad, la luz siempre brilla, guiando a aquellos que buscan un 
                        camino hacia la paz mental y la renovación interna.
                    </p>
                </div>
            </div>
        </div>
        <!--tercera parte que contendra nuestra vision y mision-->
        <div class="mision_vision">
            <div class="cont_mision_vision">
                <div class="mision">
                    <h2>Misión</h2>
                    <p>
                    promover activamente la salud mental tanto a nivel individual como comunitario. A través del desarrollo y la implementación 
                    de un modelo de atención integral, el centro se dedica a proporcionar servicios innovadores y accesibles. Busca no solo 
                    abordar las necesidades inmediatas, sino también fomentar la resiliencia y el empoderamiento a largo plazo. Con un enfoque 
                    proactivo, la misión se centra en fortalecer las habilidades y recursos de las personas y comunidades para lograr un bienestar 
                    mental sostenible y duradero.
                    </p>
                </div>
                <div class="mi_img"><img src="../../img/CSMC.png" alt=""></div>
                <div class="mision">
                    <h2>Visión</h2>
                    <p>
                        El Centro de Salud Mental Comunitario en Tayacaja se erige como referente en gestión e innovación para la atención 
                        integral en salud mental. Su compromiso se refleja en prácticas vanguardistas, programas holísticos y terapias innovadoras. 
                        A través de la participación comunitaria, busca transformar positivamente la salud mental local con enfoques pioneros, 
                        promoviendo constantemente el bienestar de la comunidad.
                    </p>
                </div>
            </div>
        </div>
        <!--cuarta parte donde se almacenara los documentos de gestion del CSMC tayacja-->
        <div class="cont_docs">
            <div class="cont_docs2">
                <h1>Documentos de Gestión</h1>
               
            </div>
        </div>
        
        <div class="mostrar-doc">
            <div class="mostrar-docs2">
                <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                    <div class="documento_mostrados">
                        <a href="/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/<?php echo $fila['archivo']; ?>" target="_blank" >
                            <img class="img-pdf" src="../../img/icon_pdf.png" alt="">
                        </a>
                        <h2><?php echo $fila['titulo']; ?></h2>
                    </div>
                <?php } ?> 
            </div>
        </div>

    </main>
    
    <!--se inserta el pie de pagina-->
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
          <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php">Servicios</a>
          <a href="Salud_Mental_T\vista\contenido_general\directorio_usuarios.php">Directorio</a>
          <a href="Salud_Mental_T\vista\contenido_general\estadisticas_usuarios.php">Estadísticas</a>
        </div>
      </div>
      <div class="cont_fin4">
        <img src="..\..\img\logo_Minsa.png">
        <div class="cont_fin4_contactos">
          <h3>Contactenos en:</h3>
          <span><i class="fa-solid fa-phone-volume"></i> : +51 975512553</span>
          <span><i class="fa-solid fa-envelope"></i> : csmctayacaja@gmail.com</span>
        </div>
      </div>
    </div>
    <div class="fin_pag1"><span> Copyright @2024 | Designed by CSMC - TAYACAJA</span></div>
  </footer>

    <script src = "..\..\Js\slider.js"></script>
</body>
</html>