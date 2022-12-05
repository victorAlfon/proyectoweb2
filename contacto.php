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
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
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
    <div  class="mail-container" style="height: 500px;">
    <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div style="background-color: rgba(0, 105, 255, 0.3); background-image: url('poli.png');background-size: 100px;height: 400px; margin-top: 5pc;" class="form-group">
            <div style="padding: 10px;">
                <p class="pal-mail">Nombre</p>
                <input type="text" class="form-control" name='nombre' id="nombre" placeholder="Nombre">
                <p class="pal-mail">Email</p>
                <input type="email" class="form-control" name='email' id="email" placeholder="Email">
                <p class="pal-mail">Mensaje</p>
                <textarea class="form-control" name='mensaje' id="mensaje" rows="3" placeholder="Mensaje"></textarea><br><br>
                <input type="submit" value="Enviar" class="submit-login">
            </div>
        </div>
    </form>
    <?php 
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = 'Formulario Rellenado';
	$mensaje = "Nombre: ".$nombre."<br> Email: $email<br> Mensaje:".$_POST['mensaje'];


	if(mail('rodrigollanas202@hotmail.com', $asunto, $mensaje)){
		echo "Correo enviado";
	}
    ?>
    </div>
    <script src="main.js"></script>
</body>
</html>