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
        echo "<h2>Secuencias Generadas</h2>";
        echo "<table>";
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