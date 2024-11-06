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
        
        // NADA CAMBIA CON RESPECTO AL EJEMPLO EN 08-herencia.
        // SIN EMBARGO, CREAR UN OBJETO DE LA CLASE Operacion GENERARÁ ERROR.
        $suma1 = new Suma;
        $suma1->cargar1(10);
        $suma1->cargar2(10);
        $suma1->operar();
        echo 'El resultado de 10+10 es: '.$suma1->getResultado();
        
        echo '<br>';

        // NADA CAMBIA CON RESPECTO AL EJEMPLO EN 08-herencia.
        // SIN EMBARGO, CREAR UN OBJETO DE LA CLASE Operacion GENERARÁ ERROR.
        $resta1 = new Resta;
        $resta1->cargar1(10);
        $resta1->cargar2(5);
        $resta1->operar();
        echo 'El resultado de 10-5 es: '.$resta1->getResultado();


    ?>
    
</body>
</html>