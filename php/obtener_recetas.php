<?php
include 'conexion.php';

$sql = "SELECT id, nombre FROM recetas";
$result = $conn->query($sql);

$recetas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recetas[] = $row;
    }
}

echo json_encode($recetas);

$conn->close();
?>
