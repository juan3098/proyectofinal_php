<?php

include('php/conexion.php');

session_start();

if(!isset($_SESSION['id'])){
    header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/solicitudes.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="solicitudes.js"></script>
    <title>Solicitudes</title>
</head>
<body>
    <header class="title"> <h1> Solicitudes de Productos</h1> </header>

    <main>
        <!-- Listado de Solicitudes de Articulos Para Agregar Al Inventario-->
        <div class="solicitudes" id="solicitudes">
        </div>
    </main>
</body>
</html>