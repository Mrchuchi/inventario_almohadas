<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.html");
  exit();
}
?>

<!-- Estilos del navbar directamente en el archivo -->
<style>
  /* Estilo general para el navbar */
  .navbar {
    background-color: #343a40; /* Gris oscuro, más sobrio */
    padding: 15px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .navbar ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 30px;
    margin: 0;
    padding: 0;
  }

  .navbar ul li a {
    color: #f5f5f5;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    border-radius: 8px;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  /* Efecto de hover para los enlaces */
  .navbar ul li a:hover {
    background-color: #495057; /* Gris más oscuro para hover */
    color: #ffffff;
  }

  /* Estilo de los iconos */
  .navbar ul li a i {
    font-size: 20px;
  }

  /* Estilo para la barra de navegación en pantallas grandes */
  @media (min-width: 768px) {
    .navbar ul {
      gap: 50px; /* más espacio en pantallas más grandes */
    }
  }

  /* Estilo para la barra de navegación en pantallas pequeñas */
  @media (max-width: 767px) {
    .navbar ul {
      flex-direction: column;
      gap: 15px;
    }
  }
</style>

<!-- Navbar con íconos -->
<link href="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" rel="stylesheet">
<nav class="navbar">
  <ul>
    <li><a href="dashboard_admin.html"><i data-lucide="layout-dashboard"></i> Inicio</a></li>
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
