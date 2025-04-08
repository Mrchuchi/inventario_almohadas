<?php
include 'conexion.php';

$id = $_GET['id'];

$query = "DELETE FROM recetas WHERE id = $id";

if ($conn->query($query) === TRUE) {
    echo "ok";
} else {
    echo "Error: " . $conn->error;
}
?>
