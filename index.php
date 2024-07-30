<?php
require_once 'Salud_Mental_T/modelo/conexion.php';

$conexion = conectar();

$sqlDirector = "SELECT * FROM director_csmc ORDER BY id_director ASC";
$resultadoDirector = mysqli_query($conexion, $sqlDirector); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSMC-Tayacaja</title>
  <link rel="stylesheet" href="Salud_Mental_T\CSS\index.css">
  <link rel="shortcut icon" type="image/png" href="Salud_Mental_T\img\logo_saludmental-removebg-preview (2).png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<!--encabezado-->
<div class="encabezado">
      <div class="cont_encavezado">
        <div class="cont_img">
            <img src="Salud_Mental_T\img\logo_saludmental-removebg-preview (2).png" alt="">
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
<!--primero se realiza la parte superior que es la barra de navegacion superior-->
    <header id="miHeader">
        <div class="cont_menu">
            <div class="libro">
                <a href="Salud_Mental_T\vista\contenido_general\libro_de_reclamaciones.php">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Libro de Reclamaciones</span>
                </a>
            </div>
           
            <nav>
                <a href="#" class="menu"><span>Inicio</span></a>
                <a href="Salud_Mental_T\vista\contenido_general\nosotros_usuario.php" class="menu"><span>Nosotros</span></a>
                <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php" class="menu"><span>Servicios</span></a>
                <a href="Salud_Mental_T\vista\contenido_general\directorio_usuarios.php" class="menu"><span>Directorio</span> </a>
            </nav>

            <div class="acceso">
                <a href="Salud_Mental_T\vista\inicio_sesion.php">
                    <i class="fa-solid fa-fingerprint"></i>
                    <span>Acceso</span>
                </a>
            </div>
        </div>
    </header>

<!--en esta parte contendra el resto de la informacion-->
  <main>
<!--l parte de contendra el carrusel-->
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
<!--este apartado se realizo para para los servicios que ofrece la pagina-->    
    <div class="opcion_pagina">
      <div class="cont_opcion_pagina">
          <div class ="opcion_escogemos" id="abrir_flujograma">
            <i class="fa-solid fa-arrow-right"></i>
            <h3>¿Como Antenderse?</h3>
          </div>
          <a href="https://api.whatsapp.com/send?phone=975512553&text=Hola, deseo sacar una cita." class ="opcion_escogemos" target="_blank">
            <i class="fa-solid fa-phone"></i>
            <h3>Citas por Telefono</h3>
          </a>
          <a href="Salud_Mental_T\vista\contenido_general\libro_de_reclamaciones.php" class ="opcion_escogemos">
            <i class="fa-solid fa-book-journal-whills"></i>
            <h3>Libro De Reclamaciones</h3>
          </a>
          <a href="Salud_Mental_T\vista\contenido_general\directorio_usuarios.php" class ="opcion_escogemos">
            <i class="fa-solid fa-users-line"></i>
            <h3>Personal</h3>
          </a>
          <div id="abrir_enlaces" class ="opcion_escogemos">
            <i class="fa-solid fa-link"></i>
            <h3>Enlaces de Interes</h3>
          </div>
          <div id="abrir_horario" class ="opcion_escogemos">
            <i class="fa-solid fa-calendar-days"></i>
            <h3>Horario De Atenciones</h3>
          </div>
      </div>
    </div>
    <!--en esta parte se contendra los modals para el flujo grama, horario de atencion y los enlaces-->
    <div class="modal_flujograma">
      <div class="cont_modal_flujograma">
        <span class = "cerrar_modal_flujograma"><i class="fa-solid fa-xmark"></i></span>
        <h3>Flujo Grama de Proceso de Atención</h3>
        <img src="Salud_Mental_T\img\diagramas\flujo de atencion.png" >
      </div>
    </div>
    <div class="modal_enlaces">
      <div class="cont_modal_enlaces">
        <span class = "cerrar_modal_enlaces"><i class="fa-solid fa-xmark"></i></span>
        <div class="cont_enlaces">
          <a href="https://www.gob.pe/minsa/" target="_blank"><img src="Salud_Mental_T\img\logo_Minsa.png" ></a>
          <a href="https://www.gob.pe/sis" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\sis.png" alt=""></a>
          <a href="https://www.gob.pe/susalud" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\susalud.png" alt=""></a>
          <a href="https://hospitalpampas.gob.pe" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\logo_hospitalpampas.jpg" alt=""></a>
          <a href="https://www.munitayacaja.gob.pe" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\muni.jpg" alt=""></a>
          <a href="https://www.regionhuancavelica.gob.pe" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\hvca.png" alt=""></a>
          <a href="https://www.digemid.minsa.gob.pe/webDigemid/" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\sismed.jpg" alt=""></a>
          <a href="https://www.gob.pe/rdstayacaja" target="_blank"><img src="Salud_Mental_T\img\fotos_csmc\red_de_salud.png" alt=""></a>
        </div>
      </div>
    </div>
    <div class="modal_horario">
      <div class="cont_modal_horario">
        <span class = "cerrar_modal_horario"><i class="fa-solid fa-xmark"></i></span>
        <h3>Horario de atenciones</h3>
        <table>
          <thead>
            <tr>
              <th>Día</th>
              <th>Mañana</th>
              <th>Tarde</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lunes</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
            <tr>
              <td>Martes</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
            <tr>
              <td>Miércoles</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
            <tr>
              <td>Jueves</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
            <tr>
              <td>Viernes</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
            <tr>
              <td>Sábado</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
            <tr>
              <td>Domingo</td>
              <td>7:00 - 13:00</td>
              <td>13:00 - 19:00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
