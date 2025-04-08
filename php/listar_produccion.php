<?php
include 'conexion.php';

$sql = "SELECT p.id, r.nombre AS receta, p.cantidad_producida, p.fecha
        FROM produccion p
        INNER JOIN recetas r ON p.receta_id = r.id
        ORDER BY p.fecha DESC";

$result = $conn->query($sql);

$produccion = [];

while ($row = $result->fetch_assoc()) {
    $produccion[] = [
        'id' => $row['id'],
        'receta' => $row['receta'],
        'cantidad_producida' => $row['cantidad_producida'],
        'fecha' => $row['fecha']
    ];
}

echo json_encode($produccion);
$conn->close();
