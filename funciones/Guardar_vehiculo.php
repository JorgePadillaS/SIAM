<?php
// Verificar si el usuario ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    require_once('../config/conexion.php');

    if (!$conexion) {
      die('Error de conexión: ' . mysqli_connect_error());
    }

  // Obtener los valores del formulario
  $tipo = $_POST["tipo_vehiculo"];
  $placa = $_POST["placa"];
  $descripcion = $_POST["descripcion"];
  $programa_asignado = $_POST["programa"];
  
  // Preparar la consulta SQL
  $sql = "INSERT INTO vehiculos (tipo, placa, descripcion, programa_asignado) VALUES ('$tipo', '$placa', '$descripcion', '$programa_asignado')";

  if (mysqli_query($conexion, $sql)) {
    header('Location: ../index.php');
  } else {
    echo "Error al registrar el vehiculo: " . mysqli_error($conexion);
  }
  // Cerrar la conexión
  $conexion->close();
}
?>