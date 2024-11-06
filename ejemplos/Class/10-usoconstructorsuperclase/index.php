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
        require_once __DIR__ . '/Operacion.php';
        
        // SE USA CONSTRUCTOR DE LA SUPERCLASE
        $suma1 = new Suma(10, 10);
        $suma1->operar();
        echo 'El resultado de 10+10 es: '.$suma1->getResultado();
        
        echo '<br>';

        // SE USA CONSTRUCTOR DE LA SUPERCLASE
        $resta1 = new Resta(10, 5);
        $resta1->operar();
        echo 'El resultado de 10-5 es: '.$resta1->getResultado();
    ?>
    
</body>
</html>