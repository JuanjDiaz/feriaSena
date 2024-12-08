document.addEventListener("DOMContentLoaded", () => {
  const tipoEquipoSelect = document.getElementById("tipoEquipo");
  const documentoInput = document.getElementById("documento");
  const idInput = document.getElementById("id");
  const fechaInicioInput = document.getElementById("fechaInicio");
  const fechaFinInput = document.getElementById("fechaFin");
  const generarInformeBtn = document.getElementById("generarInformeBtn");
  const descargarBtn = document.getElementById("descargarBtn");
  const tablaBody = document.querySelector("table tbody");

  function generarInforme() {
    const datosFiltrados = [
      {
        id: 123,
        equipo: tipoEquipoSelect.value,
        propietario: "Luis Fossi",
        tecnico: "Javier Gómez",
        fechaRecepcion: "2024-11-22",
        fechaEntrega: "2024-12-02",
        estado: "Entregado",
        procedimientos: "Mantenimiento",
      },
    ];
    tablaBody.innerHTML = "";
    datosFiltrados.forEach((dato) => {
      const fila = document.createElement("tr");
      fila.innerHTML = `
          <td>${dato.id}</td>
          <td>${dato.equipo}</td>
          <td>${dato.propietario}</td>
          <td>${dato.tecnico}</td>
          <td>${dato.fechaRecepcion}</td>
          <td>${dato.fechaEntrega}</td>
          <td>${dato.estado}</td>
          <td>${dato.procedimientos}</td>
        `;
      tablaBody.appendChild(fila);
    });
  }

  function descargarInforme() {
    const datosTabla = Array.from(tablaBody.rows).map((row) =>
      Array.from(row.cells).map((cell) => cell.textContent)
    );
    const encabezados = [
      "ID",
      "Equipo",
      "Propietario",
      "Técnico",
      "Recepción",
      "Entrega",
      "Estado",
      "Procedimientos",
    ];
    const contenidoCSV = [encabezados, ...datosTabla]
      .map((fila) => fila.join(","))
      .join("\n");
    const blob = new Blob([contenidoCSV], { type: "text/csv" });
    const enlace = document.createElement("a");
    enlace.href = URL.createObjectURL(blob);
    enlace.download = "informe.csv";
    enlace.click();
    URL.revokeObjectURL(enlace.href);
  }

  generarInformeBtn.addEventListener("click", generarInforme);
  descargarBtn.addEventListener("click", descargarInforme);
});
