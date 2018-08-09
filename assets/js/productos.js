$(document).ready(function(){
    console.log("test E'");
});



// agregar precio,cantidad,modelo de un solo articulo
function agregar_carrito(_id_producto) {
    let datos = {
        "id" : _id_producto,
        "qty" : $("#cantidad_card").val(),
        "price" : $("#precio_card").text(),
        "name" : $("#modelo_card").text(),
    }
    console.log(datos);
    $.post(base_url+"productos/agregar_carrito",{
        datos : datos
    },function(respuesta){
        console.log(respuesta);
        window.location=base_url+"productos/carrito_ventas";
    });
}
function limpiar_carrito() {
    $.post(base_url+"productos/limpiar_carrito",function(respuesta){
        location.reload();
    });
}
function alta_producto(){
    let datos = {
        "modelo" : $("#modelo").val(),
        "marca" : $("#marca").val(),
        "categoria" : $("#categoria").val(),
        "subcategoria" : $("#subcategoria").val(),
        "descripcion" : $("#descripcion").val(),
        "precio" : $("#precio").val(),
        "cantidad_existente" : $("#cantidad_existente").val(),
        "estado" : $("#estado").val()
    }
    console.log(datos);
    $.post(base_url+"productos/alta_producto",{
        datos : datos
    },function(respuesta){
        console.log(respuesta);
        if(respuesta != 1){
            swal({
                title: "Error al Ingresar Producto",
                icon: "danger",
                button: "ACEPTAR",
            });
        }
        else{
            swal({
                title: "Nuevo Producto Registrado",
                icon: "success",
                button: "ACEPTAR",
            }).then((value) => {
                location.reload();
            });
        }
    });
}
function actualizar_producto(){
    var nombre_foto = $("#archivo_modal")[0].files[0];
    let datos = {
        "modelo_modal" : $("#modelo_modal").val(),
        "marca_modal" : $("#marca_modal").val(),
        "id_categoria_modal" : $("#id_categoria_modal").val(),
        "id_subcategoria_modal" : $("#id_subcategoria_modal").val(),
        "descripcion_modal" : $("#descripcion_modal").val(),
        "precio_modal" : $("#precio_modal").val(),
        "cantidad_modal" : $("#cantidad_modal").val(),
        "id_promocion_modal" : $("#id_promocion_modal").val(),
        "archivo_modal" : nombre_foto.name
        }

    $.post(base_url+"productos/actualizar_producto",{
        datos : datos,
        id_producto : _id
    },function(respuesta){
        console.log(respuesta);
        if(respuesta != 1){
            swal({
                title: "Error al Actualizar",
                icon: "danger",
                button: "aceptar",
            });
        }else{
            swal({
                title: "Producto Actualizado",
                icon: "success",
                button: "ACEPTAR",
            }).then((value) => {
                location.reload();
            });
        }
    });
}
function desactivar_producto(_id) {
    console.log(_id);
    $.post(base_url+"productos/desactivar_producto",{
        id_producto : _id
    },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(datos);
        if(datos != 1){
            swal({
                title: datos,
                icon: "danger",
                button: "aceptar",
            });
        }else{
            swal({
                title: datos,
                icon: "success",
                button: "ACEPTAR",
            }).then((value) => {
                location.reload();
            });
        }
    });
}
