<?php 
    include "./conexion.php";
    $nombre =$_POST["nombre"];
    $paterno =$_POST["paterno"];
    $materno =$_POST["materno"];
    $telefono =$_POST["telefono"];
    $email =$_POST["email"];
    $nombre_usuario =$_POST["nombre_usuario"];
    $contraseña =$_POST["contraseña"];
    $id_cargo =2;
    $carnet =$_POST["carnet"];
    $sql = "insert into usuario (nombre, paterno, materno, telefono, email, nombre_usuario, contraseña, id_cargo, carnet) values ('$nombre', '$paterno', '$materno', '$telefono', '$email', '$nombre_usuario', '$contraseña', '$id_cargo', '$carnet')";
    mysqli_query($con, $sql);
    header("Location: admin.php");
?>