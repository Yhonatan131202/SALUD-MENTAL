<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSMC-Tayacaja</title>
    <link rel="shortcut icon" type="image/png" href="..\..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="..\..\CSS\contenido_general\libro_de_reclamaciones.css">
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
    <!--menu de header-->
    <header>
        <div class="cont_menu">
            <div class="libro">
                <a href="#">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Libro de Reclamaciones</span>
                </a>
            </div>
           
            <nav>
                <a href="../../../index.php" class="menu"><span>Inicio</span></a>
                <a href="nosotros_usuario.php" class="menu"><span>Nosotros</span></a>
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
    <!--contenido que se mostrata en la pagina-->
    <main>
       <div class="cont"><h1>Libro de Reclamaciones</h1></div>
       <div class="cont">
            <div class="cont_logo"><img src="../../img/logo_saludmental-removebg-preview (2).png" alt=""></div>
            <div class="cont_form">

            <script>
                function validarFormulario() {
                    var emailInput = document.getElementById("gmail");
                    var email = emailInput.value;
                    if (!/^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/.test(email)) {
                         alert("Por favor, ingrese una dirección de correo electrónico válida de Gmail o Hotmail.");
                        return false; // Evita que el formulario se envíe
                    }
                    return true; // Permite que el formulario se envíe si el correo electrónico es válido
                }
 
            </script>


                <form action="../../modelo/nuevo_reclamo.php" method="post" onsubmit="return validarFormulario()">
                    <h1>RECLAMOS</h1>
                    <div class="contform">
                        <h3>1. IDENTIFICACIÓN DEL USUARIO O TERCERO LEGITIMADO (RECLAMANTE)</h3>
                        <div class="identificacion">
                            <div class="sub_tit">Paciente(Afectado):</div>
                            <div class="cont_input cont_input1">
                                <input type="text" placeholder="Nombre*" id="nombre" name="nombre" required >
                                <input type="text" placeholder="Apellido Paterno*" id="apellido_paterno" name="apellido_paterno" required>
                                <input type="text" placeholder="Apellido Materno*" id="apellido_materno" name="apellido_materno" required>
                            </div>
                        </div>
                        <div class="identificacion">
                            <div class="sub_tit">Identificación</div>
                            <div class="cont_input cont_input1">
                                <select name="tipo_de_documento" id="tipo_de_documento">
                                    <option value="DNI">DNI</option>
                                    <option value="Pasaporte">PASAPORTE</option>
                                    <option value="RUC">RUC</option>
                                </select>
                                <input type="text" placeholder="Número de Identificación*" id="numero_de_documento" name="numero_de_documento" required>
                            </div>
                        </div>
                        <div class="identificacion">
                            <div class="sub_tit">Datos Domiciliarios:</div>
                            <div class="cont_input cont_input2">
                                <input type="text" placeholder="Dirección*" id="dirección" name="dirección" required>
                                <input type="text" placeholder="Departamento*" id="departamento" name="departamento" required>
                                <input type="text" placeholder="Procinvia*" id="provincia" name="provincia" required>
                                <input type="text" placeholder="Distrito*" id="distrito" name="distrito" required>
                            </div>
                        </div>
                        <div class="identificacion">
                            <div class="sub_tit">Tipo de Seguro:</div>
                            <div class="cont_input cont_input3">
                                <select name="tipo_de_seguro" id="tipo_de_seguro">
                                    <option value="SIS">SIS</option>
                                    <option value="ESSALUD">ESSALUD</option>
                                    <option value="PARTICULAR">PARTICULAR</option>
                                    <option value="OTROS">OTROS</option>
                                </select>
                            </div>
                        </div>
                        <div class="identificacion">
                            <div class="sub_tit">Datos Complementarios:</div>
                            <div class="cont_input cont_input4">
                                <input type="tel" placeholder="N° Telefónico*" id="telefono" name="telefono" required>
                                <input type="email" placeholder="Correo Electronico o Gmail/Hotmail*" id="gmail" name="gmail" required >
                            </div>
                        </div>
                    <div class="contform">
                        <h3>2. DETALLES DEL RECLAMO</h3>
                        <div class="identificacion">
                            <div class="sub_tit">Causa del Reclamo</div>
                            <div class="cont_input">
                                <input type="text" placeholder="Causa del Reclamo*" id="causa_de_reclamo" name="causa_de_reclamo" required>
                            </div>
                        </div>
                        <div class="identificacion">
                            <div class="sub_tit">Reclamo del usuario afectado (reclamante)</div>
                            <div class="cont_input">
                                <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Describe el Reclamo Correctamente*" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="cont_buton"><button type="submit" onclick="return confirm('Para poder Confirmar el Envio de su Reclamacion Precione en Aceptar');" >REGISTRAR RECLAMO</button></div>
                </form>
            </div>
       </div>
    </main>
    
    <!--se insterta el pie de la pagina-->
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
          <a href="Salud_Mental_T\vista\contenido_general\directorio_usuarios.php">Directorio</a>
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