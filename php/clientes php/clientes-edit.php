<?php

include('../conexion.php');

$codigo = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$query = "UPDATE clientes SET nombre = '$nombre', direccion = '$direccion', 
          telefono = '$telefono' WHERE codigo = $codigo";

$result = mysqli_query($con, $query);

if(!$result){
    die('Error');
} else {
    echo 'Cliente Actualizado';
}

?>