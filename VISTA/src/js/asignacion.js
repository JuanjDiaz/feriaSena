class Redirigir {
    constructor(url) {
        this.url = url;
    }

    hacerRedireccion() {
        window.location.href = this.url;
    }
}

class GestorRedirecciones {
    constructor(botonesYUrls) {
        this.botonesYUrls = botonesYUrls;
        this.iniciar();
    }

    iniciar() {
        document.addEventListener('DOMContentLoaded', () => {
            this.asignarEventos();
        });
    }

    asignarEventos() {
        for (const [botonId, url] of Object.entries(this.botonesYUrls)) {
            const boton = document.getElementById(botonId);
            if (boton) {
                boton.addEventListener('click', () => {
                    const redirigir = new Redirigir(url); 
                    redirigir.hacerRedireccion(); 
                });
            }
        }
    }
}

const botonesYUrls = {
    'resumenEquipos': '/VISTA/src/complements/',
    'informes': '/VISTA/src/complements/informes.html',
    'AsignacionTecnico': '/VISTA/src/complements/',
    'registrarEqipo': '/VISTA/src/complements/formulario.html'
};

new GestorRedirecciones(botonesYUrls);
