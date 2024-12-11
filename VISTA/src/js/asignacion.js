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

document.addEventListener('DOMContentLoaded', () => {
    const botonesUrls = {
        'informes': '../complements/informes.html',
        'AsignacionTecnico': "../complements/asignacionesTecnico.html",
        'registrarEqipo': '../complements/formulario.php'
    };
    
    new Redirigir(botonesUrls);
});

new Redirigir(botonesUrls);