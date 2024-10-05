<?php 
    include "./conexion.php";

    // Consulta para unir los datos de usuarios y propiedades
    $sql = "SELECT usuario.nombre, usuario.paterno, usuario.materno, usuario.carnet, 
                   propiedad.id_catastro, propiedad.distrito, propiedad.zona 
            FROM usuario 
            INNER JOIN propiedad ON usuario.id_ci = propiedad.id_ci"; // Asegúrate de que esta relación es la correcta según tu base de datos

    $resultado = mysqli_query($con, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($con));
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios y Propiedades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Usuarios y Propiedades</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Paterno</th>
                    <th scope="col">Materno</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">ID Catastro</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Zona</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Mostrar datos combinados de usuario y propiedad
                    while($fila = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['paterno']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['materno']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['carnet']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['id_catastro']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['distrito']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['zona']) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <!-- Botón para regresar a admin.php -->
        <a class="btn btn-primary w-100" href="admin.php">Volver a Admin</a>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
