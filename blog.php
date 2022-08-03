<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1 class="fw-300 centrar-texto">Our Blog</h1>

    <article class="entrada-blog">
        <div class="imagen">
            <img src="/build/img/blog1.jpg" alt="Entrada de blog">
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Terraces on the roof of your house</h4>
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
                <h4>Build a pool in your home</h4>
            </a>
            <p>Written on: <span> 20/10/2019 </span> by: <span> Admin </span> </p>
            <p>Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
        </div>
    </article>

    <article class="entrada-blog">
        <div class="imagen">
            <img src="/build/img/blog3.jpg" alt="Entrada de blog">
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guide to decorating your home</h4>
            </a>
            <p>written on: <span> 20/10/2019 </span> by: <span> Admin </span> </p>
            <p>Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
        </div>
    </article>

    <article class="entrada-blog">
        <div class="imagen">
            <img src="/build/img/blog4.jpg" alt="Entrada de blog">
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guide for decorating your room</h4>
            </a>
            <p>Written on: <span> 20/10/2019 </span> by: <span> Admin </span> </p>
            <p>Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
        </div>
    </article>
</main>

<?php
incluirTemplate('footer');
?>