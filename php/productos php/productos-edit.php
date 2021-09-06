<?php

include('../conexion.php');

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$proveedor = $_POST['proveedor'];

$query = "UPDATE productos SET codigo = '$codigo', nombre = '$nombre', 
          proveedor = '$proveedor' WHERE id = $id";

$result = mysqli_query($con, $query);

if(!$result){
    die('Error');
} else {
    echo 'Cliente Actualizado';
}

?>