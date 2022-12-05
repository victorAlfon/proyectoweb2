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
    <div style="text-align: center; margin-top: 5em; font-family: 'Fredoka One', cursive; font-size: 25px; margin: 0%;">
        <h1>Modificación de Usuarios</h1>
    </div>
    <div id="login-container">
        <div id="login" style="background-color: rgba(0, 105, 255, 0.3); background-image: url('poli.png');background-size: 100px;height: 400px; margin-top: 5pc;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <br><br>
                <p class="pal">Matricula</p>
                <input type="text" name="mat" class="login-camp" placeholder="Matricula" required>
                <br><br>
                <select id="opc" name="opc" class="login-camp" onfocus="select();">
                    <option value="1">Nombre</option>
                    <option value="2">Contraseña</option>
                </select><br><br>
                <p class="pal">Nuevo dato</p>
                <input type="text" name="sele" class="login-camp" placeholder="Nuevo dato" required>
                <br><br>    
                <input type="submit" value="Enviar" class="submit-login">
            </form>
            <?php
            include 'connproyecto.php';//si no se encuentra el archivo continua con las instrucciones que siguen
            // Create connection
            if ( isset( $_POST['mat'] )) {
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $mat=$_POST['mat'];
                $opc=$_POST['opc'];
                $sele=$_POST['sele'];
                $sql= "SELECT * FROM usuarios WHERE matricula='$mat'";//se checa si ya existe en la tabla
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    if($opc==1){
                        if ( isset( $_POST['sele'] )){
                            $name=$_POST['sele'];
                            $sql2= "UPDATE usuarios SET nombre='$name' WHERE matricula='$mat'";
                        }
                    }else{
                        if($opc=2){
                            if ( isset( $_POST['sele'] )){
                                $con=$_POST['sele'];
                                $sql2= "UPDATE usuarios SET contrasena='$con' WHERE matricula='$mat'";
                                if ($conn->query($sql2) === TRUE) {
                                    echo "modificacion hecha";
                                    } else {
                                    echo "Error al modificar: " . $conn->error;
                                    }
                            }
                        }else{
                            echo"escoge una opcion valida";
                        }
                    }
                }else{
                    echo "Esta matricula no existe";
                }
                $conn->close();
            }
            ?>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>