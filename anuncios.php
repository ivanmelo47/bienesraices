<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h2>Casas y Departamentos en Venta</h2>

    <!-- apertura: anuncios.php -->
    <?php
    $limite = 10;
    include 'includes/templates/anuncios.php'
    ?>
    <!-- cierre: anuncios.php -->
</main>

<?php
incluirTemplate('footer');
?>