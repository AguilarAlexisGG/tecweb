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
        $per1->inicializar('Fulano');
        $per1->mostrar();

        $per2 = new Persona;
        $per2->inicializar('Mengano');
        $per2->mostrar();
    ?>

</body>
</html>