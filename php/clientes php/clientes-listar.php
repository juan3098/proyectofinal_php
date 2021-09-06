<?php

include('../conexion.php');

$query = "SELECT * from clientes";
$result = mysqli_query($con, $query);

if(!$result){
    die("Query Failed" . mysqli_error($con));
}

$json = array();

while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'codigo' => $row['codigo'],
        'nombre' => $row['nombre'],
        'direccion' => $row['direccion'],
        'telefono' => $row['telefono']
    );
}

$jsonstring = json_encode($json);

echo $jsonstring;

?>