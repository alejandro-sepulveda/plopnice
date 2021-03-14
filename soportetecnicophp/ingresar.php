<?php

if (isset($_POST['Ingresar'])) {
	include "../config/database.php";

	$name = $_POST['marca'];
	$email =$_POST['modelo'];
  $email2 = $_POST['problema'];
  $email3 = $_POST['fechadeentrada'];
  $email4 = $_POST['optCity'];

       $sql = "INSERT INTO serviciotecnico(marca, modelo,problema,fechadeentrada,estado)
               VALUES('$name', '$email', '$email2', '$email3', '$email4')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
         echo'<script type="text/javascript">
         alert("Datos Guardados Correctamente");
         window.location.href="../soportetecnico.php";
         </script>';

       }else {

       }


}
