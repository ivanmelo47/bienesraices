<?php
    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedor = '';

    // Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        /* echo "<pre>";
        var_dump($_POST);
        echo "</pre>"; */

        // Captura de datos
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedor = $_POST['vendedor'];

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
        if (!$vendedor) {
            $errores[] = "Elige un vendedor";
        }
        /* echo "<pre>";
        var_dump($errores);
        echo "</pre>"; */

        // Revisar que el arreglo de errores este vacio
        if (empty($errores)) {
            // Insertar en la base de datos
            $query = "INSERT INTO `bienesraices_crud`.`propiedades` (`titulo`, `precio`,`descripcion`, `habitaciones`, `wc`, `estacionamiento`, `vendedores_id`) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedor')";

            $resultado = mysqli_query($db, $query);
        }
        
    }// Fin de la seccion

    require '../../includes/funciones.php';
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
        

        <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php">
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
                   accept="image/jpeg, image/png">

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
            <select name="vendedor" value="<?php echo $vendedor; ?>">
                <option value="">--Seleccione--</option>
                <option value="1">Juan</option>
                <option value="2">Maria</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
    </main>

<?php
    incluirTemplate('footer');
?>