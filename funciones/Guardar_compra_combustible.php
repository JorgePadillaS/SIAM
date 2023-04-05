<?php
// Archivo de configuración de la base de datos
require_once('../config/conexion.php');

// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Recibimos los datos del formulario
  $codigo_contrato = $_POST['codigo_contrato'];
  $programa = $_POST['programa'];
  $presupuesto_inicial = $_POST['presupuesto_inicial'];
  $presupuesto_disponible = $_POST['presupuesto_disponible']; 
  $tipo_combustible = $_POST['tipo_combustible'];

  $cantidad_combustible = $_POST['cantidad_combustible'];
  $fecha = $_POST['fecha'];
  $monto_compra = $_POST['monto_compra'];

  // Separamos el valor del programa por el caracter "|"
  $valores_programa = explode("|", $programa);
  $id_programa = $valores_programa[0];
  $presupuesto_inicial = $valores_programa[1];

  // Separamos el valor del tipo de combustible por el caracter "|"
  $valores_combustible = explode("|", $tipo_combustible);
  $id_tipo_combustible = $valores_combustible[0];
  $precio_combustible = $valores_combustible[1];

  // Calculamos el monto de la compra
  $monto_compra = $cantidad_combustible * $precio_combustible;

  // Preparamos la consulta de inserción
  $query = "INSERT INTO compras_combustible (codigo_contrato, id_programa, presupuesto_inicial, presupuesto_disponible, id_tipo_combustible, cantidad_combustible, precio_combustible, monto_compra, fecha_compra) VALUES 
                                        ('$codigo_contrato', $id_programa, '$presupuesto_inicial', $presupuesto_disponible, $id_tipo_combustible, $cantidad_combustible, $precio_combustible, $monto_compra, '$fecha')";
//echo ("CODIGO DE CONTRATO ".$codigo_contrato."<br> ID PROGRAMA ". $id_programa."<br> PRESUPUESTO INICIAL". $presupuesto_inicial."<br> PRESUPUESTO DISPONIBLE". $presupuesto_disponible."<br> ID TIPO DE COMBUSTIBLE ". $id_tipo_combustible."<br> CANTIDAD DE COMBUSTIBLE ". $cantidad_combustible."<br> PRECIO DEL COMBUSTIBLE ". $precio_combustible."<br> MONTO DE LA COMPRA ". $monto_compra."<br> FECHA DE LA COMPRA ". $fecha);

  // Ejecutamos la consulta
  if (mysqli_query($conexion, $query)) {
    echo "Los datos se han registrado correctamente";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conexion);
  }

  // Cerramos la conexión a la base de datos
  mysqli_close($conexion);
}
?>
