document.addEventListener('DOMContentLoaded', function () {
    eventListener();

    darkMode();
});

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change' ,function(){
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkmode = document.querySelector('.dark-mode-boton');

    botonDarkmode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListener() {
    const mobilMenu = document.querySelector('.mobile-menu');

    mobilMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    /* if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    } */ /* Todo este codigo se puede resumir con la siguiente linea */
    navegacion.classList.toggle('mostrar');
}