<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: a.php");
    exit();
}
?>
<link rel="stylesheet" href="style.css">
<style>
    .profile-photo {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

.profile-photo img {
       
        height: 160px;
        width: 160px;
        border-radius: 70px;
    }
    .profile-photo input[type="file"] {
        display: none;
    }

    .upload-label {
        width: 100px;
        height: 100px;
        background: #ffffff33;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 35px;
        cursor: pointer;
        color: #fff;
        box-shadow: 0 0 10px #00000066;
        transition: background 0.3s;
    }

    .upload-label:hover {
        background: #00bcd4aa;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .action-buttons button {
        background: #4caf50;
        transition: 0.3s;
    }

    .action-buttons butorange:hover {
        background: #388e3c;
    }

</style>

<div class="container">
     <center><h2 style="color: orange;">Bienvenido, <?php echo $_SESSION['usuario']; ?></h2></center>
    <div class="profile-photo">
        <img src='e.jpg'>
    
    </div>

   

    <div class="action-buttons">
        <form action="inventarios.html" method="get">
            <button type="submit">Insertar Productos</button>
        </form>

        <form action="descarga.html" method="get">
            <button type="submit">Descargar Inventario</button>
        </form>
        <form action="ver_comentarios.php" method="get">
            <button type="submit">Ver comentarios</button>
        </form>
    </div>

    <p style="margin-top: 15px;">
        <a href="delete.php">Darse de baja</a> | 
        <a href="a.php">Cerrar sesión</a>
    </p>
</div>
