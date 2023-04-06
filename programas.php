<?php
    include_once("config/sections/header.php");
    include_once("config/sections/navbar.php");
    ?>
  <section class="section">
    <div class="container">
      <h1 class="title">Registro de Programas</h1>
      <form action="funciones/Guardar_programas.php" method="POST">
        <div class="field">
          <label class="label">Nombre del programa</label>
          <div class="control">
            <input class="input" type="text" name="nombre" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Categoría programática</label>
          <div class="control">
            <input class="input" type="text" name="categoria" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Presupuesto por programa</label>
          <div class="control">
            <input class="input" type="number" name="presupuesto" required>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button class="button is-primary" type="submit">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <?php
    include_once("config/sections/footer.php");
    ?>