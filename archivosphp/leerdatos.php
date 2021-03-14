<?php
// para leer los datos desde la bd, se incluye la conexion a bd
include "config/database.php";
// realizamos la consulta sql y conectamos
$sql = "SELECT * FROM productos ORDER BY Id DESC";
$result = mysqli_query($conn, $sql);
