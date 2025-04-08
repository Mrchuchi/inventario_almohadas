<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conexion.php';

$sql = "SELECT 
            r.id,
            r.nombre AS nombre_receta,
            mp.nombre AS nombre_materia_prima,
            rd.cantidad_por_unidad
        FROM recetas r
        JOIN receta_detalles rd ON r.id = rd.receta_id
        JOIN materia_prima mp ON rd.materia_prima_id = mp.id";

$resultado = $conn->query($sql);

$recetas = [];

while ($fila = $resultado->fetch_assoc()) {
    $recetas[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($recetas);
