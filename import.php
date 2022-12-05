<?php

/* Conexión a base de datos */
include 'connproyecto.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %sn", mysqli_connect_error());
    exit();
}

/* Vaciar la tabla por si ya tiene datos */
$sql = "TRUNCATE kardex";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

/* Leer y recorrer el fichero */
$csv = file('kardex.csv');
foreach ($csv as $linea) {
    $linea = str_getcsv($linea, ";");
    /* Insertar en la tabla */
    $sql = "INSERT INTO kardex (id, matricula, sem, materia, seccion, periodo, cfo, ext, reg, cf, creditos, status )VALUES('".$line[0]."', '".$line[1]."', ".$line[2].", ".$line[3].", ".$line[4].", ".$line[5].", ".$line[6].", ".$line[7].", ".$line[8].", ".$line[9].")";
    mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
}

?>