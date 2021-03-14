<?php
// para eliminar un producto se captura el id del producto elegido a eliminar y se agrega la conexion a bd
if(isset($_GET['id'])){
   include "../config/database.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

  // se captura el id

	$id = validate($_GET['id']);


// se realiza la consulta sql
	$sql = "DELETE FROM productos
	        WHERE Id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {

     // y su respectiva comprobacion
     echo'<script type="text/javascript">
     alert("Eliminado Correctamente");
     window.location.href="../principal.php";
     </script>';
   }else {

   }

}else {
	header("Location: ../read.php");
}
