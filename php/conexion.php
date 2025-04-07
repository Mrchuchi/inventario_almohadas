<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia esto si tienes contraseña
$base_datos = "inventario_almohadas";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>
