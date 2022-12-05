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
        <h1>Alta de Usuarios</h1>
    </div>
    <div  id="login-container">
        <div id="login" style="background-color: rgba(0, 105, 255, 0.3); background-image: url('poli.png');background-size: 100px;height: 690px; margin-top: 0%;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <br><br>
                <p class="pal">Usuario (Nombre)</p>
                <input type="text" name="nom" class="login-camp" placeholder="Nombre" required>
                <p class="pal">Matricula</p>
                <input type="text" name="mat" class="login-camp" placeholder="Matricula" required>
                <p class="pal">Correo</p>
                <input type="text" name="email" class="login-camp" placeholder="Correo" required>
                <p class="pal">Contraseña</p>
                <input type="password" name="con" class="login-camp" placeholder="Contraseña" required>
                <p class="pal">Usuario</p>
                    <select name="pue" style="background-color: #FFF; width: 200px; text-align: center; height: 25px;">
                        <option value="admin">Administrador</option>
                        <option value="pfsr">Profesor</option>
                        <option value="almo">Alumno</option>
                    </select>
                <br><br>
                <input type="submit" value="Enviar" class="submit-login">
            </form>
            <?php
            include 'connproyecto.php';//si no se encuentra el archivo continua con las instrucciones que siguen
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $mat=$_POST['mat'];
            $nom=$_POST['nom'];
            $email=$_POST['email'];
            $con=$_POST['con'];
            $pue=$_POST['pue'];
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            if ( isset( $_POST['con'] )) {
                $sql= "SELECT * FROM usuarios WHERE matricula='$mat'OR email='$email'";//se checa si ya existe en la tabla
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    echo "Esta matricula o emial ya estan en uso";
                }else{//sin el registro aun no existe entonces se inserta
                    $sql2 = "INSERT INTO usuarios (matricula, nombre, email, contrasena, puesto)
                    VALUES ('".$mat."', '".$nom."', '".$email."', '".$con."', '".$pue."')";
                    if ($conn->query($sql2) === TRUE) {
                        echo "usuario agregado correctamente";
                    } else {
                    echo "Error al agregar usuario: " . $conn->error;
                    }
                }
            }
            $conn->close();
            ?>
            <br>
            <form action="usuarios.php">
                <input type="submit" value="Verificar Usuarios" class="submit-login"/>
            </form>
        </div>
</body>
</html>