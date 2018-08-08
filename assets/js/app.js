$(document).ready(function(){
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
