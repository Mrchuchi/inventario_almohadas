<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    // Paso 1: Obtener receta_id y cantidad_producida de la producción a eliminar
    $stmt = $conn->prepare("SELECT receta_id, cantidad_producida FROM produccion WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($receta_id, $cantidad_producida);
    $stmt->fetch();
    $stmt->close();

    if (!$receta_id) {
        echo "Producción no encontrada.";
        exit;
    }

    // Paso 2: Obtener los materiales y cantidades asociadas a la receta
    $stmt = $conn->prepare("SELECT materia_prima_id, cantidad_por_unidad FROM receta_detalles WHERE receta_id = ?");
    $stmt->bind_param("i", $receta_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Paso 3: Reponer la materia prima utilizada
    while ($row = $resultado->fetch_assoc()) {
        $materia_prima_id = $row['materia_prima_id'];
        $cantidad_total = $row['cantidad_por_unidad'] * $cantidad_producida;

        $update = $conn->prepare("UPDATE materia_prima SET cantidad = cantidad + ? WHERE id = ?");
        $update->bind_param("ii", $cantidad_total, $materia_prima_id);
        $update->execute();
        $update->close();
    }

    $stmt->close();

    // Paso 4: Eliminar el registro de producción
    $stmt = $conn->prepare("DELETE FROM produccion WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "ok";
    } else {
        echo "Error al eliminar la producción.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no permitido.";
}
