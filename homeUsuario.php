<?php
    //require 'funciones.php';
    require 'loader.php';

    if (Auth::guest()) {
        redirect('index.php');
    }

    if(isset($_SESSION['email'])) {

        $usuarioArray = $db->emailDbSearch($_SESSION['email']);
        $user = new User($usuarioArray['username'], $usuarioArray['email'], $usuarioArray['password'], $usuarioArray['role']);

        $username = $user->getUsername();

        if ($user->getavatar() !== null) {
            $avatar = $user->getAvatar();
        }
    }

?>  
<!DOCTYPE html>
<html>
    <?php require 'head.php';?>
    <body>
        <div class="container">

            <?php require 'navbar.php'; ?>
            <?php //Checkeamos que no sea un GUEST, y en caso de serlo, error ?>
            <?php if(Auth::guest()):?>
            <div class="alert alert-danger" role="alert">
                No estas autorizado en este sistema <a href="formulario.php" class="alert-link">Registrate!</a>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="card col-4">
                    <?php //si NO TIENE AVATAR ?>
                    <?php if($avatar !== ""):?>
                    <?php //si Cargame la imagen de d10s ?>
                    <img class="card-img-top" src="img/default.jpg" alt="avatar default">
                    <?php else: ?>
                    <?php // ELSE -----> cargame su avatar ?>
                    <img class="card-img-top" src="img/<?=$avatar?>" alt="avatar">
                    <?php endif;?>

                    
                    <div class="main-slogan">

                        <h5 class="card-title"><?="Bienvenido $username!" ?></h5>
                        <p class="titulo">Tu universo de figuritas</p>

                        <p class="slogan">Encontrá las que te faltan, <br>vendé las que tenés.</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
    </body>
</html>