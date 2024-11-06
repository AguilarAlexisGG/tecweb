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
        require_once __DIR__ . '/Cadena.php';
        
        $c = 'Hola';
        echo 'Cadena original: '.$c;
        echo '<br>';
        echo 'Largo: '.Cadena::largo($c);
        echo '<br>';
        echo 'Mayúsculas: '.Cadena::mayusculas($c);
        echo '<br>';
        echo 'Minúsculas: '.Cadena::minusculas($c);
    ?>
    
</body>
</html>