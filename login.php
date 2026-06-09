<?php
session_start();
require_once __DIR__ . '/config/conexion.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: admin/panel.php');
    exit;
}

$mensaje_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');
    $clave  = trim($_POST['clave'] ?? '');

    if ($correo === '' || $clave === '') {
        $mensaje_error = 'Por favor completa todos los campos.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = 'El correo electrónico no es válido.';
    } else {
        $sql = "SELECT id, nombre, correo, contrasena, rol FROM usuarios WHERE correo = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $correo);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            $usuario = mysqli_fetch_assoc($resultado);
            mysqli_stmt_close($stmt);

            if ($usuario) {
                $login_valido = false;

                if (password_verify($clave, $usuario['contrasena'])) {
                    $login_valido = true;
                } elseif ($clave === $usuario['contrasena']) {
                    $login_valido = true;
                }

                if ($login_valido) {
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_nombre'] = $usuario['nombre'];
                    $_SESSION['usuario_correo'] = $usuario['correo'];
                    $_SESSION['usuario_rol'] = $usuario['rol'];

                    header('Location: admin/panel.php');
                    exit;
                } else {
                    $mensaje_error = 'Credenciales incorrectas.';
                }
            } else {
                $mensaje_error = 'Credenciales incorrectas.';
            }
        } else {
            $mensaje_error = 'No se pudo preparar la consulta de acceso.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Solar Break</title>
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
                        background: '#fcf9f8',
                        surface: '#ffffff',
                        outline: '#c1c9c1',
                        'text-main': '#1c1b1b',
                        'text-muted': '#5f6b63',
                        'success-soft': '#edf7ee',
                        'error-soft': '#fdecea'
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
<body class="bg-background min-h-screen flex items-center justify-center px-4 font-sans text-text-main">
    <div class="w-full max-w-md bg-surface border border-outline rounded-2xl shadow-lg p-8">
        <div class="text-center mb-8">
            <h1 class="font-display text-3xl text-primary mb-2">Solar Break</h1>
            <p class="text-text-muted text-sm">Acceso al panel administrativo</p>
        </div>

        <?php if (!empty($mensaje_error)): ?>
            <div class="mb-6 rounded-lg border border-red-200 bg-error-soft text-red-700 px-4 py-3 text-sm">
                <?php echo htmlspecialchars($mensaje_error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="space-y-5">
            <div>
                <label for="correo" class="block text-sm font-semibold text-text-main mb-2">Correo electrónico</label>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    class="w-full rounded-xl border border-outline px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20"
                    placeholder="admin@solarbreak.com"
                    required
                >
            </div>

            <div>
                <label for="clave" class="block text-sm font-semibold text-text-main mb-2">Contraseña</label>
                <input
                    type="password"
                    id="clave"
                    name="clave"
                    class="w-full rounded-xl border border-outline px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20"
                    placeholder="Ingresa tu contraseña"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-primary text-white py-3 rounded-xl font-semibold hover:bg-primary-container transition-colors"
            >
                Iniciar sesión
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="index.php" class="text-sm text-primary hover:underline">Volver al sitio</a>
        </div>
    </div>
</body>
</html>