<!--esta parte contendra la reseña historica como la foto del diretor-->
  <div class="info">
    <div class="cont_info">
      <div class="cont_info_text">
          <h1>Centro de Salud Mental Comunitario - Tayacaja</h1>
          <p>
          El Centro de Salud Mental Comunitario se destaca como un establecimiento de categoría I-3 o I-4, 
          altamente especializado y adaptado a las necesidades particulares de la comunidad a la que sirve. Con un 
          equipo profesional integral, que incluye psiquiatras, este centro ofrece una amplia gama de servicios 
          especializados destinados a abordar las necesidades de diversas poblaciones, como niños/as, adolescentes y adultos mayores.  
          </p>
          <p>
          Entre los servicios ofrecidos, se destaca la atención especializada en el tratamiento de trastornos mentales 
          y problemas psicosociales. La atención ambulatoria se enfoca en proporcionar un cuidado personalizado y 
          efectivo a los usuarios que requieren apoyo en el manejo de sus condiciones mentales. El centro también se 
          especializa en el tratamiento de adicciones, reconociendo la importancia de abordar integralmente las 
          necesidades de aquellos que luchan contra este desafío.
          </p>
          <p>
          Ademas, el centro se involucra en la activación y fortalecimiento de la red social y comunitaria en su jurisdicción. 
          Reconoce la importancia de la participación activa de la comunidad en el bienestar mental, y trabaja para fomentar 
          la sensibilización, la educación y la participación ciudadana en torno a temas de salud mental.
          </p>
          <div class="btn_conoce"><a href="Salud_Mental_T\vista\contenido_general\nosotros_usuario.php">Conoce mas Sobre Nosotros</a></div>
      </div>
      <div class="cont_info_img">
        <div class="img-director">
          <span>DIRECTOR (A)</span>
          <?php while ($filaDirector = mysqli_fetch_array($resultadoDirector)) { ?>
            <img src="data:image/;base64,<?php echo base64_encode($filaDirector['foto']); ?>">
            <span><?php echo $filaDirector['nombre']; ?></span>
            <span>Tlf: <?php echo $filaDirector['telefono']; ?> </span>
          <?php }?>
        </div>  
      </div>
    </div>
  </div>
<!--en esta seccion se designara partados para la estadistica que tiene el CSMC tayacaja-->
  <div class="estadistica">
    <div class="tit_esta">
      <span>Estadística</span>
    </div>
    <div class="cont_esta">
      <div class="cont_estadis_descrip">
        <div class="contestades1">
            <div class="cont_img_icon">
              <img src="Salud_Mental_T\img\directorio.jpg" alt="">
              <i class="fa-solid fa-chart-pie"></i>
            </div>
            <h3>Análisis Estadístico</h3>
            <p>
            La Salud Mental en Huancavelica se ha visto menoscaba por la Violencia Política en nuestra comunidad, 
            dejando secuelas como ruptura y/o trastrocamiento de la vida de las personas, familias, grupos y pueblos, 
            ya que el nivel de afectación se dio en 432 comunidades, afectando un total de 148,287 personas durante las dos últimas décadas pasadas. <br>

            En el siguiente diagrama se sustenta la información sobre los trastornos y problemas en salud mental, priorizados según su prevalencia, 
            asumiendo que la etiología de los trastornos mentales es multifactorial, se ha puesto énfasis en los determinantes sociales, que consideramos 
            son importantes tanto para la expresión de los trastornos mentales propiamente dichos, como en la génesis de los problemas psicosociales identificados.
            </p>
        </div>
        <div class="contestades2">
            <span>Proporción porcentual de las morbilidades de salud mental en Centro de Salud Mental Comunitario de Tayacaja 2023.</span>
            <img src="Salud_Mental_T\img\diagramas\diag1.png" alt="">
        </div>
      </div>
    </div>
  </div>

