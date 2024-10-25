<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $id = $jsonOBJ -> id;
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $sql = "SELECT * FROM productos WHERE id = $id";
	    $result = $conexion->query($sql);
        
        if ($result->num_rows > 0) {
            $conexion->set_charset("utf8");
            $sql = "UPDATE productos SET
                    nombre = '{$jsonOBJ->nombre}',
                    marca = '{$jsonOBJ->marca}',
                    modelo = '{$jsonOBJ->modelo}',
                    precio = {$jsonOBJ->precio},
                    detalles = '{$jsonOBJ->detalles}',
                    unidades = {$jsonOBJ->unidades},
                    imagen = '{$jsonOBJ->imagen}'
                    WHERE id = '{$id}' AND eliminado = 0";
            if($conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] =  "Producto editado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }
        }

        $result->free();
        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);