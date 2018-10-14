<header class="menu">

<div> <img class="logo" src="img/logo.png" alt=""> </div>


        <?php if(Auth::guest()): ?>

            <a href="faq.php" class="boton-vacio">Preguntas Frecuentes</a>
            <a href="usuario.php" class="boton-vacio">Iniciar sesión</a>
            <a href="formulario.php"class="boton-registro">REGISTRARME</a>

        <?php else: ?>
      
            <a href="homeUsuario.php" class="boton-vacio">ventas</a>
            <a href="homeUsuario.php" class="boton-vacio">cambios</a>
            <a href="logout.php" class="boton-vacio">cerrar secion</a>

        <?php endif; ?>
            
        <?php if(isset($_SESSION['email'])): ?>

            <?php if(Auth::checkRole($db, $user)): ?>
                <a href="#" class="boton-vacio">Administrador</a>
            <?php endif; ?>
            
        <?php endif; ?>
            
        </ul>
    </div>
   
</nav>


</header>