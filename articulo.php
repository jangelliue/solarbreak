<?php
require_once 'data/articulos.php';

$slug = $_GET['slug'] ?? '';
$articulo_actual = null;

foreach ($articulos as $articulo) {
    if ($articulo['slug'] === $slug) {
        $articulo_actual = $articulo;
        break;
    }
}

if (!$articulo_actual) {
    http_response_code(404);
}

$articulos_relacionados = array_filter($articulos, function ($item) use ($slug) {
    return $item['slug'] !== $slug;
});
$articulos_relacionados = array_slice(array_values($articulos_relacionados), 0, 3);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $articulo_actual ? htmlspecialchars($articulo_actual['titulo']) : 'Artículo no encontrado'; ?> | Solar Break</title>
    <meta name="description" content="Detalle de artículo del blog Solar Break sobre movilidad eléctrica, energía solar e infraestructura sostenible.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <header class="site-header">
        <div class="container site-header-inner">
            <a href="index.php" style="display:flex;align-items:center;gap:.75rem;font-weight:800;color:var(--color-primary);">
                <img src="assets/logo.webp" alt="Logo Solar Break" style="height:44px;width:auto;">
                <span>Solar Break</span>
            </a>

            <button class="mobile-menu-toggle" type="button" aria-label="Abrir menú" data-menu-toggle>
                ☰
            </button>

            <nav class="site-nav" data-site-nav>
                <a href="index.php">Inicio</a>
                <a href="modelo.php">Solar Break</a>
                <a href="blog.php" class="active">Blog</a>
                <a href="contacto.php">Contacto</a>
                <a href="login.php">Ingreso</a>
            </nav>
        </div>
    </header>

    <main>
        <?php if (!$articulo_actual): ?>
            <section class="section-lg">
                <div class="container">
                    <div class="surface-card" style="padding:2rem;text-align:center;max-width:760px;margin:0 auto;">
                        <span class="badge badge-warning">Error 404</span>
                        <h1 class="page-title mt-2">Artículo no encontrado</h1>
                        <p class="lead mt-2">
                            El contenido que estás buscando no existe o el enlace no es válido. Puedes volver al blog para explorar otros artículos.
                        </p>
                        <div class="mt-3">
                            <a class="btn btn-primary" href="blog.php">Volver al blog</a>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section-lg" style="padding-bottom:2rem;">
                <div class="container" style="max-width:900px;">
                    <a href="blog.php" class="text-muted" style="font-weight:600;">← Volver al blog</a>
                    <div class="mt-2">
                        <span class="badge badge-info"><?php echo htmlspecialchars($articulo_actual['categoria']); ?></span>
                    </div>
                    <h1 class="display-title mt-2"><?php echo htmlspecialchars($articulo_actual['titulo']); ?></h1>
                    <p class="text-muted mt-2 mb-0">
                        Por <?php echo htmlspecialchars($articulo_actual['autor']); ?> · <?php echo date('d/m/Y', strtotime($articulo_actual['fecha'])); ?> · <?php echo htmlspecialchars($articulo_actual['tiempo_lectura']); ?>
                    </p>
                </div>
            </section>

            <section class="section" style="padding-top:1rem;">
                <div class="container" style="max-width:900px;">
                    <div class="surface-card" style="overflow:hidden;">
                        <img src="<?php echo htmlspecialchars($articulo_actual['imagen']); ?>" alt="Imagen del artículo <?php echo htmlspecialchars($articulo_actual['titulo']); ?>" style="width:100%;max-height:460px;object-fit:cover;">
                    </div>
                </div>
            </section>

            <section class="section" style="padding-top:2rem;">
                <div class="container grid" style="grid-template-columns:minmax(0, 2fr) minmax(280px, 1fr);align-items:start;">
                    <article class="surface-card" style="padding:2rem;">
                        <p class="lead" style="font-size:1rem;color:var(--color-text);font-weight:500;">
                            <?php echo htmlspecialchars($articulo_actual['resumen']); ?>
                        </p>

                        <?php foreach ($articulo_actual['contenido'] as $parrafo): ?>
                            <p style="font-size:1.03rem;color:var(--color-text-muted);margin-top:1.25rem;">
                                <?php echo htmlspecialchars($parrafo); ?>
                            </p>
                        <?php endforeach; ?>
                    </article>

                    <aside class="card">
                        <h3 class="mt-0">Sobre este contenido</h3>
                        <p class="text-muted">
                            Este artículo forma parte del blog de Solar Break, una propuesta académica centrada en estaciones de carga híbrida para vehículos eléctricos con apoyo de energía solar.
                        </p>
                        <div class="mt-3">
                            <a class="btn btn-primary" href="contacto.php">Solicitar información</a>
                        </div>
                    </aside>
                </div>
            </section>

            <section class="section">
                <div class="container">
                    <div style="display:flex;justify-content:space-between;align-items:end;gap:1rem;flex-wrap:wrap;margin-bottom:1.5rem;">
                        <div>
                            <span class="badge badge-warning">Sigue explorando</span>
                            <h2 class="page-title mt-1">Artículos relacionados</h2>
                        </div>
                    </div>

                    <div class="grid grid-3">
                        <?php foreach ($articulos_relacionados as $relacionado): ?>
                            <article class="card" style="display:flex;flex-direction:column;height:100%;padding:0;overflow:hidden;">
                                <div style="height:220px;background:url('<?php echo htmlspecialchars($relacionado['imagen']); ?>') center/cover no-repeat;"></div>
                                <div style="padding:1.5rem;display:flex;flex-direction:column;gap:.75rem;flex:1;">
                                    <span class="badge badge-success"><?php echo htmlspecialchars($relacionado['categoria']); ?></span>
                                    <h3 style="margin:0;line-height:1.3;"><?php echo htmlspecialchars($relacionado['titulo']); ?></h3>
                                    <p class="text-muted" style="margin:0;">
                                        <?php echo htmlspecialchars($relacionado['resumen']); ?>
                                    </p>
                                    <div style="margin-top:auto;">
                                        <a class="btn btn-secondary" href="articulo.php?slug=<?php echo urlencode($relacionado['slug']); ?>">Leer artículo</a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <footer class="site-footer">
        <div class="container text-center">
            <img src="assets/logo.webp" alt="Logo Solar Break" style="height:48px;width:auto;margin:0 auto 1rem;">
            <div class="footer-links">
                <a href="index.php">Inicio</a>
                <a href="modelo.php">Solar Break</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </div>
            <p class="text-muted mb-0">© 2026 Solar Break. Proyecto académico sobre energías limpias y movilidad sostenible.</p>
        </div>
    </footer>
</body>
</html>
