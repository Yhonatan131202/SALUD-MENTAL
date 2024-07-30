<?php
if(isset($_SESSION['usuario'])){
    header('location: ./Salud_Mental_T/vista/contenido_administrador/inicio_administrador.php');
    echo "asaaaaaaaaaaaaaaa";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSMC-Tayacaja</title>
    <link rel="stylesheet" href="../CSS/inicio_sesion.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="..\img\logo_saludmental-removebg-preview (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <h2 class="reg">CSMC - Tayacaja</h2>
        <nav class="navegacion">
            <a href="../../index.php">HOME</a>
            <!--<a href="login.php">Iniciar Cesión</a>
             -->
        </nav>
    </header>
    <div class="formato" >
        <div class="form-box">
            <h2>INICAR SESIÓN</h2>
            <form action="../controlador/validacionBD.php" id="formulario" method="POST">
                <div>
                    <label class="letra">ingresar nombre:</label>
                    <div class="input-field" id="nameInput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="usuario" name="usuario"  placeholder="Name*">
                    </div>
                    <label class="letra">ingresar contraseña:</label>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password"  id="contraseña" name="contraseña" placeholder="Password*" pattern=".{6,}" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit" class="btn" id="signUP" name="ingresar" value="enviar">ACCEDER</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>