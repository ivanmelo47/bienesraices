<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <picture>
                <source srcset="build/img/destacada2.webp" type="image/webp">
                <source srcset="build/img/destacada2.jpeg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/04/2023</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia similique beatae voluptas architecto blanditiis error numquam omnis odit totam minima quod laudantium quas veritatis magnam, quo facilis recusandae enim. Beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique odit repellendus nesciunt impedit. Quae, ipsa officia quis cumque asperiores eligendi, maiores necessitatibus ea, perferendis neque odio repellat doloribus aut officiis?</p>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis maiores assumenda facilis molestias provident iste nobis cumque quos dolorum quia sed amet, quam asperiores sequi! Non cupiditate eligendi ipsa porro!</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quos id cum hic, architecto laudantium maiores ipsam molestias corporis iste, exercitationem tenetur impedit! Distinctio, recusandae voluptatem fuga dignissimos in quaerat.</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>