<?php 

include ('php/conexion.php');

session_start();

if(!isset($_SESSION['id'])){
    header("Location: inicio.php");
}

if(!empty($_POST)){

    $usuario = $_POST['usuario'];
    $password = $_POST['pass'];

    $consulta = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND password = '$password' ";

    $resultado = $con->query($consulta);
    $rows = $resultado->num_rows;

    if($rows > 0){
        $row = $resultado->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        
        header("Location: inicio.php");
    } else {
        header("Location: index.html");
    }

}

?>