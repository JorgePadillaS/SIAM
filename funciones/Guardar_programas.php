<?php
require_once('../config/conexion.php');

if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}

$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
$presupuesto = mysqli_real_escape_string($conexion, $_POST['presupuesto']);

$sql = "INSERT INTO programas (nombre, categoria_programatica, presupuesto) VALUES ('$nombre', '$categoria', $presupuesto)";

if (mysqli_query($conexion, $sql)) {
  header('Location: ../index.php');
  exit;
} else {
  echo 'Error al guardar el programa: ' . mysqli_error($conexion);
}

mysqli_close($conexion);
?>