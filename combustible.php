<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
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
    <?php
    include_once("config/sections/footer.php");
    ?>