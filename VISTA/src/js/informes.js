document
  .getElementById("generarInformeBtn")
  .addEventListener("click", function () {
    const form = document.getElementById("informeForm");
    const formData = new FormData(form);

    // Validar si algún campo está vacío
    const inputs = Array.from(form.querySelectorAll("input, select"));
    const camposVacios = inputs.filter(
      (input) => input.value.trim() === "" && input.hasAttribute("name")
    );

    if (camposVacios.length > 0) {
      alert(
        "Por favor, complete todos los campos antes de generar el informe."
      );
      return;
    }

    fetch("", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        const tablaBody = document.getElementById("tablaBody");
        tablaBody.innerHTML = "";

        data.forEach((dato) => {
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
      });
  });

document.getElementById("descargarBtn").addEventListener("click", function () {
  const rows = Array.from(document.querySelectorAll("#tablaBody tr"));
  if (rows.length === 0) {
    alert("No hay datos para descargar.");
    return;
  }

  let csvContent =
    "ID,Equipo,Propietario,Técnico asignado,Fecha de recepción,Fecha de entrega,Estado,Procedimientos realizados\n";

  rows.forEach((row) => {
    const cells = Array.from(row.children).map((cell) => cell.textContent);
    csvContent += cells.join(",") + "\n";
  });

  const blob = new Blob([csvContent], { type: "text/csv" });
  const url = URL.createObjectURL(blob);

  const a = document.createElement("a");
  a.href = url;
  a.download = "informe.csv";
  a.click();
  URL.revokeObjectURL(url);
});
