<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Entradas</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">🛏️ Inventario Almohadas</div>
        <ul class="nav-links">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="materia_prima.php">Materia Prima</a></li>
            <li><a href="produccion.php">Producción</a></li>
            <li><a href="recetas.php">Recetas</a></li>
            <li><a href="ventas.php">Ventas</a></li>
            <li><a href="entradas_materia.php">Registrar Entrada</a></li>
            <li><a href="php/logout.php">Cerrar sesión</a></li>
        </ul>
        <div class="menu-toggle">
            <span></span>
        </div>
    </nav>

    <main class="contenido">
        <h2>Registrar Entrada de Materia Prima</h2>
        <form id="formEntradaMateria">
            <label for="materia_id">Materia Prima:</label>
            <select id="materia_id" name="materia_id" required></select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required step="0.01" min="0">

            <button type="submit">Registrar Entrada</button>
        </form>


        <h2>Historial de Entradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Materia Prima</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="tablaEntradas">
                <!-- Datos dinámicos -->
            </tbody>
        </table>
    </main>

    <script src="js/entradas_materia.js"></script>
</body>

</html>