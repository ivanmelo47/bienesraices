<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image; //https://image.intervention.io/v2/introduction/installation

    // Restriccon de usuario por inicio de sesion
    estaAuntenticado();

    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM `vendedores`";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    // Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Crea una nueva instancia
        $propiedad = new Propiedad($_POST);

        /* Subida de archivos */
        
        // Generar un nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        // Setear imagen
        //Realizar un resize a la imagen con Intervention
        if($_FILES['imagen']['tmp_name']){
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(600, 600);
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
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            // Guardar en la base datos
            $resultado = $propiedad->guardar();

            // Mensaje de exito o error
            if ($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=1');
            }
        }
        
    }// Fin de la seccion

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        

        <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" 
                   id="titulo" 
                   name="titulo" 
                   placeholder="Titulo Propiedad" 
                   value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" 
                   id="precio" 
                   name="precio" 
                   placeholder="Precio Propiedad" 
                   value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" 
                   id="imagen" 
                   accept="image/jpeg, image/png"
                   name="imagen">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" 
                   id="habitaciones" 
                   name="habitaciones" 
                   placeholder="Numero de habitaciones" 
                   min="1" max="9" 
                   value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños:</label>
            <input type="number" 
                   id="wc" name="wc" 
                   placeholder="Numero de baños" 
                   min="1" 
                   max="9" 
                   value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" 
                   id="estacionamiento" 
                   name="estacionamiento" 
                   placeholder="Numero de estacionamientos" 
                   min="1" 
                   max="9" 
                   value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedorId" value="<?php echo $vendedor; ?>">
                <option value="">--Seleccione--</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
    </main>

<?php
    incluirTemplate('footer');
?>