<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, quo odit corporis odio recusandae vel veniam voluptate sunt tenetur aliquid explicabo illum itaque nihil maiores deserunt! Nam voluptas eius magnam. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, aperiam iure. Placeat quis, ab aspernatur facere voluptate, porro unde odio eveniet, labore nesciunt dicta incidunt vel rem? Tempora, earum consequatur.
                </p>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit animi aliquam doloremque in officia quidem aut totam illo quas eveniet cum laudantium similique, natus libero odio perspiciatis asperiores quos. Cupiditate.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
        
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis cum eaque voluptas ad harum adipisci distinctio tempore non odit.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis cum eaque voluptas ad harum adipisci distinctio tempore non odit.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis cum eaque voluptas ad harum adipisci distinctio tempore non odit.</p>
            </div>
        </div> <!-- Cierre de nosotros -->
    </section>

<?php
    incluirTemplate('footer');
?>