<?php
// ============================================================
//  Solar Break - Conexión a la base de datos
//  Archivo : config/conexion.php
//  Uso     : include '../config/conexion.php';  (desde subcarpeta)
//            include 'config/conexion.php';     (desde raíz)
// ============================================================

$host     = "localhost";
$usuario  = "root";
$password = "";            // XAMPP: root no tiene contraseña por defecto
$base     = "solarbreak_db";

$conn = mysqli_connect($host, $usuario, $password, $base);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Forzar UTF-8 para caracteres especiales (tildes, ñ, etc.)
mysqli_set_charset($conn, "utf8mb4");
?>
