<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Persona.php';
        
        $per1 = new Persona;
        $per1->fijarNombreEdad('Juan', 20);
        echo 'Datos de la persona ($per1): ';
        echo $per1->retornarNombre().' - '.$per1->retornarEdad();

        echo '<br>';
        $per2 = clone($per1);

        echo 'Datos de la persona ($per2): ';
        echo $per2->retornarNombre().' - '.$per2->retornarEdad();
    ?>
    
</body>
</html>