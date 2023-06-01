<?php
<<<<<<< HEAD

use App\Propiedad;

require '../../includes/app.php';

=======
    require '../../includes/app.php';

    // Restriccon de usuario por inicio de sesion
>>>>>>> d93a9d0de689121d67b4fe4af29b57b450f9b3fc
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
    $errores = [];

<<<<<<< HEAD
=======
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

>>>>>>> d93a9d0de689121d67b4fe4af29b57b450f9b3fc
    // Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        /* echo "<pre>";
        var_dump($_POST);
        echo "</pre>"; */

        // Captura de datos
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar files a una variable
        $imagen = $_FILES['imagen'];

        // Arreglo de errores
        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "El precio es obligatorio";
        }
        if ( strlen($descripcion) < 50) {
            $errores[] = "La descripcion es obligatoria y debe tener almenos 50 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "El numero de habitaciones es obligatorio";
        }
        if (!$wc) {
            $errores[] = "El numero de baños es obligatorio";
        }
        if (!$estacionamiento) {
            $errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }
        if (!$vendedorId) {
            $errores[] = "Elige un vendedor";
        }

        /* if (!$imagen['name'] || $imagen['error']) {
            $errores[] = "La imagen es obligatoria";
        } */
        //Validar Imagen por tamanio(100kb maximo)
        $medida = 1000 * 1000;
        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }
        
        /* echo "<pre>";
        var_dump($errores);
        echo "</pre>"; */

        // Revisar que el arreglo de errores este vacio
        if (empty($errores)) {

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            /* Subida de archivos */
            if($imagen['name']){
                //Eliminar la imagen anterior
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar un nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen'];
            }


            // Actualizar en la base de datos
            $query = "UPDATE `propiedades` SET `titulo` = '$titulo', `precio` = '$precio', `imagen` = '$nombreImagen',`descripcion` = '$descripcion', `habitaciones` = $habitaciones, `wc` = $wc, `estacionamiento` = $estacionamiento, `vendedores_id` = '$vendedorId' WHERE `propiedades`.`id` = $id";

            //echo $query;



            $resultado = mysqli_query($db, $query);
            if ($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=2');
            }
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