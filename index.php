<?php

require 'loader.php';

if(Auth::check()) {
    redirect('perfil.php');
}

?>

<!DOCTYPE html>
<html lang="es">
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

    <div class="container"></div> <!-- INICIO CONTENEDOR GENERAL -->
        

        <?php require 'nav-bar.php'; ?>
        

        <main>
            <div class="main-slogan">
                <p class="titulo">Tu universo de figuritas</p>
                <p class="slogan">Encontrá las que te faltan, <br>vendé las que tenés.</p>
            </div>
        </main>

        <footer>
            
        </footer>

        
    </div> <!-- FIN CONTENEDOR GENERAL -->
    
</body>
</html>