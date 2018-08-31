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
<<<<<<< HEAD
            <button type="buttom" onClick="prueba_login()" >ACEPTAR</button>
=======
            <button type="button" onClick="prueba_login()" >ACEPTAR</button>
>>>>>>> 3a981065431889eba34b74c5b22933f786dadd1b
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Olvidaste la Contraseña?</a>
        </div>
    </div>
</div>
</body>
<script>
<<<<<<< HEAD
function prueba_login() {
    var base_url = '<?php echo base_url()?>';

    $.post(base_url+"productos/prueba",{
            correo : $("#correo").val(),
            clave : $("#clave").val(),
=======
var base_url = '<?php echo base_url()?>';

function prueba_login() {
    console.log("entra al log_in");

    $.post(base_url+"login/api_immo",{
            correo : $("#correo").val(),
            clave : $("#clave").val()
>>>>>>> 3a981065431889eba34b74c5b22933f786dadd1b
        },function(respuesta){
        let datos = JSON.parse(respuesta);
        console.log(respuesta);
        console.log(datos);

        console.log("-------------------------------------------------------");
<<<<<<< HEAD
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
=======
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
        window.location=base_url+"productos/index";
>>>>>>> 3a981065431889eba34b74c5b22933f786dadd1b
    });
}
</script>
</html>
