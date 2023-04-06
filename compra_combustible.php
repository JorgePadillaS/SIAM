<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro de compra de combustible</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="config/js/main.js"></script>
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Registro de compra de combustible</h1>
            <form action="funciones/Guardar_compra_combustible.php" method="POST">

                <div class="field">
                    <label class="label">Código de contrato:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Ingrese el código de contrato" name="codigo_contrato">
                    </div>
                </div>

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
                        <input class="input" type="text" placeholder="Ingrese la cantidad de combustible" name="cantidad_combustible" id="cantidad_combustible" required>
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
                        <button class="button is-link" id="guardar">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>




    <script>
        function calcularMonto() {
            var precioCombustible = document.getElementById("tipo_combustible").value.split("|")[1];
            var cantidadCombustible = document.getElementById("cantidad_combustible").value;
            var montoCompra = precioCombustible * cantidadCombustible;
            document.getElementById("monto_compra").value = montoCompra;
        }


        // Obtener el campo de cantidad de combustible
        const cantidadCombustible = document.querySelector('input[name="cantidad_combustible"]');

        // Obtener el select de tipo de combustible
        const tipoCombustibleSelect = document.querySelector('select[name="tipo_combustible"]');

        // Obtener el campo de monto de la compra
        const montoCompra = document.querySelector('input[placeholder="MONTO TOTAL"]');

        // Escuchar el evento "change" en el campo de cantidad de combustible
        cantidadCombustible.addEventListener('change', () => {
            // Obtener el precio del combustible seleccionado

            var precioCombustible = document.getElementById("tipo_combustible").value.split("|")[1];
            var cantidadCombustible = document.getElementById("cantidad_combustible").value;
            var montoCompra = precioCombustible * cantidadCombustible;

            document.getElementById("monto_compra").value = montoCompra.toFixed(2);
        });
    </script>

</body>

</html>