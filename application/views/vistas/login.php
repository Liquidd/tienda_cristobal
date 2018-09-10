<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GA | Log In </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url()?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>node_modules/bootstrap/dist/css/bootstrap.css">

    <script src="<?php echo base_url()?>node_modules/jquery/dist/jquery.min.js"></script>

    <script src="<?php echo base_url()?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">
            <img src="<?php echo base_url()?>assets/img/ga_nuevo.png" id="icon" />
        </div>
        <!-- Login Form -->
        <form>
            <input type="text" id="correo" class="fadeIn second" name="login" placeholder="Nombre de Correo">
            <input type="text" id="clave" class="fadeIn third" name="login" placeholder="Contraseña">
            <button type="button" onClick="prueba_login()" >ACEPTAR</button>
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Olvidaste la Contraseña?</a>
        </div>
    </div>
</div>
</body>
<script>
var base_url = '<?php echo base_url()?>';

function prueba_login() {
    console.log("entra al log_in");

    $.post(base_url+"login/api_immo",{
            correo : $("#correo").val(),
            clave : $("#clave").val()
        },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(respuesta);
        console.log(datos);

        console.log("-------------------------------------------------------");
        if(datos.error){
            swal({title: datos.error,icon:"warning",button: "Aceptar",});
        }
        else{
            $.each(datos, function(i, val){
                var session_datos = {
                    "id_inmmo" : datos.id_inmmo,
                    "nombre" : datos[i].nombre,
                    "correo" : datos[i].correo,
                    "telefono" : datos[i].telefono,
                    "foto" : datos[i].foto,
                    "fecha_registrado" : datos[i].fecha_registrado
                }
                login_success(session_datos);
            });
        }
    });
}
function login_success(_session_datos) {
    
    $.post(base_url+"login/login_success",{
        datos : _session_datos
    },function(respuesta){
        console.log("usuario logeado");
        window.location=base_url+"productos";
    });
}
function prueba_email() {
    $.post(base_url+"productos/envio_confirmacion",{
			mensaje : "hola"
		},function(data_email){
        console.log(data_email);
    });
}
</script>
</html>
