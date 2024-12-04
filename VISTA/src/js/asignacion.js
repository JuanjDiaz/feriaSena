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
    const redirigirA2 = new Redirigir('/VISTA/src/complements/informes.html');
    const redirigirA3 = new Redirigir('/VISTA/src/complements/');
    const redirigirA4 = new Redirigir('/VISTA/src/complements/formulario.html');

    const boton1 = document.getElementById('resumenEquipos');
    const boton2 = document.getElementById('informes');
    const boton3 = document.getElementById('AsignacionTecnico');
    const boton4 = document.getElementById('registrarEqipo');

    boton1.addEventListener('click', function() {
        redirigirA1.hacerRedireccion();
    });

    boton2.addEventListener('click', function() {
        redirigirA2.hacerRedireccion();
    });

    boton3.addEventListener('click', function() {
        redirigirA3.hacerRedireccion();
    });

    boton4.addEventListener('click', function() {
        redirigirA4.hacerRedireccion();
    });

});
