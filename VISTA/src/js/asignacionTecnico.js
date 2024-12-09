class redireccion {
    constructor(botonesYUrls) {
        this.botonesUrls = botonesUrls;
        this.iniciar();
    }

    iniciar() {
        document.addEventListener('DOMContentLoaded', () => {
            this.asignarEventos();
        });
    }

    asignarEventos() {
        for (const [botonId, url] of Object.entries(this.botonesUrls)) {
            const boton = document.getElementById(botonId);
            if (boton) {
                boton.addEventListener('click', () => this.hacerRedireccion(url));
            }
        }
    }

    hacerRedireccion(url) {
        window.location.href = url;
    }
}

const botonesUrls = {
    'resumenEquipos': '/VISTA/src/complements/',
    'equiposAsignados': "/VISTA/src/complements/asignacionesTecnico.html"
};

new redireccion(botonesUrls);
