
<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
<section class="section">
  <div class="container">
    <h1 class="title">Dispensación de Combustible</h1>
    <form action="funciones/get_contratos.php" method="post">
      

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
        <label class="label">Cantidad de Combustible Comprado (en litros):</label>
        <div class="control">
          <input class="input" type="number" name="cantidad_combustible_comprado" id="cantidad_combustible_comprado" readonly>
        </div>
      </div>

      <div class="field">
        <label class="label">Cantidad de Combustible disponible (en litros):</label>
        <div class="control">
          <input class="input" type="number" name="cantidad_combustible_disponible" id="cantidad_combustible_disponible" readonly>
        </div>
      </div>

      <div class="field">
        <label class="label">Cantidad de Combustible a Dispensar (en litros):</label>
        <div class="control">
          <input class="input" type="number" name="cantidad_combustible_a_dispensar" id="cantidad_combustible_a_dispensar" required>
        </div>
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
          <button class="button is-primary" type="submit">Registrar Dispensación</button>
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

    
    



</script>

<?php
    include_once("config/sections/footer.php");
    ?>