// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

$(document).ready(function(){
    let edit = false;

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos.forEach(producto => {
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
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }

    function validar(JSON){
        let template_bar = '';
        let esValido = true;
    //NOMBRE
        //let nombre = document.getElementById("nombre").value.trim();
        if(!JSON.nombre || JSON.nombre.length == 0){
            esValido = false;
            template_bar += `
                <li style="list-style: none;">message: Nombre Obligatortio</li>
            `;
        }
        else if(JSON.nombre.length > 100){
            esValido = false;
        }
    //MARCA
        //let marca = document.getElementById("marca").value.trim();
        let marcas = ["DeWalt", "IUSA", "BELLOTA", "TRUPER", "PHILLIPS", "FIERO", "COFLEX"];
        if(!JSON.marca || JSON.marca.length == 0){
            esValido = false;
            template_bar += `
                <li style="list-style: none;">message: Marca Obligatortia</li>
            `;
        }else if(!marcas.includes(JSON.marca)){
            
            esValido = false;
        }
    //MODELO
        //let modelo = document.getElementById("modelo").value.trim();
        //let patronModelo = /^[a-zA-Z0-9\s]+$/;
        if(!JSON.modelo||  JSON.modelo.length == 0){
            esValido = false;
            template_bar += `
                <li style="list-style: none;">message: Modelo Obligatortio</li>
            `;
        }else if(!/^[a-zA-Z0-9\s]+$/.test(JSON.modelo) || JSON.modelo.length > 25){
            esValido = false;
        }
    //PRECIO
        //let precio = parseFloat(document.getElementById("precio").value.trim());
        if(JSON.precio == ''){
            esValido = false;
            template_bar += `
            <li style="list-style: none;">message: Precio Obligatortio</li>
            `;
        }
        else if(JSON.precio <= 99.99){
            esValido = false;
        } 
    //DETALLES
        //let detalles = document.getElementById("detalles").value.trim();
        if(JSON.detalles && JSON.detalles.length > 250){
            esValido = false;
        }
    //UNIDADES
        //let unidades = parseFloat(document.getElementById("unidades").value);
        if(JSON.unidades == ''){
            esValido = false;
            template_bar += `
                <li style="list-style: none;">message: Unidades Obligatortio</li>
            `;
        }
        else if(JSON.unidades < 0){
            esValido = false;
        }
    //IMAGEN
    if (!JSON.imagen || JSON.imagen.length == 0) {
        JSON.imagen = "img/imagen.png";
    }
        $('#product-result').show();
        $('#container').html(template_bar);
        return esValido;
    }

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos = JSON.parse(response);
                        
                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if(Object.keys(productos).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
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
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
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
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    $('#product-form').submit(e => {
        e.preventDefault();

        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let postData = {
            id: $('#productId').val(),
            nombre: $('#name').val(),
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            precio: $('#precio').val(),
            detalles: $('#detalles').val(),
            unidades: $('#unidades').val(),
            imagen: $('#imagen').val()
        };
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        //**/postData['nombre'] = $('#name').val();
        //**/postData['id'] = $('#productId').val();
        /**
         * AQUÍ DEBES AGREGAR LAS VALIDACIONES DE LOS DATOS EN EL JSON
         * --> EN CASO DE NO HABER ERRORES, SE ENVIAR EL PRODUCTO A AGREGAR
         **/
        console.log(postData);
        if(!validar(postData)){
            return;
        }

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, postData, (response) => {
            //console.log(response);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(response);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
            // SE REINICIA EL FORMULARIO
            $('#name').val(''); // SE LIMPIA EL CAMPO DE NOMBRE
            $('#marca').val(''); // SE LIMPIA EL CAMPO DE MARCA
            $('#modelo').val(''); // SE LIMPIA EL CAMPO DE MODELO
            $('#precio').val(''); // SE LIMPIA EL CAMPO DE PRECIO
            $('#detalles').val(''); // SE LIMPIA EL CAMPO DE DETALLES
            $('#unidades').val(''); // SE LIMPIA EL CAMPO DE UNIDADES
            $('#imagen').val(''); // SE LIMPIA EL CAMPO DE IMAGEN
            $('#productId').val(''); // SE LIMPIA EL CAMPO DE ID
            $('#product-result').show();
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
        });
    });

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
            // SE CONVIERTE A OBJETO EL JSON OBTENIDO
            let product = JSON.parse(response);
            // SE INSERTAN LOS DATOS ESPECIALES EN LOS CAMPOS CORRESPONDIENTES
            $('#name').val(product.nombre);
            // EL ID SE INSERTA EN UN CAMPO OCULTO PARA USARLO DESPUÉS PARA LA ACTUALIZACIÓN
            $('#productId').val(product.id);
            $('#marca').val(product.marca);
            $('#modelo').val(product.modelo);
            $('#precio').val(product.precio);
            $('#detalles').val(product.detalles);
            $('#unidades').val(product.unidades);
            $('#imagen').val(product.imagen);

            // SE ELIMINA nombre, eliminado E id PARA PODER MOSTRAR EL JSON EN EL <textarea>
            //delete(product.nombre);
            //delete(product.eliminado);
            //delete(product.id);
            // SE CONVIERTE EL OBJETO JSON EN STRING
            //let JsonString = JSON.stringify(product,null,2);
            // SE MUESTRA STRING EN EL <textarea>
            //$('#description').val(JsonString);
            
            // SE PONE LA BANDERA DE EDICIÓN EN true
            edit = true;
        });
        e.preventDefault();
    });  
    
    $('#name').keyup(function(e) {
        e.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        var name = $('#name').val();
        //console.log(name);
        $.ajax({
            url: './backend/product-singleByName.php',
            data: {name: name},
            type: 'GET',
            success: function(response){
                let productos = JSON.parse(response);
                let template_bar = '';
                if (Object.keys(productos).length > 0) {
                    template_bar += `<li>El nombre ya existe en la base de datos</li>`;
                } else {
                    template_bar += `<li>Nombre valido</li>`;
                }
                $('#product-result').show();
                $('#container').html(template_bar);
            }
        });
    });
    
});

