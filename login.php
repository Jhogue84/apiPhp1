<?php
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once "conexion.php";
        if(isset($_POST["etUsuario"]) && isset($_POST["etClave"])){
            $user = $_POST["etUsuario"];
            $pass = $_POST["etClave"];
        }

        //$user="jhogue8487";
        //$pass = "123";

        $cadenaSql = $conexion -> prepare("SELECT * FROM users WHERE usuario =? AND clave=?");
        $cadenaSql -> bind_param("ss",$user,$pass);
        $cadenaSql -> execute();
        $rta = $cadenaSql->get_result();
        if ($fila = $rta -> fetch_assoc()){
            echo json_encode($fila, JSON_UNESCAPED_UNICODE);     
        }
        $cadenaSql -> close();
        $conexion -> close();
    }
    else{
        $results["mensaje"]='No se enviaron datos.';
        $json['datos'][]=$results;
        echo json_encode($json);
        
    } 
?>