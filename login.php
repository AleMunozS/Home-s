<?php

// Incluir conexion
require 'includes/app.php';
$db = conectarDb();

$errores = [];


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($db,  filter_var($email, FILTER_VALIDATE_EMAIL) );

    $password = mysqli_real_escape_string($db,  $_POST['password'] );


    if(!$email) {
        $errores[] = 'El Email must be registered or it doen\' have the right format';
    }

    if(!$password) {
        $errores[] = 'You must use a password';
    }
  
    if(empty($errores)) {
  
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
        $resultado = mysqli_query($db, $query);

        // El usuario existe.

        if($resultado->num_rows) {
            // Revisar si el password esta bien
            $usuario = mysqli_fetch_assoc($resultado);
    
            // Password a revisar y el de la BD.
            $auth = password_verify($password, $usuario['password']);

            if($auth) {
                // Autenticado.

                // Para autenticar usuarios estaremos utilizando la superglobal SESSION, esta va a mantener eso una sesión activa en caso de que sea valida.

                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['id'] =$usuario['id'];
                $_SESSION['login'] = true;

              
            } else {
                // No autenticado
                $errores[] = 'El Password es incorrecto';
            }
        
        } else {

            $errores[] = 'El Usuario no existe';
        }
   
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1 class="fw-300 centrar-texto">Log In</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Email and Password</legend>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Tu Email" >

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="Tu Password" >
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>