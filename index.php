<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Break | Carga tu camino, cuida tu destino</title>
    <meta name="description" content="Solar Break es una propuesta de estaciones de carga híbrida para vehículos eléctricos con energía solar, baterías de respaldo y aliados comerciales en carretera.">
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
        <section class="hero" style="min-height:78vh;background:url('assets/hero-estacion.webp') center/cover no-repeat;display:flex;align-items:center;">
            <div class="hero-overlay"></div>
            <div class="container hero-content" style="padding:5rem 0;">
                <div style="max-width:760px;color:#fff;">
                    <span class="badge" style="background:rgba(255,255,255,.12);color:#fff;border:1px solid rgba(255,255,255,.18);backdrop-filter:blur(8px);">Infraestructura sostenible para carretera</span>
                    <h1 class="display-title mt-2" style="color:#fff;">La primera red de carga solar híbrida para vehículos eléctricos en carretera</h1>
                    <p class="mt-2" style="font-size:1.1rem;max-width:680px;color:rgba(255,255,255,.9);">
                        Solar Break propone estaciones que combinan energía solar fotovoltaica, baterías de respaldo y conexión a la red para ofrecer recarga confiable, limpia y útil en corredores estratégicos de Colombia.
                    </p>
                    <div class="mt-3" style="display:flex;gap:1rem;flex-wrap:wrap;">
                        <a class="btn" href="modelo.php" style="background:#feae2c;color:#1c1b1b;">Conoce la solución</a>
                        <a class="btn btn-secondary" href="contacto.php" style="border-color:#fff;color:#fff;">Quiero ser aliado</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="margin-top:-3rem;position:relative;z-index:2;">
            <div class="container grid grid-3">
                <article class="card">
                    <span class="badge badge-success">Movilidad eléctrica</span>
                    <h3 class="mt-2">Más de 19.000 vehículos eléctricos nuevos</h3>
                    <p class="text-muted mb-0">El crecimiento del parque automotor eléctrico exige una infraestructura de recarga más amplia, especialmente fuera de las ciudades principales.</p>
                </article>
                <article class="card">
                    <span class="badge badge-warning">Infraestructura</span>
                    <h3 class="mt-2">Menor cobertura rural e intermunicipal</h3>
                    <p class="text-muted mb-0">Los corredores viales y las zonas de parada todavía presentan una oportunidad importante para soluciones energéticas sostenibles.</p>
                </article>
                <article class="card">
                    <span class="badge badge-info">Energía solar</span>
                    <h3 class="mt-2">Colombia avanza en capacidad renovable</h3>
                    <p class="text-muted mb-0">La expansión de la energía solar fortalece la viabilidad de estaciones híbridas con generación limpia y respaldo operativo.</p>
                </article>
            </div>
        </section>

        <section class="section-lg">
            <div class="container grid grid-2" style="align-items:center;">
                <div>
                    <span class="badge badge-info">El problema</span>
                    <h2 class="page-title mt-2">La transición energética necesita puntos de carga más inteligentes</h2>
                    <p class="lead mt-2">
                        Aunque la movilidad eléctrica crece en Colombia, la infraestructura de recarga todavía se concentra principalmente en entornos urbanos. Esto limita viajes largos y reduce la confianza del usuario en corredores intermunicipales.
                    </p>
                    <p class="text-muted">
                        Solar Break nace para cerrar esa brecha con una propuesta que integra sostenibilidad, tecnología y alianzas con restaurantes, paradores y establecimientos ubicados en carretera.
                    </p>
                    <div class="mt-3">
                        <a class="btn btn-primary" href="blog.php">Ver contexto en el blog</a>
                    </div>
                </div>
                <div class="surface-card" style="overflow:hidden;">
                    <img src="assets/mapa-antioquia.webp" alt="Mapa estratégico del corredor Medellín Oriente Antioqueño" style="width:100%;height:100%;object-fit:cover;min-height:360px;">
                </div>
            </div>
        </section>

        <section class="section" style="background:#f4f6f3;">
            <div class="container">
                <div class="text-center" style="max-width:820px;margin:0 auto 2rem;">
                    <span class="badge badge-warning">Cómo funciona</span>
                    <h2 class="page-title mt-2">Una solución híbrida pensada para operar con continuidad</h2>
                    <p class="lead mt-2">
                        El modelo combina generación solar, almacenamiento energético y respaldo de red para que la recarga sea confiable incluso en momentos de alta demanda o baja radiación.
                    </p>
                </div>
                <div class="grid grid-3">
                    <article class="card text-center">
                        <h3>1. Captación solar</h3>
                        <p class="text-muted mb-0">Los paneles fotovoltaicos generan energía durante el día y reducen la dependencia de la red convencional.</p>
                    </article>
                    <article class="card text-center">
                        <h3>2. Almacenamiento</h3>
                        <p class="text-muted mb-0">Las baterías guardan excedentes para mantener disponibilidad nocturna o responder a variaciones en la carga.</p>
                    </article>
                    <article class="card text-center">
                        <h3>3. Respaldo y servicio</h3>
                        <p class="text-muted mb-0">La conexión a la red garantiza continuidad operativa y permite una experiencia estable para el usuario final.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section-lg">
            <div class="container grid grid-2" style="align-items:center;">
                <div class="surface-card" style="overflow:hidden;">
                    <img src="assets/estacion-detalle.webp" alt="Detalle visual de una estación Solar Break" style="width:100%;height:100%;object-fit:cover;min-height:380px;">
                </div>
                <div>
                    <span class="badge badge-success">Propuesta de valor</span>
                    <h2 class="page-title mt-2">Un modelo ganar-ganar para conductores y aliados comerciales</h2>
                    <div class="grid" style="gap:1rem;margin-top:1.5rem;">
                        <div class="card" style="padding:1.25rem;">
                            <h3 style="margin-bottom:.5rem;">Para el conductor</h3>
                            <p class="text-muted mb-0">Recarga en ruta, mayor confianza para viajes largos y tiempo de espera aprovechable en establecimientos aliados.</p>
                        </div>
                        <div class="card" style="padding:1.25rem;">
                            <h3 style="margin-bottom:.5rem;">Para el establecimiento</h3>
                            <p class="text-muted mb-0">Aumento de flujo de clientes, posicionamiento sostenible y posibilidad de integrar nuevos servicios alrededor de la recarga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" style="background:linear-gradient(135deg, #1a4731, #00301c);color:#fff;">
            <div class="container grid grid-2" style="align-items:center;">
                <div>
                    <span class="badge" style="background:rgba(255,255,255,.12);color:#fff;border:1px solid rgba(255,255,255,.18);">Corredor piloto</span>
                    <h2 class="page-title mt-2" style="color:#fff;">Medellín – Oriente Antioqueño como punto de partida</h2>
                    <p style="color:rgba(255,255,255,.88);">
                        El proyecto plantea iniciar con un piloto en un corredor vial de alto tránsito, útil para validar la propuesta técnica, la operación del servicio y la relación con aliados comerciales.
                    </p>
                    <p style="color:rgba(255,255,255,.78);">
                        La visión es escalar hacia otras rutas del país donde la movilidad eléctrica necesita soporte con infraestructura más accesible y sostenible.
                    </p>
                </div>
                <div class="surface-card" style="padding:2rem;background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.12);box-shadow:none;">
                    <h3 style="color:#fff;margin-top:0;">Próximos pasos del proyecto</h3>
                    <ul style="margin:0;padding-left:1rem;color:rgba(255,255,255,.85);">
                        <li>Validar ubicación con enfoque vial y comercial.</li>
                        <li>Consolidar aliados estratégicos interesados.</li>
                        <li>Modelar operación técnica y financiera del piloto.</li>
                        <li>Fortalecer el sitio web como plataforma informativa y de captación.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section-lg">
            <div class="container text-center" style="max-width:860px;">
                <span class="badge badge-warning">Llamado a la acción</span>
                <h2 class="page-title mt-2">¿Tienes un restaurante, parqueadero o espacio estratégico en carretera?</h2>
                <p class="lead mt-2">
                    Solar Break busca aliados para explorar la instalación de estaciones de carga híbrida que aporten a la movilidad sostenible y generen valor comercial.
                </p>
                <div class="mt-3" style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;">
                    <a class="btn btn-primary" href="contacto.php">Solicitar información</a>
                    <a class="btn btn-secondary" href="blog.php">Leer más contexto</a>
                </div>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
