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

    listarProductos();

}

function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',  
        type: 'GET', 
        dataType: 'json',  
        success: function(response) {
            console.log('cliente', response);
            let template = '';
            response.forEach(producto => {
                let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';

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
                    </tr>`;
            });
            $('#products').html(template);
        }
    });
}


$(document).ready(function(){
    //FUNCION PARA BUSCAR PRODUCTO
    $('#product-result').hide();
    $('#search').keyup(function(e){
        if ($('#search').val()) {
        let search = $('#search').val();
        $.ajax({
           url: './backend/product-search.php',
           type: 'GET',
           data: {search},
           success: function(response) {
            let productos = JSON.parse(response);
            let template = '';
            productos.forEach(producto => {
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
                <button class="product-delete btn btn-danger" data-id="${producto.id}">
                    Eliminar
                </button>
            </td>
            </tr>`;
            });
        $('#products').empty().html(template);
        $('#product-result').show();
        } 
        });
    }
    });

    //FUNCION PARA AGREGAR PRODCUTO
    $('#product-form').submit(function (e) {
    e.preventDefault(); // Evita el envío por defecto del formulario

    const name = $('#name').val();
    const description = $('#description').val();

    // Convertimos el string JSON del textarea en un objeto
    let productData;
    try {
        productData = JSON.parse(description);
    } catch (error) {
        alert("El JSON ingresado no es válido.");
        return;
    }

    // Agregamos el nombre al objeto JSON
    productData.nombre = name;

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        data: JSON.stringify(productData), // Enviar como JSON
        contentType: 'application/json', // Especificar que enviamos JSON
        success: function (response) {
            console.log(response);
            alert("Producto agregado con éxito");
            $('#product-form')[0].reset(); // Limpiar formulario después de agregar
            init(); // Volver a cargar el JSON base
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al agregar el producto");
        }
    });
    });
    
});

//BOTON DE ELIMINAR PRODUCTOS
$(document).on('click','.product-delete', function(){
    if (confirm('¿Esta seguro de querer eliminar este producto?')){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        $.get('./backend/product-delete.php', {id}, function(response){
            listarProductos();
        });
    } 
});

//EDITAR PRODUCTO
let editar = false;
$(document).on('click','.product-item', function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productId');
    $.post('./backend/product-single.php', {id}, function(response){
        const producto = JSON.parse(response);
        $('#name').val(producto.name);
        $('#description').val(JSON.stringify({
            precio: producto.precio,
            unidades: producto.unidades,
            modelo: producto.modelo,
            marca: producto.marca,
            detalles: producto.detalles,
            imagen: producto.imagen   
        }, null, 2));
        $('#productId').val(producto.id);
        editar = true;
    });
});