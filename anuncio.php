<?php
    include './includes/templates/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>
        <picture>
                <source srcset="build/img/destacada.webp" type="image/webp">
                <source srcset="build/img/destacada.jpeg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia similique beatae voluptas architecto blanditiis error numquam omnis odit totam minima quod laudantium quas veritatis magnam, quo facilis recusandae enim. Beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique odit repellendus nesciunt impedit. Quae, ipsa officia quis cumque asperiores eligendi, maiores necessitatibus ea, perferendis neque odio repellat doloribus aut officiis?</p>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis maiores assumenda facilis molestias provident iste nobis cumque quos dolorum quia sed amet, quam asperiores sequi! Non cupiditate eligendi ipsa porro!</p>
        </div>
    </main>

<?php
    include './includes/templates/footer.php';
?>