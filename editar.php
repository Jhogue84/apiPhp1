<?php
    //insercion de productor desde la app de android
    if($_SERVER["REQUEST_METHOD"] == "PUT"){
        require_once "conexion.php";
        $id = $_PUT["id"];
        $codigo = $_POST["tvCodigo"];
        $nombre = $_POST["tvNombre"];
        $precio = $_POST["tvPrecio"];
        $marca = $_POST["tvMarca"];
        $urlImg = $_POST['ivUrlImagen'];
        $descripcion = $_POST['tvDescripcion'];
        
        $query = "UPDATE productos SET codigo='$codigo', nombre='$nombre', precio=$precio, marca='$marca', urlimagen='$urlImg', descripcion='$descripcion' WHERE id=$id";
        $rta = $conexion->query($query);

        if($conexion->affected_rows > 0 && $rta == true){
            $json = '[{"Mensaje": "El producto se edito correctamente."}]';
            echo json_encode($json);
        }
        else{
            $json = '[{"Mensaje": "Error: El producto no se pudo editar."}]';
            echo json_encode($json);
        }
        $conexion -> close();
    }
    else echo "No se existe la peticion POST, no hay datos para editar."
?>