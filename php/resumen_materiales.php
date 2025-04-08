<?php
include 'conexion.php';

$receta_id = $_GET['receta_id'] ?? null;
$cantidad = $_GET['cantidad'] ?? 1;

if (!$receta_id || $cantidad < 1) {
    echo "Datos inválidos.";
    exit;
}

$sql = "SELECT 
            mp.nombre AS nombre_material,
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

if ($result->num_rows > 0) {
    echo <<<HTML
    <style>
      .tabla {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-family: Arial, sans-serif;
      }

      .tabla th, .tabla td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
      }

      .tabla th {
        background-color: #333;
        color: white;
      }

      .tabla tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      .tabla tr:hover {
        background-color: #ddd;
      }

      .ok {
        color: green;
        font-weight: bold;
      }

      .error {
        color: red;
        font-weight: bold;
      }
    </style>

    <table class='tabla'>
      <thead>
        <tr>
          <th>Material</th>
          <th>Disponible</th>
          <th>Necesario</th>
          <th>¿Suficiente?</th>
        </tr>
      </thead>
      <tbody>
    HTML;

    while ($row = $result->fetch_assoc()) {
        $suficiente = ($row["cantidad_disponible"] >= $row["cantidad_necesaria"])
            ? "<span class='ok'>Sí</span>"
            : "<span class='error'>No ❌</span>";

        echo "<tr>
                <td>{$row['nombre_material']}</td>
                <td>{$row['cantidad_disponible']}</td>
                <td>{$row['cantidad_necesaria']}</td>
                <td>{$suficiente}</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No se encontraron materiales para esta receta.";
}

$stmt->close();
$conn->close();
?>
