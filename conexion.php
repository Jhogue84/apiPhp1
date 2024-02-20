<?php


    $host ="localhost";
    $user = "root";
    $pass = "";
    $db = "apirestphp";
    //$port = 85;

    $conexion = new mysqli($host, $user, $pass, $db);
    if ($conexion->connect_errno) {
        echo "No  se pudo realizar la conexion".$conexion->connect_error;
    }
    //else echo "Conexion exitosa<br>";
?>