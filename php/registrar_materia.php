<?php
include 'conexion.php';

// Validar que los datos fueron enviados
if (isset($_POST['nombre']) && isset($_POST['unidad']) && isset($_POST['cantidad'])) {
    $nombre = $_POST['nombre'];
    $unidad = $_POST['unidad'];
    $cantidad = floatval($_POST['cantidad']); // Aseguramos que sea número decimal

    // Insertar en la base de datos
    $sql = "INSERT INTO materia_prima (nombre, unidad_medida, cantidad_actual)
            VALUES ('$nombre', '$unidad', $cantidad)";

    if ($conn->query($sql) === TRUE) {
        echo "ok";
    } else {
        echo "Error al registrar: " . $conn->error;
    }
} else {
    echo "Faltan datos";
}

$conn->close();
?>
