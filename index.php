<?php
require 'includes/app.php'; 



$inicio = true;
incluirTemplate('header', $inicio);
?>

<section class="contenedor seccion">
    <h2 class="fw-300 centrar-texto">More about us</h2>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="/build/img/icono1.svg" alt="Icono Seguridad">
            <h3>Security</h3>
            <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
        </div>

        <div class="icono">
            <img src="/build/img/icono2.svg" alt="Icono Mejor Precio">
            <h3>Best price</h3>
            <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
        </div>

        <div class="icono">
            <img src="/build/img/icono3.svg" alt="Icono a Tiempo">
            <h3>Right on time</h3>
            <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
        </div>
    </div>
</section>

<main class="seccion contenedor">
    <h2 class="fw-300 centrar-texto">Houses and deparments on Sale</h2>

    <?php 
        
        include 'includes/templates/anuncios.php';
    ?>
    

    <div class="ver-todas">
        <a href="anuncios.php" class="boton boton-verde">See all</a>
    </div>
</main>

<section class="imagen-contacto">
    <div class="contenedor contenido-contacto">
        <h2>Find the house of your dreams</h2>
        <p>Fill out the contact form and a consultant will contact you shortly</p>
        <a href="contacto.php" class="boton boton-amarillo">Contact us</a>
    </div>
</section>

<div class="seccion-inferior contenedor seccion">
    <section class="blog">
        <h3 class="centrar-texto fw-300">Our Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <img src="/build/img/blog1.jpg" alt="Entrada de blog">
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terrace on the roof of your house</h4>
                </a>
                <p>Written on: <span> 20/10/2019 </span> by: <span> Admin </span> </p>
                <p>Tips for building a rooftop terrace on your house, with the best materials and saving money</p>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <img src="/build/img/blog2.jpg" alt="Entrada de blog">
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guide to decorating your home</h4>
                </a>
                <p>Written on: <span> 20/10/2019 </span> by: <span> Admin </span> </p>
                <p>Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3 class="centrar-texto fw-300">Testimonials</h3>
        <div class="testimonial">

            <blockquote>
            The staff behaved in an excellent way, very good attention and the house they offered me meets all my expectations.
            </blockquote>
            <p>- Miguel Lopez Martinez</p>
        </div>
    </section>

</div>

<?php
incluirTemplate('footer');
?>