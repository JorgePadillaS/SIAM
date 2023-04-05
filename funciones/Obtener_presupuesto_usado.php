<?php

require_once('../config/conexion.php');
if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}
// Obtener el valor del programa seleccionado
$programa = $_POST['programa'];

// Consulta SQL para obtener la suma de todas las compras asociadas al programa seleccionado
$sql = "SELECT SUM(monto_compra) FROM compras_combustible WHERE id_programa = '$programa'";

// Ejecutar la consulta y obtener el resultado
$resultado = mysqli_query($conexion, $sql);

// Obtener la suma de todas las compras
$suma = mysqli_fetch_row($resultado)[0];

// Devolver la suma como respuesta a la solicitud AJAX
echo $suma;

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>