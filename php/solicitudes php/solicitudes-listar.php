<?php

include('../conexion.php');

$query = "SELECT * from solicitudes";
$result = mysqli_query($con, $query);

if(!$result){
    die("Query Failed" . mysqli_error($con));
}

$json = array();

while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'producto' => $row['producto'],
        'descripcion' => $row['descripcion'],
        'fecha' => $row['fecha'],
        'usuario' => $row['usuario']
    );
}

$jsonstring = json_encode($json);

echo $jsonstring;

?>