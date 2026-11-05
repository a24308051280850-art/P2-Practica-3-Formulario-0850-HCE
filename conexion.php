<?php
$host = "localhost";
$user = "root";
$pass = ""; // En XAMPP la contraseña por defecto es vacía
$db   = "grand_slam";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos MySQL: " . $conexion->connect_error);
}
?>