<?php

if (isset($_GET['id'])) {
	include "../config/database.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM serviciotecnico WHERE Id=$id";
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

	$name = validate($_POST['marca']);
	$email = validate($_POST['modelo']);
  $email2 = validate($_POST['problema']);
  $email3 = validate($_POST['fechadeentrada']);
	$email4 = validate($_POST['optCity']);
	$id = validate($_POST['id']);


       $sql = "UPDATE serviciotecnico
               SET marca='$name', modelo='$email', problema='$email2', fechadeentrada='$email3', estado='$email4'
               WHERE Id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
         echo'<script type="text/javascript">
         alert("Editado Correctamente");
         window.location.href="../soportetecnico.php";
         </script>';
       }else {
         echo'<script type="text/javascript">
         alert("error");
          </script>';
       }

}else {

}
