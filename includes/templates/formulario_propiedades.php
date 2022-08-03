<fieldset>
            <legend>General Information</legend>
            <label for="titulo">Title:</label>
            <input name="propiedad[titulo]" type="text" id="titulo" placeholder="Property Title" value="<?php

use App\Propiedad;

 echo s($propiedad->titulo); ?>">

            <label for="precio">Price: </label>
            <input name="propiedad[precio]" type="number" id="precio" placeholder="Price" value="<?php echo s($propiedad->precio); ?>">

            <label for="imagen">Image: </label>
            <input name="propiedad[imagen]" type="file" id="imagen">

                <?php if ($propiedad->imagen):?>
                    <img src="/imagenes/<?php echo $propiedad->imagen ?>" width="100">
                <?php endif;?>
            <label for="descripcion">Description:</label>
            <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>

        </fieldset>


        <fieldset>
            <legend>Property Information</legend>

            <label for="habitaciones">Rooms:</label>
            <input name="propiedad[habitaciones]" type="number" min="1" max="10" step="1" id="habitaciones" value="<?php echo s($propiedad->habitaciones); ?>">

            <label for="wc">Bathrooms:</label>
            <input name="propiedad[wc]" type="number" min="1" max="10" step="1" id="wc" value="<?php echo s($propiedad->wc); ?>">

            <label for="estacionamiento">Parking:</label>
            <input name="propiedad[estacionamiento]" type="number" min="1" max="10" step="1" id="estacionamiento" value="<?php echo s($propiedad->estacionamiento); ?>">

            <legend>Seller</legend>
            
            <label for="vendedor">Seller</label>
            <select name="propiedad[vendedorId]" id="vendedor">
                    <option selected value="">--Select a Seller--</option>
                    <?php foreach($vendedores as $vendedor):?>
                        <option
                        <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : '';?> 
                        value="<?php echo s($vendedor->id); ?>" ><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
                    <?php endforeach; ?>
            </select>
            
        </fieldset>