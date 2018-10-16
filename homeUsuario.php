<?php

require 'loader.php';

if (Auth::guest()) {
    redirect('usuario.php');
}

if(isset($_SESSION['email'])) {

    $usuarioArray = $db->emailDbSearch($_SESSION['email']);
    $user = new Usuario($usuarioArray['usuario'], $usuarioArray['email'], $usuarioArray['password']);

    $username = $user->getUsuario();
    $avatar = $usuarioArray['avatar'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/nav-bar.css">    
    <link rel="stylesheet" href="css/styles.css">    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/x-icon" />
    <title>Stickear. Tu universo de figuritas</title>
</head>
<body>

    <?php require 'nav-bar.php'; ?>

    <h1 class="main-slogan saludo-inicial"> Hola <?=$username?> </h1>

    <?php if($avatar !== ""): ?>
    <div class="foto-perfil"> <img class="avatar-usuario" src="img/foto-perfiles/<?= $avatar ?>" alt="perfil-default"></div>
    <?php else: ?>
    <div> <img src="img/foto-perfiles/perfil-blanco.png" alt="foto-perfil"></div>
    <?php endif;?>
</body>
</html>