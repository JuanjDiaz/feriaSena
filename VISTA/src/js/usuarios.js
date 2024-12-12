document.addEventListener("DOMContentLoaded", function () {
  const tablaUsuariosBody = document.getElementById("tablaUsuariosBody");
  const agregarUsuarioBtn = document.getElementById("agregarUsuarioBtn");
  const modalModificarUsuario = new bootstrap.Modal(
    document.getElementById("modalModificarUsuario")
  );
  const guardarCambiosUsuarioBtn = document.getElementById(
    "guardarCambiosUsuarioBtn"
  );

  let usuarios = [];
  let usuarioId = 1;

  function renderUsuarios() {
    tablaUsuariosBody.innerHTML = "";
    usuarios.forEach((usuario) => {
      const fila = document.createElement("tr");
      fila.innerHTML = `
        <td>${usuario.id}</td>
        <td>${usuario.nombre}</td>
        <td>${usuario.email}</td>
        <td>${usuario.rol}</td>
        <td>
          <button class="btn btn-warning btn-sm modificarBtn" data-id="${usuario.id}">Modificar</button>
          <button class="btn btn-danger btn-sm eliminarBtn" data-id="${usuario.id}">Eliminar</button>
        </td>
      `;
      tablaUsuariosBody.appendChild(fila);
    });

    document
      .querySelectorAll(".modificarBtn")
      .forEach((btn) => btn.addEventListener("click", mostrarModalModificar));

    document
      .querySelectorAll(".eliminarBtn")
      .forEach((btn) => btn.addEventListener("click", eliminarUsuario));
  }

  function agregarUsuario() {
    const nombre = document.getElementById("nombreUsuario").value.trim();
    const email = document.getElementById("emailUsuario").value.trim();
    const contraseña = document
      .getElementById("contraseñaUsuario")
      .value.trim();
    const rol = document.getElementById("rolUsuario").value;

    if (!nombre || !email || !contraseña) {
      alert("Por favor, complete todos los campos.");
      return;
    }

    const nuevoUsuario = {
      id: usuarioId++,
      nombre,
      email,
      contraseña,
      rol,
    };

    usuarios.push(nuevoUsuario);
    renderUsuarios();
    document.getElementById("usuarioForm").reset();
  }

  function mostrarModalModificar(event) {
    const id = parseInt(event.target.dataset.id);
    const usuario = usuarios.find((u) => u.id === id);

    if (usuario) {
      document.getElementById("usuarioIdModificar").value = usuario.id;
      document.getElementById("nombreUsuarioModificar").value = usuario.nombre;
      document.getElementById("emailUsuarioModificar").value = usuario.email;
      document.getElementById("rolUsuarioModificar").value = usuario.rol;

      modalModificarUsuario.show();
    }
  }

  function guardarCambiosUsuario() {
    const id = parseInt(document.getElementById("usuarioIdModificar").value);
    const usuario = usuarios.find((u) => u.id === id);

    if (usuario) {
      const nuevoNombre = document
        .getElementById("nombreUsuarioModificar")
        .value.trim();
      const nuevoRol = document.getElementById("rolUsuarioModificar").value;

      if (!nuevoNombre || !nuevoRol) {
        alert("Por favor, complete todos los campos.");
        return;
      }

      usuario.nombre = nuevoNombre;
      usuario.rol = nuevoRol;

      renderUsuarios();
      modalModificarUsuario.hide();
    }
  }

  function eliminarUsuario(event) {
    const id = parseInt(event.target.dataset.id);
    usuarios = usuarios.filter((usuario) => usuario.id !== id);
    renderUsuarios();
  }

  agregarUsuarioBtn.addEventListener("click", agregarUsuario);
  guardarCambiosUsuarioBtn.addEventListener("click", guardarCambiosUsuario);
});
