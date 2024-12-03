class InicioSesion {
    constructor() {
        this.usuario = null;
        this.contraseña = null;
        this.inputContraseña = null;
        this.inputUsuario = null;
        this.botonIniciar = null;
        this.linkRegistro = null;
    }
  
    agregarEventos() {
      this.inputUsuario = document.getElementById("user-input");
      this.inputContraseña = document.getElementById("password-input");
      this.botonIniciar = document.getElementById("login-button");
      this.linkRegistro = document.getElementById("signup-link");
  
      this.botonIniciar.addEventListener("click", (event) => {
          event.preventDefault();  
          this.tomarDatos();
      });
  
      this.linkRegistro.addEventListener("click", (evento) => {
          evento.preventDefault();
          this.mostrarVistaRegistro();  
      });
  
      this.inputUsuario.addEventListener("input", () => {
          this.usuario = this.inputUsuario.value.trim();
          this.validarUsuario(this.usuario);
      });
  
      this.inputContraseña.addEventListener("input", () => {
          this.contraseña = this.inputContraseña.value.trim();
          this.validarContraseña(this.contraseña);
      });
  
      this.inputUsuario.addEventListener("blur", () => {
          this.usuario = this.inputUsuario.value.trim();
          this.validarUsuario(this.usuario);
      });
  
      this.inputContraseña.addEventListener("blur", () => {
          this.contraseña = this.inputContraseña.value.trim();
          this.validarContraseña(this.contraseña);
      });
    }
  
    tomarDatos() {
        this.usuario = this.inputUsuario.value.trim();
        this.contraseña = this.inputContraseña.value.trim();
        this.validarUsuario(this.usuario);
        this.validarContraseña(this.contraseña);
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
    /*
    mostrarVistaRegistro() {
        document.getElementById("divInicioSesion").classList.remove("active");
        document.getElementById("divRegistroUsuario").classList.add("active");
    }
    */
  }
  
  const inicioSesion = new InicioSesion();
  inicioSesion.agregarEventos();
  