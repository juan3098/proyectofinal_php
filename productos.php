<?php

include('php/conexion.php');

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="productos.js"></script>
    <link rel="stylesheet" href="css/inventario.css">
    <title>Inventario</title>
</head>

<body>
    <header class="title">
        <h1>Inventario</h1>
    </header>
    <div class="agregar_elemento">
        <!-- Formulario para agregar nuevos articulos-->
        <form id="agregar">
            <input type="hidden" id="oculto">
            <h2>Agregar Articulo</h2>
            <table>
                <tr>
                    <td>Codigo</td>
                    <td><input type="text" id="codigo" class="dato" autocomplete="off"></td>
                    <td>Nombre</td>
                    <td><input type="text" id="nombre" class="dato" autocomplete="off"></td>
                    <td>Proveedor</td>
                    <td><input type="text" id="proveedor" class="dato" autocomplete="off"></td>
                </tr>
            </table>
            <button type="submit" class="boton1 dato"> Agregar </button> 
        </form>
    </div>

    <!-- Tabla que se llena con los productos del inventario-->

    <!-- Buscador de los articulos en la lista -->
    <form class="buscar">
        <input type="search" name="buscar" id="buscar" placeholder="Buscar Articulo">
    </form>
    <table class="inventario">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody id="llenar_inventario">
        </tbody>
    </table>
</body>

</html>