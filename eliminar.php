<?php
    //insercion de productor desde la app de android
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once "conexion.php";
        $id = $_POST["id"];
        $cadenaSql = "DELETE FROM productos WHERE id = $id";
        
        $rta = $conexion -> query($cadenaSql);
        
        if($conexion->affected_rows > 0 && $rta == true){
            $json = '[{"Mensaje": "El producto se elimino correctamente."}]';
            echo json_encode($json);
              
        }
        else{
            $json = '[{"Mensaje": "Error: No existe ese producto para poder eliminar."}]';
            echo json_encode($json);
        } 
        $conexion -> close();
        
    }
    else echo "No se realizo la peticion POST, enviando el parametro de eliminacion."
?>