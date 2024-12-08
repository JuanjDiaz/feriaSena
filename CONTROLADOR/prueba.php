<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    echo "Usuario: $usuario, Contraseña: $contraseña";
} else {
    // Si el método no es POST
    http_response_code(405); // Devuelve un error 405
    echo "Método no permitido";
}
?>
