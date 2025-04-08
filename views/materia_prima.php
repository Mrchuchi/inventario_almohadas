<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Registro de Materia Prima</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <style>
    /* Estilos generales */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    h2, h3 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }

    .formulario-materia {
      width: 90%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    form input,
    form button {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    form input[type="text"],
    form input[type="number"] {
      background-color: #f9f9f9;
    }

    form button {
      background-color: #28a745; /* Verde utilizado en el proyecto */
      color: white;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    form button:hover {
      background-color: #218838; /* Verde más oscuro al hacer hover */
    }

    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    table th,
    table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table th {
      background-color: #007bff; /* Azul para los títulos */
      color: white;
    }

    table tr:hover {
      background-color: #f1f1f1;
    }

    #mensaje {
      color: red;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="formulario-materia">
    <h2>Registro de Materia Prima</h2>
    <form id="formMateriaPrima">
      <input type="text" name="nombre" placeholder="Nombre" required>
      <input type="text" name="tipo" placeholder="Tipo" required>
      <input type="text" name="unidad" placeholder="Unidad (ej. kg, m, etc)" required>
      <input type="number" name="cantidad" placeholder="Cantidad" required>
      <input type="text" name="proveedor" placeholder="Proveedor" required>
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
