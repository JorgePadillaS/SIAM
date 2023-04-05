<!DOCTYPE html>
<html>
  <head>
    <title>Registro de Combustible</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
  </head>
  <body>
    <section class="section">
      <div class="container">
        <h1 class="title">Registro de Combustible</h1>
        <form action="funciones/Guardar_combustible.php" method="POST">
          <div class="field">
            <label class="label">Tipo de Combustible</label>
            <div class="control">
              <input class="input" type="text" name="tipo_combustible" placeholder="Ingrese el tipo de combustible" required>
            </div>
          </div>
          <div class="field">
            <label class="label">Precio por Litro</label>
            <div class="control">
              <input class="input" type="number" name="precio_litro" step="0.01" placeholder="Ingrese el precio por litro" required>
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
  </body>
</html>