<?php

include('../conexion.php');

if(isset($_POST['producto'])) {

    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $usuario = $_POST['usuario'];

    $query = "INSERT INTO solicitudes (producto,descripcion,fecha,usuario) VALUES ('$producto','$descripcion','$fecha', '$usuario')";
    $result = mysqli_query($con,$query);

    if(!$result){
        die("Fallo al agregar");
    }else{
        echo "Valor Agregado Correctamente";
    }
}
?>