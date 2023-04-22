document.addEventListener('DOMContentLoaded', function () {
    eventListener();
});

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