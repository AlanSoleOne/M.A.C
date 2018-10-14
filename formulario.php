<?php

// HECHO
//require 'funciones.php';
require 'loader.php';


if(Auth::check()) {
    redirect('homeUsuario.php');
}

if ($_POST) {

    $errors = [];
    //De entrada instancio mi usuario
    $usuario = new User($_POST['username'], $_POST['email'], $_POST['password']);

    //Genero los errores si los hubiera
    $errors = Validate::registerValidate($usuario, $_POST);

    if($_FILES['avatar']['error'] == 0) {
        $errors = $db->saveAvatar($_POST);
        if(count($errors) === 0 ) {
            $avatar = $db->photopath($_POST);
            $usuario->setAvatar($avatar);

        }
    }

    if (count($errors) === 0) {
        $usuarioArray = $db->createUser($usuario);
        $db->saveUser($usuarioArray);
        redirect('usuario.php');
    }

    $usuario = createUser($_POST);

}
   
?>

<!DOCTYPE html>
<html>

    <?php require 'head.php'; ?>

<body>
    <?php require 'navbar.php'; ?>


  <div class="container">
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <div class="from-header">
            
            <h1 class="form-title">Formulario de registro</h1>

            <label for="username" class="form-label" >Nombre:</label>
            <?php if(isset($errores['username'])): ?>
                <div class="errores">
                    <?=$errores['username']; ?>
                </div>
            <?php endif; ?>     
            <input type="text" class="form-input" placeholder="Escriba su nombre" name="username" value="<?= isset($errores['username']) ? "" : old('username'); ?>">

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
