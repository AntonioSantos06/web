<?php
header('Content-Type: application/json');

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "proyecto_colosos");

// Validar conexión
if ($conexion->connect_error) {
    echo json_encode(["status" => "error", "msg" => "Error de conexión"]);
    exit();
}

// Recibir clave desde POST
if (!isset($_POST['clave'])) {
    echo json_encode(["status" => "error", "msg" => "Clave no recibida"]);
    exit();
}

$clave = $conexion->real_escape_string($_POST['clave']);

// Consultar existencia actual del producto
$sql = "SELECT existencia FROM fiero WHERE clave = '$clave' LIMIT 1";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 0) {
    echo json_encode(["status" => "error", "msg" => "Producto no encontrado"]);
    exit();
}

$fila = $resultado->fetch_assoc();
$existencia = (int)$fila['existencia'];

if ($existencia <= 0) {
    echo json_encode(["status" => "agotado"]);
    exit();
}

// Decrementar existencia
$nuevaExistencia = $existencia - 1;
$update = "UPDATE fiero SET existencia = $nuevaExistencia WHERE clave = '$clave'";
if ($conexion->query($update)) {
    echo json_encode(["status" => "ok", "msg" => "Existencia actualizada"]);
} else {
    echo json_encode(["status" => "error", "msg" => "Error al actualizar existencia"]);
}

$conexion->close();
?>
