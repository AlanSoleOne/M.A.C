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
     <form class="form" action="" method="">
      <div class="from-header">
        <h1 class="form-title">Usuario</h1>
       
        <label for="nombre" class="form-label" >Nombre:</label>     
        <input type="text" id="nombre" class="form-input" placeholder="Usuario o email" name="nombre">


                <label for="contraseña" class="form-label" >Contraseña</label>

             <input class="form-input" type="password" name="contraseña" placeholder="contraseña" required>
                
            <input class="btn-sublim" type="submit" value="Entrar">
                                
                <a href="#">¿Olvido su Contraseña?</a>
                <br>
                <a href="formulario.php">Registrarme</a>
            </form>
         </div>
        </div>
        </fieldset> 
        
    </body>
</html>