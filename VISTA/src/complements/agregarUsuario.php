
<?php
include '../feriaSena/MODELO/conexionbd.php';

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['nombre'], $input['email'], $input['contraseña'], $input['rol'])) {
    $nombre = $input['nombre'];
    $email = $input['email'];
    $contraseña = password_hash($input['contraseña'], PASSWORD_BCRYPT); // Encriptar contraseña
    $rol = $input['rol'];

    $sql = "INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $contraseña, $rol);

    if ($stmt->execute()) {
        echo json_encode(["exito" => true]);
    } else {
        echo json_encode(["exito" => false, "mensaje" => $conexion->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["exito" => false, "mensaje" => "Datos incompletos"]);
}

$conexion->close();
?>
