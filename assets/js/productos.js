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

function nuevo_producto(){

    var file = $("#file_modal")[0].files[0];
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
    if ($("#id_categoria_modal")[0].selectedIndex == 0) {
        swal({title: "Debes Seleccionar una Categoria",icon: "warning",});
    }
    else if($("#id_subcategoria_modal")[0].selectedIndex == 0){
        swal({title: "Debes Seleccionar una Subcategoria",icon: "warning",});
    }
    else{
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
}
function actualizar_producto(_id){
    var file = $("#file_modal")[0].files[0];
    let datos = {
        "modelo" : $("#modelo_modal").val(),
        "marca" : $("#marca_modal").val(),
        "categoria" : $("#id_categoria_modal").val(),
        "subcategoria" : $("#id_subcategoria_modal").val(),
        "descripcion" : $("#descripcion_modal").val(),
        "precio" : $("#precio_modal").val(),
        "cantidad" : $("#cantidad_modal").val(),
        "descuento" : $("#id_promocion_modal").val(),
    }
    console.log(datos);
    console.log(_id);
    if ($("#id_categoria_modal")[0].selectedIndex == 0) {
        swal({title: "Debes Seleccionar una Categoria",icon: "warning",});
    }
    else if($("#id_subcategoria_modal")[0].selectedIndex == 0){
        swal({title: "Debes Seleccionar una Subcategoria",icon: "warning",});
    }
    else{
        $.post(base_url+"productos/actualizar_producto",{
            datos : datos,
            id_producto : _id,
            foto : file.name
        },function(respuesta){
            console.log(respuesta);
            swal({title: "Producto Actualizado",icon: "success",}).then((value) => {
                if(value)location.reload();
            });
        });
    }
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

function carrito_contenido() {
    console.log("------------------------------------------------------------- NIVELL 2");
    $.post(base_url+"productos/limpiar_carrito",function(respuesta){
        console.log(respuesta);
        location.reload();
    });
}

function buscar_categoria(_id_categoria) {
    console.log(_id_categoria);
    window.location=base_url+"productos/categorias?id_categoria="+_id_categoria;

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