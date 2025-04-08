<?php
include 'conexion.php';

$receta_id = $_POST['receta_id'] ?? null;
$cantidad = $_POST['cantidad'] ?? 0;

if (!$receta_id || $cantidad < 1) {
    echo "Datos inválidos.";
    exit;
}

// Paso 1: obtener materiales necesarios para la receta
$sql = "SELECT 
            mp.id AS materia_id,
            mp.cantidad AS cantidad_disponible,
            rd.cantidad_por_unidad,
            (rd.cantidad_por_unidad * ?) AS cantidad_necesaria
        FROM receta_detalles rd
        JOIN materia_prima mp ON rd.materia_prima_id = mp.id
        WHERE rd.receta_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $cantidad, $receta_id);
$stmt->execute();
$result = $stmt->get_result();

$materiales = [];
$suficiente = true;

while ($row = $result->fetch_assoc()) {
    if ($row['cantidad_disponible'] < $row['cantidad_necesaria']) {
        $suficiente = false;
    }
    $materiales[] = $row;
}

$stmt->close();

if (!$suficiente) {
    echo "Error: No hay suficiente materia prima.";
    exit;
}

// Paso 2: iniciar transacción
$conn->begin_transaction();

try {
    // Descontar materiales
    foreach ($materiales as $mat) {
        $nuevo_valor = $mat['cantidad_disponible'] - $mat['cantidad_necesaria'];
        $update = $conn->prepare("UPDATE materia_prima SET cantidad = ? WHERE id = ?");
        $update->bind_param("di", $nuevo_valor, $mat['materia_id']);
        $update->execute();
        $update->close();
    }

    // Registrar producción
    $insert = $conn->prepare("INSERT INTO produccion (receta_id, cantidad_producida) VALUES (?, ?)");
    $insert->bind_param("ii", $receta_id, $cantidad);
    $insert->execute();
    $insert->close();

    $conn->commit();
    echo "ok";

} catch (Exception $e) {
    $conn->rollback();
    echo "Error al registrar producción: " . $e->getMessage();
}

$conn->close();
?>
