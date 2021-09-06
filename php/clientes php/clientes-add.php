<?php

include('../conexion.php');

if(isset($_POST['nombre'])) {

    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $query = "INSERT INTO clientes (nombre,direccion,telefono) VALUES ('$nombre','$direccion','$telefono')";
    $result = mysqli_query($con,$query);

    if(!$result){
        die("Fallo al agregar");
    }else{
        echo "Valor Agregado Correctamente";
    }
}
?>