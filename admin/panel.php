<?php
session_start();
require_once __DIR__ . '/../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['solicitud_id'], $_POST['nuevo_estado'])) {
    $solicitud_id = (int) $_POST['solicitud_id'];
    $nuevo_estado = trim($_POST['nuevo_estado']);
    $estados_validos = ['Pendiente', 'Revisado', 'Contactado'];

    if ($solicitud_id > 0 && in_array($nuevo_estado, $estados_validos, true)) {
        $sqlUpdate = "UPDATE solicitudes_informacion SET estado = ? WHERE id = ?";
        $stmtUpdate = mysqli_prepare($conn, $sqlUpdate);

        if ($stmtUpdate) {
            mysqli_stmt_bind_param($stmtUpdate, 'si', $nuevo_estado, $solicitud_id);
            mysqli_stmt_execute($stmtUpdate);
            mysqli_stmt_close($stmtUpdate);
        }
    }

    header('Location: panel.php');
    exit;
}

$sql = "SELECT id, nombre_establecimiento, tipo_negocio, ubicacion, nombre_contacto, correo_contacto, telefono, mensaje, estado, fecha_registro FROM solicitudes_informacion ORDER BY fecha_registro DESC";
$resultado = mysqli_query($conn, $sql);
$solicitudes = [];

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $solicitudes[] = $fila;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Solar Break</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00301c',
                        'primary-container': '#1a4731',
                        background: '#f7f8f6',
                        surface: '#ffffff',
                        outline: '#d7ddd7',
                        'text-main': '#1c1b1b',
                        'text-muted': '#5f6b63',
                        pending: '#fff4cc',
                        reviewed: '#d9ecff',
                        contacted: '#dff5e1'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Montserrat', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-text-main font-sans min-h-screen">
    <header class="bg-surface border-b border-outline sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="font-display text-2xl text-primary">Panel Administrativo</h1>
                <p class="text-sm text-text-muted">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="../index.php" class="px-4 py-2 rounded-xl border border-outline text-primary hover:bg-gray-50 transition-colors">Ver sitio</a>
                <a href="../logout.php" class="px-4 py-2 rounded-xl bg-primary text-white hover:bg-primary-container transition-colors">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 md:px-8 py-8">
        <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-surface border border-outline rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-text-muted mb-1">Total solicitudes</p>
                <p class="text-3xl font-bold text-primary"><?php echo count($solicitudes); ?></p>
            </div>
            <div class="bg-surface border border-outline rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-text-muted mb-1">Pendientes</p>
                <p class="text-3xl font-bold text-primary"><?php echo count(array_filter($solicitudes, fn($s) => $s['estado'] === 'Pendiente')); ?></p>
            </div>
            <div class="bg-surface border border-outline rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-text-muted mb-1">Contactadas</p>
                <p class="text-3xl font-bold text-primary"><?php echo count(array_filter($solicitudes, fn($s) => $s['estado'] === 'Contactado')); ?></p>
            </div>
        </div>

        <div class="bg-surface border border-outline rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-outline">
                <h2 class="font-display text-xl text-primary">Solicitudes recibidas</h2>
                <p class="text-sm text-text-muted mt-1">Gestiona las alianzas enviadas desde el formulario de contacto.</p>
            </div>

            <?php if (empty($solicitudes)): ?>
                <div class="p-8 text-center text-text-muted">
                    Aún no hay solicitudes registradas.
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-left">
                            <tr>
                                <th class="px-4 py-3 font-semibold text-text-main">Negocio</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Responsable</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Contacto</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Ubicación</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Mensaje</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Estado</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Fecha</th>
                                <th class="px-4 py-3 font-semibold text-text-main">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($solicitudes as $solicitud): ?>
                                <?php
                                    $estado = $solicitud['estado'];
                                    $estadoClase = 'bg-gray-100 text-gray-700';
                                    if ($estado === 'Pendiente') $estadoClase = 'bg-pending text-yellow-800';
                                    if ($estado === 'Revisado') $estadoClase = 'bg-reviewed text-blue-800';
                                    if ($estado === 'Contactado') $estadoClase = 'bg-contacted text-green-800';
                                ?>
                                <tr class="border-t border-outline align-top">
                                    <td class="px-4 py-4">
                                        <div class="font-semibold text-primary"><?php echo htmlspecialchars($solicitud['nombre_establecimiento']); ?></div>
                                        <div class="text-text-muted text-xs mt-1"><?php echo htmlspecialchars($solicitud['tipo_negocio']); ?></div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <?php echo htmlspecialchars($solicitud['nombre_contacto']); ?>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div><?php echo htmlspecialchars($solicitud['correo_contacto']); ?></div>
                                        <div class="text-text-muted text-xs mt-1"><?php echo htmlspecialchars($solicitud['telefono']); ?></div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <?php echo htmlspecialchars($solicitud['ubicacion']); ?>
                                    </td>
                                    <td class="px-4 py-4 max-w-xs">
                                        <div class="line-clamp-4 text-text-muted">
                                            <?php echo nl2br(htmlspecialchars($solicitud['mensaje'])); ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold <?php echo $estadoClase; ?>">
                                            <?php echo htmlspecialchars($estado); ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-text-muted">
                                        <?php echo htmlspecialchars($solicitud['fecha_registro']); ?>
                                    </td>
                                    <td class="px-4 py-4">
                                        <form method="POST" action="panel.php" class="space-y-2 min-w-[160px]">
                                            <input type="hidden" name="solicitud_id" value="<?php echo (int) $solicitud['id']; ?>">
                                            <select name="nuevo_estado" class="w-full rounded-lg border border-outline px-3 py-2 bg-white">
                                                <option value="Pendiente" <?php echo $estado === 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                                <option value="Revisado" <?php echo $estado === 'Revisado' ? 'selected' : ''; ?>>Revisado</option>
                                                <option value="Contactado" <?php echo $estado === 'Contactado' ? 'selected' : ''; ?>>Contactado</option>
                                            </select>
                                            <button type="submit" class="w-full bg-primary text-white rounded-lg py-2 font-semibold hover:bg-primary-container transition-colors">
                                                Actualizar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>