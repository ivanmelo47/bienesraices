<?php

require '../../includes/app.php';

use App\Vendedor; 

// Restriccon de usuario por inicio de sesion
estaAuntenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

// Toda esta seccion se utiliza para insertar datos despues de enviar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Crea una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);


    // Validar
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
    <h1>Registrar Vendedor(a)</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

        <form action="" class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
        </form>
    </main>

<?php
incluirTemplate('footer');
?>

