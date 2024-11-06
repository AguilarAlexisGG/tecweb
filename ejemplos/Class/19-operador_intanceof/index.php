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
        require_once __DIR__ . '/Trabajador.php';
        
        $vec[] = new Empleado('Juan', 1200);
        $vec[] = new Empleado('Ana', 1000);
        $vec[] = new Empleado('Carlos', 1000);

        $vec[] = new Gerente('Jorge', 25000);
        $vec[] = new Gerente('Marcos', 8000);

        $suma1 = 0;
        $suma2 = 0;

        for($i=0; $i<count($vec); $i++) {
            // USO DEL OPERADOR instanceof
            if($vec[$i] instanceof Empleado) {
                $suma1 += $vec[$i]->retornarSueldo();
            }
            else {
                // USO DEL OPERADOR instanceof
                if($vec[$i] instanceof Gerente) {
                    $suma2 += $vec[$i]->retornarSueldo();
                }
            }
        }

        echo 'Gastos en sueldos de Empleados: '.$suma1;
        echo '<br>';
        echo 'Gastos en sueldos de Gerentes: '.$suma2;
    ?>
    
</body>
</html>