function validarNombre(){
    let template_bar = '';
    let nombre = document.getElementById("name").value.trim();
    document.getElementById("error-name").textContent = "";
    if(nombre == ""){
        template_bar += `
            <li style="list-style: none;">status: Error</li>
            <li style="list-style: none;">message: Nombre Obligatorio</li>
        `;
        document.getElementById("error-name").innerHTML = "<p>Nombre Obligatorio</p>";
        document.getElementById("name").classList.add('invalid');
        document.getElementById("name").classList.remove('valid');
    }
    else if(nombre.length > 100){
        template_bar += `
            <li style="list-style: none;">status: Error</li>
            <li style="list-style: none;">message: Nombre muy largo</li>
        `;
        document.getElementById("error-nombre").innerHTML = "<p>Nombre muy largo</p>";
        document.getElementById("name").classList.add('invalid');
        document.getElementById("name").classList.remove('valid');
    }else{
        document.getElementById("name").classList.add('valid');
        document.getElementById("name").classList.remove('invalid');
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}

function validarMarca(){
    let template_bar = '';
    let marca = document.getElementById("marca").value.trim();
    document.getElementById("error-marca").textContent = "";
    if(marca == ""){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: Marca Obligatortio</li>
        `;
        document.getElementById("error-marca").innerHTML = "<p>Marca Obligatortio</p>";
        document.getElementById("marca").classList.add('invalid');
        document.getElementById("marca").classList.remove('valid');
    }else{
        document.getElementById("marca").classList.add('valid');
        document.getElementById("marca").classList.remove('invalid');
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}

function validarModelo(){
    let template_bar = '';
    let modelo = document.getElementById("modelo").value.trim();
    document.getElementById("error-modelo").textContent = "";
    let patronModelo = /^[a-zA-Z0-9\s]+$/;
    if(modelo === "" || modelo.length > 25 || !patronModelo.test(modelo)){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: El modelo es obligatorio, debe ser alfanumérico y maximo 25 caracteres.</li>
        `;
        document.getElementById("error-modelo").innerHTML = "<p>El modelo es obligatorio, debe ser alfanumérico y maximo 25 caracteres.</p>";
        document.getElementById("modelo").classList.add('invalid');
        document.getElementById("modelo").classList.remove('valid');
    }else{
        document.getElementById("modelo").classList.add('valid');
        document.getElementById("modelo").classList.remove('invalid');
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}

function validarPrecio(){
    let template_bar = '';
    let precio = parseFloat(document.getElementById("precio").value.trim());
    document.getElementById("error-precio").textContent = "";
    if(isNaN(precio)){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: Precio Obligatortio</li>
        `;
        document.getElementById("error-precio").innerHTML = "<p>Precio Obligatortio</p>";
        document.getElementById("precio").classList.add('invalid');
        document.getElementById("precio").classList.remove('valid');
    }
    else if(precio <= 99.99){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: Debe ser mayor a 99.9</li>
        `;
        document.getElementById("error-precio").innerHTML = "<p>Debe ser mayor a 99.99</p>";
        document.getElementById("precio").classList.add('invalid');
        document.getElementById("precio").classList.remove('valid');
    }else{
        document.getElementById("precio").classList.add('valid');
        document.getElementById("precio").classList.remove('invalid');
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}
function validarDetalles(){
    let template_bar = '';
    let detalles = document.getElementById("detalles").value.trim();
    document.getElementById("error-detalles").textContent = "";
    if(detalles.length > 250){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: Debe tener 250 caracteres o menos</li>
        `;
        document.getElementById("error-detalles").innerHTML = "<p>Debe tener 250 caracteres o menos.</p>";
        document.getElementById("detalles").classList.add('invalid');
        document.getElementById("detalles").classList.remove('valid');
    }else{
        document.getElementById("detalles").classList.add('valid');
        document.getElementById("detalles").classList.remove('invalid');
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}
function validarUnidades(){
    let template_bar = '';
    let unidades = parseFloat(document.getElementById("unidades").value);
    document.getElementById("error-unidades").textContent = "";
    if(isNaN(unidades)){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: Unidades Obligatortio</li>
        `;
        document.getElementById("error-unidades").innerHTML = "<p>Unidades Obligatortio</p>";
        document.getElementById("unidades").classList.add('invalid');
        document.getElementById("unidades").classList.remove('valid');
    }
    else if(unidades < 0){
        template_bar += `
        <li style="list-style: none;">status: Error</li>
        <li style="list-style: none;">message: Debe ser mayor o igual a 0</li>
        `;
        document.getElementById("error-unidades").innerHTML = "<p>Debe ser mayor o igual a 0</p>";
        document.getElementById("unidades").classList.add('invalid');
        document.getElementById("unidades").classList.remove('valid');
    }else{
        document.getElementById("unidades").classList.add('valid');
        document.getElementById("unidades").classList.remove('invalid');
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}
function validarImagen(){
    let template_bar = '';
    let imagen = document.getElementById("imagen").value.trim();
    if (imagen == "") {
        template_bar += `
        <li style="list-style: none;">status: Advertencia</li>
        <li style="list-style: none;">message: Imagen por defaul</li>
        `;
    }
    $('#product-result').show();
    $("#container").html(template_bar);
}