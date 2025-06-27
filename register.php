<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
    if ($conexion->query($sql) === TRUE) {
        header("Location: a.php");
    } else {
        $error = "Error al registrar";
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Registro</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
        <p><a href="a.php">Volver al login</a></p>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </form>
</div>

