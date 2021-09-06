<?php

include('../conexion.php');

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $query = "DELETE FROM productos WHERE id = $id";
    $result = mysqli_query($con, $query);

    if(!$result){
        die('Error de consulta');
    } else {
        echo 'Se ha eliminado con exito';
    }
}
?>