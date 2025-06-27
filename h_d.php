<?php
$conexion = new mysqli("localhost", "root", "", "proyecto_colosos");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
$resultado = $conexion->query("SELECT * FROM hermex");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos hermex</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #eef2f5;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 960px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            color: #0d47a1;
        }

        .fecha {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 20px;
        }

        button {
            background-color: #388e3c;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            display: block;
            margin: 0 auto 20px auto;
        }

        button:hover {
            background-color: #2e7d32;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #bbdefb;
            color: #0d47a1;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media print {
            button {
                display: none;
            }

            body {
                background: white;
                padding: 0;
            }

            .container {
                box-shadow: none;
                padding: 0;
                margin: 0;
                border: none;
            }
        }
         .b {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 1rem;
      padding: 1.5rem;
    }

    .b button {
      background: beige;
      color: black;
      border: none;
      padding: 0.8rem 1.5rem;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .b button:hover {
      background: #e65c00;
    }
    </style>
</head>
<body>

<div class="container">
    <div class="logo">🛠 GRUPO COLOSOS</div>
    <div class="fecha">Fecha: <span id="fecha"></span></div>

    <h2>Listado de Productos HERMEX</h2>
    <button onclick="window.print()">🖨 Imprimir / Guardar como PDF</button>
<div class="b">
   <div> <a href="pagina_prin.php"><button>Página principal</button></a></div>
       <div><a href="profile.php"><button>Mi perfil</button></a></div>
       <div><a href="descarga.html"><button>Descargar otro inventario</button></a></div>
      
</div>
    <table>
        <tr>
            <th>Clave</th>
            <th>Producto</th>
            <th>Marca</th>
            <th>Existencia</th>
            <th>Físico</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($fila['clave']) ?></td>
                <td><?= htmlspecialchars($fila['n_producto']) ?></td>
                <td><?= htmlspecialchars($fila['marca']) ?></td>
                <td><?= htmlspecialchars($fila['existencia']) ?></td>
                <td><?= htmlspecialchars($fila['fisico']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
    // Insertar la fecha actual
    document.getElementById("fecha").textContent = new Date().toLocaleDateString();
</script>

</body>
</html>
