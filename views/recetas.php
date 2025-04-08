<?php
include '../php/conexion.php';
$materias_primas = $conn->query("SELECT id, nombre FROM materia_prima");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Recetas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
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
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        select, input[type="number"], input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #28a745;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .btn-eliminar {
            background: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-eliminar:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Gestión de Recetas</h2>

    <form id="formReceta">
        <label for="nombre_receta">Producto (Nombre de Receta):</label>
        <input type="text" name="nombre_receta" id="nombre_receta" placeholder="Ej: Almohada Clásica" required>

        <label for="materia_prima_id">Materia Prima:</label>
        <select name="materia_prima_id" id="materia_prima_id" required>
            <option value="">Selecciona una materia prima</option>
            <?php while($mp = $materias_primas->fetch_assoc()): ?>
                <option value="<?= $mp['id'] ?>"><?= $mp['nombre'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="cantidad_por_unidad">Cantidad por unidad:</label>
        <input type="number" name="cantidad_por_unidad" id="cantidad_por_unidad" min="0" step="0.01" required>

        <button type="submit">Crear Receta</button>
    </form>

    <h2>Listado de Recetas</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Materia Prima</th>
                <th>Cantidad por unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaRecetas">
            <!-- Se llena dinámicamente -->
        </tbody>
    </table>

    <script src="../js/recetas.js"></script>
</body>
</html>
