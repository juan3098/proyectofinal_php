<?php

include('../conexion.php');

$search = $_POST['buscar'];

if(!empty($search)){
    $query = "SELECT * FROM clientes WHERE nombre LIKE '$search%'";
    $result = mysqli_query($con, $query);
    if(!$result){
        die('Query Error' . mysqli_error($con));
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
}

?>