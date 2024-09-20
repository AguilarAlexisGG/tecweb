<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php 
        include 'src/funciones.php';
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if (esMultiplo($num))
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por:</p>
    <?php
        list($secuencias, $iteraciones) = generarNumerosAleatorios();
        echo "<h3>Secuencias</h3>";
        echo "<table border='1'>";
        echo "<tr><td>IMPAR</td><td>PAR</td><td>IMPAR</td></tr>";
        foreach ($secuencias as $secuencia) {
            echo "<tr>";
            foreach ($secuencia as $num) {
                echo "<td>$num</td>";
            }
            echo "</tr>";
        }
        echo "</table>";    
        $totalNum = $iteraciones * 3;
        echo "<p>$totalNum números obtenidos en $iteraciones iteraciones</p>";
    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>
    <?php
        if(isset($_GET['multiplo'])){
            $multiplo=$_GET['multiplo'];
            list($numero, $iteraciones) = multiploPorWhile($multiplo);
            echo '<p>Con While tenemos el número '.$numero.' en '.$iteraciones.' iteraciones</p>';
            list($numero, $iteraciones) = multiploPorDoWhile($multiplo);
            echo '<p>Con DoWhile tenemos el número '.$numero.' en '.$iteraciones.' iteraciones</p>';
        }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’.</p>
    <?php
        $ascii = valoresAscii();
        foreach ($ascii as $key => $value) {
            echo '['.$key.'] =>'.$value.'<br>';
        }
        
    ?>

    <h2>Ejercicio 5</h2>
    <p>Identificar si una persona es de sexo “femenino”, cuya edad oscile entre los 18 y 35 años</p> 
    <form action="" method="post">
        Sexo: 
        <select name="sexo" id="sexo">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select><br>
        Edad: 
        <input type="number" name="edad" id="edad"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($_POST['sexo']) && isset($_POST['edad'])){
            $sexo = $_POST['sexo'];
            $edad = $_POST['edad'];
            if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
                echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
            } else {
                echo "<p>Error: Sus datos no cumplen con los requisitos .</p>";
            }
        }        
    ?>

    <h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de una ciudad.</p>
    <?php
        $parqueVehicular = [
            'GHI7890' => [
                'Auto' => [
                    'Marca' => 'Ford',
                    'Modelo' => 2021,
                    'Tipo' => 'SUV'
                ],
                'Propietario' => [
                    'Nombre' => 'Carlos García',
                    'Ciudad' => 'Monterrey',
                    'Dirección' => 'Calle del Sol 789'
                ]
            ],
            'JKL3456' => [
                'Auto' => [
                    'Marca' => 'Chevrolet',
                    'Modelo' => 2018,
                    'Tipo' => 'pickup'
                ],
                'Propietario' => [
                    'Nombre' => 'Laura Fernández',
                    'Ciudad' => 'Tijuana',
                    'Dirección' => 'Calle Luna 321'
                ]
            ],
            'MNO1234' => [
                'Auto' => [
                    'Marca' => 'Mazda',
                    'Modelo' => 2022,
                    'Tipo' => 'sedan'
                ],
                'Propietario' => [
                    'Nombre' => 'David Hernández',
                    'Ciudad' => 'Puebla',
                    'Dirección' => 'Avenida Reforma 567'
                ]
            ],
            'PQR5678' => [
                'Auto' => [
                    'Marca' => 'Nissan',
                    'Modelo' => 2020,
                    'Tipo' => 'crossover'
                ],
                'Propietario' => [
                    'Nombre' => 'Ana Torres',
                    'Ciudad' => 'Cancún',
                    'Dirección' => 'Calle del Mar 234'
                ]
            ],
            'STU9101' => [
                'Auto' => [
                    'Marca' => 'Volkswagen',
                    'Modelo' => 2017,
                    'Tipo' => 'compacto'
                ],
                'Propietario' => [
                    'Nombre' => 'Roberto Martínez',
                    'Ciudad' => 'Querétaro',
                    'Dirección' => 'Calle Viento 123'
                ]
            ],
            'VWX2345' => [
                'Auto' => [
                    'Marca' => 'Tesla',
                    'Modelo' => 2023,
                    'Tipo' => 'eléctrico'
                ],
                'Propietario' => [
                    'Nombre' => 'Sofía Ramírez',
                    'Ciudad' => 'Mérida',
                    'Dirección' => 'Avenida Verde 789'
                ]
            ],
            'YZA3456' => [
                'Auto' => [
                    'Marca' => 'BMW',
                    'Modelo' => 2021,
                    'Tipo' => 'coupe'
                ],
                'Propietario' => [
                    'Nombre' => 'Miguel Ruiz',
                    'Ciudad' => 'León',
                    'Dirección' => 'Boulevard Dorado 456'
                ]
            ],
            'BCD6789' => [
                'Auto' => [
                    'Marca' => 'Audi',
                    'Modelo' => 2020,
                    'Tipo' => 'sedan'
                ],
                'Propietario' => [
                    'Nombre' => 'Valeria Pérez',
                    'Ciudad' => 'Toluca',
                    'Dirección' => 'Calle Real 789'
                ]
            ],
            'EFG9012' => [
                'Auto' => [
                    'Marca' => 'Hyundai',
                    'Modelo' => 2019,
                    'Tipo' => 'SUV'
                ],
                'Propietario' => [
                    'Nombre' => 'Jorge Mendoza',
                    'Ciudad' => 'Villahermosa',
                    'Dirección' => 'Calle Esmeralda 123'
                ]
            ],
            'HIJ2345' => [
                'Auto' => [
                    'Marca' => 'Kia',
                    'Modelo' => 2021,
                    'Tipo' => 'minivan'
                ],
                'Propietario' => [
                    'Nombre' => 'Elena Navarro',
                    'Ciudad' => 'Aguascalientes',
                    'Dirección' => 'Avenida Las Flores 567'
                ]
            ],
            'KLM4567' => [
                'Auto' => [
                    'Marca' => 'Peugeot',
                    'Modelo' => 2022,
                    'Tipo' => 'hatchback'
                ],
                'Propietario' => [
                    'Nombre' => 'Fernando Gutiérrez',
                    'Ciudad' => 'Saltillo',
                    'Dirección' => 'Calle del Bosque 890'
                ]
            ],
            'NOP7890' => [
                'Auto' => [
                    'Marca' => 'Renault',
                    'Modelo' => 2018,
                    'Tipo' => 'sedan'
                ],
                'Propietario' => [
                    'Nombre' => 'Gabriela Sánchez',
                    'Ciudad' => 'Morelia',
                    'Dirección' => 'Calle Diamante 345'
                ]
            ],
            'QRS0123' => [
                'Auto' => [
                    'Marca' => 'Subaru',
                    'Modelo' => 2020,
                    'Tipo' => 'SUV'
                ],
                'Propietario' => [
                    'Nombre' => 'Julio Castillo',
                    'Ciudad' => 'Oaxaca',
                    'Dirección' => 'Calle del Arco 678'
                ]
            ],
            'TUV3456' => [
                'Auto' => [
                    'Marca' => 'Mitsubishi',
                    'Modelo' => 2019,
                    'Tipo' => 'pickup'
                ],
                'Propietario' => [
                    'Nombre' => 'Paola Reyes',
                    'Ciudad' => 'Chihuahua',
                    'Dirección' => 'Calle Central 910'
                ]
            ],
            'WXY5678' => [
                'Auto' => [
                    'Marca' => 'Fiat',
                    'Modelo' => 2017,
                    'Tipo' => 'compacto'
                ],
                'Propietario' => [
                    'Nombre' => 'Santiago Lara',
                    'Ciudad' => 'Culiacán',
                    'Dirección' => 'Calle Norte 101'
                ]
            ]    
        ];
        print_r($parqueVehicular);
    ?>
    
    <h2>Consulta de Parque Vehicular</h2>
    <form action="" method="post">
        Matrícula:
        <input type="text" name="matricula" id="matricula">
        <input type="submit" name="consulta" value="Por Matricula">
        <input type="submit" name="consulta" value="Consultar Todos">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $consulta = $_POST['consulta'];
            $matricula = $_POST['matricula'];
            if ($consulta == "Por Matricula" && !empty($matricula)) {
                $matricula = $_POST['matricula'];
                if (isset($parqueVehicular[$matricula])) {
                    $vehiculo = $parqueVehicular[$matricula];
                    echo "<h3>Vehículo con Matrícula $matricula</h3>";
                    echo "<p>Marca: " . $vehiculo['Auto']['Marca'] . "</p>";
                    echo "<p>Modelo: " . $vehiculo['Auto']['Modelo'] . "</p>";
                    echo "<p>Tipo: " . $vehiculo['Auto']['Tipo'] . "</p>";
                    echo "<p>Propietario: " . $vehiculo['Propietario']['Nombre'] . "</p>";
                    echo "<p>Ciudad: " . $vehiculo['Propietario']['Ciudad'] . "</p>";
                    echo "<p>Dirección: " . $vehiculo['Propietario']['Dirección'] . "</p>";
                } else {
                echo "<p>No se encontró el vehículo con matrícula $matricula.</p>";
                }
            } elseif ($_POST['consulta'] == "Consultar Todos") {
                foreach ($parqueVehicular as $matricula => $vehiculo) {
                    echo "<h3>Matrícula: $matricula</h3>";
                    echo "<p>Marca: " . $vehiculo['Auto']['Marca'] . "</p>";
                    echo "<p>Modelo: " . $vehiculo['Auto']['Modelo'] . "</p>";
                    echo "<p>Tipo: " . $vehiculo['Auto']['Tipo'] . "</p>";
                    echo "<p>Propietario: " . $vehiculo['Propietario']['Nombre'] . "</p>";
                    echo "<p>Ciudad: " . $vehiculo['Propietario']['Ciudad'] . "</p>";
                    echo "<p>Dirección: " . $vehiculo['Propietario']['Dirección'] . "</p>";
                    echo "<br>";
                }
            }
        }
    ?>




    <!--
    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        /*
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
        */
    ?>
    -->
    
</body>
</html>