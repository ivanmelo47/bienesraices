<?php

require '../../includes/app.php';

use App\Vendedor;

// Restriccon de usuario por inicio de sesion
estaAuntenticado();

// Validar la URL por ID valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
    header('Location: /admin');
}

// Obtener datos del vendedor
$vendedor = Vendedor::find($id);

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

// Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Asignar los atributos
    $args = $_POST['vendedor'];

    $vendedor->sincronizar($args);

    // Invoca metodo para validar datos
    $errores = $vendedor->validar();


    //Revisar que el arreglo de errores este vacio
    if (empty($errores)) {

        // Guardar en la base datos
        $vendedor->guardar();

    }

}

incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

        <form action="" class="formulario" method="POST" action="/admin/vendedores/actualizar.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>
    </main>

<?php
incluirTemplate('footer');
?>

