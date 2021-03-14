<?php
// para realizar la comporbacion en el login , primero se capturan los datos ingresados por teclado desde la interfaz del loogin

    $username = $_POST['username'];
    $password = $_POST['password'];

    // luego se realiza la comprobacion de las credenciales, en este caso estan predeterminadas

    if ($username == 'admin' && $password == '12345') {
        session_start();

        // creamos una sesion para poder comprobar mas adelante
        $_SESSION['sid'] = session_id();


// se realiza una comprobacion y en casos distintos se redirecciona a distintas paginas

        echo "<script>alert('Logueado con exito!'); window.location=('../principal.php')</script>";
    } else {


        echo "<script>alert('Credenciales incorrectas'); window.location=('../login.php')</script>";
    }
?>
