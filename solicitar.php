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
    <script src="solicitudes.js"></script>
    <link rel="stylesheet" href="css/solicitar.css">
    <title>Realizar Solicitud</title>
</head>
<body>
    <header class="head">
        <h1> Solicitar Articulo </h1>
    </header>
    <form action="" class="form_solicitar" id="agg_solicitud">
        <input type="hidden" id="oculto" value='<?php echo $row['usuario'] ?>'>
        <table class="tabla_form">
            <tr>
                <td>Nombre Articulo:</td>
                <td><input type="text" id="nombre" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Descripcion:</td>
                <td><textarea id="descripcion" cols="25" rows="3" ></textarea></td>
            </tr>
            <tr>
                <td>Fecha Solicitud:</td>
                <td><input type="date" id="fecha" autocomplete="off"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" class="btn-input">Enviar</button></td>
            </tr>
        </table>
    </form>
    </body>
</html>