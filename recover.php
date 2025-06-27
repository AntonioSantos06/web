<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $nueva = password_hash("123456", PASSWORD_DEFAULT); // contraseña temporal
    $sql = "UPDATE usuarios SET contrasena='$nueva' WHERE correo='$correo'";
    if ($conexion->query($sql)) {
        $mensaje = "Tu contraseña ha sido restablecida a: 123456";
    } else {
        $error = "Correo no encontrado";
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Recuperar Contraseña</h2>
    <form method="POST">
        <input type="email" name="correo" placeholder="Ingresa tu correo" required>
        <button type="submit">Restablecer</button>
        <p><a href="a.php">Volver al login</a></p>
        <?php 
        if (isset($mensaje)) echo "<p style='color:lime;'>$mensaje</p>"; 
        if (isset($error)) echo "<p style='color:red;'>$error</p>"; 
        ?>
    </form>
</div>
