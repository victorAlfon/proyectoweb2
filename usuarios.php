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
        <h1>Usuarios</h1>
    </div>
    <div  id="login-container">
    <?php
    include 'connproyecto.php';//si no se encuentra el archivo continua con las instrucciones que siguen
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT matricula, nombre, email, contrasena, puesto FROM usuarios";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    ?><div style="text-align:center;">
    <table border="1" style="margin: 0 auto; font-size:200%; color: #FFFFFF; background-color:gray;" width=1000px>
    <?php
    echo "<tr>";
    echo "<th>matricula</th>";
    echo "<th>nombre</th>";
    echo "<th>email</th>";
    echo "<th>contraseña</th>";
    echo "<th>puesto</th>";
    echo "</tr>";

    while($row = $result->fetch_assoc()) {//como feof de c
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo "<tr>";
    echo "<td>".$row["matricula"]."</td>";
    echo "<td>".$row["nombre"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".$row["contrasena"]."</td>";
    echo "<td>".$row["puesto"]."</td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
    <br>
    <form action="alta.php">
        <input type="submit" value="Dar de alta a otro usuario  " class="submit-login"/>
    </form>
    <br>
    <form action="bajas.php">
        <input type="submit" value="Dar de baja a otro usuario" class="submit-login"/>
    </form>
    </div>
</body>
</html>
