<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Simulación de datos filtrados para el informe
  $tipoEquipo = $_POST['tipoEquipo'] ?? '';
  $documento = $_POST['documento'] ?? '';
  $id = $_POST['id'] ?? '';
  $fechaInicio = $_POST['fechaInicio'] ?? '';
  $fechaFin = $_POST['fechaFin'] ?? '';

  $datosFiltrados = [
    [
      'id' => 123,
      'equipo' => $tipoEquipo,
      'propietario' => 'Luis Fossi',
      'tecnico' => 'Javier Gómez',
      'fechaRecepcion' => '2024-11-22',
      'fechaEntrega' => '2024-12-02',
      'estado' => 'Entregado',
      'procedimientos' => 'Mantenimiento',
    ],
  ];

  header('Content-Type: application/json');
  echo json_encode($datosFiltrados);
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../assets/styles/informes.css">
</head>

<body class="body">
  <header class="custom-header">
    <div class="logo">
      <img src="../assets/images/sena.jpg" alt="Logo SENA" class="custom-logo">
    </div>
    <div>
      <h1 class="m-0">TECNOSERVIFERIA 2024</h1>
    </div>
    <nav class="custom-nav">
      <span class="material-icons">home</span>
      <span class="username">Name</span>
      <i class="material-icons">person</i>
    </nav>
  </header>

  <div class="d-flex">
    <aside class="sidebar">
      <ul>
        <div class="li">
          <li><a href="#">Informes</a></li>
        </div>
        <div class="li">
          <li><a href="#">Asignación de técnicos</a></li>
        </div>
        <div class="li">
          <li><a href="#">Registrar equipos</a></li>
        </div>
      </ul>
    </aside>

    <main class="content">
      <h2>Consultar informes</h2>
      <div class="filters">
        <form id="informeForm" class="row g-3">
          <div class="col-md-6">
            <label for="tipoEquipo" class="form-label">Tipo de equipo</label>
            <select id="tipoEquipo" name="tipoEquipo" class="form-select">
              <option selected>Tipo Equipo</option>
              <option>Portátil</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="documento" class="form-label">Nombre del tecnico
            </label>
            <select id="documento" name="documento" class="form-select">
              <option selected> Tecnico </option>
              <option> dayana </option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="id" class="form-label">ID</label>
            <input type="text" id="id" name="id" class="form-control" placeholder="Ingrese el ID del equipo">
          </div>
          <div class="col-md-6">
            <label for="fechaInicio" class="form-label">Fecha de inicio</label>
            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="fechaFin" class="form-label">Fecha de fin</label>
            <input type="date" id="fechaFin" name="fechaFin" class="form-control">
          </div>
          <button type="button" id="generarInformeBtn" class="btn btn-success mt-3">Generar informe</button>
        </form>
      </div>

      <table class="table mt-4">
        <thead class="table-success">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Equipo</th>
            <th scope="col">Propietario</th>
            <th scope="col">Técnico asignado</th>
            <th scope="col">Fecha de recepción</th>
            <th scope="col">Fecha de entrega</th>
            <th scope="col">Estado</th>
            <th scope="col">Procedimientos realizados</th>
          </tr>
        </thead>
        <tbody id="tablaBody"></tbody>
      </table>

      <button id="descargarBtn" class="btn btn-success">Descargar</button>
    </main>
  </div>

  <script src="../js/informes.js"></script>

</body>

</html>