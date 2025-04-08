<?php
include 'conexion.php';

$nombre_receta = $_POST['nombre_receta'];
$materia_prima_id = $_POST['materia_prima_id'];
$cantidad_por_unidad = $_POST['cantidad_por_unidad'];

// Insertar en recetas
$query = "INSERT INTO recetas (nombre_receta, materia_prima_id, cantidad_por_unidad) 
          VALUES ('$nombre_receta', '$materia_prima_id', '$cantidad_por_unidad')";
          
if ($conn->query($query) === TRUE) {
    echo "ok";
} else {
    echo "Error: " . $conn->error;
}
?>
