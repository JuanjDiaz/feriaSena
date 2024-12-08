<?php
session_start();

if (!isset($_SESSION["Nombre"]) || !isset($_SESSION["Rol"])) {
    // Si no hay datos de sesión, redirigir al login
    header("Location: login.html");
    exit();
}

$nombreUsuario = $_SESSION["Nombre"];
$rolUsuario= $_SESSION["Rol"];
$botones="";

if ($rolUsuario==="Administrador"){
    $botones= "
        <a href='./informes.html' class='panel-button'>Informe</a>
        <a href='./formulario.php' class='panel-button'>Formulario</a>
        <a href='./asignacionesTecnico.html' class='panel-button'>Asignaciones</a>";
}elseif ($rolUsuario==="Auxiliar"){
    $botones = "
        <a href='./formulario.php' class='panel-button'>Formulario</a>";
}elseif ($rolUsuario==="Tecnico"){
    $botones = "
        <a href='./asignacionesTecnico.html' class='panel-button'>Asignaciones</a>";
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feria SENA</title>
    <link rel="icon" href="../assets/images/logosena.ico">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Enlace a Material Icons -->
    <style>
        /* Añadir estilos generales para centrar contenido */
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .text-section {
            max-width: 600px;
        }

        .button-container {
            margin-top: 20px;
        }

        .panel-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .panel-button:hover {
            background-color: darkgreen;
        }

        /* Estilos del header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container img {
            margin-right: 10px;
        }

        /* Estilos para los íconos en el header */
        .custom-nav {
            display: flex;
            align-items: center;
            font-size: 30px;
            gap: 20px;
        }

        .custom-nav span, .custom-nav i {
            cursor: pointer;
            transition: transform 0.3s, color 0.3s;
        }

        .custom-nav span:hover, .custom-nav i:hover {
            transform: scale(1.2);
            color: rgb(15, 180, 15);
        }

        /* Estilo para el nombre de usuario y foto */
        .profile-container {
            display: flex;
            align-items: center;
        }

        .profile-container img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-container span {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Imagen de fondo -->
    <div class="background"></div>

    <header class="header">
        <div class="logo-container">
            <h1>FERIA XXXXX</h1>
        </div>
        <nav class="custom-nav">
            <!-- Botón Home (casita) -->
            <span class="material-icons">home</span>
            <!-- Botón Settings (tuerca) -->
            <span class="material-icons">settings</span>
            <!-- Botón Perfil con foto y nombre dinámico -->
            <div class="profile-container">
                <span id="username"><?php echo $nombreUsuario; ?></span> <!-- Nombre del usuario dinámico -->
            </div>
            <!-- Botón de Persona (perfil) -->
            <i class="material-icons">person</i>
        </nav>
    </header>

    <main class="main-content">
        <div class="text-section">
            <h2>¡Bienvenido <span id="welcomeName"><?php echo $nombreUsuario; ?></span>, listo para optimizar y liberar manos a la obra!</h2>
            <div class="button-container">
                    <?php echo $botones; ?>
            </div>
        </div>
    </main>

    <!-- <script>
        // Simulación de un usuario logueado
        var nombreUsuario = "Henry"; // Aquí deberías obtener el nombre real del usuario desde tu sistema

        // Asignar el nombre dinámicamente
        document.getElementById("username").textContent = nombreUsuario;
        document.getElementById("welcomeName").textContent = nombreUsuario;
    </script> -->

    <script src="/VISTA/src/js/login.js"></script>
</body>
</html>
