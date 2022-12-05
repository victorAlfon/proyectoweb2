<?php
session_start();
if(isset($_SESSION['mat'])){
    if($_SESSION['puesto']=="admin"){
        header("Location: inicio.php");
    }else{
        if($_SESSION['puesto']=="pfsr"){
            header("Location: inicioprofe.php");
        }else{
            if($_SESSION['puesto']=="almo"){
                header("Location: inicioalu.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/773b4a8b32.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="login.php">
    <style type="text/css">
body {
  width: 100%;
  height: 100vh;

  background-size: 300% 300%;
  background-image: linear-gradient(
        -45deg, 
        #023064, #FFFFFF, #e08005, #023064);
  animation: AnimateBG 20s ease infinite;
}

@keyframes AnimateBG { 
  0%{background-position:0% 50%}
  50%{background-position:100% 50%}
  100%{background-position:0% 50%}
}
</style>
</head>
<body>
    <header>
        <nav>
            <a href="index.html"><img class="logo" src="logo.jpg" alt="logo"></a>

            <ul class="enlaces-menu">
                <li><a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Inicio</a></li>
                <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;Iniciar Sesión</a></li>
                <!-- <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Buscar</a></li> -->
                <li><a href="faqs.php"><i class="fa-solid fa-question"></i>&nbsp;FAQ's</a></li>
                <li><a href="contacto.php"><i class="fa-solid fa-comment"></i>&nbsp;Contacto</a></li>
            </ul>

            <button class="ham" type="button">   
                <span class="br-1"></span>
                <span class="br-2"></span>
                <span class="br-3"></span>
            </button>                       
        </nav>
    </header>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="login">
        <table>
            <tr class="columna">
                <th>Matricula</th>
                <td rowspan="9" id="img">
                    <img src="imagen1.jpg" alt="">
                </td>
            </tr>
            <tr>
                <td><input type="text" name="mat" placeholder="Matricula" required></td>
            </tr>
            <tr class="fila">
                <td>Contraseña</td>
            </tr>
            <tr>
                <th><input type="password" name="pass" placeholder="Contraseña" required></th>
            </tr>
            <tr id="entrar">
                <th><input type="submit" value="enviar" id="enter"></th>
            </tr>
            <tr>
                
            </tr>
            
        </table>
    </div>
    </form>
    <?php
    include 'connproyecto.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    $mat=$_POST['mat'];
    $pass=$_POST['pass'];
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql= "SELECT * FROM usuarios WHERE matricula='$mat'AND contrasena='$pass'";//se checa si ya existe en la tabla
    $result = $conn->query($sql);
    if ( isset( $_POST['mat'] )){
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $_SESSION['mat']=$mat;
                $_SESSION['puesto']=$row["puesto"];
                $_SESSION['nombre']=$row["nombre"];
            }
        }else{//sin el registro aun no existe entonces se inserta
            echo "Usuario o contraseña incorrectos";
        }
    }
    $conn->close();
    ?>
    <script src="main.js"></script>
    <div class="fatherfooter" style="margin-top: 400px; background-color: black; opacity: 0.9; height: 135px;">
        <footer class="containerfooter">
            <table style="  width: 100%; ">
                <tr>
                    <td>
                        <a style=" text-decoration: none; color:#FFFFFF; font-size: 20px;" href="https://www.upslp.edu.mx/upslp/"><i class="fa-solid fa-school"></i>&nbspPagina Oficial</a>
                        
                    </td>
                    <th>
                        <td style="text-align: center;">
                            <h3 style="color: #FFFFFF; font-size: 14px;">Redes sociales: </h3>
                            <a style="color: #ffffff; font-size: large;" href="https://www.facebook.com/upslp"><i class="fa-brands fa-facebook"></i></a>
                            <a style="color: #FFFFFF; font-size: large;" href="https://twitter.com/UPSLP_MX"><i class="fa-brands fa-twitter"></i></a>
                            <a style="color: #FFFFFF; font-size: large;" href="https://t.me/upslp_oficial"><i class="fa-brands fa-telegram"></i></a>
                            <a style="color: #FFFFFF; font-size: large;" href="https://www.youtube.com/c/UPSLPoficial2001"><i class="fa-brands fa-youtube"></i></a>
                            <a style="color: #FFFFFF; font-size: large;" href="https://www.instagram.com/upslp_oficial/?hl=es-la"><i class="fa-brands fa-instagram"></i></a>
                        </td>
                    </th>
                    <th>
                        <p style="color: #FFFFFF; font-size: 14px;">José Rodrigo Bravo Llanas</p>
                        <p style="color: #FFFFFF; font-size: 14px;">178678@upslp.edu.mx</p>
                    </th>
                    <th>
                        <p style="color: #FFFFFF; font-size: 14px;">Victor Covarrubias Solis</p>
                        <p style="color: #FFFFFF; font-size: 14px;">177294@upslp.edu.mx</p>
                    </th>
                </tr>
                
            </table>
        </footer>
    </div>
</body>
</html>