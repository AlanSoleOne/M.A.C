<header class="menu">

<div> <img class="logo" src="img/logo.png" alt=""> </div>

<nav class="nav-bar">
    <a href="index.php" class="item-menu">HOME</a>

    <a href="faq.php" class="item-menu">PREGUNTAS FRECUENTES</a>
    
</nav>
<nav class="nav-mobile">
    <img class="menu-hamburguesa" src="img/menu.svg" alt="">
</nav>

        <?php if(Auth::guest()): ?>

            <a href="usuario.php" class="boton-vacio">Iniciar sesión</a>>
            <a href="formulario.php"class="boton-registro">REGISTRARME</a>

        <?php else: ?>

            <a href="usuario.php" class="boton-vacio">cerrar sesión</a>

        <?php endif; ?>
            
        <?php if(isset($_SESSION['email'])): ?>

            <?php if(Auth::checkRole($db, $user)): ?>
                <a href="#" class="boton-vacio">Administrador</a>
            <?php endif; ?>
            
        <?php endif; ?>
            
        </ul>
    </div>
</nav>
<nav class="nav-mobile">
            <img class="menu-hamburguesa" src="img/menu.svg" alt="">
        </nav>

</header>