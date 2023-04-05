<?php
// Archivo de configuración para conectar a la base de datos MySQL
$host = "localhost";
$user = "root";
$password = "";
$db = "siam";

$conexion= new mysqli($host, $user, $password, $db);

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}