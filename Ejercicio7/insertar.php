<?php 
include "./conexion.php";

$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$nombre_usuario = $_POST["nombre_usuario"];
$contraseña = $_POST["contraseña"];
$id_cargo = 2;
$carnet = $_POST["carnet"];
$distrito = $_POST["distrito"]; // Nuevo campo
$zona = $_POST["zona"]; // Nuevo campo
$superficie_m2 = $_POST["superficie_m2"]; // Nuevo campo
$fecha_registro = $_POST["fecha_registro"]; // Nuevo campo

// Insertar el usuario
$sql = "INSERT INTO usuario (nombre, paterno, materno, telefono, email, nombre_usuario, contraseña, id_cargo, carnet) VALUES ('$nombre', '$paterno', '$materno', '$telefono', '$email', '$nombre_usuario', '$contraseña', '$id_cargo', '$carnet')";
mysqli_query($con, $sql);

// Obtener el ID del usuario recién insertado
$id_ci = mysqli_insert_id($con);

// Insertar la propiedad
$sql_propiedad = "INSERT INTO propiedad (distrito, zona, superficie_m2, fecha_registro, id_ci) VALUES ('$distrito', '$zona', '$superficie_m2', '$fecha_registro', '$id_ci')";
mysqli_query($con, $sql_propiedad);

header("Location: admin.php");
?>
