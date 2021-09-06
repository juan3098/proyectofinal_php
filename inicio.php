<?php

include('php/conexion.php');

session_start();

if(!isset($_SESSION['id'])){
    header("Location: index.html");
}

$id_user = $_SESSION['id'];

$sql = "SELECT id, usuario FROM usuarios WHERE id='$id_user' ";
$resultado = $con->query($sql);
$row = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/inicio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/acciones.js"></script>
</head>
<body>
    <header class="cabecera">
        
        <h1 class="">Control de inventario</h1>
        <nav>
            <a href="#"> <?php echo $row['usuario'] ?> </a>
            <a href="salir.php">Cerrar Sesion</a>
        </nav>

    </header>

    <!-- Menu de opciones lateral -->
    <main class="principal">
        <nav class="panel">
            <ul>
                <li> <img src="img/client.svg" class="list"><a href="#" onclick="abrir('clientes.php','contenedor_principal');">Clientes</a></li>
                <li> <img src="img/items.svg" class="list"><a href="#" onclick="abrir('productos.php','contenedor_principal');">Inventario</a></li>
                <li> <img src="img/supplier.svg" class="list"><a href="#" onclick="abrir('proveedores.php','contenedor_principal');">Proveedores</a></li>
                <li> <img src="img/solicitud.svg" class="list"><a href="#" onclick="abrir('solicitar.php','contenedor_principal');">Solicitar</a></li>
                <li> <img src="img/solicitudes.svg" class="list"><a href="#" onclick="abrir('solicitudes.php','contenedor_principal');">Solicitudes</a></li>
            </ul>
        </nav>
    
        <!-- Contenedor que se llenara un vez se le de click a las opciones de la lista-->
        <div class="container" id="contenedor_principal">
            <img src="img/inventory.svg" class="image">
        </div>
    </main>
</body>
</html>