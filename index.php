
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Control y Seguimiento de Documentación</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    </head>
    <body>
        <section class="section">
            <div class="container">
                <h1 class="title">Sistema de Control y Seguimiento de Documentación</h1>
                <h2 class="subtitle">Registro de Empleados</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="columns">
                        <div class="column is-one-third">
                            <div class="field">
                                <label class="label">Nombre</label>
                                <div class="control">
                                    <input class="input" type="text" name="nombre" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Apellido Paterno</label>
                                <div class="control">
                                    <input class="input" type="text" name="apellido_paterno" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Apellido Materno</label>
                                <div class="control">
                                    <input class="input" type="text" name="apellido_materno" required>
                                </div>
                            </div>
                            <div class="container">
                                <h1 class="title is-1">Control y Seguimiento de Documentación</h1>
                                <h2 class="subtitle">Seleccione una opción:</h2>

                                <div class="columns">
                                    <div class="column">
                                        <div class="card">
                                            <div class="card-content">
                                                <h3 class="title is-3">Gestión de Empleados</h3>
                                                <p>Administre el registro de los empleados de la empresa y sus contratos.</p>
                                            </div>
                                            <footer class="card-footer">
                                                <a href="empleado.php" class="card-footer-item">Ir a Empleados</a>
                                            </footer>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="card">
                                            <div class="card-content">
                                                <h3 class="title is-3">Gestión de Documentos</h3>
                                                <p>Realice el seguimiento de la documentación que se genera en la empresa.</p>
                                            </div>
                                            <footer class="card-footer">
                                                <a href="documento.php" class="card-footer-item">Ir a Documentos</a>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bulma JS -->
                            <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
                            <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/js/bulma.min.js"></script>

                        </body>

                        </html>