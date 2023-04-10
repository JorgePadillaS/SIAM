
<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
<section class="section">
  <div class="container">
    <h1 class="title">Dispensación de Combustible</h1>
      <form action="funciones/Dispensar_combustible.php" method="post">
        

        <div class="field">
          <label class="label">Numero de Contrato:</label>
          <div class="control">
            <div class="select">
              <select name="num_contrato" id="num_contrato" required onchange="obtener_contratos()">
                <option value="">Seleccione un número de contrato</option>

                <?php
                require_once('config/conexion.php'); if (!$conexion) {die('Error de conexión: ' . mysqli_connect_error());}

                $query ="SELECT * FROM compras_combustible";
                $resultado = mysqli_query($conexion, $query);

                while ($compra = mysqli_fetch_assoc($resultado)) {
                  echo "<option value='" . $compra['codigo_contrato']."'>" .$compra['codigo_contrato']  . "</option>";
                }
                ?>
              </select>
            </div>
          </div>
        </div>


        <div class="field">
          <label class="label">Programa:</label>
          <div class="control">
            <input class="input" type="text" name="programa" id="programa" readonly>
          </div>
        </div>

        <div class="field">
          <label class="label">Tipo de Combustible:</label>
          <div class="control">
            <input class="input" type="text" name="tipo_combustible" id="tipo_combustible" readonly>
          </div>
        </div>
        <div class="field">
          <label class="label">Cantidad de Combustible Comprado Inicialmente (en litros):</label>
          <div class="control">
            <input class="input" type="number" name="cantidad_combustible_comprado" id="cantidad_combustible_comprado" readonly>
          </div>
        </div>

        <div class="field">
          <label class="label">Cantidad de Combustible disponible (en litros):</label>
          <div class="control">
            <input class="input" type="number" name="total_combustible_dispensado" id="total_combustible_dispensado" readonly>
          </div>
        </div>

        <div class="field">
          <label class="label">Cantidad de Combustible a Dispensar (en litros):</label>
          <div class="control">
            <input class="input" type="number" name="cantidad_combustible_a_dispensar" id="cantidad_combustible_a_dispensar" required onchange="calcularlitros()">
          </div>
        </div>

        <div class="field">
          <label class="label">DISPENSAR EN BIDON:</label>
          <input type="checkbox" name="bidon" id="">
        </div>


        <div class="field">
          <label class="label">FUNCIONARIO:</label>
          <div class="control">
            <div class="select">
            <option value="">Seleccione un funcionario</option>
            <option value="1"></option>
          </div>
          </div>
        </div>


        <div class="field">
          <label class="label">PARA ALMACEN DE MAESTRANZA:</label>
          <input type="checkbox" name="bidon" id="">
          <label class="label">CODIGO DE AUTORIZACION:</label>
          <input type="text" name="CODIGO DE AUTORIZACION" id="">
        </div>

        <div class="field">
          <label class="label">PARA ALMACEN DE CEAM:</label>
          <input type="checkbox" name="bidon" id="">
          <label class="label">CODIGO DE AUTORIZACION:</label>
          <input type="text" name="CODIGO DE AUTORIZACION" id="">
        </div>

        <div class="field">
          <label class="label">Chofer:</label>
          <div class="control">
            
            <div class="select">
              <select name="chofer" id="choferselect" required onchange="obtener_placa() ">
                  <option value="">Seleccione un chofer</option>
                  <?php
                  require_once('config/conexion.php'); if (!$conexion) {die('Error de conexión: ' . mysqli_connect_error());}

                  $query ="SELECT * FROM empleados";
                  $resultado = mysqli_query($conexion, $query);

                  while ($chofer = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $chofer['id_empleado']."'>" .$chofer['cedula_identidad']." ".$chofer['nombre']." ".$chofer['apellido_paterno']." ".$chofer['apellido_materno']  . "</option>";
                  }
                  ?>
                </select>
          </div>
          </div>
        </div>

        

        <div class="field">
          <label class="label">Vehículo:</label>
          <div class="control">
            <input class="input" type="text" name="vehiculo" id="vehiculo" required>
          </div>
        </div>

        <div class="field">
          <div class="control">
            <button class="button is-primary" type="submit" id="guardar" Disabled>Registrar Dispensación</button>
          </div>
        </div>
      </form>
  </div>
</section>
<script>

function obtener_contratos() {
  var numContrato = $("#num_contrato").val();
  if (numContrato != '') {
    $.ajax({
      type: "POST",
      url: "funciones/get_contratos.php",
      data: {num_contrato: numContrato},
      success: function(data) {
        var valores = data.split(",");
      $("#cantidad_combustible_comprado").val(valores[0]);
      $("#programa").val(valores[1]);
      $("#tipo_combustible").val(valores[2]);
      obtener_total_dispensado();
      }
    });
  }
}
function obtener_total_dispensado() {
  var numContrato = $("#num_contrato").val();
  if (numContrato != '') {
    $.ajax({
      type: "POST",
      url: "funciones/obtener_combustible_dispensado.php",
      data: {num_contrato: numContrato},
      success: function(data) {
        var combustible_inicial = $("#cantidad_combustible_comprado").val();
        var total_dispensado_anteriormente = data;
        var total_disponible= combustible_inicial - total_dispensado_anteriormente;
        $("#total_combustible_dispensado").val(total_disponible);
      }
    });
  }
}

function obtener_placa() {
  var idChofer = $("#choferselect").val();
  if (idChofer != '') {
    $.ajax({
      type: "POST",
      url: "funciones/get_vehiculo.php",
      data: {choferselect: idChofer},
      success: function(data) {
        $("#vehiculo").val(data);
      }
    });
  }
}


function calcularlitros() {
      // Obtener el precio del combustible seleccionado
      var t_disponible = parseInt($("#total_combustible_dispensado").val());
      var t_a_dispensar = parseInt($("#cantidad_combustible_a_dispensar").val());
      if (t_a_dispensar>t_disponible) {
        alert('El monto en litros no puede ser mayor al disponible.');
        document.getElementById('guardar').disabled = true;
        $('#cantidad_combustible_a_dispensar').val(t_a_dispensar);
          return false;
      }
      else{
        document.getElementById('guardar').disabled = false;
      }
      $('#cantidad_combustible_a_dispensar').val(t_a_dispensar);
        }

    
    



</script>

<?php
    include_once("config/sections/footer.php");
    ?>