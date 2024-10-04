<?php
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'nombre_producto';
$marca  = isset($_POST['marca']) ? $_POST['marca'] : 'marca_producto';
$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : 'modelo_producto';
$precio = isset($_POST['precio']) ? $_POST['precio'] : 1.0;
$detalles = isset($_POST['detalles']) ? $_POST['detalles'] : 'detalles_producto';
$unidades = isset($_POST['unidades']) ? $_POST['unidades'] : 1;

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_destino = "img/{$modelo}." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);

    if (move_uploaded_file($imagen_tmp, $imagen_destino)) {
        //echo 'Imagen subida con éxito a: ' . $imagen_destino;
        $imagen = $imagen_destino;
    } else {
        //echo 'Error al mover la imagen subida.';
        $imagen = 'img/imagen.png';
    }
} else {
    //echo 'Error al subir la imagen: ' . $_FILES['imagen']['error'];
    $imagen = 'img/imagen.png';
}

/** SE CREA EL OBJETO DE CONEXION */
$link = new mysqli('localhost', 'root', 'sapo123', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

$resultado = $link->query("SELECT EXISTS (SELECT * FROM productos WHERE nombre='{$nombre}' and marca='{$marca}' and modelo='{$modelo}');");
$row = mysqli_fetch_row($resultado);

if($row[0]=="0")
{
    /** Crear una tabla que no devuelve un conjunto de resultados */
    $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}',
        '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
    if ( $link->query($sql) ) 
    {
        echo 'Producto insertado con ID: '.$link->insert_id.'<br/>';
        echo "Nombre: {$nombre}<br/>";
        echo "Marca: {$marca}<br/>";
        echo "Modelo: {$modelo}<br/>";
        echo "Precio: {$precio}<br/>";
        echo "Detalles: {$detalles}<br/>";
        echo "Unidades: {$unidades}<br/>";
        echo "Imagen: <br/><img src='{$imagen}' style='height:200px; width:200px';/>"; 
    } else
    {
        echo 'El Producto no pudo ser insertado =(';
    }
} else{
    echo 'Ya existe un registro con los valores Nombre, Maraca y Modelo';
}

?>