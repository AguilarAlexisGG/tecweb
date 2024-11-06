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
        require_once __DIR__ . '/Cabecera.php';
        
        // SE USA EL PRIMER PARÁMETRO
        $cab1 = new Cabecera('El rincón del Programador');
        $cab1->graficar();

        echo '<br>';

        // SE USAN LOS PRIMEROS 2 PARÁMETROS
        $cab2 = new Cabecera('El rincón del Programador', 'left');
        $cab2->graficar();

        echo '<br>';

        // SE USAN LOS PRIMEROS 3 PARÁMETROS
        $cab3 = new Cabecera('El rincón del Programador', 'right', '#ff0000');
        $cab3->graficar();

        echo '<br>';

        // SE USAN TODOS LOS PARÁMETROS
        $cab4 = new Cabecera('El rincón del Programador', 'right', '#ff0000', '#ffff00');
        $cab4->graficar();
    ?>
    
</body>
</html>