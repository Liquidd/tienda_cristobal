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
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="Nombre de usuario">
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" value="INGRESAR">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Olvidaste la Contraseña?</a>
        </div>
    </div>
</div>
</body>
</html>