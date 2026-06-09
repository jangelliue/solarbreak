<?php
$mensaje_exito = '';
$mensaje_error = '';

if (isset($_GET['exito']) && $_GET['exito'] == '1') {
    $mensaje_exito = '¡Solicitud enviada con éxito! Pronto nos pondremos en contacto contigo.';
}
if (isset($_GET['error'])) {
    $mensaje_error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Solar Break</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <script src="js/script.js" defer></script>
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
            line-height: 1;
            display: inline-block;
            vertical-align: middle;
        }
        /* Estilos para el formulario de contacto */
        .contact-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 2rem;
            align-items: start;
        }
        @media (max-width: 900px) {
            .contact-grid { grid-template-columns: 1fr; }
        }
        .form-label {
            display: block;
            font-weight: 600;
            font-size: .88rem;
            margin-bottom: .4rem;
            color: var(--color-text, #1c1b1b);
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: .7rem .9rem;
            border: 1px solid var(--color-border, #c1c9c1);
            border-radius: 8px;
            font-size: .97rem;
            font-family: inherit;
            color: var(--color-text, #1c1b1b);
            background: #fff;
            outline: none;
            transition: border-color .18s, box-shadow .18s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--color-primary, #00301c);
            box-shadow: 0 0 0 3px rgba(0,48,28,.1);
        }
        .form-textarea { resize: vertical; min-height: 110px; }
        .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }
        @media (max-width: 600px) {
            .form-grid-2 { grid-template-columns: 1fr; }
        }
        .info-item {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            padding: 1rem 0;
            border-bottom: 1px solid var(--color-border, #e2e8e4);
        }
        .info-item:last-child { border-bottom: none; }
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(0,48,28,.07);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--color-primary, #00301c);
        }
        .trust-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            text-align: center;
        }
        @media (max-width: 700px) {
            .trust-grid { grid-template-columns: 1fr; }
        }
        .trust-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(0,48,28,.07);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: var(--color-primary, #00301c);
        }
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: .85rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
        }
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: .85rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<main>
    <!-- Hero contacto -->
    <section class="section-lg" style="background:#f7f6f2;border-bottom:1px solid #e2e8e4;">
        <div class="container text-center" style="max-width:860px;">
            <h1 class="display-title">¿Quieres ser aliado Solar Break?</h1>
            <p class="lead mt-2">Únete a la red de infraestructura de recarga más confiable. Convierte tu espacio en un punto de energía limpia y atrae a más clientes.</p>
        </div>
    </section>

    <!-- Formulario + Info lateral -->
    <section class="section-lg">
        <div class="container">
            <div class="contact-grid">

                <!-- Formulario -->
                <div class="surface-card" style="padding:2.5rem;">
                    <h2 class="page-title" style="margin-bottom:1.5rem;">Solicitud de Alianza</h2>

                    <?php if (!empty($mensaje_exito)): ?>
                        <div class="alert-success"><?php echo htmlspecialchars($mensaje_exito); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($mensaje_error)): ?>
                        <div class="alert-error"><?php echo htmlspecialchars($mensaje_error); ?></div>
                    <?php endif; ?>

                    <form method="POST" action="procesar_contacto.php">
                        <div style="margin-bottom:1.25rem;">
                            <label class="form-label" for="businessName">Nombre del Negocio *</label>
                            <input class="form-input" id="businessName" name="businessName" placeholder="Ej. Restaurante El Mirador" required type="text">
                        </div>

                        <div class="form-grid-2" style="margin-bottom:1.25rem;">
                            <div>
                                <label class="form-label" for="businessType">Tipo de Negocio *</label>
                                <select class="form-select" id="businessType" name="businessType" required>
                                    <option disabled selected value="">Selecciona una opción</option>
                                    <option value="Hotel">Hotel / Alojamiento</option>
                                    <option value="Restaurante">Restaurante / Parador</option>
                                    <option value="Centro Comercial">Centro Comercial</option>
                                    <option value="Parqueadero">Parqueadero</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label" for="location">Ubicación / Ciudad *</label>
                                <input class="form-input" id="location" name="location" placeholder="Ciudad o corredor vial" required type="text">
                            </div>
                        </div>

                        <div style="margin-bottom:1.25rem;">
                            <label class="form-label" for="contactName">Nombre del Responsable *</label>
                            <input class="form-input" id="contactName" name="contactName" placeholder="Nombre completo" required type="text">
                        </div>

                        <div class="form-grid-2" style="margin-bottom:1.25rem;">
                            <div>
                                <label class="form-label" for="email">Correo Electrónico *</label>
                                <input class="form-input" id="email" name="email" placeholder="correo@empresa.com" required type="email">
                            </div>
                            <div>
                                <label class="form-label" for="phone">Teléfono de Contacto</label>
                                <input class="form-input" id="phone" name="phone" placeholder="+57 300 123 4567" type="tel">
                            </div>
                        </div>

                        <div style="margin-bottom:1.75rem;">
                            <label class="form-label" for="message">Cuéntanos más sobre tu espacio (Opcional)</label>
                            <textarea class="form-textarea" id="message" name="message" placeholder="Detalles del parqueadero, capacidad eléctrica disponible, flujo de clientes, etc."></textarea>
                        </div>

                        <button class="btn btn-primary" style="width:100%;justify-content:center;font-size:1rem;padding:.85rem;" type="submit">
                            Enviar Solicitud
                        </button>
                    </form>
                </div>

                <!-- Info lateral -->
                <div style="display:flex;flex-direction:column;gap:1.5rem;">
                    <div class="card">
                        <h3 style="margin-bottom:1.25rem;">¿Por qué unirse a nuestra red?</h3>

                        <div class="info-item">
                            <div class="info-icon"><span class="material-symbols-outlined">ev_station</span></div>
                            <div>
                                <strong style="display:block;margin-bottom:.25rem;">Atrae nuevos clientes</strong>
                                <p class="text-muted" style="margin:0;">Los conductores de EV buscan activamente puntos de recarga durante sus paradas en ruta.</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon"><span class="material-symbols-outlined">eco</span></div>
                            <div>
                                <strong style="display:block;margin-bottom:.25rem;">Imagen sostenible</strong>
                                <p class="text-muted" style="margin:0;">Posiciona tu marca como aliada del medio ambiente en la transición energética.</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon"><span class="material-symbols-outlined">monitoring</span></div>
                            <div>
                                <strong style="display:block;margin-bottom:.25rem;">Infraestructura premium</strong>
                                <p class="text-muted" style="margin:0;">Diseño, instalación y mantenimiento a cargo de Solar Break con hardware de alta fiabilidad.</p>
                            </div>
                        </div>

                        <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--color-border,#e2e8e4);">
                            <strong style="display:block;margin-bottom:.75rem;font-size:.88rem;">Contacto Directo</strong>
                            <a href="mailto:alianzas@solarbreak.co" style="display:flex;align-items:center;gap:.6rem;color:var(--color-text-muted);text-decoration:none;margin-bottom:.5rem;">
                                <span class="material-symbols-outlined" style="font-size:18px;">mail</span> alianzas@solarbreak.co
                            </a>
                            <a href="tel:+573001234567" style="display:flex;align-items:center;gap:.6rem;color:var(--color-text-muted);text-decoration:none;">
                                <span class="material-symbols-outlined" style="font-size:18px;">call</span> +57 300 123 4567
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust signals -->
    <section class="section" style="background:#f5f7f4;">
        <div class="container">
            <div class="trust-grid">
                <div>
                    <div class="trust-icon"><span class="material-symbols-outlined" style="font-size:28px;">shield_lock</span></div>
                    <strong>Datos Protegidos</strong>
                    <p class="text-muted" style="margin:.4rem 0 0;">Tu información comercial se maneja con estricta confidencialidad.</p>
                </div>
                <div>
                    <div class="trust-icon"><span class="material-symbols-outlined" style="font-size:28px;">schedule</span></div>
                    <strong>Respuesta en 48h</strong>
                    <p class="text-muted" style="margin:.4rem 0 0;">Nuestro equipo evaluará tu solicitud y te contactará rápidamente.</p>
                </div>
                <div>
                    <div class="trust-icon"><span class="material-symbols-outlined" style="font-size:28px;">handshake</span></div>
                    <strong>Sin Compromisos</strong>
                    <p class="text-muted" style="margin:.4rem 0 0;">La solicitud inicial no genera ninguna obligación contractual.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
