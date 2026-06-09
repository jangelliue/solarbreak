<?php
require_once 'data/articulos.php';
$articulo_destacado = $articulos[0];
$articulos_secundarios = array_slice($articulos, 1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Solar Break</title>
    <meta name="description" content="Blog de Solar Break sobre movilidad eléctrica, energía solar e infraestructura sostenible en Colombia.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <script src="js/script.js" defer></script>
</head>
<body>

<?php include 'includes/header.php'; ?>

    <main>
        <section class="section-lg" style="background:linear-gradient(180deg, #f7f6f2 0%, #fcf9f8 100%);">
            <div class="container">
                <span class="badge badge-warning">Contenido editorial</span>
                <h1 class="display-title mt-2">Tendencias de movilidad eléctrica y energía solar</h1>
                <p class="lead mt-2" style="max-width:760px;">
                    Explora artículos sobre infraestructura de carga, transición energética en Colombia y el contexto técnico que impulsa la propuesta de Solar Break.
                </p>
            </div>
        </section>

        <section class="section">
            <div class="container grid grid-2" style="align-items:stretch;">
                <article class="surface-card" style="overflow:hidden;display:grid;grid-template-columns:1.1fr 1fr;">
                    <div style="min-height:320px;background:url('<?php echo htmlspecialchars($articulo_destacado['imagen']); ?>') center/cover no-repeat;"></div>
                    <div style="padding:2rem;display:flex;flex-direction:column;justify-content:center;">
                        <span class="badge badge-info"><?php echo htmlspecialchars($articulo_destacado['categoria']); ?></span>
                        <h2 class="page-title mt-2"><?php echo htmlspecialchars($articulo_destacado['titulo']); ?></h2>
                        <p class="text-muted mt-2 mb-2">
                            <?php echo date('d/m/Y', strtotime($articulo_destacado['fecha'])); ?> · <?php echo htmlspecialchars($articulo_destacado['tiempo_lectura']); ?>
                        </p>
                        <p class="lead" style="font-size:1rem;">
                            <?php echo htmlspecialchars($articulo_destacado['resumen']); ?>
                        </p>
                        <div class="mt-3">
                            <a class="btn btn-primary" href="articulo.php?slug=<?php echo urlencode($articulo_destacado['slug']); ?>">Leer artículo</a>
                        </div>
                    </div>
                </article>

                <aside class="card" style="display:flex;flex-direction:column;justify-content:center;">
                    <span class="badge badge-success">Enfoque del blog</span>
                    <h3 class="mt-2">Información útil para sustentar el proyecto</h3>
                    <p class="text-muted">
                        Este blog complementa la propuesta académica de Solar Break con contenido sobre energías limpias, infraestructura vial sostenible y oportunidades de negocio asociadas a la recarga de vehículos eléctricos.
                    </p>
                    <ul style="padding-left:1rem;color:var(--color-text-muted);margin:0;">
                        <li>Movilidad eléctrica en Colombia</li>
                        <li>Transición energética y energía solar</li>
                        <li>Corredores viales y carga sostenible</li>
                        <li>Modelo de aliados comerciales</li>
                    </ul>
                </aside>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div style="display:flex;justify-content:space-between;align-items:end;gap:1rem;flex-wrap:wrap;margin-bottom:1.5rem;">
                    <div>
                        <span class="badge badge-info">Más artículos</span>
                        <h2 class="page-title mt-1">Lecturas recomendadas</h2>
                    </div>
                    <p class="text-muted mb-0">Contenido pensado para reforzar el contexto técnico y ambiental del proyecto.</p>
                </div>

                <div class="grid grid-3">
                    <?php foreach ($articulos_secundarios as $articulo): ?>
                        <article class="card" style="display:flex;flex-direction:column;height:100%;padding:0;overflow:hidden;">
                            <div style="height:220px;background:url('<?php echo htmlspecialchars($articulo['imagen']); ?>') center/cover no-repeat;"></div>
                            <div style="padding:1.5rem;display:flex;flex-direction:column;gap:.75rem;flex:1;">
                                <span class="badge badge-warning"><?php echo htmlspecialchars($articulo['categoria']); ?></span>
                                <h3 style="margin:0;line-height:1.3;"><?php echo htmlspecialchars($articulo['titulo']); ?></h3>
                                <p class="text-muted" style="margin:0;">
                                    <?php echo htmlspecialchars($articulo['resumen']); ?>
                                </p>
                                <p class="text-muted" style="font-size:.92rem;margin:0;">
                                    <?php echo date('d/m/Y', strtotime($articulo['fecha'])); ?> · <?php echo htmlspecialchars($articulo['tiempo_lectura']); ?>
                                </p>
                                <div style="margin-top:auto;">
                                    <a class="btn btn-secondary" href="articulo.php?slug=<?php echo urlencode($articulo['slug']); ?>">Ver más</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="surface-card" style="padding:2rem;text-align:center;background:linear-gradient(135deg, #1a4731, #00301c);color:#fff;">
                    <h2 class="page-title" style="color:#fff;">¿Quieres conocer la propuesta completa?</h2>
                    <p style="max-width:720px;margin:1rem auto 1.5rem;color:rgba(255,255,255,.85);">
                        Revisa el modelo Solar Break y contáctanos para explorar cómo una estación de carga híbrida puede integrarse a tu establecimiento o corredor vial.
                    </p>
                    <div style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;">
                        <a class="btn" href="modelo.php" style="background:#feae2c;color:#1c1b1b;">Ver modelo</a>
                        <a class="btn btn-secondary" href="contacto.php" style="border-color:#fff;color:#fff;">Ir a contacto</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
