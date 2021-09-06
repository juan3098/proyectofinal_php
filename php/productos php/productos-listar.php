<?php

include('../conexion.php');

$query = "SELECT * from productos";
$result = mysqli_query($con, $query);

if(!$result){
    die("Query Failed" . mysqli_error($con));
}

$json = array();

while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'id' => $row['id'],
        'codigo' => $row['codigo'],
        'nombre' => $row['nombre'],
        'proveedor' => $row['proveedor']
    );
}

$jsonstring = json_encode($json);

echo $jsonstring;

?>