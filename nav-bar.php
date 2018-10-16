<header class="menu">
        <div> <img class="logo" src="img/logo.png" alt=""> </div>

        <nav class="nav-bar">            
            <?php if(Auth::guest()): ?>
            <a href="index.php" class="item-menu">HOME</a>
            <a href="faq.php" class="item-menu">PREGUNTAS FRECUENTES</a>
            <a href="usuario.php" class="boton-vacio">Iniciar sesión</a>
            <a href="formulario.php" class="boton-registro">REGISTRARME</a>
            <?php else: ?>
            <a href="" class="item-menu">Subir figuritas</a>
            <a href="" class="item-menu">Buscar figuritas</a>
            <a href="logout.php" class="boton-registro">Cerrar Sesión</a>
            <?php endif; ?>
        </nav>
        <nav class="nav-mobile">
            <img class="menu-hamburguesa" src="img/menu.svg" alt="">
        </nav>
</header>