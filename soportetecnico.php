
<?php include "soportetecnicophp/leerdatos.php";
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['sid']))
{

  echo'<script type="text/javascript">
  alert("Debes iniciar sesion primero");
  window.location.href="login.php";
  </script>';

    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
	<link rel="icon" type="image/png" href="img/plop.png" />
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>
    <link rel="stylesheet" href="css/principal.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/principal2.css">

  </head>
  <body>

<div id="wrapper">
   <div class="overlay"></div>

        <!-- barra de al lado (sidebar) -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
     <ul class="nav sidebar-nav">
       <div class="sidebar-header">
       <div class="sidebar-brand">
         <a href="principal.php">Plop-Nice</a></div></div>

       <li class="dropdown">
       <a href="#works" class="dropdown-toggle"  data-toggle="dropdown">Servicio Tecnico <span class="caret"></span></a>
     <ul class="dropdown-menu animated fadeInLeft" role="menu">
      <div class="dropdown-header">Elige una opcion</div>
      <li><a data-toggle="modal" href="#myModal">Agregar </a></li>
      <li><a href="#videos">Videeos</a></li>

      </ul>
      </li>
       <!-- /<li><a href="#team">Team</a></li>-->

      <li><a class="fas fa-adjust" href="archivosphp/cerrarsesion.php">Cerrar Sesion</a></li>
      </ul>
  </nav>
        <!-- /termino del codigo del sidebar -->



        <!-- Contenido de la pagina-->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2" style="margin: auto; background: #fff">

                    </div>
                </div>
            </div>
        </div>
        <!-- /#fin de contenido -->
    </div>


    <!-- Contenido de la tabla -->
    <div class="container">
  		<div class="box">

  			<h4 class="display-4 text-center">SERVICIO TECNICO</h4><br>
  			<?php if (isset($_GET['success'])) { ?>
  		    <div class="alert alert-success" role="alert">
  			  <?php echo $_GET['success']; ?>
  		    </div>
  		    <?php } ?>
  			<?php if (mysqli_num_rows($result)) { ?>
  			<table class="table table-striped">
  			  <thead>
  			    <tr>
  			      <th scope="col">ID</th>
  			      <th scope="col">MARCA</th>
  			      <th scope="col">MODELO</th>
                 <th scope="col">PROBLEMA</th>
                     <th scope="col">FECHA INGRESO</th>
                      <th scope="col">ESTADO</th>
  			      <th scope="col">ACCION</th>
  			    </tr>
  			  </thead>
  			  <tbody>
  			  	<?php

  			  	   while($rows = mysqli_fetch_assoc($result)){

  			  	 ?>
  			    <tr>
  			       <td><?php echo $rows['Id']; ?></td>
  			      <td><?=$rows['marca']?></td>
  			      <td><?php echo $rows['modelo']; ?></td>
              <td><?php echo $rows['problema']; ?></td>
               <td><?php echo $rows['fechadeentrada']; ?></td>
                <td><?php echo $rows['estado']; ?></td>
  			      <td><a href="soportetecnicophp/pageactualizar.php?id=<?=$rows['Id']?>"
  			      	     class="btn btn-success">Actualizar</a>

  			      	  <a href="soportetecnicophp/eliminar.php?id=<?=$rows['Id']?>"
  			      	     class="btn btn-danger">Borrar</a>

                     <a href="soportetecnicophp/crearpdf.php?id=<?=$rows['Id']?>"
     			      	     class="btn btn-danger">Generar Pdf</a>
  			      </td>
  			    </tr>
  			    <?php } ?>
  			  </tbody>
  			</table>
  			<?php } ?>

  		</div>
  	</div>

 <!-- fin de la tabla -->

    <!-- Modal -->

    <form  action="soportetecnicophp/ingresar.php" method="post">

          <div class="container my-4">

              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Agregar Equipo</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                    <i class="fa fa-desktop"></i>
                    <input type="text" id="marca" name="marca" class="form-control validate value="<?php if(isset($_GET['marca']))
                               echo($_GET['marca']); ?>"  ">
                    <label data-error="wrong" data-success="right" for="form3">Marca</label>
                  </div>

                  <div class="md-form mb-4">
                    <i class="fa fa-book"></i>
                    <input type="text" id="modelo" name="modelo" class="form-control validate value="<?php if(isset($_GET['modelo']))
                               echo($_GET['modelo']); ?>"

                    <label data-error="wrong" data-success="right" for="form2">Modelo</label>
                  </div>
                  <div class="md-form mb-4">
                    <i class="fa fa-exclamation"></i>
                    <input type="text" id="problema" name="problema" class="form-control validate value="<?php if(isset($_GET['problema']))
                               echo($_GET['problema']); ?>"

                    <label data-error="wrong" data-success="right" for="form2">Problema</label>
                  </div>
                  <div class="md-form mb-4">
                    <i class="fa fa-calendar-o"></i>
                    <input type="text" id="fechadeentrada" name="fechadeentrada" class="form-control validate value="<?php if(isset($_GET['fechadeentrada']))
                               echo($_GET['fechadeentrada']); ?>"

                    <label data-error="wrong" data-success="right" for="form2">Fecha de entrada</label>
                  </div>
                  <li class="nav-item">
                    <select id="optCity" name="optCity">
 <option value="Ingresado">Ingresado</option>
 <option value="En revision">En revision</option>
 <option value="Entregado">Entregado</option>
 </select>
 <button id="btnClick" type="button">Opcion seleccionada</button>
                        </li>


                  <div class="modal-footer d-flex justify-content-center">
                    <button type="submit"
                    class="btn btn-primary"
                    name="Ingresar">Agregar</button>
                  </div>
              </div>
            </div>
          </div>
            </div>
    </form>











    <!-- /#wrapper -->
<!-- partial -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    <script  src="js/principal.js"></script>

    <script>

      $(document).ready(function() {
    $('#btnClick').click(function(event) {
        alert($('#optCity option:selected').text());
    });
});
      </script>


  </body>
</html>
