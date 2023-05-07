<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
                <source srcset="build/img/destacada3.webp" type="image/webp">
                <source srcset="build/img/destacada3.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture> <!-- Imagen de la pagina de contacto -->

        <h2>Llene el formulario de contacto</h2>
        <form class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu Nombre">

                <label for="email">E-Mail</label>
                <input id="email" type="email" placeholder="Tu Email">

                <label for="telefono">Telefono</label>
                <input id="telefono" type="tel" placeholder="Tu Telefono">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input id="presupuesto" type="number" placeholder="Tu Precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">E-Mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si elige telefono, elija la fecha y la hora para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input id="fecha" type="date">

                <label for="hora">Hora</label>
                <input id="hora" type="time" min="09:00" max="18:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form><!-- Formulario de contacto -->
    </main>

<?php
    incluirTemplate('footer');
?>