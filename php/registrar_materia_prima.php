<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $unidad = $_POST['unidad'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $proveedor = $_POST['proveedor'] ?? '';

    // Validación simple
    if ($nombre && $tipo && $unidad && $cantidad && $proveedor) {
        $stmt = $conn->prepare("INSERT INTO materia_prima (nombre, tipo, unidad, cantidad, proveedor) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $nombre, $tipo, $unidad, $cantidad, $proveedor);

        if ($stmt->execute()) {
            echo "ok";
        } else {
            echo "Error al guardar en la base de datos.";
        }

        $stmt->close();
    } else {
        echo "Faltan datos del formulario.";
    }

    $conn->close();
} else {
    echo "Acceso no permitido.";
}
