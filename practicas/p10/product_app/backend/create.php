<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        $mensaje = "";

        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);

        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca; 
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        $resultado = "SELECT EXISTS (SELECT * FROM productos WHERE nombre = ? and marca = ? and modelo = ?);";
        $stmt = $conexion->prepare($resultado);
        $stmt->bind_param('sss', $nombre, $marca, $modelo);
        $stmt->execute();
        $stmt->bind_result($existe);
        $stmt->fetch();
        $stmt->close();

        if($existe == "0"){
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssdsis",
                $nombre, 
                $marca, 
                $modelo, 
                $precio, 
                $detalles, 
                $unidades, 
                $imagen
            );
   
            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Producto insertado exitosamente."]);
            } else {
                echo json_encode(["success" => false, "message" => "Error al insertar el producto."]);
            }
            $stmt->close();
        }
        else{
            echo json_encode(["success" => false, "message" => 'Ya existe un registro con los valores Nombre, Maraca y Modelo']);
        }

        $conexion->close();
        //echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;
    }
?>