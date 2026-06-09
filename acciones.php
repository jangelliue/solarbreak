<?php
session_start();
require_once 'config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin/panel.php');
    exit;
}

$accion = $_POST['accion'] ?? '';
$id_solicitud = isset($_POST['id_solicitud']) ? (int) $_POST['id_solicitud'] : 0;

if ($id_solicitud <= 0) {
    $_SESSION['mensaje_error'] = 'Solicitud no válida.';
    header('Location: admin/panel.php');
    exit;
}

$estados_validos = ['Pendiente', 'Revisado', 'Contactado'];

if ($accion === 'actualizar_estado') {
    $estado = trim($_POST['estado'] ?? '');

    if (!in_array($estado, $estados_validos, true)) {
        $_SESSION['mensaje_error'] = 'Estado no permitido.';
        header('Location: admin/panel.php');
        exit;
    }

    $sql = "UPDATE solicitudes_informacion SET estado = ?, id_usuario_gestor = ? WHERE id_solicitud = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sii', $estado, $_SESSION['usuario_id'], $id_solicitud);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['mensaje_exito'] = 'Estado actualizado correctamente.';
        } else {
            $_SESSION['mensaje_error'] = 'No se pudo actualizar el estado.';
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['mensaje_error'] = 'Error al preparar la consulta.';
    }

    header('Location: admin/panel.php');
    exit;
}

if ($accion === 'eliminar_solicitud') {
    $sql = "DELETE FROM solicitudes_informacion WHERE id_solicitud = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id_solicitud);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['mensaje_exito'] = 'Solicitud eliminada correctamente.';
        } else {
            $_SESSION['mensaje_error'] = 'No se pudo eliminar la solicitud.';
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['mensaje_error'] = 'Error al preparar la eliminación.';
    }

    header('Location: admin/panel.php');
    exit;
}

$_SESSION['mensaje_error'] = 'Acción no reconocida.';
header('Location: admin/panel.php');
exit;
?>
