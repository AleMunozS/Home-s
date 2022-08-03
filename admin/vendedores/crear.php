<?php

include '../../includes/app.php';
use App\Vendedor;

estaAutenticado();


$vendedor = new Vendedor;



//Arrgelo con posibles errores
$errores = Vendedor::getErrores();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
   
    
    //Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);
    
     
    //Validar que no haya campos vacios
    $errores = $vendedor->validar();

    if (empty($errores)){
        $vendedor->guardar();
    }
    
}
 
incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">

    <h1>Register Seller</h1>
    <a href="/admin" class="boton boton-verde">Go back</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST"  action="/admin/vendedores/crear.php">
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Register Seller" class="boton boton-verde">

    </form>

</main>


<?php

incluirTemplate('footer');

?>