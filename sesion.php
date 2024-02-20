<?php 
    if(isset($_POST["etUsuario"]) && isset($_POST["etClave"])){
        include_once "conexion.php";
        $user = $_POST["etUsuario"];
        $clave = $_POST["etClave"];
        $json = array();

        $cadenaSql = "SELECT * FROM users WHERE usuario ='{$user}' AND clave='{$clave}'";
        $rta = mysqli_query($conexion, $cadenaSql);
        
        if ($cadenaSql){
            if($fila = mysqli_fetch_array($rta)){
                $json["data"][]=$fila;
            }
            mysqli_close($conexion);
            echo json_encode($json);
        }
        else{
            //json vacio
			$results["usuario"]='';
			$results["clave"]='';
            $results["mensaje"]='No existe el usuario';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
    }else{
        //json vacio
        $results["usuario"]='';
        $results["clave"]='';
        $results["mensaje"]='No se enviaron datos.';
        $json['datos'][]=$results;
        echo json_encode($json);
    }
?>
