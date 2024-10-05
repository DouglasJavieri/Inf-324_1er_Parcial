<?php 
    include "./conexion.php";
    $id_ci = $_GET["id_ci"];
    $nombre =$_GET["nombre"];
    $paterno =$_GET["paterno"];
    $materno =$_GET["materno"];
    $telefono =$_GET["telefono"];
    $email =$_GET["email"];
    $nombre_usuario =$_GET["nombre_usuario"];
    $contraseña =$_GET["contraseña"];
    $sql = "UPDATE usuario set nombre='$nombre', paterno='$paterno', materno='$materno', telefono='$telefono', email='$email', nombre_usuario='$nombre_usuario', contraseña='$contraseña' where id_ci=$id_ci";
    mysqli_query($con, $sql);
    header("Location: index.php");
?>