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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="clientes.js"></script>
    <link rel="stylesheet" href="css/clientes.css">
    <title>Clientes</title>
</head>
<body>
    <header>
        <h1 class="titulo">Clientes</h1>
    </header>
    <main class="principal_clientes">
        <aside>
            <!-- Formulario de registro de nuevos clientes-->
            <form class="form_clientes" id="agregar">
            <input type="hidden" id="oculto">
                <h2>Registrar un Cliente</h2>
                <table class="table_registro">
                    <tr>
                        <td>Nombre</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="nombre" class="btn-buscar" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Direccion</td>
                    </tr>
                    <tr>
                        <td><input type="text"  id="direccion" class="btn-buscar" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                    </tr>
                    <tr>
                        <td><input type="number" id="telefono" class="btn-buscar" autocomplete="off"></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-edit mt-10"> Agregar </button>
            </form>
        </aside>
        <!-- Tabla que se llena con el listado de clientes-->
        <!-- Boton para buscar en la lista -->
        <div class="div_clientes">
        <div style="display: flex;">
        <form>
                <input type="search" name="buscar" id="buscar" class="btn-buscar"> 
                <button type="submit" class="btn-buscar btn-edit">Buscar Cliente</button>
            </form>
            <a href="reporte.php" target="_blank"> <button class="btn-buscar btn-edit" style="margin-left:150px"> Generar Reporte </button> </a>

        </div>
            
            <table class="table_clientes">
                <thead>
                    <tr>
                        <th class="small">Codigo</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th class="small">Telefono</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody id="llenar" style="border: 1px solid black;"></tbody>
            </table>
        </div>
    </main>
</body>
</html>