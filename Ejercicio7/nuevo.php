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

            <!-- Campos del usuario -->
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
                <input type="text" class="form-control" id="materno" name="materno" required>
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
            <div class="mb-3">
                <label for="carnet" class="form-label">Carnet</label>
                <input type="text" class="form-control" id="carnet" name="carnet" required>
            </div>

            <!-- Campos para propiedad -->
            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <select class="form-select" id="distrito" name="distrito" required>
                    <option value="">Seleccionar distrito</option>
                    <!-- Aquí se llenarán los distritos con Ajax -->
                </select>
            </div>
            <div class="mb-3">
                <label for="zona" class="form-label">Zona</label>
                <select class="form-select" id="zona" name="zona" required>
                    <option value="">Seleccionar zona</option>
                    <!-- Aquí se llenarán las zonas dependiendo del distrito seleccionado -->
                </select>
            </div>
            <div class="mb-3">
                <label for="superficie_m2" class="form-label">Superficie (m²)</label>
                <input type="number" class="form-control" id="superficie_m2" name="superficie_m2" required>
            </div>
            <div class="mb-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
            </div>

            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
        <script>
        // Cargar distritos al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            fetch('obtener_distritos.php')
                .then(response => response.json())
                .then(data => {
                    const distritoSelect = document.getElementById('distrito');
                    data.forEach(distrito => {
                        const option = document.createElement('option');
                        option.value = distrito.distrito; 
                        option.text = distrito.distrito; // Texto para mostrar
                        distritoSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });

        // Llenar zonas basado en el distrito seleccionado
        document.getElementById('distrito').addEventListener('change', function() {
            const distrito = this.value;
            const zonaSelect = document.getElementById('zona');
            zonaSelect.innerHTML = ''; // Limpiar zonas anteriores

            if (distrito) {
                fetch('obtener_zonas.php?distrito=' + distrito)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(zona => {
                            const option = document.createElement('option');
                            option.value = zona.zona; 
                            option.text = zona.zona; // Texto para mostrar
                            zonaSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>

</body>
</html>
