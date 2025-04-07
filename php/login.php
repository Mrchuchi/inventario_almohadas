<?php
session_start();
include 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = sha1($_POST['contrasena']);

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contrasena'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    $usuario = $resultado->fetch_assoc();
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['rol'] = $usuario['rol'];

    if ($usuario['rol'] == 'admin') {
        header("Location: ../dashboard_admin.html");
    } else {
        header("Location: ../dashboard_trabajador.html");
    }
} else {
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='../login.html';</script>";
}
?>
