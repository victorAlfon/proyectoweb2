<?php
session_start();
if(isset($_SESSION['mat'])){
    if($_SESSION['puesto']=="admin"){
        header("Location: inicio.php");
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
    <link rel="stylesheet" href="inicioalu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <header>
        <nav>
            <a href="inicio.html"><img class="logo" src="logo.jpg" alt="logo"></a>

            <ul class="enlaces-menu">
            <li><a href="inicioprofe.php"><i class="fa-solid fa-house"></i>&nbsp;Inicio</a></li>
                <li><a href="kardex.php"><i class="fa-solid fa-list"></i>&nbsp;Consulta de Estudiantes</a></li>
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

    <div style="text-align: center; margin-top: 5em; font-family: 'Fredoka One', cursive; font-size: 25px; margin: 0%;">
        <h1>Consulta de Estudiantes</h1>
    </div>
    <div  id="login-container">
        <div id="login" style="background-color: rgba(0, 105, 255, 0.3); background-image: url('poli.png');background-size: 100px;height: 265px; margin-top: 0%;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <br><br>
                <p class="pal">Matricula</p>
                <input type="text" name="mat" class="login-camp" placeholder="Matricula" required>
                <br><br>
                <input type="submit" value="Enviar" class="submit-login">
            </form>
        </div>
        
        <?php
        include 'connproyecto.php';//si no se encuentra el archivo continua con las instrucciones que siguen
        $cursando=0;
        $cursadas=0;
        $porcursar=0;
        $recursadas=0;
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $mat=$_POST['mat'];
        if ( isset( $_POST['mat'] )){
            $sql= "SELECT * FROM kardex WHERE matricula='$mat'";//se checa si ya existe en la tabla
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                ?><div style="text-align:center;">
                <table border="1" style="margin: 0 auto; font-size:200%; color: #FFFFFF; background-color:gray;" width=1000px>
                <?php
                echo "<h1>Kardex del Estudiante</h1><br>";
                echo "<tr>";
                echo "<th>sem</th>";
                echo "<th>materia</th>";
                echo "<th>seccion</th>";
                echo "<th>periodo</th>";
                echo "<th>cfo</th>";
                echo "<th>ext</th>";
                echo "<th>reg</th>";
                echo "<th>cf</th>";
                echo "<th>creditos</th>";
                echo "<th>status</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["sem"]."</td>";
                    echo "<td>".$row["materia"]."</td>";
                    echo "<td>".$row["seccion"]."</td>";
                    echo "<td>".$row["periodo"]."</td>";
                    echo "<td>".$row["cfo"]."</td>";
                    echo "<td>".$row["ext"]."</td>";
                    echo "<td>".$row["reg"]."</td>";
                    echo "<td>".$row["cf"]."</td>";
                    echo "<td>".$row["creditos"]."</td>";
                    echo "<td>".$row["stat"]."</td>";
                    echo "</tr>";
                    if($row["stat"]=='A'){
                        $cursadas++;
                    }else{
                        if($row["stat"]=='C'){
                            $cursando++;
                        }else{
                            if($row["stat"]=='PC'){
                                $porcursar++;
                            }else{
                                $recursadas++;
                            }
                        }
                    }
                }
                echo "</table>";
                echo "</div>";
            }else{
                echo "este usuario no existe";
            }
            ?>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        
            function drawChart() {
                var cursando=<?php echo $cursando; ?>;
                var cursadas=<?php echo $cursadas; ?>;
                var porcursar=<?php echo $porcursar; ?>;
                var recursadas=<?php echo $recursadas; ?>;
                var data = google.visualization.arrayToDataTable([
                ['Task', 'Materias'],
                ['Cursando',     cursando],
                ['Cursadas',      cursadas],
                ['Por Cursar',  porcursar],
                ['Recursadas', recursadas],
                ]);

                var options = {
                title: 'Estadísticas',
                is3D: true
                };
        
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
                chart.draw(data, options);
            }
            </script>
            <center>
            
            <div id="piechart" style="width: 900px; height: 500px;"></div>
            </center>
        <?php
        }
        ?>
    </div>
</body>
</html>