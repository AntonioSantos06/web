<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Grupo Colosos - Tienda de Construcción</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9fafb;
      color: #333;
    }
    header {
      background-color: #1e293b;
      color: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      position: relative;
    }
    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
    }
    .logo {
      height: 90px;
      border-radius: 70px;
    }
    .logo-link img {
      height: 90px;
      border-radius: 30px;
    }
    .slogan-bar {
      width: 100%;
      overflow: hidden;
      background-color: #334155;
      height: 30px;
      display: flex;
      align-items: center;
      position: relative;
    }
    .slogan {
      white-space: nowrap;
      display: inline-block;
      padding-left: 100%;
      animation: deslizar 18s linear infinite;
      color: white;
      font-size: 1rem;
    }
    @keyframes deslizar {
      0% { transform: translateX(0); }
      100% { transform: translateX(-100%); }
    }
    .titulo {
      background-color: beige;
      color: #1f2937;
      text-align: center;
      font-size: 36px;
      font-weight: bold;
      padding: 15px;
      letter-spacing: 2px;
      text-shadow: 1px 1px 0px #fff;
    }
    .eslogan {
      font-size: 20px;
      text-align: center;
      margin: 10px 20px 30px;
      font-style: italic;
      color: #4b5563;
    }
    .seccion {
      padding: 30px 20px;
      text-align: center;
      background-color: #ffffff;
      margin: 15px auto;
      max-width: 1100px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.3s;
    }
    .seccion:hover {
      transform: translateY(-4px);
    }
    .seccion h2 {
      font-size: 28px;
      color: #0f172a;
      margin-bottom: 10px;
    }
    .seccion p {
      font-size: 18px;
      color: #475569;
    }
    .categorias {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }
    .categoria {
      background: #f1f5f9;
      padding: 20px;
      border-radius: 10px;
      width: 180px;
      font-weight: bold;
      color: #1e3a8a;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .categoria:hover {
      background-color: #e0f2fe;
      transform: scale(1.05);
    }
    footer {
      background-color: #1e293b;
      color: white;
      padding: 20px;
      text-align: center;
      margin-top: 30px;
    }
    .unos {
      display: flex;
      justify-content: flex-end;
      gap: 20px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }
    .uno {
      background: #f1f5f9;
      padding: 10px;
      border-radius: 10px;
      width: 80px;
      font-weight: bold;
      color: #1e3a8a;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .uno:hover {
      background-color: #e0f2fe;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <!-- Encabezado con slogan deslizante -->
  <header>
    <div class="header-content">
      <img src="images (1).jpg" alt="Logo Grupo Colosos" class="logo">
      <a href="a.php" class="logo-link"><img src="8.png" alt="Botón de menú"></a>
    </div>
    <div class="slogan-bar">
      <div class="slogan">¡Calidad, innovación y confianza en cada herramienta! Visítanos y conoce lo nuevo...</div>
    </div>
  </header>

  <!-- Título y eslogan -->
  <div class="titulo">GRUPOS COLOSO'S</div>
  <div class="eslogan">"Cimientos fuertes donde tus ideas toman forma ladrillo a ladrillo"</div>

  <!-- Sección Categorías con botones arriba -->
  <div class="seccion">
    <div class="unos">
      <div class="uno"><a href="formulario_opinion.html"><img src="5.png" style="max-width: 80%; height: 50px;"></a></div>
      <div class="uno"><a href="contactanos.html"><img src="6.png" style="max-width: 80%; height: 50px;"></a></div>
    </div>
    <h2>Categoría de Productos</h2>
    <p>(Haz clic en la imagen)</p>
    <div class="categorias">
      <div class="categoria"><a href="pro1.html"><img src="truper.jpg" style="max-width: 100%; height: auto; border-radius: 30px;"></a></div>
      <div class="categoria"><a href="pro2.html"><img src="vol.jpg" style="max-width: 100%; height: 140px; border-radius: 30px;"></a></div>
      <div class="categoria"><a href="j.html"><img src="her.png" style="max-width: 100%; height: 150px; border-radius: 30px;"></a></div>
      <div class="categoria"><a href="fiero.html"><img src="fiero.png" style="max-width: 100%; height: 140px; border-radius: 30px;"></a></div>
      <div class="categoria"><a href="klin.html"><img src="klin.png" style="max-width: 100%; height: 150px; border-radius: 30px;"></a></div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 Grupo Colosos. Todos los derechos reservados.
  </footer>
</body>
</html>
