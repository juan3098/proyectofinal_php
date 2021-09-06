<?php

include('../conexion.php');

if(isset($_POST['codigo'])) {

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $proveedor = $_POST['proveedor'];

    $query = "INSERT INTO productos (codigo,nombre,proveedor) VALUES ('$codigo','$nombre','$proveedor')";
    $result = mysqli_query($con,$query);

    if(!$result){
        die("Fallo al agregar");
    }else{
        echo "Valor Agregado Correctamente";
    }
}
?>