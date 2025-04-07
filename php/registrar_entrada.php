<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $materia_id = $_POST["materia_id"];
    $cantidad = $_POST["cantidad"];

    // Validar datos
    if (!is_numeric($materia_id) || !is_numeric($cantidad)) {
        echo json_encode(["success" => false, "error" => "Datos inválidos."]);
        exit;
    }

    // Insertar en entradas_materia_prima
    $stmt = $conn->prepare("INSERT INTO entradas_materia_prima (materia_id, cantidad, fecha) VALUES (?, ?, NOW())");
    $stmt->bind_param("id", $materia_id, $cantidad);

    if ($stmt->execute()) {
        // Actualizar materia_prima
        $update = $conn->prepare("UPDATE materia_prima SET cantidad_actual = cantidad_actual + ? WHERE id = ?");
        $update->bind_param("di", $cantidad, $materia_id);
        $update->execute();

        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]); // Muestra error real
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "error" => "Método no permitido"]);
}
?>
