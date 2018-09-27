<?php

require 'funciones.php';

if($_POST) {

    $errores = validar($_POST);
    if($_FILES['avatar']['error'] == 0) {
        validarAvatar($_POST);
    }    
    if(count($errores) == 0) {
        $nuevoUsuario = crearUsuario($_POST);
        guardarUsuario($nuevoUsuario);
        header('Location: usuario.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estyle.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/nav-bar.css">  
    <title>Formulario</title>
</head>
<body>
   
    <?php require 'nav-bar.php'; ?>


    <div class="container">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <div class="from-header">
                
                <h1 class="form-title">Formulario de registro</h1>

                <label for="nombre" class="form-label" >Nombre:</label>
                <?php if(isset($errores['nombre'])): ?>
                    <div class="errores">
                        <?=$errores['nombre']; ?>
                    </div>
                <?php endif; ?>     
                <input type="text" class="form-input" placeholder="Escriba su nombre" name="nombre" value="<?= isset($errores['nombre']) ? "" : old('nombre'); ?>">

                <label for="email" class="form-label">Email:</label>
                <?php if(isset($errores['email'])): ?>
                    <div class="errores">
                        <?=$errores['email']; ?>
                    </div>
                <?php endif; ?>
                <input type="text" class="form-input" placeholder="Escriba su e-mail" name="email" value="<?= isset($errores['email']) ? "" : old('email'); ?>">

                <label class="form-label" for="avatar">Foto de perfil</label>
                <input class="avatar" type="file" name="avatar">
                
                        
                <label class="form-label" for="password">Contraseña </label>
                <?php if(isset($errores['password'])): ?>
                    <div class="errores">
                        <?=$errores['password']; ?>
                    </div>
                <?php endif; ?>
                <input class="form-input" type="password" name="password">
                
                <label class="form-label"  for="cpassword">Repetir contraseña: </label>
                <?php if(isset($errores['cpassword'])): ?>
                    <div class="errores">
                        <?=$errores['cpassword']; ?>
                    </div>
                <?php endif; ?>
                <input class="form-input" type="password" name="cpassword">

                <?php if(isset($errores['confirm'])): ?>
                    <div class="errores">
                        <?=$errores['confirm']; ?>
                    </div>
                <?php endif; ?>
                <input class="" type="checkbox" name="confirm" value="">
                <label class="id" for="confirm">Acepto los términos y condiciones.</label>

                <button class="btn-sublim"  type="submit">Registrarse</button>

            </div>
        </form>
    </div>
        
        


</body>
</html>