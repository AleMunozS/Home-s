<?php

use App\Propiedad;
use App\Vendedor;

include '../includes/app.php';
// Proteger esta ruta.

estaAutenticado();


 //Implementar un metodo para obtener todas las propiedades utilizando ACTIVE RECORD
//  $propiedades  = Propiedad::all();
    $propiedades = Propiedad::all();
    $vendedores =  Vendedor::all();

  

// Validar la URL 
    $mensaje = $_GET['mensaje'] ?? null;


// Importar el Template

incluirTemplate('header');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitizar número entero
    $id = $_POST['id_eliminar'];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $name = $_POST['tipo'];
    $valid = validarTipoContenido($name);
    // Eliminar... 

    if($id && $valid){
        
        
        if ($name==='propiedad'){
            
            $propiedad = Propiedad::find($id);
            $propiedad ->eliminar();
        }
        else if ($name==='vendedor'){ 
            $vendedor =Vendedor::find($id);
            $vendedor->eliminar();
        }
        

    }
}
?>

<h1 class="fw-300 centrar-texto">Administration</h1>

<main class="contenedor seccion contenido-centrado">


    <?php
            $mensajee = mostrarNotificacion(intval($mensaje));
            if ($mensajee) {?>
                <p class="alerta exito"><?php echo s($mensajee) ?> </p>
           <?php }
    ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">New Property</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">New Seller </a>

    <h2>Properties</h2>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($propiedades as $propiedad):  ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td>
                    <img src="/imagenes/<?php echo $propiedad->imagen; ?>"" width="100" class="imagen-tabla">
                </td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                <form method="POST">
                    <input type="hidden" name="id_eliminar" value="<?php echo $propiedad->id; ?>">
                    <input type="hidden" name="tipo" value="propiedad">
                    <input type="submit" href="/admin/propiedades/borrar.php" class="boton boton-rojo" value="Erase">
                </form>
                    
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton boton-verde">Update</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Seller</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($vendedores as $vendedor):  ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre; ?></td>
                <td> <?php echo $vendedor->telefono; ?></td>
                <td>
                <form method="POST">
                    <input type="hidden" name="id_eliminar" value="<?php echo $vendedor->id; ?>">
                    <input type="hidden" name="tipo" value="vendedor">
                    <input type="submit" href="/admin/propiedades/borrar.php" class="boton boton-rojo" value="Erase">
                </form>
                    
                    <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton boton-verde">Update</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php 
    incluirTemplate('footer');
?>