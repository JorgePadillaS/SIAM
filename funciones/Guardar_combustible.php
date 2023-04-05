<?php
  require_once('../config/conexion.php');

  if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
  }

  // Obtener los datos del formulario
  $tipo_combustible = $_POST['tipo_combustible'];
  $precio_litro = $_POST['precio_litro'];

  // Insertar los datos en la tabla "combustibles"
  $sql = "INSERT INTO tipos_combustible (nombre, precio) VALUES ('$tipo_combustible', '$precio_litro')";

  if (mysqli_query($conexion, $sql)) {
    header('Location: ../index.php');
  } else {
    echo "Error al registrar combustible: " . mysqli_error($conexion);
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
?>