<?php

if(isset($_GET['id'])){
   include "../config/database.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "DELETE FROM serviciotecnico
	        WHERE Id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
     echo'<script type="text/javascript">
     alert("Eliminado Correctamente");
     window.location.href="../soportetecnico.php";
     </script>';
   }else {

   }

}else {
	header("Location: ../read.php");
}
