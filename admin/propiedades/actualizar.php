<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

include '../../includes/app.php';


estaAutenticado();
 

// Verificar el id
$id =  $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id) {
    header('Location: /admin');
}


//Obtener los datos de la propiedad

$propiedad = Propiedad::find($id);

// Consulta para obtener todos los vendedores

$vendedores = Vendedor::all();


// Validar 

$errores = Propiedad::getErrores();



// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

        $args  = $_POST['propiedad'];
       
       
       
    

    //Asignar los atributos
   $propiedad->sincronizar($args);


    //Validacion 
   $errores = $propiedad->validar();

   //Subida de archivos
   $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
        
        if ($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        } 

      
    // El array de errores esta vacio
    if (empty($errores)) {


        
        if ($_FILES['propiedad']['tmp_name']['imagen']){
            // Almacenar la imagen
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        }
        //Genera un nombre unico

        $propiedad->guardar(); 
        
    }

    


}





?>

<?php
$nombrePagina = 'Crear Propiedad';
incluirTemplate('header');
?>

<h1 class="fw-300 centrar-texto">Administration - Edit Property</h1>

<main class="contenedor seccion contenido-centrado">
    <a href="/admin" class="boton boton-verde">Go back</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
       
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Update Property" class="boton boton-verde">

    </form>

</main>


<?php

incluirTemplate('footer');

mysqli_close($db); ?>

</html>