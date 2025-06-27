<?php
$conexion = new mysqli("localhost", "root", "", "proyecto_colosos");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$clave_buscada = '';
if (isset($_GET['buscar'])) {
    $clave_buscada = $conexion->real_escape_string($_GET['clave']);
}

if (isset($_POST['agregar'])) {
    $stmt = $conexion->prepare("INSERT INTO klintek (clave, n_producto, marca, existencia, fisico) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $_POST['clave'], $_POST['n_producto'], $_POST['marca'], $_POST['existencia'], $_POST['fisico']);
    $stmt->execute();
}

if (isset($_GET['eliminar'])) {
    $conexion->query("DELETE FROM klintek WHERE clave='" . $conexion->real_escape_string($_GET['eliminar']) . "'");
}

if (isset($_POST['modificar'])) {
    $stmt = $conexion->prepare("UPDATE klintek SET n_producto=?, marca=?, existencia=?, fisico=? WHERE clave=?");
    $stmt->bind_param("ssiss", $_POST['n_producto'], $_POST['marca'], $_POST['existencia'], $_POST['fisico'], $_POST['clave']);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Truper</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7fa;
            color: #333;
        }

        header {
            background-color: #1976d2;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 26px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .nav-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav-buttons button {
            margin: 8px;
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #2196f3, #21cbf3);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .nav-buttons button:hover {
            background: linear-gradient(135deg, #21cbf3, #2196f3);
            transform: scale(1.05);
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        h2 {
            color: #1976d2;
            text-align: center;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
        }

        input[type="text"],
        input[type="number"],
        input[type="search"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 180px;
        }

        button[type="submit"] {
            background-color: #1976d2;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #135ba1;
        }

        .buscar-form {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #e3f2fd;
            color: #0d47a1;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #d32f2f;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            form {
                flex-direction: column;
                align-items: center;
            }

            input, button {
                width: 90% !important;
            }

            .nav-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        .nav {
            display: .5;
            justify-content: center;
            flex-wrap: wrap;
            background: #1976d2;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav button {
            margin: 5px;
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #2196f3, #21cbf3);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .nav button:hover {
            background: linear-gradient(135deg, #21cbf3, #2196f3);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<header>🔧 Gestión de Productos KLINTEK
<br><br><div class="nav">
   
   <a href="pagina_prin.php"> <button class="boton">Página principal</button></a>
   <a href="profile.php"> <button class="boton">Mi perfil</button></a>
</div></header>

<div class="nav-buttons">
     <a href="inventario.php"> <button class="boton">Truper</button></a>
  <a href="v.php">  <button class="boton">Volteck</button></a>
   <a href="h_inventario.php"> <button class="boton">Hermex</button></a>
   <a href="i_fiero.php"> <button class="boton">Fiero</button></a>
   <a href="k.php"> <button class="boton">Klintek</button></a>
</div>

<div class="container">
    <h2>Agregar Nuevo Producto</h2>
    <form method="post">
        <input type="text" name="clave" placeholder="Clave" required>
        <input type="text" name="n_producto" placeholder="Nombre del Producto" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="number" name="existencia" placeholder="Existencia" required>
        <input type="text" name="fisico" placeholder="Estado Físico" required>
        <button type="submit" name="agregar">Agregar</button>
    </form>

    <h2>Buscar Producto por Clave</h2>
    <form method="get" class="buscar-form">
        <input type="search" name="clave" placeholder="Buscar clave..." value="<?php echo htmlspecialchars($clave_buscada); ?>">
        <button type="submit" name="buscar">Buscar</button>
        <a href="?" style="margin-left: 15px; color: #1976d2;">Limpiar</a>
    </form>

    <h2>Lista de Productos</h2>
    <table>
        <tr>
            <th>Clave</th>
            <th>Producto</th>
            <th>Marca</th>
            <th>Existencia</th>
            <th>Físico</th>
            <th>Acciones</th>
        </tr>
        <?php
        $consulta = "SELECT * FROM klintek";
        if (!empty($clave_buscada)) {
            $consulta .= " WHERE clave LIKE '%$clave_buscada%'";
        }
        $resultado = $conexion->query($consulta);
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                <form method='post'>
                    <td>{$fila['clave']}<input type='hidden' name='clave' value='{$fila['clave']}'></td>
                    <td><input name='n_producto' value='{$fila['n_producto']}'></td>
                    <td><input name='marca' value='{$fila['marca']}'></td>
                    <td><input type='number' name='existencia' value='{$fila['existencia']}'></td>
                    <td><input name='fisico' value='{$fila['fisico']}'></td>
                    <td>
                        <button name='modificar'>Modificar</button>
                        <a href='?eliminar={$fila['clave']}' onclick='return confirm(\"¿Eliminar este producto?\")'>Eliminar</a>
                    </td>
                </form>
            </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
