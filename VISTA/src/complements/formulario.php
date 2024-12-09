<?php

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feria SENA</title>
        <link rel="icon" href="../assets/images/logosena.ico">
        <link rel="stylesheet" href="../assets/styles/StyleFormulario.css">
    </head>
    <body>
        <div class="background"></div>

        <header class="header">
            <div class="logo-container">
                <img src="../assets/images/logosena.ico" alt="Logo SENA">
                <h1>FERIA XXXXX</h1>
            </div>
            <div class="access">
                <div class="profile-icon">👤</div>
            </div>
        </header>

        <form action="../../../CONTROLADOR/controladorUsuario.php" method="post" id="miFormulario">
            <input type="hidden" name="file-origen" value="formulario">
            <h1 class="titulo">Formulario</h1>
            <div class="form-container">
                <!-- Parte izquierda -->
                <div class="izquierda">
                    <label for="nombreCompletoPropietario">Nombre Completo del Propietario:</label>
                    <input type="text" id="nombreCompletoPropietario" name="nombreCompletoPropietario" required>
                    
                    <label for="idPropietario">ID del Propietario:</label>
                    <input type="number" id="idPropietario" name="idPropietario" required>
                    
                    <label for="telefonoPropietario">Número de Telefono del Propietario:</label>
                    <input type="number" id="telefonoPropietario" name="telefonoPropietario" required>
                    
                    <label for="emailPropietario">E-mail del Propietario:</label>
                    <input type="email" id="emailPropietario" name="emailPropietario" required>
                </div>

                <!-- Parte derecha -->
                <div class="derecha">
                    <label for="tipoEquipo">Tipo de Equipo:</label>
                    <select id="tipoEquipo" name="tipoEquipo" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Portatil">Portátil</option>
                        <option value="Escritorio">Escritorio</option>
                        <option value="All in one">All In One</option>
                    </select>

                    <label for="procedimiento">Procedimiento a realizar:</label>
                    <select id="procedimiento" name="procedimiento" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Limpieza de equipos de computo">Limpieza de equipos de computo</option>
                        <option value="Formato e instalación de sistema operativo Windows y software requerido">Formato e instalación de sistema operativo Windows y software requerido</option>
                        <option value="Instalación y/o actualización de Software">Instalación y/o actualización de Software</option>
                        <option value="Diagnostico y/o reparación de Hardware">Diagnostico y/o reparación de Hardware</option>
                    </select>

                    <label for="nombreTecnico">Nombre del Tecnico a Asignar:</label>
                    <input type="text" id="nombreTecnico" name="nombreTecnico" required>

                    <label for="sede">Sede:</label>
                    <select id="sede" name="sede" class="selecciones" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Pescadero">Pescadero</option>
                        <option value="Comuneros">Comuneros</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                </div>
            </div>
            <button class="boton">Enviar</button>
            <h3>¡Gracias Por Contestar!</h3>
        </form>

        <script src="../js/formulario.js"></script>
    </body>
</html>
