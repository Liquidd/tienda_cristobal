
$(document).ready(function(){
    // muestra detalles de producto seleccionado
    console.log("test");
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

    // carga todos los productos en una tabla
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

    // abre modal y envio datos a modal
    /**
     * abre modal y envio datos a modal
     * se guarda el id que corresponde a la clase .editaM 
     * el id del producto seleccionado se lo asignamos al id de la clase .btn_editar
     * ahora la funcion actualizar_producto ya puede tomar el id  del producto a actualizar que llega atraves de su parametro
     */
    $("body").on("click", ".editaM", function(event){
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
            $(".btn_editar").attr('id',id);
            $("#label_foto").text('Foto Actual');
            console.log("termine 1");

            var categoria_modal = document.getElementById("id_categoria_modal");
            var subcategoria_modal = document.getElementById("id_subcategoria_modal");
            var promocion_modal = document.getElementById("#id_promocion_modal");

            for(let index=1;index < categoria_modal.length;index++)
            {
                if(categoria_modal.options[index].text == datos.categoria)
                {
                    categoria_modal.selectedIndex = index;
                }
            }
            for(let index=1;index < subcategoria_modal.length;index++)
            {
                if(subcategoria_modal.options[index].text == datos.subcategoria)
                {
                    subcategoria_modal.selectedIndex = index;
                }
            }
            for(let index=1;index < promocion_modal.length;index++)
            {
                if(promocion_modal.options[index].text == datos.descuento)
                {
                    promocion_modal.selectedIndex = index;
                }
            }
        });
    });


    // muestra una lista de categorias al momento de que se abre el modal de captura de datos
    $("#modal_id").on('show.bs.modal', function () {
        $.post(base_url+"productos/lista_categorias",{},function(respuesta){
            let datos = JSON.parse(respuesta);
            let option = "";            
            $.each(datos, function(i, val){
               option += "<option value="+val.id_categoria+">"+val.nombre+"</option>";                                 
            });
            $('#id_categoria_modal').html('<option value="0">Selecciona Categoria</option>'+option);
        });
        console.log("termine 2");
    });


    // muestra lista de subcategorias relacionadas con la categoria seleccionado
    $("#id_categoria_modal").change(function () {
        $.post(base_url+"productos/lista_subcategoria",{
            id_categoria : $(this).val()
        },function(respuesta){
            let datos = JSON.parse(respuesta);
            console.log(datos);
            var option = "";
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
            $('#id_promocion_modal').html('<option value="0">Selecciona Promocion </option>'+option);
        });
    });


    // limpia modal
    $('#modal_id').on('hidden.bs.modal', function(e) {
        $(this).find('#actualizar_form')[0].reset();
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
