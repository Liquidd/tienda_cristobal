$(document).ready(function(){
    $(".detalles").click(function(){
        var id = $(this).attr('id');
        $.post(CI_ROOT+"productos/detalles_productos",{
			id_producto : id
		},function(respuesta){
			let datos = JSON.parse(respuesta);
			console.log(datos);
            window.location=CI_ROOT+"productos/detalles_general?id_producto="+id;
        });
    });
});

function buscar_categoria(_id_categoria) {
    console.log(_id_categoria);
    window.location=CI_ROOT+"productos/categorias?id_categoria="+_id_categoria;
}
