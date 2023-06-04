<?php
    require '../includes/app.php';

    // Restriccon de usuario por inicio de sesion
    estaAuntenticado();

    // Importa las clases
    use App\Propiedad;
    use App\Vendedor;

    // Implementar metodo para obtener propiedades
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validar id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $tipo = $_POST['tipo'];

            if (validarTipoContenido($tipo)) {
                // Compara lo que vamos a eliminar
                if ($tipo === 'vendedor') {
                    $vendedor = Vendedor::find($id);
                    //Eliminar la propiedad
                    $vendedor->eliminar();
                }elseif ($tipo === 'propiedad') {
                    $propiedad = Propiedad::find($id);
                    //Eliminar la propiedad
                    $propiedad->eliminar();
                }
            }
        }
    }
    
    // Incluye template
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        
        <?php 
            $mensaje = mostrarNotificacion( intval($resultado) );
            if ($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-verde">Nueva(o) Vendedor</a>

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--. Mostrar los resultados -->
            <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td class="td-imagen"><img src="/imagenes/propiedades/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td class="botones-tabla">
                        <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--. Mostrar los resultados -->
            <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td class="botones-tabla">
                        <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </main>

<?php
    incluirTemplate('footer');
?>