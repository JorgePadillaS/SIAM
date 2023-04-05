<?php
   require_once('../config/conexion.php');

   if (!$conexion) {
     die('Error de conexión: ' . mysqli_connect_error());
   }

    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $cedula_identidad = $_POST["cedula_identidad"];
    $tipo_contrato = $_POST["tipo_contrato"];
    $escala_salarial = $_POST["escala_salarial"];
    $fecha_inicio_contrato = $_POST["fecha_inicio_contrato"];
    $vigencia_contrato = $_POST["fecha_fin_contrato"];
    $programa_id = $_POST["programa"];
    $vehiculo_id = $_POST["vehiculo"];

    // Crear la consulta SQL para insertar los datos en la tabla de empleados
    $sql = "INSERT INTO empleados (nombre, apellido_paterno, apellido_materno, cedula_identidad, tipo_contrato, escala_salarial, fecha_inicio_contrato, vigencia_contrato, id_programa, id_vehiculo) 
    VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$cedula_identidad', '$tipo_contrato', '$escala_salarial', '$fecha_inicio_contrato', '$vigencia_contrato', '$programa_id', '$vehiculo_id')";

    // Ejecutar la consulta SQL
    if (mysqli_query($conexion, $sql)) {
        header('Location: ../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>