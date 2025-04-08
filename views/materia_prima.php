<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Registro de Materia Prima</title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="formulario-materia">
    <h2>Registro de Materia Prima</h2>
    <form id="formMateriaPrima">
      <input type="text" name="nombre" placeholder="Nombre" required>
      <input type="text" name="tipo" placeholder="Tipo" required> <!-- este -->
      <input type="text" name="unidad" placeholder="Unidad (ej. kg, m, etc)" required>
      <input type="number" name="cantidad" placeholder="Cantidad" required>
      <input type="text" name="proveedor" placeholder="Proveedor" required> <!-- este -->
      <button type="submit">Guardar</button>
    </form>
  </div>


  <div id="mensaje"></div>

  <h3>Inventario de Materia Prima</h3>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Unidad</th>
        <th>Cantidad</th>
        <th>Proveedor</th>
      </tr>
    </thead>
    <tbody id="tablaMateriaPrima"></tbody>
  </table>

  <script src="../js/entradas_materia.js"></script>
</body>

</html>