<?php
// Conexion a base de datos con sus respectivos atributos
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "inventario";


//se realiza la conexion a la bd

$conn  = mysqli_connect($sname, $uname, $password, $db_name);


// se verifica si la conexion esta realizada de forma correcta
if (!$conn) {
	echo "Connection failed!";
}
