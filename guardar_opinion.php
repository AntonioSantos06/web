<?php
$conexion = new mysqli("localhost", "root", "", "proyecto_colosos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];

$sql = "INSERT INTO comentarios (nombre, p1, p2, p3, p4, p5, p6)
        VALUES ('$nombre', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6')";

if ($conexion->query($sql) === TRUE) {
    echo "<script>alert('¡Gracias por tu opinión!'); window.location.href='formulario_opinion.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
