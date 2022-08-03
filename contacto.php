<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<h1 class="fw-300 centrar-texto">Contact</h1>
<img src="/build/img/destacada3.jpg" alt="Imagen Principal">

<main class="contenedor seccion contenido-centrado">
    <h2 class="fw-300 centrar-texto">Fill out the Contact Us form</h2>

    <form class="formulario" action="">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="nombre">Name:</label>
            <input type="text" id="nombre" placeholder="Your Name">

            <label for="email">E-mail: </label>
            <input type="email" id="email" placeholder="Your E-mail" required>

            <label for="telefono">Phone:</label>
            <input type="tel" id="telefono" placeholder="Your message" required>

            <label for="mensaje">Message: </label>
            <textarea id="mensaje"></textarea>

        </fieldset>


        <fieldset>
            <legend>Property Information</legend>
            <label for="opciones">Buy or sell/label>
            <select id="opciones">
                <option value="" disabled selected>-- Select --</option>
                <option value="Compra">Buy</option>
                <option value="Vende">Sell</option>
            </select>

            <label for="cantidad">Amount:</label>
            <input type="number" min="0" max="100" step="5">
        </fieldset>

        <fieldset>
            <legend>Contact</legend>

            <p>How would you like to be contacted?:</p>

            <div class="forma-contacto">
                <label for="telefono">Phone</label>
                <input type="radio" name="contacto" value="telefono" id="telefono">

                <label for="correo">E-mail</label>
                <input type="radio" name="contacto" value="correo" id="correo">
            </div>

            <p>If you chose Phone, choose the date and time</p>
            <label for="fecha">Date:</label>
            <input type="date" id="fecha">

            <label for="hora">Time:</label>
            <input type="time" id="hora" min="09:00" max="18:00">


        </fieldset>

        <input type="submit" value="Enviar" class="boton boton-verde">

    </form>
</main>

<?php
incluirTemplate('footer');
?>