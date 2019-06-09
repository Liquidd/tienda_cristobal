function agregar_carrito(_id_producto,md_cantidad = undefined) {

    var substr =  $("#precio_card").text();
    var precio = substr.substring(1);
    if (md_cantidad != undefined) {
        let datos = {
            "id" : _id_producto,
            "cantidad" : md_cantidad,
            "precio" : parseInt(precio),
            "modelo" : $("#modelo_card").text(),
            "foto_carrito" : $("#imagen").attr('src')
        }

        $.post(base_url+"productos/agregar_carrito",{
            datos : datos
        },function(respuesta){
            let datos = JSON.parse(respuesta);
            console.log(respuesta);
            console.log(datos);
           window.location=base_url+"productos/carrito_ventas";
        });
    }
    else{
        let datos = {
            "id" : _id_producto,
            "cantidad" : $("#cantidad_card").val(),
            "precio" : parseInt(precio),
            "modelo" : $("#modelo_card").text(),
            "foto_carrito" : $("#imagen").attr('src')
        }
        console.log(datos);
    
        $.post(base_url+"productos/agregar_carrito",{
            datos : datos
        },function(respuesta){
            let datos = JSON.parse(respuesta);
            console.log(respuesta);
            console.log(datos);
            window.location=base_url+"productos/carrito_ventas";
        });
    }
}

function limpiar_carrito() {
    $.post(base_url+"productos/limpiar_carrito",function(respuesta){
        location.reload();
    });
}

//----------------------

var elmnt = document.getElementById("v-pills-settings-tab");
function activar_producto(_id){
    console.log(_id);
    $.post(base_url+"productos/activar_producto",{
        id_producto : _id
    },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(datos);
        swal({title: "Producto Activado",icon: "success",}).then((value) => {
            elmnt.scrollIntoView();
        });                
    });
}

function carrito_contenido() {
    console.log("------------------------------------------------------------- NIVELL 2");
    $.post(base_url+"productos/limpiar_carrito",function(respuesta){
        console.log(respuesta);
        location.reload();
    });
}

function buscar_categoria(_id_categoria) {
    console.log(_id_categoria);
    window.location=base_url+"productos/detalles_categoria?id_categoria="+_id_categoria;

}

function buscar_producto() {
    var filtro = $("#nombre_buscar").val();
    window.location=base_url+"productos/filtro_bucador?filtro="+filtro;

}
function categoria_modal() {
    $.post(base_url+"productos/lista_categorias",{},function(respuesta){
        var datos = JSON.parse(respuesta);
        var option = "";            
        $.each(datos, function(i, val){
           option += "<option value="+val.id_categoria+">"+val.nombre+"</option>";                                 
        });
        $('#id_categoria_modal').html('<option value="0">Selecciona Categoria</option>'+option);
    });
}
