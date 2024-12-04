class redireccion {
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
                boton.addEventListener('click', () => this.hacerRedireccion(url));
            }
        }
    }

    hacerRedireccion(url) {
        window.location.href = url;
    }
}

const botonesYUrls = {
    'resumenEquipos': '/VISTA/src/complements/',
    'equiposAsignados': '/VISTA/src/complements/'
};

new redireccion(botonesYUrls);
