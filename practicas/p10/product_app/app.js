// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    if(!validar(finalJSON)){
        return;
    }

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
            let response = JSON.parse(client.responseText);
			if (response.status === "success") {
				alert("Producto agregado correctamente.");
			} else {
				alert(response.message);
			}
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

function buscarProducto(e){
    e.preventDefault();
    var id = document.getElementById('search').value;
    var client = getXMLHttpRequest();   
    client.open("POST", "./backend/read.php", true);
	client.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200){
            console.log('[CLIENTE]\n' + client.responseText);
            let productos = JSON.parse(client.responseText);
            document.getElementById("productos").innerHTML = "";
            if (Object.keys(productos).length > 0){
                let template = '';
                productos.forEach(producto =>{
                    let descripcion = "";
					descripcion += "<li>precio: " + producto.precio + "</li>";
					descripcion += "<li>unidades: " + producto.unidades + "</li>";
					descripcion += "<li>modelo: " + producto.modelo + "</li>";
					descripcion += "<li>marca: " + producto.marca + "</li>";
					descripcion += "<li>detalles: " + producto.detalles + "</li>";
                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;                    
                });
                document.getElementById("productos").innerHTML = template;
            }else{
                console.log("No se encontraron productos");
            }
        }
    }
    client.send("id="+id);
}

function validar(JSON){
    let esValido = true;
    //NOMBRE
    //let nombre = document.getElementById("nombre").value.trim();
    if(!JSON.nombre || JSON.nombre.length == 0){
        alert("Nombre Obligatorio");
        console.log("Nombre Obligatorio");
        esValido = false;
    }
    else if(JSON.nombre.length > 100){
        alert("Nombre muy largo");
        console.log("Nombre muy largo");
        esValido = false;
    }
//MARCA
    //let marca = document.getElementById("marca").value.trim();
    let marcas = ["DeWalt", "IUSA", "BELLOTA", "TRUPER", "PHILLIPS", "FIERO", "COFLEX"];
    if(!JSON.marca || JSON.marca.length == 0){
        alert("Marca Obligatortia");
        console.log("Marca Obligatortia");
        esValido = false;
    }else if(!marcas.includes(JSON.marca)){
        alert("La marca no es valida");
        console.log("La marca no es valida");
        esValido = false;
    }
//MODELO
    //let modelo = document.getElementById("modelo").value.trim();
    //let patronModelo = /^[a-zA-Z0-9\s]+$/;
    if(!JSON.modelo||  JSON.modelo.length == 0){
        alert("El modelo es obligatorio");
        console.log("El modelo es obligatorio");
        esValido = false;
    }else if(!/^[a-zA-Z0-9\s]+$/.test(JSON.modelo) || JSON.modelo.length > 25){
        alert("El modelo debe ser alfanumérico y maximo 25 caracteres.");
        console.log("El modelo debe ser alfanumérico y maximo 25 caracteres.");
        esValido = false;
    }
//PRECIO
    //let precio = parseFloat(document.getElementById("precio").value.trim());
    if(isNaN(JSON.precio)){
        alert("Precio Obligatortio");
        console.log("Precio Obligatortio");
        esValido = false;
    }
    else if(JSON.precio <= 99.99){
        alert("Precio debe ser mayor a 99.99");
        console.log("Precio debe ser mayor a 99.99");
        esValido = false;
    } 
//DETALLES
    //let detalles = document.getElementById("detalles").value.trim();
    if(JSON.detalles && JSON.detalles.length > 250){
        alert("Los detalles deben tener 250 caracteres o menos.");
        console.log("Los detalles deben tener 250 caracteres o menos.");
        esValido = false;
    }
//UNIDADES
    //let unidades = parseFloat(document.getElementById("unidades").value);
    if(isNaN(JSON.unidades)){
        alert("Unidades Obligatortio");
        console.log("Unidades Obligatortio");
        esValido = false;
    }
    else if(JSON.unidades < 0){
        alert("Unidades debe ser mayor o igual a 0");
        console.log("Unidades debe ser mayor o igual a 0");
        esValido = false;
    } 
//IMAGEN
    //let imagen = document.getElementById("imagen").value.trim();
    if (!JSON.imagen || JSON.imagen.length == 0) {
        JSON.imagen = "img/imagen.png";
        console.log("Ruta de Imagen Predeterminada");
    }
    return esValido;
}