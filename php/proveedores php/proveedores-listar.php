<?php

include('../conexion.php');

$query = "SELECT * from proveedores";
$result = mysqli_query($con, $query);

if(!$result){
    die("Query Failed" . mysqli_error($con));
}

$json = array();

while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'codigo' => $row['codigo'],
        'nombre' => $row['nombre'],
        'tipo' => $row['tipo'],
        'telefono' => $row['telefono']
    );
}

$jsonstring = json_encode($json);

echo $jsonstring;

?>