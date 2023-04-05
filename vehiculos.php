<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Programas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
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
</body>
</html>