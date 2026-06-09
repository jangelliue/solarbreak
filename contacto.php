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
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Contacto - Solar Break</title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "warning-amber": "#ff8f00",
                "inverse-primary": "#a1d1b4",
                "secondary-fixed-dim": "#ffb955",
                "on-tertiary-fixed": "#350f12",
                "error": "#ba1a1a",
                "on-background": "#1c1b1b",
                "surface-container": "#f0eded",
                "tertiary": "#461c1e",
                "on-secondary-fixed-variant": "#633f00",
                "on-primary-fixed": "#002112",
                "on-tertiary": "#ffffff",
                "primary-fixed": "#bdeecf",
                "on-surface-variant": "#414943",
                "on-error": "#ffffff",
                "tertiary-container": "#603133",
                "white": "#ffffff",
                "surface-container-highest": "#e5e2e1",
                "secondary-container": "#feae2c",
                "secondary-fixed": "#ffddb4",
                "primary": "#00301c",
                "on-tertiary-container": "#da999b",
                "surface-container-low": "#f6f3f2",
                "surface": "#fcf9f8",
                "surface-variant": "#e5e2e1",
                "on-secondary-fixed": "#291800",
                "primary-fixed-dim": "#a1d1b4",
                "on-surface": "#1c1b1b",
                "tertiary-fixed-dim": "#fab5b6",
                "secondary": "#835500",
                "on-primary-fixed-variant": "#234f38",
                "inverse-surface": "#313030",
                "primary-container": "#1a4731",
                "surface-bright": "#fcf9f8",
                "tertiary-fixed": "#ffdada",
                "on-primary": "#ffffff",
                "surface-tint": "#3b674f",
                "inverse-on-surface": "#f3f0ef",
                "surface-dim": "#dcd9d9",
                "surface-base": "#f8f9fa",
                "on-primary-container": "#86b598",
                "surface-container-lowest": "#ffffff",
                "error-container": "#ffdad6",
                "surface-container-high": "#eae7e7",
                "outline": "#717972",
                "outline-variant": "#c1c9c1",
                "background": "#fcf9f8",
                "on-error-container": "#93000a",
                "on-secondary-container": "#6b4500",
                "success-leaf": "#2e7d32",
                "on-secondary": "#ffffff",
                "on-tertiary-fixed-variant": "#69393b"
              },
              borderRadius: {
                DEFAULT: "0.125rem",
                lg: "0.25rem",
                xl: "0.5rem",
                full: "0.75rem"
              },
              spacing: {
                "container-max": "1280px",
                "base": "8px",
                "margin-mobile": "16px",
                "margin-desktop": "64px",
                "gutter": "24px"
              },
              fontFamily: {
                "body-lg": ["Inter"],
                "label-bold": ["Inter"],
                "display-lg-mobile": ["Montserrat"],
                "display-lg": ["Montserrat"],
                "headline-md": ["Montserrat"],
                "body-md": ["Inter"],
                "label-sm": ["Inter"]
              },
              fontSize: {
                "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                "label-bold": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
                "display-lg-mobile": ["32px", { lineHeight: "40px", fontWeight: "700" }],
                "display-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "700" }],
                "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                "label-sm": ["12px", { lineHeight: "16px", fontWeight: "500" }]
              }
            }
          }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md antialiased selection:bg-secondary-container selection:text-on-background">
