<?php

include "config/database.php";

$sql = "SELECT * FROM serviciotecnico ORDER BY Id DESC";
$result = mysqli_query($conn, $sql);
