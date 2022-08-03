<fieldset>
            <legend>General information</legend>
            <label for="nombre">Name:</label>
            <input name="vendedor[nombre]" type="text" id="nombre" placeholder="Name of the seller" value="<?php
 echo s($vendedor->nombre); ?>">
            <label for="nombre">Last Name:</label>
            <input name="vendedor[apellido]" type="text" id="apellido" placeholder="Last name of the seller" value="<?php
 echo s($vendedor->apellido); ?>">
            <label for="telefono">Phone:</label>
            <input name="vendedor[telefono]" type="text" id="telefono" placeholder="Phone" value="<?php
 echo s($vendedor->telefono); ?>">
            
</fieldset>