<!--esta es la secciuon donde se contendra la informacion del los servicios que se ofrecen-->
    <div class="personal">
      <div class="sub_tit_personal">
          <span>Nuestros Servicios</span>
      </div>
      <div class="cont_personal">
          <div class = "servicos">
            <div class="servicios_cont">
                <img src="Salud_Mental_T\img\infancia.jpg" alt="">
                <h3 class = "text_personal">Servicios Preventivos y control de Problemas y Trastornos de la Infancia y Adolescencia</h3>
                <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php#servicios_CSMC1"><div class="leer_mas"><h3>Ver Servicios...</h3></div></a>
            </div>
            <div class="servicios_cont">
                <img src="Salud_Mental_T\img\infancia2.jpg" alt="">
                <h3 class = "text_personal">Servicios Preventivos y control de Problemas y Trastornos del Adulto y Adulto Mayor</h3>
                <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php#servicios_CSMC2"><div class="leer_mas"><h3>Ver Servicios...</h3></div></a>
            </div>
            <div class="servicios_cont">
                <img src="Salud_Mental_T\img\infancia3.jpg" alt="">
                <h3 class = "text_personal">Servicios Preventivos y control de Adicciones</h3>
                <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php#servicios_CSMC3"><div class="leer_mas"><h3>Ver Servicios...</h3></div></a>
            </div>
            <div class="servicios_cont">
                <img src="Salud_Mental_T\img\infancia4.jpg" alt="">
                <h3 class = "text_personal">Servicios De Participación Social y Comunitaria</h3>
                <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php#servicios_CSMC4"><div class="leer_mas"><h3>Ver Servicios...</h3></div></a>
            </div>
            <div class="servicios_cont">
                <img src="Salud_Mental_T\img\infancia5.jpg" alt="">
                <h3 class = "text_personal">Unidad De Farmacia</h3>
                <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php#servicios_CSMC5"><div class="leer_mas"><h3>Ver Servicios...</h3></div></a>
            </div>
          </div>  
      </div>      
    </div>
<!-- en estar seccion se contendra infromacion de los videos que proprocionaremos-->
    <div class = "seccion_videos">
      <div class="tit_videos">
        <span>Videos De Ayuda Al Paciente</span>
      </div>
      <div class="contvideos">
        <div class="contvideo">

          

          <?php
            foreach($conexion ->query("SELECT * from videos order by id_video desc") as $row ){ ?>
              <div class="video">
                <iframe  src="<?php echo $row["url"] ?>" frameborder="0" allowfullscreen></iframe>
                <div class = "tit_video"><?php echo $row["titulo"] ?></div>
                <div class="ver_video abrir_video" ><h3>Ver Video</h3></div>
              </div>
              <!--esta seccion es para ver el video en un popup-->
              <div class="modal">
                <div class="video_expandido">
                  <div class = "cerrar_video"><i class="fa-solid fa-xmark"></i></div>
                  <iframe src="<?php echo $row["url"] ?>" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <!--fin de popup-->
          <?php } ?>
        </div>
      </div>
    </div>
<!-- en estar seccion se contendra infromacion de la ubicacion del CSMC-->
    <div class="ubicacion" id="ubic">
      <div class="tit_ubicacion">
        <span>Ubicanos</span>
      </div>
      <div class="ubc_info">
        
        <div class="ubic">
          <span>Centro de Salud Comunitario - Tayacaja</span>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1230.415697348271!2d-74.87061502886586!3d-12.400384585462941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910dd34e03a9926d%3A0xdeec8bfd4fcab6cb!2sCentro%20de%20Salud%20Mental%20Comunitario!5e1!3m2!1ses-419!2spe!4v1707242034566!5m2!1ses-419!2spe" style="border:0;" ></iframe>
        </div>

        <div class="ubic2">
          <div class="ubic_cont">
            <i class="fa-solid fa-phone"></i>
            <span>central Telefonica : +51 975512553</span>
          </div>
          <div class="ubic_cont">
            <i class="fa-solid fa-envelope"></i>
            <span>Gmail : csmctayacaja@gmail.com</span>    
          </div>
          <div class="ubic_cont">
            <i class="fa-solid fa-location-dot"></i>
            <span>Cede Pricipal: Jr. La Mar Número 421</span>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--fin del contenido y comienza el piede de pagina-->
  <footer>
    <div class="fin_pag">
      <div class="cont_fin1">
        <div class="cont_fin_img">
          <img src="Salud_Mental_T\img\logo_saludmental-removebg-preview (2).png" alt="">
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
          <a href="Salud_Mental_T\vista\contenido_general\nosotros_usuario.php">Nosotros</a>
          <a href="Salud_Mental_T\vista\contenido_general\servicios_usuarios.php">Servicios</a>
          <a href="Salud_Mental_T\vista\contenido_general\directorio_usuarios.php">Directorio</a>
          <a href="Salud_Mental_T\vista\contenido_general\estadisticas_usuarios.php">Estadísticas</a>
        </div>
      </div>
      <div class="cont_fin4">
        <img src="Salud_Mental_T\img\logo_Minsa.png">
        <div class="cont_fin4_contactos">
          <h3>Contactenos en:</h3>
          <span><i class="fa-solid fa-phone-volume"></i> : +51 975512553</span>
          <span><i class="fa-solid fa-envelope"></i> : csmctayacaja@gmail.com</span>
        </div>
      </div>
    </div>
    <div class="fin_pag1">
      <span> Copyright @2024 | Designed by CSMC - TAYACAJA</span>
    </div>
  </footer>

  
  <script src="Salud_Mental_T\Js\slider.js"></script>
  <script src="Salud_Mental_T\Js\index.js"></script>
</body>
</html>