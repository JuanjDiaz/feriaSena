document.addEventListener("DOMContentLoaded", function () {
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
            this.sede = document.getElementById("sede");
            this.botonEnviar = document.querySelector(".boton");

            if (this.botonEnviar) {
                this.botonEnviar.addEventListener("click", (event) => {
                    event.preventDefault();
                    this.tomarDatos();
                });
            }

            if (this.nombreCompletoPropietario) {
                this.nombreCompletoPropietario.addEventListener("input", () => {
                    this.validarNombreCompleto(this.nombreCompletoPropietario.value);
                });
            }

            if (this.idPropietario) {
                this.idPropietario.addEventListener("input", () => {
                    this.validarIdPropietario(this.idPropietario.value);
                });
            }

            if (this.telefonoPropietario) {
                this.telefonoPropietario.addEventListener("input", () => {
                    this.validarTelefono(this.telefonoPropietario.value);
                });
            }

            if (this.emailPropietario) {
                this.emailPropietario.addEventListener("input", () => {
                    this.validarEmail(this.emailPropietario.value);
                });
            }

            if (this.tipoEquipo) {
                this.tipoEquipo.addEventListener("change", () => {
                    this.validarTipoEquipo(this.tipoEquipo.value);
                });
            }

            if (this.procedimiento) {
                this.procedimiento.addEventListener("change", () => {
                    this.validarProcedimiento(this.procedimiento.value);
                });
            }

            if (this.nombreTecnico) {
                this.nombreTecnico.addEventListener("input", () => {
                    this.validarNombreTecnico(this.nombreTecnico.value);
                });
            }

            if (this.sede) {
                this.sede.addEventListener("change", () => {
                    this.validarSede(this.sede.value);
                });
            }
        }

        tomarDatos() {
            const nombreCompleto = this.nombreCompletoPropietario ? this.nombreCompletoPropietario.value.trim() : '';
            const idPropietario = this.idPropietario ? this.idPropietario.value.trim() : '';
            const telefonoPropietario = this.telefonoPropietario ? this.telefonoPropietario.value.trim() : '';
            const emailPropietario = this.emailPropietario ? this.emailPropietario.value.trim() : '';
            const tipoEquipo = this.tipoEquipo ? this.tipoEquipo.value.trim() : '';
            const procedimiento = this.procedimiento ? this.procedimiento.value.trim() : '';
            const nombreTecnico = this.nombreTecnico ? this.nombreTecnico.value.trim() : '';
            const estado = this.estado ? this.estado.value.trim() : '';
            const sede = this.sede ? this.sede.value.trim() : '';

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
                document.getElementById("miFormulario").submit();
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
            this.eliminarError("nombreCompletoPropietario");
            if (nombre === "") {
                this.mostrarError("nombreCompletoPropietario", "El nombre completo no puede estar vacío.");
            }
        }

        validarIdPropietario(id) {
            this.eliminarError("idPropietario");
            if (id === "") {
                this.mostrarError("idPropietario", "El ID del propietario es obligatorio.");
            }
        }

        validarTelefono(telefono) {
            this.eliminarError("telefonoPropietario");
            if (telefono === "") {
                this.mostrarError("telefonoPropietario", "El número de teléfono es obligatorio.");
            }
        }

        validarEmail(email) {
            this.eliminarError("emailPropietario");
            const emailPattern = /\S+@\S+\.\S+/;
            if (email === "") {
                this.mostrarError("emailPropietario", "El correo electrónico no puede estar vacío.");
            } else if (!emailPattern.test(email)) {
                this.mostrarError("emailPropietario", "El correo electrónico no es válido.");
            }
        }

        validarTipoEquipo(tipo) {
            this.eliminarError("tipoEquipo");
            if (tipo === "") {
                this.mostrarError("tipoEquipo", "Debe seleccionar un tipo de equipo.");
            }
        }

        validarProcedimiento(procedimiento) {
            this.eliminarError("procedimiento");
            if (procedimiento === "") {
                this.mostrarError("procedimiento", "Debe seleccionar un procedimiento.");
            }
        }

        validarNombreTecnico(nombre) {
            this.eliminarError("nombreTecnico");
            if (nombre === "") {
                this.mostrarError("nombreTecnico", "El nombre del técnico es obligatorio.");
            }
        }

        validarEstado(estado) {
            this.eliminarError("estado");
            if (estado === "") {
                this.mostrarError("estado", "Debe seleccionar un estado para el técnico.");
            }
        }

        validarSede(sede) {
            this.eliminarError("sede");
            if (sede === "") {
                this.mostrarError("sede", "Debe seleccionar una sede.");
            }
        }
    }

    const formulario = new Formulario();
    formulario.agregarEventos();
});