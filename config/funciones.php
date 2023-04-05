<?php
// Archivo con las funciones necesarias para el manejo de empleados

require_once("conexion.php");

function registrarEmpleado($nombre, $apellido, $dni, $direccion, $telefono, $correo, $fecha_nacimiento, $fecha_ingreso, $sueldo)
{
  global $conn;

  $stmt = $conn->prepare("INSERT INTO empleados (nombre, apellido, dni, direccion, telefono, correo, fecha_nacimiento, fecha_ingreso, sueldo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssss", $nombre, $apellido, $dni, $direccion, $telefono, $correo, $fecha_nacimiento, $fecha_ingreso, $sueldo);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}

function listarEmpleados()
{
  global $conn;

  $result = $conn->query("SELECT * FROM empleados ORDER BY id DESC");

  if ($result->num_rows > 0) {
    $empleados = array();
    while ($row = $result->fetch_assoc()) {
      $empleados[] = $row;
    }
    return $empleados;
  } else {
    return false;
  }
}

function obtenerEmpleado($id)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM empleados WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $empleado = $result->fetch_assoc();
    return $empleado;
  } else {
    return false;
  }
}

function modificarEmpleado($id, $nombre, $apellido, $dni, $direccion, $telefono, $correo, $fecha_nacimiento, $fecha_ingreso, $sueldo)
{
  global $conn;

  $stmt = $conn->prepare("UPDATE empleados SET nombre = ?, apellido = ?, dni = ?, direccion = ?, telefono = ?, correo = ?, fecha_nacimiento = ?, fecha_ingreso = ?, sueldo = ? WHERE id = ?");
  $stmt->bind_param("sssssssssi", $nombre, $apellido, $dni, $direccion, $telefono, $correo, $fecha_nacimiento, $fecha_ingreso, $sueldo, $id);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}