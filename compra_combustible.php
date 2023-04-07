
<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
    <section class="section">
        <div class="container">
            <h1 class="title">Registro de compra de combustible</h1>
            <form action="funciones/Guardar_compra_combustible.php" method="POST">

                <div class="field">
                    <label class="label">Código de contrato:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Ingrese el código de contrato" name="codigo_contrato" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Programa:</label>
                    <div class="control">
                        <div class="select">
                            <select name="programa" id="programa" required onchange="obtener_valores_programa()">
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
                    <label class="label">Presupuesto Inicial:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Acá se Visualiza el Presupuesto inicial del programa seleccionado" name="presupuesto_inicial" id="presupuesto_inicial" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Presupuesto Usado:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Ingrese el presupuesto gastado" name="presupuesto_gastado" id="presupuesto_usado" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Presupuesto Disponible:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Presupuesto Disponible" name="presupuesto_disponible" id="presupuesto_disponible" readonly>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tipo de combustible:</label>
                    <div class="control">
                        <div class="select">
                            <select name="tipo_combustible" id="tipo_combustible" required>
                                <option value="">Seleccione el tipo de combustible</option>
                                <?php
                                require_once('config/conexion.php');

                                if (!$conexion) {
                                    die('Error de conexión: ' . mysqli_connect_error());
                                }

                                $query = "SELECT * FROM tipos_combustible";
                                $resultado = mysqli_query($conexion, $query);

                                while ($combustible = mysqli_fetch_assoc($resultado)) {
                                    echo "<option value='" . $combustible['id_tipo_combustible'] . "|" . $combustible['precio'] . "'>" . $combustible['nombre'] . " | " . $combustible['precio'] . "</option>";
                                }

                                mysqli_close($conexion);
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Cantidad de combustible adquirido (en litros):</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Ingrese la cantidad de combustible" name="cantidad_combustible" id="cantidad_combustible" required onchange="calcularmonto()">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Fecha de compra:</label>
                    <div class="control">
                        <input class="input" type="date" name="fecha" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Monto de la Compra:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="MONTO TOTAL" name="monto_compra" id="monto_compra" readonly>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link" id="guardar" disabled>Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>




    <script>

    function calcularmonto() {
      // Obtener el precio del combustible seleccionado
      var precioCombustible = $('#tipo_combustible').val().split('|')[1];
      var cantidadCombustible = $('#cantidad_combustible').val();
      var montoCompra = precioCombustible * cantidadCombustible;
      var presup=$("#presupuesto_disponible").val();

      if (montoCompra>presup) {
        alert('El monto de la compra no puede ser mayor al presupuesto disponible.');
        document.getElementById('guardar').disabled = true;
        $('#monto_compra').val(montoCompra.toFixed(2));
          return false;
          
      }
      else{
        document.getElementById('guardar').disabled = false;
      }
     $('#monto_compra').val(montoCompra.toFixed(2));
        }


function obtener_valores_programa() {
  var selectPrograma = $("#programa");
  var presupuestoInicial = $("#presupuesto_inicial");
  var presupuestoDisponible = $("#presupuesto_disponible");
  var presupuestoUsado ;
  var pinicial;

    var programa = $("#programa").val();
    var valorSeleccionado = selectPrograma.val();

    var valores = valorSeleccionado.split("|");

    presupuestoInicial.val(valores[1]);

    $.ajax({
      url: 'funciones/Obtener_presupuesto_usado.php',
      method: 'POST',
      data: { programa: programa },
      success: function(response) {
        $('#presupuesto_usado').val(response);
        presupuestoUsado=response;
        pinicial=valores[1];
        var total=valores[1]-presupuestoUsado;
        console.log(total);
        presupuestoDisponible.val(total);
      }  
    });
  }
    </script>

    <?php
    include_once("config/sections/footer.php");
    ?>