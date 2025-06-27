<?php
$conexion = new mysqli("localhost", "root", "", "proyecto_colosos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM comentarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comentarios Recibidos</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 40px;
    }

    h2 {
      text-align: center;
      color: #333;
      font-size: 2rem;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 15px 20px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      position: sticky;
      top: 0;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .tabla-container {
      max-width: 1200px;
      margin: auto;
      overflow-x: auto;
    }
    .b button {
      margin-top: 10px;
      width: 25%;
      padding: 18px;
      background: linear-gradient(45deg, #007bff, #0056b3);
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .b button:hover {
      background: linear-gradient(45deg, #0056b3, #003a80);
    }
  </style>
</head>
<body>

  <div class="tabla-container">
    <h2>Comentarios Recibidos</h2>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Lo que más le gustó</th>
          <th>Lo que no le gustó / Mejora</th>
          <th>Experiencia</th>
          <th>Sugerencias</th>
          <th>Valoración</th>
          <th>Comentario adicional</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($resultado->num_rows > 0): ?>
          <?php while($fila = $resultado->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
              <td><?php echo htmlspecialchars($fila['p1']); ?></td>
              <td><?php echo htmlspecialchars($fila['p2']); ?></td>
              <td><?php echo htmlspecialchars($fila['p3']); ?></td>
              <td><?php echo htmlspecialchars($fila['p4']); ?></td>
              <td><?php echo htmlspecialchars($fila['p5']); ?></td>
              <td><?php echo htmlspecialchars($fila['p6']); ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">No hay comentarios aún.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
   <center>  <div class="b">
   <div> <a href="pagina_prin.php"><button>Página principal</button></a></div>
       <div><a href="profile.php"><button>Regresar a mi perfil</button></a></div>
      
</div>
</center>
  </div>

</body>
</html>

<?php
$conexion->close();
?>
