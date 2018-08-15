
$(document).ready(function(){
    console.log("desde S");
    $(".detalles").click(function(){
        var id = $(this).attr('id');
        console.log(id);
        $.post(base_url+"productos/detalles_productos",{
			id_producto : id
		},function(respuesta){
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
    
});

function buscar_categoria(_id_categoria) {
    console.log(_id_categoria);
    window.location=base_url+"productos/categorias?id_categoria="+_id_categoria;
}
function buscar_producto() {
    var filtro = $("#nombre_buscar").val();
    window.location=base_url+"productos/filtro_bucador?filtro="+filtro;
}