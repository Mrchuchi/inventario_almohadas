<?php
include '../php/conexion.php';


// Obtener recetas para el formulario
$recetas = $conn->query("SELECT id, nombre FROM recetas");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Producción de Almohadas</title>
    <script defer src="../js/produccion.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0 20px;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        form {
            background: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            color: #444;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .ok {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .btn-eliminar {
            background: #e74c3c;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-eliminar:hover {
            background: #c0392b;
        }
    </style>
</head>

<body>
<?php include 'navbar.php'; ?>

    <h2>Registro de Producción</h2>

    <form id="formProduccion">
        <label for="receta_id">Receta:</label>
        <select id="receta_id" name="receta_id" required>
            <option value="">Selecciona una receta</option>
            <?php while ($row = $recetas->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="cantidad">Cantidad Producida:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required>

        <button type="submit">Registrar Producción</button>
        <div id="mensajeProduccion"></div>
    </form>

    <h2>Historial de Producción</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Receta</th>
                <th>Cantidad Producida</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <!-- JS llenará esta parte -->
        </tbody>
    </table>

</body>

</html>