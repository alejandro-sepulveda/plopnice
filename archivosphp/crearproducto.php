<?php

// para crear el producto primero se captura el boton clickeado desde la interfaz de agregar producto, y se agrega la conexion a bd
if (isset($_POST['create'])) {
	include "../config/database.php";


// se capturan las variables desde la interfaz de agregar producto
	$name = $_POST['marca'];
	$email =$_POST['modelo'];
  $email2 = $_POST['precio'];
  $email3 = $_POST['stock'];

	// se realiza la consulta sql

       $sql = "INSERT INTO productos(marca, modelo,precio,stock)
               VALUES('$name', '$email', '$email2', '$email3')";
       $result = mysqli_query($conn, $sql);
       if ($result) {

				 // y se realiza una comprobacion 
         echo'<script type="text/javascript">
         alert("Datos Guardados Correctamente");
         window.location.href="../principal.php";
         </script>';

       }else {

       }


}
