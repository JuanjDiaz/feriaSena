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
        <form action='../../../CONTROLADOR/controladorUsuario.php' method='post' class='panel-form'>
            <input type='hidden' name='file-origen' value='home-informes'>
            <button type='submit' class='panel-button'>Informes</button>
        </form>
        <form action='../../../CONTROLADOR/controladorUsuario.php' method='post' class='panel-form'>
            <input type='hidden' name='file-origen' value='home-formulario'>
            <button type='submit' class='panel-button'>Formulario</button>
        </form>
        <form action='../../../CONTROLADOR/controladorUsuario.php' method='post' class='panel-form'>
            <input type='hidden' name='file-origen' value='home-asignaciones'>
            <button type='submit' class='panel-button'>Asignaciones</button>
        </form>";
}elseif ($rolUsuario==="Auxiliar"){
    $botones = "
        <form action='../../../CONTROLADOR/controladorUsuario.php' method='post' class='panel-form'>
            <input type='hidden' name='file-origen' value='home-formulario'>
            <button type='submit' class='panel-button'>Formulario</button>
        </form>";
}elseif ($rolUsuario==="Tecnico"){
    $botones = "
        <form action='../../../CONTROLADOR/controladorUsuario.php' method='post' class='panel-form'>
            <input type='hidden' name='file-origen' value='home-asignaciones'>
            <button type='submit' class='panel-button'>Asignaciones</button>
        </form>";
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
</body>
</html>