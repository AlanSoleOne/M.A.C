<?php

require 'funciones.php';

if($_POST) {

    $errores = [];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(buscarEmail($email) == false)
    {
        $errores['email'] = "El email no pertenece a un usuario registrado";
    }
    
    if($password == "") {
        $errores['password'] = "Por favor, ingresar una contraseña";
    } elseif(validarPassword($password) == false)
    {
        $errores['password'] = "La contraseña no coincide con el email ingresado";
    } 
    
    if(count($errores) == 0)
    {            
        header('Location: homeUsuario.php');
    }

}

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estyle.css">
    
    <link rel="stylesheet" href="css/nav-bar.css">  
    <title>Formulario de Contactos</title>
</head>
    <body>
   

    <?php require 'nav-bar.php'; ?>

        <div class="container">
            <form class="form" action="" method="post">
                <div class="from-header">
                    <h1 class="form-title">Iniciar sesión</h1>

                    <?php if(isset($errores['email'])): ?>
                                <div class="errores">
                                    <?=$errores['email']; ?>
                                </div>
                    <?php endif; ?>       
                    <label for="nombre" class="form-label">Email:</label>     
                    <input type="text" id="nombre" class="form-input" placeholder="Email" name="email" value="<?= isset($errores['email']) ? "" : old('email'); ?>">

                    <?php if(isset($errores['password'])): ?>
                                <div class="errores">
                                    <?=$errores['password']; ?>
                                </div>
                    <?php endif; ?>      
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