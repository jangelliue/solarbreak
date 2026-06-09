<?php
// Detectar página activa para resaltar el enlace correcto
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<header class="site-header">
    <div class="container site-header-inner">

        <!-- COLUMNA 1: LOGO (izquierda) -->
        <a href="index.php" class="site-logo">
            <img src="assets/logo.webp" alt="Logo Solar Break" style="height:44px;width:auto;">
            <span class="sr-only">Solar Break</span>
        </a>

        <!-- COLUMNA 2: NAV CENTRAL (solo escritorio) -->
        <nav class="site-nav" data-site-nav>
            <a href="index.php"    <?php echo ($pagina_actual === 'index.php')    ? 'class="active"' : ''; ?>>Inicio</a>
            <a href="modelo.php"   <?php echo ($pagina_actual === 'modelo.php')   ? 'class="active"' : ''; ?>>Solar Break</a>
            <a href="blog.php"     <?php echo ($pagina_actual === 'blog.php' || $pagina_actual === 'articulo.php') ? 'class="active"' : ''; ?>>Blog</a>
            <a href="contacto.php" <?php echo ($pagina_actual === 'contacto.php') ? 'class="active"' : ''; ?>>Contacto</a>
        </nav>

        <!-- COLUMNA 3: BOTÓN LOGIN (derecha) -->
        <a href="login.php" class="nav-login-btn">Login</a>

        <!-- HAMBURGUESA (solo móvil, se posiciona via CSS) -->
        <button class="mobile-menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false" data-menu-toggle>
            <span class="hamburger-icon">&#9776;</span>
            <span class="close-icon" style="display:none;">&#10005;</span>
        </button>

    </div>
</header>
