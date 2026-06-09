<?php
require_once __DIR__ . '/config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.php?error=' . urlencode('Método no permitido.'));
    exit;
}

$businessName = trim($_POST['businessName'] ?? '');
$businessType = trim($_POST['businessType'] ?? '');
$location     = trim($_POST['location'] ?? '');
$contactName  = trim($_POST['contactName'] ?? '');
$email        = trim($_POST['email'] ?? '');
$phone        = trim($_POST['phone'] ?? '');
$message      = trim($_POST['message'] ?? '');

if (
    $businessName === '' ||
    $businessType === '' ||
    $location === '' ||
    $contactName === '' ||
    $email === ''
) {
    header('Location: contacto.php?error=' . urlencode('Por favor completa todos los campos obligatorios.'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contacto.php?error=' . urlencode('El correo electrónico no es válido.'));
    exit;
}

$sql = "INSERT INTO solicitudes_informacion
        (nombre_establecimiento, tipo_negocio, ubicacion, nombre_contacto, correo_contacto, telefono, mensaje, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header('Location: contacto.php?error=' . urlencode('Error al preparar la consulta.'));
    exit;
}

$estado = 'Pendiente';

mysqli_stmt_bind_param(
    $stmt,
    "ssssssss",
    $businessName,
    $businessType,
    $location,
    $contactName,
    $email,
    $phone,
    $message,
    $estado
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: contacto.php?exito=1');
    exit;
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: contacto.php?error=' . urlencode('No se pudo guardar la solicitud. Revisa la tabla o la conexión.'));
    exit;
}
?>