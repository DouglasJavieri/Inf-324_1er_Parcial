<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Personas por Tipo de Impuesto</h1>
        <?php
            // Conexión a la base de datos
            include "./conexion.php";
            if (!$con) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Consulta para obtener usuarios y sus propiedades
            $sql = "SELECT U.nombre, U.paterno, U.materno, U.carnet, P.id_catastro 
                    FROM usuario U
                    JOIN propiedad P ON U.id_ci = P.id_ci";
            $resultado = mysqli_query($con, $sql);

            // Inicialización de arreglos para los diferentes tipos de impuestos
            $impuestoAlto = [];
            $impuestoMedio = [];
            $impuestoBajo = [];

            // Procesar resultados
            if ($resultado->num_rows > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $tipoImpuesto = substr($fila['id_catastro'], 0, 1);
                    switch ($tipoImpuesto) {
                        case '1':
                            $impuestoAlto[] = $fila;
                            break;
                        case '2':
                            $impuestoMedio[] = $fila;
                            break;
                        case '3':
                            $impuestoBajo[] = $fila;
                            break;
                    }
                }
            }

            // Función para mostrar la tabla de resultados
            function mostrarTabla($data, $titulo) {
                echo "<h3>$titulo</h3>";
                echo "<table class='table table-striped'>";
                echo "<thead><tr><th>Nombre</th><th>Paterno</th><th>Materno</th><th>Carnet</th><th>ID Catastro</th></tr></thead>";
                echo "<tbody>";
                foreach ($data as $fila) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['paterno']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['materno']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['carnet']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['id_catastro']) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }

            // Mostrar las tablas por tipo de impuesto
            mostrarTabla($impuestoAlto, "Impuesto Alto");
            mostrarTabla($impuestoMedio, "Impuesto Medio");
            mostrarTabla($impuestoBajo, "Impuesto Bajo");

            // Cerrar conexión
            mysqli_close($con);
        ?>
        <a class="btn btn-success" href='admin.php'>Volver a Admin</a>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
