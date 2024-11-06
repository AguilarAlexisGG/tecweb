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

        // SE USA CONSTRUCTOR DE LA SUBCLASE Suma
        $suma1 = new Suma(10, 10, 'Suma de valores');  
        $suma1->operar();
        $suma1->imprimirResultado();
        
        echo '<br>';

        // SE USA CONSTRUCTOR DE LA SUBCLASE Resta
        $resta1 = new Resta(10, 5, 'Resta de valores'); 
        $resta1->operar();
        $resta1->imprimirResultado();
    ?>
    
</body>
</html>