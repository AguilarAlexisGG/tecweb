<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // InvalidaSSS

        echo '<br><h4><p>1. Determina cuál de las siguientes variables son válidas y explica por qué: <p/></h4>'; 
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';

        echo '<br><h4><p>2. Proporcionar los valores de $a, $b, $c como sigue:<p/></h4>';
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo $a.'<br>';
        echo $b.'<br>';
        echo $c;

        echo '<br><h4><p>b. Agrega al código actual las siguientes asignaciones:<p/></h4>';
        
        $a = "PHP server";
        $b = &$a;

        echo $a.'<br>';
        echo $b.'<br>';

        echo '<br><h4><p>d. Describe en y muestra en la página obtenida qué ocurrió en el 
        segundo bloque de asignaciones<p/></h4>';

        echo '<p>Respuesta: Asignamos otro valor a la varible 
            $a y despues le asignamos a $b el valor de la 
            variable $a por referncia </p>';

        unset($a);
        unset($b);
        unset($c);

        echo '<br><h4><p>3. Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglo): <p/></h4>';
        $a = "PHP5";
            echo $a.'<br>';
        $z[] = &$a;
            print_r($z);
            echo '<br>';
        $b = "5a version de PHP";
            echo $b.'<br>';
        @$c = $b*10;
            echo $c.'<br>';
        $a .= $b;
            echo $a.'<br>';
        @$b *= $c;
            echo $b.'<br>';
        $z[0] = "MySQL";
            print_r($z);
            echo '<br>';

        echo '<br><h4><p>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        la matriz $GLOBALS o del modificador global de PHP.<p/></h4>';
        function mostrar(){
            echo '$a en el ambito global: '.$GLOBALS['a'].'<br>';
            echo '$b en el ambito global: '.$GLOBALS['b'].'<br>';
            echo '$c en el ambito global: '.$GLOBALS['c'].'<br>';
            echo '$z en el ambito global: ';
            print_r ($GLOBALS['z']) ;

        }        
        mostrar();

        echo '<br><h4><p>5. Dar el valor de las variables $a, $b, $c al final del siguiente script: <p/></h4>';
       
        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;

        echo $a.'<br>';
        echo $b.'<br>';
        echo $c.'<br>';

        unset($a);
        unset($b);
        unset($c);
        unset($z);

        echo '<br><h4><p>6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y 
        muéstralas usando la función var_dump(<datos>). <p/></h4>';
        
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        var_dump($a); echo '<br>';
        var_dump($b); echo '<br>';
        var_dump($c); echo '<br>';
        var_dump($d); echo '<br>';
        var_dump($e); echo '<br>';
        var_dump($f); echo '<br>';
       
        echo '<p><h4>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e 
        en uno que se pueda mostrar con un echo: </h6><p/>';

        //echo (bool) $a ? 'true' : 'false'; echo '<br>';
        //echo (bool) $b ? 'true' : 'false'; echo '<br>';
        echo (bool) $c ? 'true' : 'false'; echo '<br>';
        //echo (bool) $d ? 'true' : 'false'; echo '<br>';
        echo (bool) $e ? 'true' : 'false'; echo '<br>';
        //echo (bool) $f ? 'true' : 'false'; echo '<br>';

        echo '<p><h4> 7. Usando la variable predefinida $_SERVER, determina lo siguiente:</h6><p/>';
        echo '<p><h4>a. La versión de Apache y PHP.</h6><p/>';

        echo $_SERVER['SERVER_SOFTWARE'];
        
        echo '<p><h4>b. El nombre del sistema operativo (servidor).</h6><p/>';
        echo PHP_OS;

        echo '<p><h4>c. El idioma del navegador (cliente).</h6><p/>';
        echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];

    ?>
</body>
</html>