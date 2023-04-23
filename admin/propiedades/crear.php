<?php
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <form action="" class="formulario">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad">

            <label for="precio">Precio</label>
            <input type="number" id="precio" placeholder="Precio Propiedad">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion"></textarea>
            
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Numero de habitaciones" min="1" max="9">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Numero de baños" min="1" max="9">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id="estacionamiento" placeholder="Numero de estacionamientos" min="1" max="9">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="1">Juan</option>
                <option value="1">Maria</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
    </main>

<?php
    incluirTemplate('footer');
?>