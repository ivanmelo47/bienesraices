<?php

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image; //https://image.intervention.io/v2/introduction/installation

require '../../includes/app.php';

    estaAuntenticado();

    // Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: /admin');
    }

    // Obtener datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM `vendedores`";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);

        // Invoca metodo para validar datos
        $errores = $propiedad->validar();

        // Subida de archivos
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            //Entrega el nombre de la imagen
            $propiedad->setImagen($nombreImagen);
        }

        if (empty($errores)) {
            // Almacenar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            $propiedad->guardar();
        }
        
    }// Fin de la seccion

    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        

        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>