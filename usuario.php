<?php

//require 'funciones.php';
require 'loader.php';

if(Auth::check()) {
    redirect('perfil.php');
}

if($_POST) {
    $usuarioArray = $db->emailDbSearch($_POST['email']);
    $user = new Usuario($usuarioArray['usuario'], $usuarioArray['email'], $usuarioArray['password']);
    $arrayErr = [];

    if($usuarioArray !== null) {
        $error = "Nombre de usuario o pass incorrectos";
        !Validar::validarLogin($_POST['password'], $user) ? $arrayErr['login'] = $error : Auth::login($user);
    }

    if(count($arrayErr) == 0) {
        redirect('homeUsuario.php');
    }

    
}

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estyle.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/nav-bar.css">  
    <title>Formulario de Contactos</title>
</head>
    <body>
   

    <?php require 'nav-bar.php'; ?>

        <div class="container">
            <form class="form" action="" method="post">
                <div class="from-header">
                    <h1 class="form-title">Iniciar sesión</h1>

                    <?php if(!empty($arrayErr)): ?>                        
                        <div class="errores">
                            <?=$arrayErr['login']; ?>
                        </div>
                    <?php endif; ?>
                    
                    <label for="nombre" class="form-label">Email:</label>     
                    <input type="text" id="nombre" class="form-input" placeholder="Email" name="email" value="">

                    
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input class="form-input" type="password" name="password" placeholder="contraseña">

                    <input class="btn-sublim" type="submit" value="Entrar">

                    <a class="item-menu" href="#">¿Olvido su Contraseña?</a>
                    <br>
                    <a class="item-menu" href="formulario.php">Registrarme</a>

                </div>   
            </form>
        </div>      
    </body>
</html>