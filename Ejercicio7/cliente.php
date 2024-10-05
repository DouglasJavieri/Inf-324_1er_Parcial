<?php
    session_start();
    if(!isset($_SESSION['nombre_usuario'])){
        header("location:index.php");
        exit();
    }

    $nombre_usuario = $_SESSION['nombre_usuario'];
    $conexion = mysqli_connect("localhost", "usuario", "123456", "bddouglas");

    // Consulta para obtener el id_ci del usuario
    $consultaUsuario = "SELECT id_ci FROM usuario WHERE nombre_usuario = '$nombre_usuario'";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
    $usuario = mysqli_fetch_assoc($resultadoUsuario);
    $id_ci = $usuario['id_ci'];

    // Consulta para obtener las propiedades del usuario cliente
    $consulta = "SELECT id_catastro, distrito, zona, superficie_m2, fecha_registro 
                 FROM propiedad 
                 WHERE id_ci = '$id_ci'";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades del Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Propiedades del Usuario</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID Catastro</th>
                    <th>Distrito</th>
                    <th>Zona</th>
                    <th>Superficie m2</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['id_catastro']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['distrito']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['zona']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['superficie_m2']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['fecha_registro']) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
