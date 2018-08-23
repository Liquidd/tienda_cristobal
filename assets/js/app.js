$(document).ready(function(){
    // muestra detalles de producto seleccionado
    console.log("MM");


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
            location.reload();
        });
    });

    // carga historial
    $("#historial").click(function(){
        $('#table_historial tbody').html(' ');
        $.post(base_url+'productos/historial_usuario',{},function(respuesta){
        console.log(respuesta);
        var datos = JSON.parse(respuesta);
        $.each(datos, function(i, val){
            
            $("#table_historial tbody").append('<tr>'+
                '<td>'+ val.modelo+'</td>'+
                '<td>'+ val.marca +'</td>'+
                '<td>'+ val.descripcion +'</td>'+
                '<td>'+ val.precio +'</td>'+
                '<td>'+ val.cantidad_comprada +'</td>'+
                '<td>'+ val.pago_total +'</td>'+
                '</tr>');
            });        
        });
    });
    // carga todos los productos en una tabla
    $("#alta").click(function(){
        $.post(base_url+'productos/lista_productos', function(respuesta){
        console.log(respuesta);
        var datos = JSON.parse(respuesta);
        $.each(datos, function(i, val){
            var cambiar_estado = val.estado != 1 ? "<button type='button' class='btn btn-success activar' onClick='activar_producto("+val.id_producto+")'><i class='far fa-check-square'></button>" : "<button type='button' class='btn btn-danger desactivar' onClick='desactivar_producto("+val.id_producto+")'></i><i class='fas fa-trash-alt'></i></button>";

            $("#table_productos tbody").append('<tr class="test_tr">'+
                '<td>'+ '<span class="icon-wrap text-primary"><i class="fa-lg fa fa-file"></i> </span>' + '</td>'+
                '<td>'+ val.modelo+'</td>'+
                '<td>'+ val.marca +'</td>'+
                '<td>'+ val.categoria +'</td>'+
                '<td>'+ val.subcategoria +'</td>'+
                '<td>'+ val.precio +'</td>'+
                '<td>'+"<button type='button' id="+val.id_producto+" class='btn btn-info editar_m' data-toggle='modal' data-target='#modal_id'><i class='fas fa-edit'></i></button>"+cambiar_estado+"</td>"+
                '</tr>');        
            });        
        });
    });
    
    /**
     * abre modal y envio datos a modal
     * se guarda el id que corresponde a la clase .editaM 
     * el id del producto seleccionado se lo asignamos al id de la clase .btn_editar
     * ahora la funcion actualizar_producto ya puede tomar el id  del producto a actualizar que llega atraves de su parametro
     */

    $(".guardarM").click(function(){
        $( ".btn_guardar").show();
        $( ".btn_editar").hide();
    });

    $("#tbody_datos").on("click", ".editar_m", function(){
        $( ".btn_guardar").hide();
        $( ".btn_editar").show();        
        var id = $(this).attr('id');
        console.log(id);

        $.post(base_url+"productos/detalles_productos",{
			id_producto : id
		},function(respuesta){
            let datos = JSON.parse(respuesta);
            console.log(datos);
            $("#modelo_modal").val(datos.modelo);
            $("#marca_modal").val(datos.marca);
            $("#precio_modal").val(datos.precio);
            $("#cantidad_modal").val(datos.existencia);
            $("#descripcion_modal").val(datos.descripcion);
            $(".btn_editar").attr('id',id);
            $("#label_foto").text(datos.img);
            $("#id_categoria_modal").prop("selectedIndex",datos.id_categoria);
            $("#id_promocion_modal").prop("selectedIndex",datos.id_promocion);
        });
    });

    // muestra una lista de categorias al momento de que se abre el modal de captura de datos
    $("#modal_id").on('show.bs.modal', function () {
        $.post(base_url+"productos/lista_categorias",{},function(respuesta){
            var datos = JSON.parse(respuesta);
            var option = "";            
            $.each(datos, function(i, val){
               option += "<option value="+val.id_categoria+">"+val.nombre+"</option>";                                 
            });
            $('#id_categoria_modal').html('<option value="0">Selecciona Categoria</option>'+option);
        });
    });

    // muestra lista de subcategorias relacionadas con la categoria seleccionado
    $("#id_categoria_modal").change(function () {
        $.post(base_url+"productos/lista_subcategoria",{
            id_categoria : $(this).val()
        },function(respuesta){
            let datos = JSON.parse(respuesta);
            var option = "";
            console.log(datos);
            $.each(datos, function(i, val){    
                option += "<option value="+datos[i].id_subcategoria+">"+datos[i].nombre+"</option>";
            });
            $('#id_subcategoria_modal').html('<option value="0">Selecciona Subcategoria</option>'+option);
        });
    });

    // muestra una lista de promociones
    $("#modal_id").on('show.bs.modal', function () {
        $.post(base_url+"productos/lista_promocion",{},function(respuesta){
            let datos = JSON.parse(respuesta);
            let option = "";            
            $.each(datos, function(i, val){
               option += "<option value="+val.id_promocion+">"+val.descuento+"% de Descuento</option>";                                 
            });
            $('#id_promocion_modal').html('<option value="1">Selecciona Promocion </option>'+option);
        });
    });

    // limpia modal
    $('#modal_id').on('hidden.bs.modal', function(e) {
        $(this).find('#actualizar_form')[0].reset();
    });

    $(".cantidad").change(function () {
        $.post(base_url+"productos/actualizar_carrito",{
            cantidad : parseInt($(this).val()),
            rowid : $(this).attr('id')
        },function(respuesta){
            $("#total").html("$"+respuesta);
        });
    });
});
