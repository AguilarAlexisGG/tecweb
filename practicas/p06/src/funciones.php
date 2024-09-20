<?php
function esMultiplo($num) {
    return ($num % 5 == 0 && $num % 7 == 0);
}

function esImpar($num) {
    return $num % 2 != 0;
}

function esPar($num) {
    return $num % 2 == 0;
}

function generarNumerosAleatorios() {
    $secuencias = [];
    $iteraciones = 0;

    do {
        $iteraciones++;
        $num1 = rand(1, 1000);
        $num2 = rand(1, 1000);
        $num3 = rand(1, 1000);
        $secuencias[] = [$num1, $num2, $num3];
        if (esImpar($num1) && esPar($num2) && esImpar($num3)) {
            break;
        }
    } while (true);

    return [$secuencias, $iteraciones];
}

function multiploPorWhile($multi){
    $esMultiplo = false;
    $iteraciones = 0;
    while(!$esMultiplo){
        $iteraciones++;
        $num1 = rand(1, 1000);
        if(($num1%$multi)==0){
            $esMultiplo = true;
        }
    }
    return [$num1, $iteraciones];
}

function multiploPorDoWhile($multi){
    $iteraciones = 0;
    do{
        $iteraciones++;
        $num1 = rand(1, 1000);
    }while(($num1%$multi)!=0);

    return [$num1, $iteraciones];
}

function valoresAscii(){
    $arrregloAscii = [];
    for($n = 97; $n<= 122; $n++){
        $letra = chr($n);
        $arrregloAscii[$n] = $letra;
    }
    return $arrregloAscii;
}
?>