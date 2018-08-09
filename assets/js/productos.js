
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

    let datos = {
        "modelo_modal" : $("#modelo_modal").val(),
        "marca_modal" : $("#marca_modal").val(),
        "categoria_modal" : $("#categoria_modal").val(),
        "subcategoria_modal" : $("#subcategoria_modal").val(),
        "descripcion_modal" : $("#descripcion_modal").val(),
        "precio_modal" : $("#precio_modal").val(),
        "cantidad_existente_modal" : $("#existencia_modal").val(),
        "estado_modal" : $("#estado_modal").val()
    }

    $.post(base_url+"productos/actualizar_producto",{
        datos : datos,
        id_producto : id_producto
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
function desactivar_producto() {
    $.post(base_url+"productos/desactivar_producto",{
        id_producto : id_producto
    },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(datos);
        if(datos != 1){
            swal({
                title: "Error al Desactivar",
                icon: "danger",
                button: "aceptar",
            });
        }else{
            swal({
                title: "El Producto Desactivado",
                icon: "success",
                button: "ACEPTAR",
            }).then((value) => {
                location.reload();
            });
        }
    });
}
