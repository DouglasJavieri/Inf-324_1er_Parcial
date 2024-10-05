<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulario de Inserción de Propiedad</h2>
        <form action="insertarPropiedad.php" method="POST">
            <!-- Campo oculto para el id_ci -->
            <input type="hidden" name="id_ci" value="<?php echo $_GET['id_ci']; ?>">

            <div class="mb-3">
                <label for="id_catastro" class="form-label">ID Catastro</label>
                <input type="number" class="form-control" id="id_catastro" name="id_catastro" required>
            </div>

            <!-- Distrito - Selección -->
            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <select class="form-control" id="distrito" name="distrito" required onchange="actualizarZonas()">
                    <option value="">Selecciona un distrito</option>
                    <option value="COTAHUMA">COTAHUMA </option>
                    <option value="MAX PAREDES">MAX PAREDES</option>
                    <option value="SAN ANTONIO">SAN ANTONIO</option>
                    <option value="SUR">SUR</option>
                    <option value="CENTRO">CENTRO</option>
                    <option value="MALLASA">MALLASA</option>
                    <!-- Puedes añadir más opciones según tus necesidades -->
                </select>
            </div>

            <!-- Zona - Selección -->
            <div class="mb-3">
                <label for="zona" class="form-label">Zona</label>
                <select class="form-control" id="zona" name="zona" required>
                    <option value="">Selecciona una zona</option>
                    <!-- Las opciones se llenarán dinámicamente usando JavaScript -->
                </select>
            </div>

            <div class="mb-3">
                <label for="superficie_m2" class="form-label">Superficie</label>
                <input type="number" class="form-control" id="superficie_m2" name="superficie_m2" required >
            </div>

            <div class="mb-3">
                <label for="fecha_registro" class="form-label">Fecha de registro</label>
                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
            </div>

            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>

    <script>
        // Mapeo de distritos a zonas
        const zonasPorDistrito = {
            "COTAHUMA": ["Tembladerani", "Sopocachi", "Llojeta", "Alpacoma"],
            "MAX PAREDES": ["Gran Poder", "Villa Victoria", "El tejar", "Munaypata"],
            "SAN ANTONIO": ["Villa copacabana", "Kupini", "Pampahasi", "San Isidro"],
            "SUR": ["San Miguel", "Cota cota", "Obrajes", "Irpavi", "La Florida", "Calacoto"],
            "CENTRO": ["San Jorge", "Miraflores", "Centro", "San Sebastian"],
            "MALLASA": ["Amor de Dios", "Aranjuez", "Mallasilla", "Jupapina"]
        };

        function actualizarZonas() {
            const distritoSeleccionado = document.getElementById("distrito").value;
            const zonaSelect = document.getElementById("zona");
            zonaSelect.innerHTML = ""; // Limpiar las opciones de zona

            if (distritoSeleccionado in zonasPorDistrito) {
                zonasPorDistrito[distritoSeleccionado].forEach(zona => {
                    const option = document.createElement("option");
                    option.value = zona;
                    option.text = zona;
                    zonaSelect.appendChild(option);
                });
            } else {
                const option = document.createElement("option");
                option.value = "";
                option.text = "Selecciona una zona";
                zonaSelect.appendChild(option);
            }
        }
    </script>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
