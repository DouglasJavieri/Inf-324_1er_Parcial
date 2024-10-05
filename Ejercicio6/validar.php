<?php
    $nombre_usuario=$_POST['nombre_usuario'];
    $contraseña=$_POST['contraseña'];
    session_start();
    $_SESSION['nombre_usuario']=$nombre_usuario;

    $conexion=mysqli_connect("localhost","usuario","123456","bddouglas");

    $consulta="SELECT * FROM usuario where nombre_usuario='$nombre_usuario' and contraseña='$contraseña'";

    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_fetch_array($resultado);

    if($filas['id_cargo']==1){ // verificamos que sea administrador
        header("location:admin.php");
        exit();

    }else
    if($filas['id_cargo']==2){ //verificamos que sea cliente
        header("location:cliente.php");
        exit();
        }
        else{
            ?>
            <?php
            include("index.php");
            ?>
            <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
            <?php
        }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>