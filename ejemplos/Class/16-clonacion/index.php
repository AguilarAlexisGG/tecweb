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

        $x = $per1;
        echo 'Datos de la persona ($x): ';
        echo $x->retornarNombre().' - '.$x->retornarEdad();

        $x->fijarNombreEdad('Ana', 25);
        echo '<p>Después de fijar datos de $x</p>';

        echo 'Datos de la persona ($per1): ';
        echo $per1->retornarNombre().' - '.$per1->retornarEdad();

        echo '<br>';

        echo 'Datos de la persona ($x): ';
        echo $x->retornarNombre().' - '.$x->retornarEdad();

        $per2 = clone($per1);
        
        $per1->fijarNombreEdad('Luis', 50);
        echo '<p>Después de fijar datos de $per1</p>';

        echo 'Datos de la persona ($per1): ';
        echo $per1->retornarNombre().' - '.$per1->retornarEdad();

        echo '<br>';

        echo 'Datos de la persona ($per2): ';
        echo $per2->retornarNombre().' - '.$per2->retornarEdad();
    ?>
    
</body>
</html>