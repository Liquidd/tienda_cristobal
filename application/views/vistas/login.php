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
            <button type="buttom" onClick="prueba_login()" >ACEPTAR</button>
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Olvidaste la Contraseña?</a>
        </div>
    </div>
</div>
</body>
<script>
function prueba_login() {
    var base_url = '<?php echo base_url()?>';

    $.post(base_url+"productos/prueba",{
            correo : $("#correo").val(),
            clave : $("#clave").val(),
        },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(respuesta);
        console.log(datos);

        console.log("-------------------------------------------------------");
        if(!datos.error){
            swal(datos.error,"","warning");
        }
        else{
            console.log("Bienvenido");
            $.each(datos, function(i, val){
                //window.location=base_url+"login/log_in?datos_api="+datos;
                console.log(datos[i].nombre);
            });
        }
        alert(datos);
    });
}
</script>
</html>
