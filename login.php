<?php
//Conexion a la base de datos
require 'includes/config/database.php';
$db = conectarDB();

//Errores
$errores = [];

//Autenticar el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Deteccion de errores en la validacion
    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    // Sin deteccion de errores en la validacion
    if (empty($errores)) {
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        // Primera comprobacion
        if ($resultado->num_rows) { // Esta linea rebiza si el usuario existe
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            // Verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);
            if ($auth) {
                // El usuario esta autenticado
                session_start();

                //Llenar el arreglo de la session
                $_SESSION['usuario'] = $usuario['email']; //>USO DE UNA SUPER GLOBAL
                $_SESSION['login'] = true;

                header('Location: /admin');

            }else {
                $errores[] = "El password es incorrecto";
            }

            /* var_dump($usuario); */
            /* var_dump($auth); */
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

// Incluye el header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesion</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-Mail</label>
            <input id="email" name="email" type="email" placeholder="Tu Email" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Tu Password" required>
        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>