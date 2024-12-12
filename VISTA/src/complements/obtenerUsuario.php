<?php
include '../feriaSena/MODELO/conexionbd.php';

$sql = "SELECT id, nombre, email, rol FROM usuarios";
$resultado = $conexion->query($sql);

$usuarios = [];
while ($fila = $resultado->fetch_assoc()) {
    $usuarios[] = $fila;
}

echo json_encode($usuarios);

$conexion->close();
