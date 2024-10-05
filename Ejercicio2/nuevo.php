<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulario de Inserción de Usuario</h2>
        <form action="insertar.php" method="POST">
            <!-- <div class="mb-3">
                <label for="id_ci" class="form-label">ID</label>
                <input type="number" class="form-control" id="id_ci" name="id_ci" required>
            </div> -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <div class="mb-3">
                <label for="materno" class="form-label">Materno</label>
                <input type="text" class="form-control" id="materno" name="materno" required >
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Username</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contraseña" name="contraseña" required>
            </div>

            <!-- <div class="mb-3">
                <label for="id_cargo" class="form-label">Cargo</label>
                <input type="number" class="form-control" id="id_cargo" name="id_cargo" required>
            </div> -->

            <div class="mb-3">
                <label for="carnet" class="form-label">Carnet</label>
                <input type="text" class="form-control" id="carnet" name="carnet" required>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
