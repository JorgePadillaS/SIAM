<?php
require_once('../config/conexion.php');

if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}

$num_contrato = $_POST["num_contrato"];

$query = "SELECT SUM(cantidad_combustible_dispensado) as total_dispensado FROM registro_dispensaciones WHERE numcontrato = '$num_contrato'";

$resultado = mysqli_query($conexion, $query);

if ($resultado) {
  $fila = mysqli_fetch_assoc($resultado);
  $total_dispensado = $fila['total_dispensado'];

  echo $total_dispensado;
} else {
  echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>