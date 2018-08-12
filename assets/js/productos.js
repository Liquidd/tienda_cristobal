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
//----------------------

function nuevo_producto(){

    var file = $("#archivo_modal")[0].files[0];
    let datos = {
        "modelo" : $("#modelo_modal").val(),
        "marca" : $("#marca_modal").val(),
        "categoria" : $("#id_categoria_modal").val(),
        "subcategoria" : $("#id_subcategoria_modal").val(),
        "descripcion" : $("#descripcion_modal").val(),
        "precio" : $("#precio_modal").val(),
        "cantidad" : $("#cantidad_modal").val(),
        "foto" : file.name,
        "descuento" : $("#id_promocion_modal").val()
    }
    console.log(datos);
    $.post(base_url+"productos/nuevo_producto",{
        datos : datos
    },function(respuesta){
        console.log(respuesta);
        if(respuesta == "Nuevo Producto Registrado"){
            swal({
                title: respuesta,
                icon: "success",
                button: "ACEPTAR",
            }).then((value) => {
                console.log(value);
                location.reload();
            });
        }
        else{
            swal({
                title: respuesta,
                icon: "error",
                button: "ACEPTAR",
            });
        }
    });
}
function actualizar_producto(_id){
    console.log("ID PRODUCTO: "+_id);
}
function desactivar_producto(_id) {
    console.log(_id);
    $.post(base_url+"productos/desactivar_producto",{
        id_producto : _id
    },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(datos);
        swal({title: "Producto Desactivado",icon: "warning",}).then((value) => {
            if(value)location.reload();
        });
    });
}
function activar_producto(_id){
    console.log(_id);
    $.post(base_url+"productos/activar_producto",{
        id_producto : _id
    },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(datos);
        swal({title: "Producto Activado",icon: "success",}).then((value) => {
            if(value)location.reload();
        });
    });
}
