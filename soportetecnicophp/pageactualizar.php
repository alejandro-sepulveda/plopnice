<?php include '../soportetecnicophp/actualizar.php';

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
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<link rel="icon" type="image/png" href="../img/plop.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container">
		<form action="../soportetecnicophp/actualizar.php"
		      method="post">

		   <h4 class="display-4 text-center">Actualizar</h4><hr><br>
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
        <label for="email">Problema</label>
        <input type="text"
              class="form-control"
              id="problema"
              name="problema"
              value="<?=$row['problema'] ?>" >
      </div>

      <div class="form-group">
        <label for="email">Fecha de entrada</label>
        <input type="text"
              class="form-control"
              id="fechadeentrada"
              name="fechadeentrada"
              value="<?=$row['fechadeentrada'] ?>" >
      </div>

      <div class="form-group">
        <label for="email">Estado</label>
        <input type="text"
				readonly="readonly"
              class="form-control"
              id="estado"
              name="estado"
              value="<?=$row['estado'] ?>" >
      </div>

			<li class="nav-item">
				<select id="optCity" name="optCity">
<option value="Ingresado">Ingresado</option>
<option value="En revision">En revision</option>
<option value="Entregado">Entregado</option>
</select>
<button id="btnClick" type="button">Opcion seleccionada</button>
						</li>


		   <input type="text"
		          name="id"
		          value="<?=$row['Id']?>"
		          hidden >

		   <button type="submit"
		           class="btn btn-primary"
		           name="update">Actualizar</button>
		    <a href="../soportetecnico.php" class="link-primary">Lista</a>
	    </form>
	</div>



  <script>

    $(document).ready(function() {
  $('#btnClick').click(function(event) {
      alert($('#optCity option:selected').text());
  });
});
    </script>
</body>
</html>
