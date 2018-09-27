<?php


require 'funciones.php';

if(isset($_SESSION['email'])) {
    
    $user = dbEmailSearch($_SESSION['email']);
   
    $username = $user['username'];
    
    if(array_key_exists('avatar', $user)){
        
        $avatar = $user['avatar'];
    }
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

    

    
    <div class=>
                    
                    <?php if(!isset($user['avatar'])):?>
                    
                    <img class= src="img/perfil.jpg" alt="avatar default">
                    <?php else: ?>
                   
                    <img class= src="img/<?=$avatar?>" alt="avatar">
                    <?php endif;?>

                    
                    <div class="main-slogan saludo-inicial">
                        <h2 class="main-slogan saludo-inicial">Bienvenido!</h2>
                        
                    </div>
                </div>
            </div>
            
        </div>
    
</body>
</html>