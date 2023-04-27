<?php
    require 'includes/funciones.php';
    incluirTemplate('header');

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /');
    }

    // Importar la conexion
    /* require __DIR__.'/../config/database.php'; */
    require 'includes/config/database.php';
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades WHERE id = $id ";

    // Obtener los resultados
    $resultado = mysqli_query($db, $query);
    if (!$resultado->num_rows) { // Verifica si existe un registro con el id proporcionado
        header('Location: /');
    }
    $propiedad = mysqli_fetch_assoc($resultado);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        <picture>
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
    // Cerrar la conexion
    mysqli_close($db);
?>