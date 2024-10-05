<?php 
    include "./conexion.php";
    $sql = "SELECT * FROM usuario";
    $resultado = mysqli_query($con, $sql);
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($con));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mi pagina</title>
</head>

<body>
    <div class="container mt-5 my-5">
        <h1>Usuarios</h1>
        <table class="table table-success table-striped-column table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Paterno</th>
                    <th scope="col">Materno</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    while($fila = mysqli_fetch_array($resultado))
                    {
                    
                        if(isset($fila['id_cargo']) && $fila['id_cargo'] == 1) {
                            continue; 
                        }

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['id_ci']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['paterno']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['materno']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['carnet']) . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-danger mx-2' href='editar.php?id_ci=" . htmlspecialchars($fila['id_ci']) . "'>Editar</a>";
                        echo "<a class='btn btn-info mx-2' href='eliminar.php?id_ci=" . htmlspecialchars($fila['id_ci']) . "'>Eliminar</a>";
                        echo "<a class='btn btn-warning' href='adicionarp.php?id_ci=" . htmlspecialchars($fila['id_ci']) . "'>Añadir propiedad</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <a class="btn btn-success w-100" href='nuevo.php'>Registrar nuevo usuario</a>
        <a class="btn btn-primary w-100 my-2" href="propiedades.php">Ver Propiedades</a>
        <a href="logout.php" class="btn btn-danger my-2">Cerrar Sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>