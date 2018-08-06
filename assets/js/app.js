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

function filtrar_categoria(_nombre) {
    console.log(_nombre);
}