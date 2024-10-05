<?php 
include "./conexion.php"; // Asegúrate de tener la conexión a la base de datos

$sql = "
    SELECT 
        u.id_ci,
        u.nombre,
        u.paterno,
        u.materno,
        u.telefono,
        u.email,
        u.nombre_usuario,
        SUM(CASE WHEN p.id_catastro LIKE '1%' THEN 1 ELSE 0 END) AS impuesto_alto,
        SUM(CASE WHEN p.id_catastro LIKE '2%' THEN 1 ELSE 0 END) AS impuesto_medio,
        SUM(CASE WHEN p.id_catastro LIKE '3%' THEN 1 ELSE 0 END) AS impuesto_bajo
    FROM usuario u
    LEFT JOIN propiedad p ON u.id_ci = p.id_ci
    GROUP BY u.id_ci
";

$resultado = mysqli_query($con, $sql);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lista de Personas por Tipo de Impuesto</title>
</head>
<body class="container mt-5">
    <h1>Lista de Personas por Tipo de Impuesto</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Impuesto Alto</th>
                <th>Impuesto Medio</th>
                <th>Impuesto Bajo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['id_ci']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['paterno']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['materno']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['impuesto_alto']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['impuesto_medio']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['impuesto_bajo']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a class="btn btn-success" href='admin.php'>Volver</a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
