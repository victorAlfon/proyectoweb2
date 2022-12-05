<?php
session_start();
if(isset($_SESSION['mat'])){
    if($_SESSION['puesto']=="pfsr"){
        header("Location: inicioprofe.php");
    }else{
        if($_SESSION['puesto']=="almo"){
            header("Location: inicioalu.php");
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
    <link rel="stylesheet" href="inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <nav>
            <a href="inicio.html"><img class="logo" src="logo.jpg" alt="logo"></a>

            <ul class="enlaces-menu">
                <li><a href="inicio.php"><i class="fa-solid fa-house"></i>&nbsp;Inicio</a></li>
                <li><a href="alta.php"><i class="fa-sharp fa-solid fa-arrow-up"></i>&nbsp;Altas</a></li>
                <li><a href="bajas.php"><i class="fa-sharp fa-solid fa-arrow-down"></i>&nbsp;Bajas</a></li>
                <li><a href="modificarus.php"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Modificación</a></li>
                <li><a href="query.php"><i class="fa-solid fa-list"></i>&nbsp;Consulta</a></li>
                <li><a href="index2.php"><i class="fa-solid fa-upload"></i>&nbsp;Importar</a></li>
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
        <div class="content-home">
            <h1>Bienvenido<br>Administrador <?php echo $_SESSION['nombre'];?> </h1>

        </div>
    </div>
</body>
</html>