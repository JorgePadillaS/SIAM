<?php

require_once('../config/conexion.php');

if (!$conexion) {
  die('Error de conexión: ' . mysqli_connect_error());
}

$num_contrato = $_POST["num_contrato"];

$query = "SELECT 
    compras_combustible.cantidad_combustible,
    programas.categoria_programatica AS categoria,
    programas.nombre AS nombre_del_programa,
    tipos_combustible.nombre AS tipo_combustible 
FROM 
    compras_combustible 
    INNER JOIN programas ON compras_combustible.id_programa = programas.id_programa 
    INNER JOIN tipos_combustible ON compras_combustible.id_tipo_combustible = tipos_combustible.id_tipo_combustible 
WHERE 
    compras_combustible.codigo_contrato = '$num_contrato'";

$resultado = mysqli_query($conexion, $query);

if ($resultado) {
  $fila = mysqli_fetch_assoc($resultado);

  $cantidad_combustible = $fila['cantidad_combustible'];
  $categoria_programatica = $fila['categoria'];
  $nombre_programa = $fila['nombre_del_programa'];
  $nombre_tipo_combustible = $fila['tipo_combustible'];

  echo$cantidad_combustible.",".$categoria_programatica." ".$nombre_programa.",".$nombre_tipo_combustible;
} else {
  echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>