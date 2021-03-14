<?php

// se verifica e incluye la conexion a bd
if (isset($_GET['id'])) {
	include "config/database.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
// se recupera el id para poder actualizar
	$id = validate($_GET['id']);

// se realiza la consulta a bd
	$sql = "SELECT * FROM productos WHERE Id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {

    }


}else if(isset($_POST['update'])){
    	include "../config/database.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
// se capturan los atriburos desde la interfaz
	$name = validate($_POST['marca']);
	$email = validate($_POST['modelo']);
  $email2 = validate($_POST['precio']);
  $email3 = validate($_POST['stock']);
	$id = validate($_POST['id']);

// se realiza la consulta sql
       $sql = "UPDATE productos
               SET marca='$name', modelo='$email', precio='$email2', stock='$email3'
               WHERE Id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
				 // se realiza una comparacion si se realizo todo o bien o si algo fallo
         echo'<script type="text/javascript">
         alert("Editado Correctamente");
         window.location.href="../principal.php";
         </script>';
       }else {
         echo'<script type="text/javascript">
         alert("error");
          </script>';
       }

}else {

}
