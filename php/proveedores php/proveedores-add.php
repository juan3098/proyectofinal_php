<?php

include('../conexion.php');

if(isset($_POST['nombre'])) {

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $telefono = $_POST['telefono'];

    $query = "INSERT INTO proveedores (nombre,tipo,telefono) VALUES ('$nombre','$tipo','$telefono')";
    $result = mysqli_query($con,$query);

    if(!$result){
        die("Fallo al agregar");
    }else{
        echo "Valor Agregado Correctamente";
    }
}
?>