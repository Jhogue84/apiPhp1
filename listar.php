<?php
    //insercion de productor desde la app de android
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        require_once "conexion.php";
        $rta = $conexion->query("SELECT * FROM productos");
        //var_dump($rta);

        if($conexion->affected_rows>0){
            //echo "si hay resultados";
            //$json = "[";
            
            while ($fila = $rta -> fetch_assoc()){
                $productos []= $fila;
                //$productos [] = array($fila);
                //$productos = array_map('utf8_encode', $fila);
                
            }
            
            echo json_encode($productos);
            
            $rta->close();
            $conexion ->close();
            
        }
        else{
            $json = '[{"Mensaje": "No existen productos para listar"}]';
            echo json_encode($json);
            echo "no hay resultado";
        }
        
   }

?>