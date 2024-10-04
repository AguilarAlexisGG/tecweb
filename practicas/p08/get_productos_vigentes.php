<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>Productos Vigentes</h3>

    <?php
    // Crear el objeto de conexión a la base de datos
    @$link = new mysqli('localhost', 'root', 'sapo123', 'marketzone');

    // Comprobar la conexión
    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error . '<br/>');
    }
    // Realizar la consulta para obtener los productos
    if ($result = $link->query("SELECT * FROM productos WHERE eliminado = 0")) {
        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>#</th><th>Nombre</th><th>Marca</th><th>Modelo</th><th>Precio</th><th>Unidades</th><th>Detalles</th><th>Imagen</th></tr></thead>';
            echo '<tbody>';

            // Recorrer los resultados y mostrarlos en la tabla
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['marca']) . '</td>';
                echo '<td>' . htmlspecialchars($row['modelo']) . '</td>';
                echo '<td>' . htmlspecialchars($row['precio']) . '</td>';
                echo '<td>' . htmlspecialchars($row['unidades']) . '</td>';
                echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
                echo '<td><img src="' . htmlspecialchars($row['imagen']) . '" style="height:200px; width:200px"></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<p>No se encontraron productos vigentes </p>';
        }

        // Liberar la memoria asociada al resultado
        $result->free();
    } else {
            echo '<p>Error en la consulta a la base de datos.</p>';
    }
        
    // Cerrar la conexión a la base de datos
    $link->close();
    ?>
</body>
</html>
