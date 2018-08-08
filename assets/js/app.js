$(document).ready(function(){
    console.log("desde APP JS");
    $(".detalles").click(function(){
        var id = $(this).attr('id');
        console.log(id);
        $.post(base_url+"productos/detalles_productos",{
			id_producto : id
		},function(respuesta){
			let datos = JSON.parse(respuesta);
			console.log(datos);
            window.location=base_url+"productos/detalles_general?id_producto="+id;
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