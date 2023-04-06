<?php
require_once('../config/conexion.php');

if(isset($_POST['programa_id'])){
  $programa_id = $_POST['programa_id'];

  $query = "SELECT c.id_contrato, c.numero_contrato, c.cantidad_combustible_disponible, c.tipo_combustible FROM contratos c JOIN programas p ON c.id_programa = p.id_programa WHERE c.id_programa = $programa_id";
  $resultado = mysqli_query($conexion, $query);

  $options = "<option value=''>Seleccione un contrato</option>";
  $tipo_combustible = "";
  $cantidad_combustible_disponible = "";

  while($contrato = mysqli_fetch_assoc($resultado)){
    $options .= "<option value='".$contrato['id_contrato']."'>".$contrato['numero_contrato']."</option>";
    $tipo_combustible = $contrato['tipo_combustible'];
    $cantidad_combustible_disponible = $contrato['cantidad_combustible_disponible'];
  }

  $data = array(
    'options' => $options,
    'tipo_combustible' => $tipo_combustible,
    'cantidad_combustible_disponible' => $cantidad_combustible_disponible
  );

  echo json_encode($data);
}
?>