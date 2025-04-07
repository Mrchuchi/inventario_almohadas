<?php
// Conexión a la base de datos
include 'conexion.php';

// Consulta para obtener todos los registros de materia prima
$sql = "SELECT * FROM materia_prima";
$resultado = $conn->query($sql);

// Verificamos si hay resultados
if ($resultado->num_rows > 0) {
    // Recorremos cada fila y generamos el HTML de la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['tipo']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['unidad']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['cantidad']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['proveedor']) . "</td>";
        echo "</tr>";
    }
} else {
    // Si no hay registros, mostramos un mensaje
    echo "<tr><td colspan='5'>No hay registros de materia prima.</td></tr>";
}

// Cerramos la conexión
$conn->close();
?>
