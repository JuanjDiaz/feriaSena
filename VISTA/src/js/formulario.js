class Formulario {
    constructor() {
        this.nombreCompletoPropietario = null;
        this.idPropietario = null;
        this.telefonoPropietario = null;
        this.emailPropietario = null;
        this.tipoEquipo = null;
        this.procedimiento = null;
        this.nombreTecnico = null;
        this.estado = null;
        this.sede = null;
        this.botonEnviar = null;
    }
  
    agregarEventos() {
        this.nombreCompletoPropietario = document.getElementById("nombreCompletoPropietario");
        this.idPropietario = document.getElementById("idPropietario");
        this.telefonoPropietario = document.getElementById("telefonoPropietario");
        this.emailPropietario = document.getElementById("emailPropietario");
        this.tipoEquipo = document.getElementById("tipoEquipo");
        this.procedimiento = document.getElementById("procedimiento");
        this.nombreTecnico = document.getElementById("nombreTecnico");
        this.estado = document.getElementById("estado");
        this.sede = document.getElementById("sede");
        this.botonEnviar = document.querySelector(".boton");
  
        this.botonEnviar.addEventListener("click", (event) => {
            event.preventDefault();
            this.tomarDatos();
        });

        this.nombreCompletoPropietario.addEventListener("input", () => {
            this.validarNombreCompleto(this.nombreCompletoPropietario.value);
        });

        this.idPropietario.addEventListener("input", () => {
            this.validarIdPropietario(this.idPropietario.value);
        });

        this.telefonoPropietario.addEventListener("input", () => {
            this.validarTelefono(this.telefonoPropietario.value);
        });

        this.emailPropietario.addEventListener("input", () => {
            this.validarEmail(this.emailPropietario.value);
        });

        this.tipoEquipo.addEventListener("change", () => {
            this.validarTipoEquipo(this.tipoEquipo.value);
        });

        this.procedimiento.addEventListener("change", () => {
            this.validarProcedimiento(this.procedimiento.value);
        });

        this.nombreTecnico.addEventListener("input", () => {
            this.validarNombreTecnico(this.nombreTecnico.value);
        });

        this.estado.addEventListener("change", () => {
            this.validarEstado(this.estado.value);
        });

        this.sede.addEventListener("change", () => {
            this.validarSede(this.sede.value);
        });
    }

    tomarDatos() {
        const nombreCompleto = this.nombreCompletoPropietario.value.trim();
        const idPropietario = this.idPropietario.value.trim();
        const telefonoPropietario = this.telefonoPropietario.value.trim();
        const emailPropietario = this.emailPropietario.value.trim();
        const tipoEquipo = this.tipoEquipo.value.trim();
        const procedimiento = this.procedimiento.value.trim();
        const nombreTecnico = this.nombreTecnico.value.trim();
        const estado = this.estado.value.trim();
        const sede = this.sede.value.trim();
        
        this.validarNombreCompleto(nombreCompleto);
        this.validarIdPropietario(idPropietario);
        this.validarTelefono(telefonoPropietario);
        this.validarEmail(emailPropietario);
        this.validarTipoEquipo(tipoEquipo);
        this.validarProcedimiento(procedimiento);
        this.validarNombreTecnico(nombreTecnico);
        this.validarEstado(estado);
        this.validarSede(sede);

        if (!this.hayErrores()) {
            alert("Formulario enviado con éxito.");
            // Aquí se puede realizar la acción de enviar el formulario, o hacer la redirección.
        }
    }

    hayErrores() {
        return document.querySelectorAll(".error-message").length > 0;
    }

    eliminarError(idDiv) {
        const contenedor = document.getElementById(idDiv);
        const mensajesPrevios = contenedor.querySelectorAll(".error-message");
        mensajesPrevios.forEach((mensaje) => mensaje.remove());
    }

    mostrarError(idDiv, mensaje) {
        const contenedor = document.getElementById(idDiv);
        const mensajeError = document.createElement("p");
        mensajeError.classList.add("error-message");
        mensajeError.textContent = mensaje;
        contenedor.appendChild(mensajeError);
    }

    validarNombreCompleto(nombre) {
        this.eliminarError("nombreCompletoPropietario-div");
        if (nombre === "") {
            this.mostrarError("nombreCompletoPropietario-div", "El nombre completo no puede estar vacío.");
        }
    }

    validarIdPropietario(id) {
        this.eliminarError("idPropietario-div");
        if (id === "") {
            this.mostrarError("idPropietario-div", "El ID del propietario es obligatorio.");
        }
    }

    validarTelefono(telefono) {
        this.eliminarError("telefonoPropietario-div");
        if (telefono === "") {
            this.mostrarError("telefonoPropietario-div", "El número de teléfono es obligatorio.");
        }
    }

    validarEmail(email) {
        this.eliminarError("emailPropietario-div");
        const emailPattern = /\S+@\S+\.\S+/;
        if (email === "") {
            this.mostrarError("emailPropietario-div", "El correo electrónico no puede estar vacío.");
        } else if (!emailPattern.test(email)) {
            this.mostrarError("emailPropietario-div", "El correo electrónico no es válido.");
        }
    }

    validarTipoEquipo(tipo) {
        this.eliminarError("tipoEquipo-div");
        if (tipo === "") {
            this.mostrarError("tipoEquipo-div", "Debe seleccionar un tipo de equipo.");
        }
    }

    validarProcedimiento(procedimiento) {
        this.eliminarError("procedimiento-div");
        if (procedimiento === "") {
            this.mostrarError("procedimiento-div", "Debe seleccionar un procedimiento.");
        }
    }

    validarNombreTecnico(nombre) {
        this.eliminarError("nombreTecnico-div");
        if (nombre === "") {
            this.mostrarError("nombreTecnico-div", "El nombre del técnico es obligatorio.");
        }
    }

    validarEstado(estado) {
        this.eliminarError("estado-div");
        if (estado === "") {
            this.mostrarError("estado-div", "Debe seleccionar un estado para el técnico.");
        }
    }

    validarSede(sede) {
        this.eliminarError("sede-div");
        if (sede === "") {
            this.mostrarError("sede-div", "Debe seleccionar una sede.");
        }
    }
}

const formulario = new Formulario();
formulario.agregarEventos();
