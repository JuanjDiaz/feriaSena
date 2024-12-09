class InicioSesion {
    constructor() {
        this.usuario = null;
        this.contraseña = null;
        this.inputContraseña = null;
        this.inputUsuario = null;
    }
  
    agregarEventos() {
        this.inputUsuario = document.getElementById("user-input");
        this.inputContraseña = document.getElementById("password-input");

        this.inputUsuario.addEventListener("input", () => {
            this.usuario = this.inputUsuario.value.trim();
            this.validarUsuario(this.usuario);
        });

        this.inputContraseña.addEventListener("input", () => {
            this.contraseña = this.inputContraseña.value.trim();
            this.validarContraseña(this.contraseña);
        });

        form.addEventListener("submit", (event) => {
        if (hayErrores()) {
            event.preventDefault(); // Esto bloquea el envío si hay errores
            alert("Por favor, corrige los errores antes de continuar.");
        }
        });
    
    }
  
    hayErrores() {
        return document.querySelectorAll(".error-message").length > 0;
    }
  
    validarUsuario(usuario) {
        this.eliminarError("user-div");
  
        if (usuario === "") {
            this.mostrarError("user-div", "El campo usuario no puede estar vacío.");
        } else if (!/\S+@\S+\.\S+/.test(usuario)) {
            this.mostrarError("user-div", "El usuario ingresado no es válido.");
        }
    }
  
    validarContraseña(contraseña) {
        this.eliminarError("password-div");
  
        if (contraseña === "") {
            this.mostrarError("password-div", "El campo contraseña no puede estar vacío.");
        } else if (contraseña.length < 6) {
            this.mostrarError("password-div", "La contraseña debe tener al menos 6 caracteres.");
        }
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
  }
  
const inicioSesion = new InicioSesion();
inicioSesion.agregarEventos();
  