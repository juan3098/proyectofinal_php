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
    <script src="proveedores.js"></script>
    <link rel="stylesheet" href="css/proveedores.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1 class="titulo">Proveedores</h1>
    </header>
    <main class="principal_proveedores">
        <aside>
            <!-- Formulario de registro de nuevo proveedor-->
            <form class="form_proveedores" id="agregar">
                <input type="hidden" id="oculto">
                <h2>Registrar Proveedor</h2>
                <table class="tabla_registro">
                    <tr>
                        <td>Nombre</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="nombre" class="btn-buscar" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Tipo de Proveedor</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="tipo" class="btn-buscar" autocomplete="off"></td>
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

        <!-- Tabla que se llena con el listado de proveedores-->
        <div class="div_proveedores">
            <!-- Boton para buscar en la lista -->
            <form>
                <input type="search" name="buscar" id="buscar" class="btn-buscar">
                <button type="submit" class="btn-buscar btn-edit">Buscar</button>
            </form>
            <table class="tabla_proveedores">
                <thead>
                    <tr>
                        <th class="small">Codigo</th>
                        <th>Nombre</th>
                        <th>Tipo de Proveedor</th>
                        <th class="small">Telefono</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody id="llenar_prov"></tbody>
            </table>
        </div>
    </main>
</body>

</html>