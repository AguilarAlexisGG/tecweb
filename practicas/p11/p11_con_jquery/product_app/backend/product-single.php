<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "select * from productos where id = {$id}";
        if($result = $conexion->query($sql)){
            if ($result->num_rows > 0){
                $data = $result->fetch_assoc();
            }
        }else {
            die('Error de consulta: '.mysqli_error($conexion));
        }
        $result->free();
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>