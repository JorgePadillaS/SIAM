<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
  <section class="section">
    <div class="container">
      <h1 class="title">Registro de Empleados</h1>
      <form method="POST" action="funciones/Guardar_empleado.php">
        <div class="field">
          <label class="label">Nombre:</label>
          <div class="control">
            <input class="input" type="text" name="nombre" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Apellido Paterno:</label>
          <div class="control">
            <input class="input" type="text" name="apellido_paterno" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Apellido Materno:</label>
          <div class="control">
            <input class="input" type="text" name="apellido_materno" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Cédula de Identidad:</label>
          <div class="control">
            <input class="input" type="text" name="cedula_identidad" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Tipo de Contrato:</label>
          <div class="control">
            <input class="input" type="text" name="tipo_contrato" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Escala Salarial:</label>
          <div class="control">
            <input class="input" type="text" name="escala_salarial" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Fecha de Inicio de Contrato:</label>
          <div class="control">
            <input class="input" type="date" name="fecha_inicio_contrato" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Fecha de Finalizacion del Contrato:</label>
          <div class="control">
            <input class="input" type="date" name="fecha_fin_contrato" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Programa:</label>
          <div class="control">
            <select class="select" name="programa" required>
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
              
              ?>
            </select>
          </div>
          </div>
          <div class="field">
          <label class="label">Vehiculo:</label>
          <div class="control">
            <select class="select" name="vehiculo">
            <option value="0">Seleccione un vehiculo para asignar</option>
              <?php
               require_once('config/conexion.php');

               if (!$conexion) {
                 die('Error de conexión: ' . mysqli_connect_error());
               }

              // Obtener los programas existentes en la tabla "programas"
            $sql = "SELECT id_vehiculo, tipo, placa FROM vehiculos";
            $result = mysqli_query($conexion, $sql);

            // Generar las opciones del select con los programas
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_vehiculo'] . "'>" . $row['tipo']." ".$row['placa'] . "</option>";
              }
            }
            else echo "no hay conexion";
            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
              
              ?>
            </select>
          </div>
          </div>
          <div class="field">
            <div class="control">
              <button class="button is-link">Registrar</button>
            </div>
          </div>
          </form>
      </div>
    </section>

    <?php
    include_once("config/sections/footer.php");
    ?>