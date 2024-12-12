<?php
include '../feriaSena/MODELO/conexionbd.php';

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['id'])) {
    $id = $input['id'];

    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["exito" => true]);
    } else {
        echo json_encode(["exito" => false, "mensaje" => $conexion->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["exito" => false, "mensaje" => "ID no proporcionado"]);
}

$conexion->close();
