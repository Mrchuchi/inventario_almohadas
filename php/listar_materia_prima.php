<?php
require 'conexion.php';

$sql = "SELECT id, nombre, unidad_medida, cantidad_actual, fecha_registro FROM materia_prima ORDER BY id DESC";
$resultado = $conn->query($sql);

$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($datos);
?>
