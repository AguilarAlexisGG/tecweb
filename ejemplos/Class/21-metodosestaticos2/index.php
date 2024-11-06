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
        require_once __DIR__ . '/Calculadora.php';
        
        $x1 = 10;
        $x2 = 5;

        echo $x1.' + '.$x2.' = '.Calculadora::sumar($x1, $x2);
        echo '<br>';
        echo $x1.' - '.$x2.' = '.Calculadora::restar($x1, $x2);
        echo '<br>';
        echo $x1.' * '.$x2.' = '.Calculadora::multiplicar($x1, $x2);
        echo '<br>';
        echo $x1.' / '.$x2.' = '.Calculadora::dividir($x1, $x2);
?>
    
</body>
</html>