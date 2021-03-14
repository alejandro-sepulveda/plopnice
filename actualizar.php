<?php include 'archivosphp/actualizar.php';

//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['sid']))
{

		header('Location:login.php');

		exit();
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
		<link rel="icon" type="image/png" href="img/plop.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="archivosphp/actualizar.php"
		      method="post">

		   <h4 class="display-4 text-center">Actualizar Producto</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Marca</label>
		     <input type="name"
		           class="form-control"
		           id="marca"
		           name="marca"
		           value="<?=$row['marca'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="email">Modelo</label>
		     <input type="text"
		           class="form-control"
		           id="modelo"
		           name="modelo"
		           value="<?=$row['modelo'] ?>" >
		   </div>
       <div class="form-group">
        <label for="email">Precio</label>
        <input type="number"
              class="form-control"
              id="precio"
              name="precio"
              value="<?=$row['precio'] ?>" >
      </div>

      <div class="form-group">
        <label for="email">Stock</label>
        <input type="number"
              class="form-control"
              id="stock"
              name="stock"
              value="<?=$row['stock'] ?>" >
      </div>

		   <input type="text"
		          name="id"
		          value="<?=$row['Id']?>"
		          hidden >

		   <button type="submit"
		           class="btn btn-primary"
		           name="update">Actualizar</button>
		    <a href="principal.php" class="link-primary">Lista</a>
	    </form>
	</div>
</body>
</html>