<header class="w-full top-0 sticky bg-surface border-b border-outline-variant z-50 transition-colors">
<nav class="flex justify-between items-center h-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<a class="flex items-center gap-2 scale-95 active:scale-90 transition-transform" href="index.php">
<img alt="Solar Break Logo" class="h-10 w-auto" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnc2ioliGOmJuJM3VAap48ZjfBAeeh0JRgS7HBP8YBkhyskCsX35ljKvey22a63IvM9OHSREJtLlPFPyy6yFd19CAM4E4mfY69d9M6l4iKmXjS-68l3o2PvD1NYDdRVmoxBMCbHDkHWG9tNsOEW_c3pl3ZL5mRjx01jn-RhQ4sVsWowVIoQr80Vu4ocIWU1Hd3WS2sM0IKC8hhjkGrjaX9MFzQu-ckjd9KjSTN39bXSot0p_wggwSZ_bgNdCNqPFK-3dvCexY-b5Y"/>
</a>
<ul class="hidden md:flex items-center gap-8 h-full">
<li class="h-full flex items-center"><a class="font-label-bold text-label-bold text-on-surface-variant hover:text-primary transition-colors h-full flex items-center px-1" href="index.php">Inicio</a></li>
<li class="h-full flex items-center"><a class="font-label-bold text-label-bold text-on-surface-variant hover:text-primary transition-colors h-full flex items-center px-1" href="modelo.php">Solar Break</a></li>
<li class="h-full flex items-center"><a class="font-label-bold text-label-bold text-on-surface-variant hover:text-primary transition-colors h-full flex items-center px-1" href="blog.php">Blog</a></li>
<li class="h-full flex items-center"><a class="font-label-bold text-label-bold text-primary border-b-2 border-primary hover:text-primary transition-colors h-full flex items-center px-1 pt-[2px]" href="contacto.php">Contacto</a></li>
</ul>
<div class="hidden md:flex items-center">
<a class="font-label-bold text-label-bold text-primary px-4 py-2 border-2 border-primary rounded-lg hover:bg-surface-container transition-colors scale-95 active:scale-90" href="login.php">Login</a>
</div>
<button class="md:hidden flex items-center text-on-surface p-2">
<span class="material-symbols-outlined">menu</span>
</button>
</nav>
</header>
<main class="w-full flex-grow">
<section class="w-full bg-surface-container-low pt-16 pb-12 px-margin-mobile md:px-margin-desktop text-center border-b border-outline-variant">
<div class="max-w-container-max mx-auto">
<h1 class="font-display-lg-mobile text-display-lg-mobile md:font-display-lg md:text-display-lg text-primary mb-4">¿Quieres ser aliado Solar Break?</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Únete a la red de infraestructura de recarga más confiable. Convierte tu espacio en un punto de energía limpia y atrae a más clientes.</p>
</div>
</section>
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-16 md:py-24">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<div class="lg:col-span-7 bg-surface-base border border-outline-variant rounded-xl p-6 md:p-10 shadow-[0_4px_12px_rgba(26,71,49,0.03)]">
<h2 class="font-headline-md text-headline-md text-on-background mb-8">Solicitud de Alianza</h2>
<?php if (!empty($mensaje_exito)): ?>
<div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3">
    <?php echo htmlspecialchars($mensaje_exito); ?>
</div>
<?php endif; ?>
<?php if (!empty($mensaje_error)): ?>
<div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3">
    <?php echo htmlspecialchars($mensaje_error); ?>
