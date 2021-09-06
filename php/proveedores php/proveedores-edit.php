<?php

include('../conexion.php');

$codigo = $_POST['id'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$telefono = $_POST['telefono'];

$query = "UPDATE proveedores SET nombre = '$nombre', tipo = '$tipo', 
          telefono = '$telefono' WHERE codigo = $codigo";

$result = mysqli_query($con, $query);

if(!$result){
    die('Error');
} else {
    echo 'Cliente Actualizado';
}

?>