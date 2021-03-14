
<?php

//iniciamos la sesion
session_start();
// y la destruimos para cerrar sesion
session_destroy();
// se redireeciona hacia el login
echo'<script type="text/javascript">
alert("Sesion cerrada correctamente");
window.location.href="../login.php";
</script>';
?>
