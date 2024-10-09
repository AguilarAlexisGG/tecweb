/*
function getDatos(){
    var nombre = prompt('Nombre: ', '');
    var edad = prompt('Edad: ', 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre: ' + nombre + '</h3>';
    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad: ' + edad + '</h3>';
}
*/
function ejemplo_1(){
    var div1 = document.getElementById('ej_1');
    div1.innerHTML = '<p>Hola Mundo</p>';
}
function ejemplo_2(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var div2 = document.getElementById('ej_2');
    div2.innerHTML = '<p>' + nombre + '<br>' + edad + '<br>' + altura + '<br>' + casado + '</p>';
}
function ejemplo_3(){
    var nombre = prompt('Nombre: ', '');
    var edad = prompt('Edad: ', 0);

    var div3 = document.getElementById('ej_3');
    div3.innerHTML = '<p>Hola ' + nombre + ' así que tienes ' + edad + '</p>';
}
function ejemplo_4(){
    var valor1 = prompt('Introducir primer número','');
    var valor2 = prompt('Introducir primer número','');
    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    var div4 = document.getElementById('ej_4');
    div4.innerHTML = '<p>La suma es: ' + suma + '<br> El producto es: ' + producto + '</p>';
}
function ejemplo_5(){
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) {
        var div5 = document.getElementById('ej_5');
        div5.innerHTML = '<p>' + nombre + ' esta aprobado con un ' + nota + '</p>';
    }
}
function ejemplo_6(){
    var num1 = prompt('Ingresa el primer número:', '');
    var num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    var div6 = document.getElementById('ej_6');
    if (num1>num2) {
        div6.innerHTML = '<p>El mayor es ' + num1 + '</p>';
    }
    else {
        div6.innerHTML = '<p>El mayor es ' + num2 + '</p>';
    }
}
function ejemplo_7(){
    var nota1 = prompt('Ingresa 1ra. nota:', '');
    var nota2 = prompt('Ingresa 2da. nota:', '');
    var nota3 = prompt('Ingresa 3ra. nota:', '');
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var promedio = (nota1+nota2+nota3)/3;
    var div7 = document.getElementById('ej_7');
    if (promedio>=7) {
            div7.innerHTML = '<p>Aprobado</p>';
        }
        else {
        if (promedio>=4) {
            div7.innerHTML = '<p>Regular</p>';
        }
        else {
            div7.innerHTML = '<p>Reprobado</p>';
        }
    }
}
function ejemplo_8(){
    var valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    valor = parseInt(valor);

    var div8 = document.getElementById('ej_8');
    switch (valor) {
        case 1: div8.innerHTML = '<p>uno</p>';
            break;
        case 2: div8.innerHTML = '<p>dos</p>';
            break;  
        case 3: div8.innerHTML = '<p>tres</p>';                                                 
            break;
        case 4: div8.innerHTML = '<p>cuatro</p>';
            break;
        case 5: div8.innerHTML = '<p>cinco</p>';
            break;
        default: div8.innerHTML = '<p>Debe ingresar un valor comprendido entre 1 y 5.</p>';
    }
}
function ejemplo_9(){
    var col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '');
    switch (col) {
    case 'rojo': document.bgColor='#ff0000';
        break;
    case 'verde': document.bgColor='#00ff00';
        break;
    case 'azul': document.bgColor='#0000ff';
        break;
    }
}
function ejemplo_10(){
    var x = 1;
    var contenido = '';
    while (x<=100) {
    contenido += x + '<br>';
    x = x+1;
    }

    var div10 = document.getElementById('ej_10');
    div10.innerHTML = '<p>' + contenido + '</p>';
}
function ejemplo_11(){
    var x = 1;
    var suma = 0;
    var valor;
    while (x<=5){
    valor = prompt('Ingresa el valor:', '');
    valor = parseInt(valor);
    suma += valor;
    x += 1;
    }

    var div11 = document.getElementById('ej_11');
    div11.innerHTML = "<p>La suma de los valores es " + suma + "</p>";
}
function ejemplo_12(){
    var valor;
    var contenido = ''
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        if (valor<10)
            contenido += 'El valor ' + valor + ' tiene 1 digitos<br>';
        else
            if (valor<100) {
                contenido += 'El valor ' + valor + ' tiene 2 digitos<br>';
            }
            else {
                contenido += 'El valor ' + valor + ' tiene 3 digitos<br>';
            }
    }while(valor != 0);

    var div12 = document.getElementById('ej_12');
    div12.innerHTML = '<p>' + contenido + '</p>';
}
function ejemplo_13(){
    var i;
    var contenido = "";
    for(i=1; i<=10; i++){
        contenido+= i + ' ';
    }

    var div13 = document.getElementById('ej_13');
    div13.innerHTML = '<p>' + contenido + '</p>';

}
function ejemplo_14(){
    var contenido = 'Cuidado<br>Ingresa tu documento correctamente<br>'
    contenido+= contenido + contenido;

    var div14 = document.getElementById('ej_14');
    div14.innerHTML = '<p>' + contenido + '</p>';
}
function ejemplo_15(){
    function mostrarMensaje() {
        var cadena = 'Cuidado<br>Ingresa tu documento correctamente<br>';
        div15.innerHTML += cadena;
    }
    var div15 = document.getElementById('ej_15');
    div15.innerHTML = '';
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}
function ejemplo_16(){
    function mostrarRango(x1,x2) {
        var cadena = '';
        var inicio;
        var div16 = document.getElementById('ej_16');
        for(inicio=x1; inicio<=x2; inicio++) {
            cadena+= inicio + ' ';
        }
        div16.innerHTML = '<p>' + cadena + '</p>';
    }
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}
function ejemplo_17(){
    function convertirCastellano(x) {
        if(x==1)
            return 'uno';
        else
            if(x==2)
                return 'dos';
            else
                if(x==3)
                    return 'tres';
                else
                    if(x==4)
                        return 'cuatro';
                    else
                        if(x==5)
                            return 'cinco';
                        else
                            return 'valor incorrecto';
    }
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);

    var div17 = document.getElementById('ej_17');
    div17.innerHTML = '<p>' + r + '</p>';
}
function ejemplo_18(){
    function convertirCastellano(x) {
        switch (x) {
            case 1: return "uno";
            case 2: return "dos";
            case 3: return "tres";
            case 4: return "cuatro";
            case 5: return "cinco";
            default: return "valor incorrecto";
        }
    }
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);

    var div18 = document.getElementById('ej_18');
    div18.innerHTML = '<p>' + r + '</p>';
}