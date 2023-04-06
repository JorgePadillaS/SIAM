<!DOCTYPE html>
<html>
<head>
  <title>Dispensación de Combustible</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="config/js/dispensacion.js"></script>
</head>
<body>
<section class="section">
  <div class="container">
    <h1 class="title">Dispensación de Combustible</h1>
    <form action="funciones/get_contratos.php" method="post">
      <div class="field">
        <label class="label">Programa:</label>
        <div class="control">
          <div class="select">
            <select name="programa" id="programa" required>
              <option value="">Seleccione un programa</option>
              <?php
              require_once('config/conexion.php');

              if (!$conexion) {
                die('Error de conexión: ' . mysqli_connect_error());
              }

              $query = "SELECT * FROM programas";
              $resultado = mysqli_query($conexion, $query);

              while ($programa = mysqli_fetch_assoc($resultado)) {
                echo "<option value='" . $programa['id_programa'] . "|" . $programa['presupuesto'] . "'>" . $programa['categoria_programatica'] . " " . $programa['nombre'] . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label">Numero de Contrato:</label>
        <div class="control">
          <div class="select">
            <select name="num_contrato" id="num_contrato" required disabled>
              <option value="">Seleccione un número de contrato</option>
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label">Tipo de Combustible:</label>
        <div class="control">
          <div class="select">
            <select name="tipo_combustible" id="tipo_combustible" required disabled>
              <option value="">Seleccione un tipo de combustible</option>
            </select>
          </div>
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
          <input class="input" type="text" name="chofer" required>
        </div>
      </div>

      <div class="field">
        <label class="label">Vehículo:</label>
        <div class="control">
          <input class="input" type="text" name="vehiculo" required>
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

</body>
</html>