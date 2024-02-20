<?php
    //insercion de productor desde la app de android
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        require_once "conexion.php";
        $id = $_GET["id"];
        $cadenaSql = "SELECT * FROM productos WHERE id = $id";
        
        $rta = $conexion -> query($cadenaSql);
        
        if($conexion->affected_rows > 0){
            while ($fila = $rta -> fetch_assoc()){
                $productos []= $fila;     
            }
            echo json_encode($productos);    
        }
        else{
            $json = '[{"Mensaje": "No existe ese producto."}]';
            echo json_encode($json);
        } 
        $rta -> close();
        $conexion -> close();
        
    }
    else echo "No se realizo la peticion GET, enviando el parametro de busqueda."
?>