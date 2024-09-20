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
        if(isset($_POST['sexo'])&isset($_POST['edad'])){
            $sexo = $_POST['sexo'];
            $edad = $_POST['edad'];
            if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
                echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
            } else {
                echo "<p>Error: Sus datos no cumplen con los requisitos .</p>";
            }
        }        
    ?>
    




    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
    
    
</body>
</html>