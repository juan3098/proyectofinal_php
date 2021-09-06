<?php

include('../conexion.php');

$id = $_POST['id'];

$query = "SELECT * FROM productos WHERE id = $id";
$result = mysqli_query($con, $query);

if(!$result){
    die('Query Failed');
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

$jsonstring = json_encode($json[0]);
echo $jsonstring;

?>