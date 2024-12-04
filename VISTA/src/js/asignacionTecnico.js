class Redirigir {
    constructor(url) {
        this.url = url;
    }

    hacerRedireccion() {
        window.location.href = this.url;
    }
}

document.addEventListener('DOMContentLoaded', function() {

    const redirigirA1 = new Redirigir('/VISTA/src/complements/');
    const redirigirA2 = new Redirigir('/VISTA/src/complements/');

    const boton1 = document.getElementById('resumenEquipos');
    const boton2 = document.getElementById('equiposAsignados');

    boton1.addEventListener('click', function() {
        redirigirA1.hacerRedireccion();
    });

    boton2.addEventListener('click', function() {
        redirigirA2.hacerRedireccion();
    });

});
