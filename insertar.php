<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once "conexion.php";
        $codigo = $_POST["tvCodigo"];
        $nombre = $_POST["tvNombre"];
        $precio = $_POST["tvPrecio"];
        $marca = $_POST["tvMarca"];
        $urlImg = $_POST['ivUrlImagen'];
        $descripcion = $_POST['tvDescripcion'];
        
        $query = "INSERT INTO productos (codigo, nombre, precio, marca, urlimagen, descripcion) VALUES ('$codigo', '$nombre', $precio,'$marca', '$urlImg', '$descripcion')";

        $rta = $conexion->query($query);
        
        if($rta==true){
            echo "El producto, se inserto exitosamente.";
        }
        else echo "Error, no se puede insertar los datos del producto.";
        //cerramos todo
        $conexion -> close();
    }
    else echo "<br>No se existe la peticion POST, no hay datos para insertar."
?>