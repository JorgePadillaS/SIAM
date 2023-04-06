<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
  <section class="section">
    <div class="container">
      <h1 class="title">Registro de Vehiculos</h1>
      <!-- Formulario de registro de vehículos -->
<form action="funciones/Guardar_vehiculo.php" method="post">
  <div class="field">
    <label class="label">Tipo de vehículo</label>
    <div class="control">
      <input class="input" type="text" name="tipo_vehiculo" placeholder="Ingrese el tipo de vehículo" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Placa</label>
    <div class="control">
      <input class="input" type="text" name="placa" placeholder="Ingrese la placa del vehículo" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Descripción</label>
    <div class="control">
      <textarea class="textarea" name="descripcion" placeholder="Ingrese la descripción del vehículo"></textarea>
    </div>
  </div>
  <div class="field">
    <label class="label">Programa al que pertenece</label>
    <div class="control">
      <div class="select">
        <select name="programa" required>
          <option value="">Seleccione un programa</option>
          <?php
           require_once('config/conexion.php');

           if (!$conexion) {
             die('Error de conexión: ' . mysqli_connect_error());
           }

            // Obtener los programas existentes en la tabla "programas"
            $sql = "SELECT id_programa, nombre, categoria_programatica FROM programas";
            $result = mysqli_query($conexion, $sql);

            // Generar las opciones del select con los programas
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_programa'] . "'>" . $row['categoria_programatica']." ".$row['nombre'] . "</option>";
              }
            }
            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-primary">Registrar vehículo</button>
    </div>
  </div>
</form>
    </div>
  </section>

  <?php
    include_once("config/sections/footer.php");
    ?>