<?php
require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image; //https://image.intervention.io/v2/introduction/installation

// Restriccon de usuario por inicio de sesion
estaAuntenticado();

$propiedad = new Propiedad;

// Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();
/* debuguear($vendedores); */

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();     


// Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    /* Subida de archivos */

    // Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    // Setear imagen
    //Realizar un resize a la imagen con Intervention
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        //Entrega el nombre de la imagen
        $propiedad->setImagen($nombreImagen);
    }


    // Validar
    $errores = $propiedad->validar();
    //Revisar que el arreglo de errores este vacio
    if (empty($errores)) {

        /* Subida de archivos */
        // Crear carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }
        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . "propiedades/" . $nombreImagen);

        // Guardar en la base datos
        $propiedad->guardar();

    }
} // Fin de la seccion

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

        <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
incluirTemplate('footer');
?>