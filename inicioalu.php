<?php
session_start();
if(isset($_SESSION['mat'])){
    if($_SESSION['puesto']=="admin"){
        header("Location: inicio.php");
    }else{
        if($_SESSION['puesto']=="pfsr"){
            header("Location: inicioprofe.php");
        }
    }
}else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/773b4a8b32.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
    <link rel="stylesheet" href="inicioalu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <nav>
            <a href="inicioalu.html"><img class="logo" src="logo.jpg" alt="logo"></a>

            <ul class="enlaces-menu">
                <li><a href="inicioalu.php"><i class="fa-solid fa-house"></i>&nbsp;Inicio</a></li>
                <li><a href="kardexalu.php"><i class="fa-solid fa-book"></i>&nbsp;Materias</a></li>
                <li><a href="mostrarmapa.php" target="_blank"><i class="fa-solid fa-map"></i>&nbsp;Mapa curricular</a></li>
                <li><a href="salir.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Salir</a></li>
            </ul>

            <button class="ham" type="button">   
                <span class="br-1"></span>
                <span class="br-2"></span>
                <span class="br-3"></span>
            </button>                       
        </nav>
    </header>

    <div class="content">
        <!-- <form action="" method="post">
            <br><br>
            <div class="form-content">
            <p class="pal">Usuario</p>
            <input type="text" name="user" class="login-camp" placeholder="Usuario" required>
            <p class="pal">Contraseña</p>
            <input type="password" name="pass" class="login-camp" placeholder="Contraseña" required><br><br>
            <input type="submit" value="Enviar" class="submit-login">
        </div>
        </form> -->
        <div class="content-home">
            <h1>Bienvenido<br>Estudiante <?php echo $_SESSION['nombre'];?></h1>

        </div>
    </div>
</body>
</html>