</div>
<?php endif; ?>
<form method="POST" action="procesar_contacto.php" class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="md:col-span-2">
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="businessName">Nombre del Negocio *</label>
<input class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 text-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none" id="businessName" name="businessName" placeholder="Ej. Restaurante El Mirador" required type="text"/>
</div>
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="businessType">Tipo de Negocio *</label>
<div class="relative">
<select class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 pr-10 text-body-md text-on-surface appearance-none focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none" id="businessType" name="businessType" required>
<option disabled selected value="">Selecciona una opción</option>
<option value="Hotel">Hotel / Alojamiento</option>
<option value="Restaurante">Restaurante / Parador</option>
<option value="Centro Comercial">Centro Comercial</option>
<option value="Parqueadero">Parqueadero</option>
<option value="Otro">Otro</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
</div>
</div>
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="location">Ubicación / Ciudad *</label>
<input class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 text-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none" id="location" name="location" placeholder="Ciudad, corredor vial o municipio" required type="text"/>
</div>
<div class="md:col-span-2">
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="contactName">Nombre del Responsable *</label>
<input class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 text-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none" id="contactName" name="contactName" placeholder="Nombre completo" required type="text"/>
</div>
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="email">Correo Electrónico *</label>
<input class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 text-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none" id="email" name="email" placeholder="correo@empresa.com" required type="email"/>
</div>
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="phone">Teléfono de Contacto</label>
<input class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 text-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none" id="phone" name="phone" placeholder="+57 300 123 4567" type="tel"/>
</div>
<div class="md:col-span-2">
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="message">Cuéntanos más sobre tu espacio (Opcional)</label>
<textarea class="w-full bg-surface-base border border-outline-variant rounded-lg p-3 text-body-md text-on-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none resize-none" id="message" name="message" placeholder="Detalles del parqueadero, capacidad eléctrica disponible, flujo de clientes, etc." rows="4"></textarea>
</div>
<div class="md:col-span-2 mt-4">
<button class="w-full bg-primary text-on-primary font-label-bold text-label-bold py-4 rounded-lg shadow-[0_4px_12px_rgba(26,71,49,0.08)] hover:bg-primary-container active:scale-[0.98] transition-all flex items-center justify-center gap-2" type="submit">
Enviar Solicitud
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</div>
</form>
</div>
<div class="lg:col-span-5 flex flex-col gap-8">
<div class="bg-surface border border-outline-variant rounded-xl p-8 shadow-[0_4px_12px_rgba(26,71,49,0.03)] h-full">
<div class="w-12 h-12 bg-surface-container flex items-center justify-center rounded-lg mb-6">
<span class="material-symbols-outlined text-primary text-[28px]">bolt</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-background mb-6">¿Por qué unirse a nuestra red?</h3>
<ul class="space-y-6">
<li class="flex gap-4 items-start">
<div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center flex-shrink-0 mt-1">
<span class="material-symbols-outlined text-primary text-[18px]">ev_station</span>
</div>
<div>
<h4 class="font-label-bold text-label-bold text-on-background mb-1">Atrae nuevos clientes</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Los conductores de vehículos eléctricos buscan activamente lugares donde recargar mientras consumen o descansan.</p>
</div>
</li>
<li class="flex gap-4 items-start">
<div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center flex-shrink-0 mt-1">
<span class="material-symbols-outlined text-primary text-[18px]">eco</span>
</div>
<div>
<h4 class="font-label-bold text-label-bold text-on-background mb-1">Proyecta una imagen sostenible</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Posiciona tu marca como un aliado del medio ambiente apoyando la transición energética y reducción de emisiones.</p>
</div>
</li>
<li class="flex gap-4 items-start">
<div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center flex-shrink-0 mt-1">
<span class="material-symbols-outlined text-primary text-[18px]">monitoring</span>
</div>
<div>
<h4 class="font-label-bold text-label-bold text-on-background mb-1">Infraestructura premium</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Nos encargamos del diseño, instalación y mantenimiento con hardware de grado industrial y alta fiabilidad.</p>
</div>
</li>
</ul>
<div class="mt-10 pt-6 border-t border-outline-variant">
<h4 class="font-label-bold text-label-bold text-on-background mb-4">Contacto Directo</h4>
<div class="flex flex-col gap-3">
<a class="flex items-center gap-3 text-on-surface hover:text-primary transition-colors" href="mailto:alianzas@solarbreak.co">
<span class="material-symbols-outlined text-outline">mail</span>
<span class="font-body-md text-body-md">alianzas@solarbreak.co</span>
</a>
<a class="flex items-center gap-3 text-on-surface hover:text-primary transition-colors" href="tel:+573001234567">
<span class="material-symbols-outlined text-outline">call</span>
<span class="font-body-md text-body-md">+57 300 123 4567</span>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pb-24">
<div class="bg-surface border border-outline-variant rounded-xl p-8 md:p-12">
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
<div class="flex flex-col items-center text-center gap-4">
<div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-[32px]" data-weight="fill">shield_lock</span>
</div>
<h4 class="font-label-bold text-label-bold text-on-background">Datos Protegidos</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Tu información comercial se maneja con estricta confidencialidad.</p>
</div>
<div class="flex flex-col items-center text-center gap-4">
<div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-[32px]" data-weight="fill">schedule</span>
</div>
<h4 class="font-label-bold text-label-bold text-on-background">Respuesta en 48h</h4>
<p class="font-body-md text-body-md text-on-surface-variant">Nuestro equipo evaluará tu solicitud y te contactará rápidamente.</p>
</div>
<div class="flex flex-col items-center text-center gap-4">
<div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-primary text-[32px]" data-weight="fill">handshake</span>
</div>
<h4 class="font-label-bold text-label-bold text-on-background">Sin Compromisos</h4>
<p class="font-body-md text-body-md text-on-surface-variant">La solicitud inicial no genera ninguna obligación contractual.</p>
</div>
</div>
</div>
</section>
</main>
<footer class="w-full pt-16 pb-8 bg-surface-container-highest">
<div class="flex flex-col items-center text-center px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<div class="mb-8">
<span class="font-display-lg text-headline-md font-bold text-primary">Solar Break</span>
</div>
<ul class="flex flex-wrap justify-center gap-6 md:gap-8 mb-12">
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary opacity-80 hover:opacity-100 transition-all" href="index.php">Inicio</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary opacity-80 hover:opacity-100 transition-all" href="modelo.php">Solar Break</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary opacity-80 hover:opacity-100 transition-all" href="blog.php">Blog</a></li>
<li><a class="font-body-md text-body-md text-primary font-semibold opacity-80 hover:opacity-100 transition-all" href="contacto.php">Contacto</a></li>
<li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary opacity-80 hover:opacity-100 transition-all" href="mailto:info@solarbreak.co">info@solarbreak.co</a></li>
</ul>
<div class="w-full pt-8 border-t border-outline-variant">
<p class="font-body-md text-body-md text-on-surface-variant opacity-80">2026 Solar Break. Todos los derechos reservados.</p>
</div>
</div>
</footer>
</body>
</html>
