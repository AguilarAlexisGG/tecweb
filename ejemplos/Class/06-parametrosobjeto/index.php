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
        require_once __DIR__ . '/Opcion.php';
        require_once __DIR__ . '/Menu.php';
        
        $menu1 = new Menu ('horizontal');

        $opc1 = new Opcion('Facebook', 'https://www.facebook.com/', '#C3D9FF');
        // SE INSERTA OBJETO DE LA CLASE Opcion
        $menu1->insertar_opcion($opc1);

        $opc2 = new Opcion('Twitter', 'https://twitter.com/', '#CDEB8B');
        // SE INSERTA OBJETO DE LA CLASE Opcion
        $menu1->insertar_opcion($opc2);

        $opc3 = new Opcion('Instagram', 'https://www.instagram.com/', '#FFD9C3');
        // SE INSERTA OBJETO DE LA CLASE Opcion
        $menu1->insertar_opcion($opc3);

        $menu1->graficar();
    ?>
    
</body>
</html>