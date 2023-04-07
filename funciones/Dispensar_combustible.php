<?php
require_once('../config/conexion.php'); // conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // obtenemos los datos del formulario
  $num_contrato = $_POST['num_contrato'];
  $programa = $_POST['programa'];
  $tipo_combustible = $_POST['tipo_combustible'];
  $cantidad_combustible_comprado = $_POST['cantidad_combustible_comprado'];
  $cantidad_combustible_disponible = $_POST['total_combustible_dispensado'];
  $cantidad_combustible_a_dispensar = $_POST['cantidad_combustible_a_dispensar'];
  $chofer = $_POST['chofer'];
  $vehiculo = $_POST['vehiculo'];

  // consulta SQL para insertar los datos en la tabla correspondiente
  $query = "INSERT INTO registro_dispensaciones (numcontrato, programa, tipo_combustible, cantidad_combustible_disponible, cantidad_combustible_dispensado, chofer, vehiculo) VALUES ('$num_contrato', '$programa', '$tipo_combustible', '$cantidad_combustible_disponible', '$cantidad_combustible_a_dispensar', '$chofer', '$vehiculo')";

  // ejecutamos la consulta y verificamos si se ha insertado correctamente
  if (mysqli_query($conexion, $query)) {
    header('Location: ../index.php');
  } else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
  }

  // cerramos la conexión a la base de datos
  mysqli_close($conexion);
}
?>
