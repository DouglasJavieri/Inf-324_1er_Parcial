<?php 
    include "./conexion.php";
    $id_ci = $_GET["id_ci"];
    $sql = "SELECT * FROM usuario WHERE id_ci = $id_ci";
    $resultado = mysqli_query($con, $sql);
    $fila = mysqli_fetch_array($resultado);
    $id_ci =$fila["id_ci"];
    $nombre =$fila["nombre"];
    $paterno =$fila["paterno"];
    $materno =$fila["materno"];
    $telefono =$fila["telefono"];
    $email =$fila["email"];
    $nombre_usuario =$fila["nombre_usuario"];
    $contraseña =$fila["contraseña"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mi pagina</title>
</head>
    <body class="container mt-5 my-5">
        <h1>Editar Usuario</h1>
        <form action="guardaeditar.php" method = "GET">
            <div class="mb-3">
                <label for="id_ci" class="form-label">Id</label>
                <input type="text" class="form-control" id="id_ci" name="id_ci" value="<?php echo $id_ci; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>">
            </div>
            <div class="mb-3">
                <label for="materno" class="form-label">Materno</label>
                <input type="text" class="form-control" id="materno" name="materno" value="<?php echo $materno; ?>">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Username</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $nombre_usuario; ?>">
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contraseña" name="contraseña" value="<?php echo $contraseña; ?>">
            </div>
            

            <input type="submit" name="Aceptar" value= "Aceptar" class= 'btn btn-secondary'>
            <input type="submit" name="Cancelar" value= "Cancelar" class= 'btn btn-danger'>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
  
    