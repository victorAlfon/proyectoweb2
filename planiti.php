<?php
include 'connproyecto.php';//si no se encuentra el archivo continua con las instrucciones que siguen
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Num, PLAN, CLAVE MATERIA, NOMBRE, SEMESTRE, CREDITOS, CLASIFICACION FROM planiti";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
echo "<table border=1>";
echo "<tr>";
echo "<th>Num</th>";
echo "<th>PLAN</th>";
echo "<th>CLAVE MATERIA</th>";
echo "<th>NOMBRE</th>";
echo "<th>SEMESTRE</th>";
echo "<th>CREDITOS</th>";
echo "<th>CLASIFICACION</th>";
echo "</tr>";

while($row = $result->fetch_assoc()) {//como feof de c
//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
echo "<tr>";
echo "<td>".$row["Num"]."</td>";
echo "<td>".$row["PLAN"]."</td>";
echo "<td>".$row["CLAVE MATERIA"]."</td>";
echo "<td>".$row["NOMBRE"]."</td>";
echo "<td>".$row["SEMESTRE"]."</td>";
echo "<td>".$row["CREDITOS"]."</td>";
echo "<td>".$row["CLASIFICACION"]."</td>";
echo "</tr>";
}
echo "</table>";
} else {
echo "0 results";
}
$conn->close();
?>

