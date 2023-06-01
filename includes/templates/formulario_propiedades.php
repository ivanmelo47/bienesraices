<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo</label>
<<<<<<< HEAD
    <input type="text" 
            id="titulo" 
            name="titulo" 
            placeholder="Titulo Propiedad" 
            value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" 
            id="precio" 
            name="precio" 
            placeholder="Precio Propiedad" 
            value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" 
            id="imagen" 
            accept="image/jpeg, image/png"
            name="imagen">
            <?php if ($propiedad->imagen): ?>
                <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small" alt="Imagen de la propiedad">
            <?php endif; ?>

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
    
=======
    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>

>>>>>>> d93a9d0de689121d67b4fe4af29b57b450f9b3fc
</fieldset>

<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
<<<<<<< HEAD
    <input type="number" 
            id="habitaciones" 
            name="habitaciones" 
            placeholder="Numero de habitaciones" 
            min="1" max="9" 
            value="<?php echo s($propiedad->habitaciones); ?>">
    <label for="wc">Baños:</label>
    <input type="number" 
            id="wc" name="wc" 
            placeholder="Numero de baños" 
            min="1" 
            max="9" 
            value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamientos:</label>
    <input type="number" 
            id="estacionamiento" 
            name="estacionamiento" 
            placeholder="Numero de estacionamientos" 
            min="1" 
            max="9" 
            value="<?php echo s($propiedad->estacionamiento); ?>">
=======
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Numero de habitaciones" min="1" max="9" value="<?php echo s($propiedad->habitaciones); ?>">
    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Numero de baños" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamientos:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Numero de estacionamientos" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">
>>>>>>> d93a9d0de689121d67b4fe4af29b57b450f9b3fc
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
</fieldset>