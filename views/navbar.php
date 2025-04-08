<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.html");
  exit();
}
?>

<!-- Estilos del navbar directamente en el archivo -->
<style>
  .navbar {
    background-color: #1a1a1a;
    padding: 10px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .navbar ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 0;
    padding: 0;
  }

  .navbar ul li a {
    color: #f5f5f5;
    text-decoration: none;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border-radius: 10px;
    transition: background-color 0.3s ease;
  }

  .navbar ul li a:hover {
    background-color: #333;
    color: #fff;
  }
</style>

<!-- Navbar con íconos -->
<link href="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" rel="stylesheet">
<nav class="navbar">
  <ul>
    <li><a href="dashboard_admin.html"><i data-lucide="layout-dashboard"></i> inicio</a></li>
    <li><a href="materia_prima.php"><i data-lucide="package"></i> Materia Prima</a></li>
    <li><a href="entradas_materia.php"><i data-lucide="arrow-down-circle"></i> Entradas</a></li>
    <li><a href="produccion.php"><i data-lucide="hammer"></i> Producción</a></li>
    <li><a href="salidas.php"><i data-lucide="arrow-up-circle"></i> Salidas</a></li>
    <li><a href="recetas.php"><i data-lucide="book-open-check"></i> Recetas</a></li>
    <li><a href="logout.php"><i data-lucide="log-out"></i> Salir</a></li>
  </ul>
</nav>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>
