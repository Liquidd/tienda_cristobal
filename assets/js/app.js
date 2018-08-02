var base_url = "<?php echo base_url();?>";


function detalles_productos(_id) {
    $.post(base_url+"productos/detalles_productos",{
        id_producto : _id
    },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(datos);

    });
}
