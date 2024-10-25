// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

$(document).ready(function(e){

    let edit = false;
    console.log("jQuey esta trabajando");
    //$('#product-result').hide();
    listarProductos();

    $('#search').keyup(function(e){
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php',
                type: 'POST',
                data: {search},
                success: function(response){
                    let productos = JSON.parse(response);
                    if (Object.keys(productos).length > 0){
                        let template = '';
                        let template_bar = '';
                        
                        productos.forEach(producto => {
                            let descripcion = `
                                <li>precio: ${producto.precio}</li>
                                <li>unidades: ${producto.unidades}</li>
                                <li>modelo: ${producto.modelo}</li>
                                <li>marca: ${producto.marca}</li>
                                <li>detalles: ${producto.detalles}</li>
                            `;
    
                            template += `
                                <tr productId="${producto.id}">
                                    <td>${producto.id}</td>
                                    <td>
                                        <a href="#" class="product-item">${producto.nombre}</a>
                                    </td>
                                    <td><ul>${descripcion}</ul></td>
                                    <td>
                                        <button class="product-delete btn btn-danger" data-id="${producto.id}">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            `;
    
                            template_bar += `<li>${producto.nombre}</li>`;
                        });   
                         
                        $("#product-result").addClass("card my-4 d-block").show();
                        $("#container").html(template_bar);
                        $("#products").html(template);  
                    }
                }
            })
        }
    });

    $('#product-form').submit(function(e){
        e.preventDefault();

        const descripcion = JSON.parse($("#description").val());
        const POSTData = {
            id: $('#productId').val(),
            nombre: $('#name').val(),
            marca: descripcion.marca,
		    modelo: descripcion.modelo,
		    precio: descripcion.precio,
		    detalles: descripcion.detalles,
		    unidades: descripcion.unidades,
		    imagen: descripcion.imagen,
        }
        if(!validar(POSTData)){
            return;
        }
        let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        $.post(
            url, 
            JSON.stringify(POSTData), 
            function(response){
                let template_bar = "";
                template_bar += `
                <li style="list-style: none;">status: ${response.status}</li>
                <li style="list-style: none;">message: ${response.message}</li>
                `;
                $("#product-result").addClass("card my-4 d-block").show();
                $("#container").html(template_bar);
                listarProductos();
                $("#product-form").trigger("reset");
                $("#description").val(JSON.stringify(baseJSON, null, 2));
            },
            'json'
        );
    });

    $(document).on('click', '.product-delete', function(){
        if(confirm("De verdad deseas eliinar el Producto")){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('productId');
            $.get(
                './backend/product-delete.php',
                {id},
                function(response){
                    let template_bar = "";
                    template_bar += `
                    <li style="list-style: none;">status: ${response.status}</li>
                    <li style="list-style: none;">message: ${response.message}</li>
                    `;
                    $("#product-result").addClass("card my-4 d-block").show();
                    $("#container").html(template_bar);
                    listarProductos();
                },
                'json'
            );
        }
    });

    $(document).on('click', '.product-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        $.post(
            './backend/product-single.php',
            {id},
            function(response){
                const producto = JSON.parse(response);
                $("#productId").val(producto.id);
                $("#name").val(producto.nombre);
                const descripcion = {
                    precio: producto.precio,
                    unidades: producto.unidades,
                    modelo: producto.modelo || "XX-000",
                    marca: producto.marca || "NA",
                    detalles: producto.detalles || "NA",
                    imagen: producto.imagen || "img/default.png"
                };
                $("#description").val(JSON.stringify(descripcion, null, 2));
                edit = true;
            },
            //'json'
        );
    })
});

function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        success: function(response){
            let productos = JSON.parse(response);
            if(Object.keys(productos).length > 0){
                let template = '';
                productos.forEach(producto =>{
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>
                                <a href="#" class="product-item">${producto.nombre}</a>
                            </td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $("#products").html(template); 
            }
        }
    });
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









// FUNCIÓN CALLBACK AL CARGAR LA PÁGINA O AL AGREGAR UN PRODUCTO
function DELETElistarProductos() {
    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('GET', './backend/product-list.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            //console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                let template = '';

                productos.forEach(producto => {
                    // SE COMPRUEBA QUE SE OBTIENE UN OBJETO POR ITERACIÓN
                    //console.log(producto);

                    // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';
                
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("products").innerHTML = template;
            }
        }
    };
    client.send();
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function DELETEbuscarProducto(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var search = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('GET', './backend/product-search.php?search='+search, true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            //console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                let template_bar = '';

                productos.forEach(producto => {
                    // SE COMPRUEBA QUE SE OBTIENE UN OBJETO POR ITERACIÓN
                    //console.log(producto);

                    // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';
                
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;

                    template_bar += `
                        <li>${producto.nombre}</il>
                    `;
                });
                // SE HACE VISIBLE LA BARRA DE ESTADO
                document.getElementById("product-result").className = "card my-4 d-block";
                // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                document.getElementById("container").innerHTML = template_bar;  
                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("products").innerHTML = template;
            }
        }
    };
    client.send();
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function DELETEagregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

/**
 * AQUÍ DEBES AGREGAR LAS VALIDACIONES DE LOS DATOS EN EL JSON
 * ...
 * 
 * --> EN CASO DE NO HABER ERRORES, SE ENVIAR EL PRODUCTO A AGREGAR
 */

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/product-add.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(client.responseText);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;

            // SE HACE VISIBLE LA BARRA DE ESTADO
            document.getElementById("product-result").className = "card my-4 d-block";
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            document.getElementById("container").innerHTML = template_bar;

            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
        }
    };
    client.send(productoJsonString);
}

// FUNCIÓN CALLBACK DE BOTÓN "Eliminar"
function DELETEeliminarProducto() {
    if( confirm("De verdad deseas eliinar el Producto") ) {
        var id = event.target.parentElement.parentElement.getAttribute("productId");
        //NOTA: OTRA FORMA PODRÍA SER USANDO EL NOMBRE DE LA CLASE, COMO EN LA PRÁCTICA 7

        // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
        var client = getXMLHttpRequest();
        client.open('GET', './backend/product-delete.php?id='+id, true);
        client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            if (client.readyState == 4 && client.status == 200) {
                console.log(client.responseText);
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                let respuesta = JSON.parse(client.responseText);
                // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
                let template_bar = '';
                template_bar += `
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        `;

                // SE HACE VISIBLE LA BARRA DE ESTADO
                document.getElementById("product-result").className = "card my-4 d-block";
                // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                document.getElementById("container").innerHTML = template_bar;

                // SE LISTAN TODOS LOS PRODUCTOS
                listarProductos();
            }
        };
        client.send();
    }
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function DELETEgetXMLHttpRequest() {
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