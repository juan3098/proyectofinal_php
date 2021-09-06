<?php

include('../conexion.php');

if(isset($_POST['id'])){

    $codigo = $_POST['id'];
    $query = "DELETE FROM clientes WHERE codigo = $codigo";
    $result = mysqli_query($con, $query);

    if(!$result){
        die('Error de consulta');
    } else {
        echo 'Se ha eliminado con exito';
    }
}
?>