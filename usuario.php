<?php

                              // TERMINADO
//require 'funciones.php';
require 'loader.php';

if(Auth::check()) {
    redirect('homeUsuario.php');
}

if($_POST) {
    $usuarioArray = $db->emailDbSearch($_POST['email']);
    $user = new User($usuarioArray['username'], $usuarioArray['email'], $usuarioArray['password'], $usuarioArray['role']);
    $arrayErr = [];

    if($usuarioArray !== null) {
        $error = "Nombre de usuario o pass incorrectos";
        !Validate::loginValidate($_POST['password'], $user) ? $arrayErr['login'] = $error : Auth::login($user);
        redirect('homeUsuario.php');

    }
}
?>

<!DOCTYPE HTML>
<html lang="es">

<?php require 'head.php';?>

    <body>
    
   

    <?php require 'navbar.php'; ?>

        <div class="container">
            <form class="form" action="" method="post">
                <h1 class="form-title">Iniciar sesión</h1>

                     <?php if(!empty($arrayErr)): ?>
                     <div class="errores">
                     <strong><?=$arrayErr['login']; ?></strong> 
                     </div>
                     <?php endif; ?>      
                    
                 <label for="nombre" class="form-label">Email:</label>     
                 <input class="form-input"  type="email" name="email" id="mail" value="">
                    
                    

                 <label for="contraseña" class="form-label">Contraseña:</label>
                 <input class="form-input" type="password" name="password" id="password" value="">

                    <input class="btn-sublim" type="submit" value="Entrar">

                    <a class="item-menu" href="#">¿Olvido su Contraseña?</a>
                    <br>
                    <a class="item-menu" href="formulario.php">Registrarme</a>

              </div>   
            </form>
        </div>      
    </body>
</html>