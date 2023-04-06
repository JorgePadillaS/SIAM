<?php
require_once('../config/conexion.php');

if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}
// Recuperar los datos del formulario
$programa = $_POST["programa"];
$tipo_combustible = $_POST["tipo_combustible"];
$cantidad_combustible = $_POST["cantidad_combustible"];
$chofer = $_POST["chofer"];
$vehiculo = $_POST["vehiculo"];

// Insertar los datos en la base de datos
$sql = "INSERT INTO dispensaciones (programa, tipo_combustible, cantidad_combustible, chofer, vehiculo) VALUES ('$programa', '$tipo_combustible', $cantidad_combustible, '$chofer', '$vehiculo')";
mysqli_query($conexion, $sql);

// Actualizar el stock de combustible disponible
$sql = "UPDATE stock_combustible SET cantidad_disponible = cantidad_disponible - $cantidad_combustible WHERE tipo_combustible = '$tipo_combustible'";
mysqli_query($conexion, $sql);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir a la página principal
header("Location: index.php");
?>