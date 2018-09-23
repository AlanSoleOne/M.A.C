<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estyle.css">
    <title>Formulario</title>
</head>
<body>
        <nav class="inicio-sesion">
                <a href="faq.php">Preguntas frecuentes</a>
                <a class="boton-inicio" href="usuario.php">Iniciar sesión</a>
                <a href="index.php">pagina principal</a>
            </nav>


    <div class="container">
     <form class="form" action="" method="">
         <div class="from-header">
         <h1 class="form-title">Formulario contacto</h1>

         <label for="nombre" class="form-label" >Nombre:</label>     
         <input type="text" id="nombre" class="form-input" placeholder="Escriba su nombre" name="nombre">

        <label for="nombre" class="form-label" >Correo electronico</label>
         <input type="text" id="email" class="form-input" placeholder="Escriba su e-mail" name="email">

        <label for="nombre" class="form-label" >Direccion</label>
         <input type="text" id="direccion" class="form-input" placeholder="Escriba su direccion" name="direccion">

        
                 <div>
                    <label class="form-label" for="password">Password: </label>
                    <input class="form-input" type="password" name="password">
                <?php if(isset($errors['password'])): ?>

                    <div class="alert alert-danger">
                        <strong><?=$errors['password']; ?></strong>
                    </div>
                <?php elseif(isset($errors['cpassword'])): ?>

                    <div class="alert alert-danger">
                        <strong><?=$errors['cpassword']; ?></strong>

                    </div>
                <?php endif;?>
                </div>

                <div>
                    <label class="form-label"  for="cpasswd">Repetir Password: </label>
                    <input class="form-input" type="password" name="cpassword">
                </div>
                <?php if(isset($errors['confirm'])): ?>

                    <div class="alert alert-danger">
                        <strong><?=$errors['confirm']; ?></strong>
                    </div>

                <?php endif;?>
                <div>
                    <input class="" type="checkbox" name="confirm" value="">
                    <label class="id" for="confirm">Acepto los terminos y condiciones.</label>
                </div>
                <div >
                    <button class="btn-sublim"  type="submit" >Registrarme</button>
                </div>

            </form>
        </div>
        
        <?php include_once  ('scripts.php'); ?>


</body>
</html>