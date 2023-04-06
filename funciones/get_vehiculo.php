<?php

require_once('../config/conexion.php');

if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}

$id_empleado = $_POST["choferselect"];
$query = "SELECT vehiculos.placa
FROM empleados
INNER JOIN vehiculos ON empleados.id_vehiculo = vehiculos.id_vehiculo
WHERE empleados.id_empleado = '$id_empleado'";

$resultado = mysqli_query($conexion, $query);

if ($resultado) {
  $fila = mysqli_fetch_assoc($resultado);
  $placa = $fila['placa'];
  echo$placa;
} else {
  echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>