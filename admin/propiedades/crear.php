<?php

include '../../includes/app.php';
// Proteger esta ruta.
use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

$propiedad = new Propiedad;  

//Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();



$errores = Propiedad::getErrores();





// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    
    //Crea una nueva instancia

    $propiedad = new Propiedad($_POST['propiedad']);

    
        //Generar nombre unico 
    $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
        //Setear la imagen

        if ($_FILES['propiedad']['tmp_name']['imagen']){
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
    }
        

        //validar

    $errores = $propiedad->validar();
    
     
     
   
    if (empty($errores)) {

       
        
        //Crear la carpeta para subir imagenes
        if (!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }
        //Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        //Guarda en la base de datos 

        $resultado  = $propiedad->guardar();

        //Mensaje de exito o de error
        
    }

    // Insertar en la BD.


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

        <input type="submit" value="Create Property" class="boton boton-verde">

    </form>

</main>


<?php

incluirTemplate('footer');

mysqli_close($db); ?>

</html>