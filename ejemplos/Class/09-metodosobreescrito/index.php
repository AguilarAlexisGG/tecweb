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
        
        $suma1 = new Suma;
        $suma1->cargar1(10);
        $suma1->cargar2(10);
        $suma1->operar();
        // SE USA MÉTODO SOBRESCRITO DE LA SUBCLASE Suma
        $suma1->imprimirResultado();
        
        echo '<br>';

        $resta1 = new Resta;
        $resta1->cargar1(10);
        $resta1->cargar2(5);
        $resta1->operar();
        // SE USA MÉTODO  SOBRESCRITO DE LA SUBCLASE Resta
        $resta1->imprimirResultado();
    ?>
    
</body>
</html>