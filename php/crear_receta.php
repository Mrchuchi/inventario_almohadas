<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$materia_prima_id = $_POST['materia_prima_id'];
$cantidad_por_unidad = $_POST['cantidad_por_unidad'];

// Insertar en recetas (solo el nombre)
$query = "INSERT INTO recetas (nombre) VALUES ('$nombre')";
          
if ($conn->query($query) === TRUE) {
    $receta_id = $conn->insert_id;
    
    // Insertar en receta_detalles
    $query_detalle = "INSERT INTO receta_detalles (receta_id, materia_prima_id, cantidad_por_unidad)
                      VALUES ('$receta_id', '$materia_prima_id', '$cantidad_por_unidad')";
    
    if ($conn->query($query_detalle) === TRUE) {
        echo "ok";
    } else {
        echo "Error al crear detalle: " . $conn->error;
    }
} else {
    echo "Error al crear receta: " . $conn->error;
}
?>
