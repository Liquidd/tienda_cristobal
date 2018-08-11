
$(document).ready(function(){

    $(".detalles").click(function(){
        var id = $(this).attr('id');
        console.log(id);
        $.post(base_url+"productos/detalles_productos",{
			id_producto : id
		},function(respuesta){
            console.log(respuesta);
            window.location=base_url+"productos/detalles_general?id_producto="+id;
        });
    });
    $(".eliminar_producto").click(function(){
        var _rowid = $(this).attr('id');
        console.log(_rowid);
        $.post(base_url+"productos/eliminar_producto",{
            rowid : _rowid
        },function(respuesta){
           
        });
    });
    $("#alta").click(function(){
        $('#table_productos tbody').html('');
        $.post(base_url+'productos/lista_productos', function(respuesta){
        console.log(respuesta);
        var datos = JSON.parse(respuesta);
        $.each(datos, function(i, val){
            var cambiar_estado = val.estado != 1 ? "<button type='button' class='btn btn-success activar' onClick='activar_producto("+val.id_producto+")'><i class='far fa-check-square'></button>" : "<button type='button' class='btn btn-danger desactivar' onClick='desactivar_producto("+val.id_producto+")'></i><i class='fas fa-trash-alt'></i></button>";

            $("#table_productos tbody").append('<tr>'+
                '<td>'+ '<span class="icon-wrap text-primary"><i class="fa-lg fa fa-file"></i> </span>' + '</td>'+
                '<td>'+ val.modelo+'</td>'+
                '<td>'+ val.marca +'</td>'+
                '<td>'+ val.categoria +'</td>'+
                '<td>'+ val.subcategoria +'</td>'+
                '<td>'+ val.precio +'</td>'+
                '<td>'+"<button type='button' id="+val.id_producto+"  class='btn btn-info editaM' data-toggle='modal' data-target='#modal_id'><i class='fas fa-edit'></i></button>"+cambiar_estado+"</td>"+
                '</tr>');        
            });        
        });
    });
    $("body").on("click", ".editaM", function(event){
        var id = $(this).attr('id');
        $.post(base_url+"productos/detalles_productos",{
			id_producto : id
		},function(respuesta){
            let datos = JSON.parse(respuesta);
            console.log(datos);
            $("#modelo_modal").val(datos.modelo);
            $("#marca_modal").val(datos.marca);
            $("#id_categoria_modal").text(datos.categoria);
            $("#id_subcategoria_modal").text(datos.subcategoria);
            $("#descripcion_modal").val(datos.descripcion);
            $("#precio_modal").val(datos.precio);
            $("#cantidad_modal").val(datos.cantidad);
            $("#archivo_modal").val(datos.img);
            $("#id_promocion_modal").text(datos.promocion);
        });
    });
});

function buscar_categoria(_id_categoria) {
    console.log(_id_categoria);
    window.location=base_url+"productos/categorias?id_categoria="+_id_categoria;
}
function buscar_producto() {
    var filtro = $("#nombre_buscar").val();
    window.location=base_url+"productos/filtro_bucador?filtro="+filtro;
}