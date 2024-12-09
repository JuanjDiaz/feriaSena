class Redirigir {
    constructor(botonesUrls) {
        this.botonesYUrls = botonesUrls;
        this.asignarEventos();
    }

    asignarEventos() {
        for (const [botonId, url] of Object.entries(this.botonesYUrls)) {
            const boton = document.getElementById(botonId);
            if (boton) {
                boton.addEventListener('click', () => {
                    this.hacerRedireccion(url); 
                });
            }
        }
    }

    hacerRedireccion(url) {
        window.location.href = url; 
    }
}

const botonesUrls = {
    'resumenEquipos': '/VISTA/src/complements/',
    'informes': '/VISTA/src/complements/informes.html',
    'AsignacionTecnico': "/VISTA/src/complements/asignacionesTecnico.html",
    'registrarEqipo': '/VISTA/src/complements/formulario.html'
};

new Redirigir(botonesUrls);
