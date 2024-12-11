class Informes {
  constructor() {
    this.tipoEquipoSelect = document.getElementById("tipoEquipo");
    this.documentoInput = document.getElementById("documento");
    this.idInput = document.getElementById("id");
    this.fechaInicioInput = document.getElementById("fechaInicio");
    this.fechaFinInput = document.getElementById("fechaFin");
    this.generarInformeBtn = document.getElementById("generarInformeBtn");
    this.descargarBtn = document.getElementById("descargarBtn");
    this.tablaBody = document.querySelector("table tbody");

    this.initEventListeners();
  }

  initEventListeners() {
    this.generarInformeBtn.addEventListener("click", () =>
      this.generarInforme()
    );
    this.descargarBtn.addEventListener("click", () => this.descargarInforme());
  }

  generarInforme() {
    const datosFiltrados = [
      {
        id: 123,
        equipo: this.tipoEquipoSelect.value,
        propietario: "Luis Fossi",
        tecnico: "Javier Gómez",
        fechaRecepcion: "2024-11-22",
        fechaEntrega: "2024-12-02",
        estado: "Entregado",
        procedimientos: "Mantenimiento",
      },
    ];

    this.tablaBody.innerHTML = "";
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
      this.tablaBody.appendChild(fila);
    });
  }

  descargarInforme() {
    const datosTabla = Array.from(this.tablaBody.rows).map((row) =>
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
}

// Inicializar la clase cuando el DOM esté cargado
document.addEventListener("DOMContentLoaded", () => {
  new Informes();
});
