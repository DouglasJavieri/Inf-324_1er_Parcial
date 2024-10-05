<?php 
    include "./conexion.php";

    
    $id_catastro = $_POST["id_catastro"];
    $distrito = $_POST["distrito"];
    $zona = $_POST["zona"];
    $superficie_m2 = $_POST["superficie_m2"];
    $fecha_registro = $_POST["fecha_registro"];
    $id_ci = $_POST["id_ci"];  

    
    $sql = "INSERT INTO propiedad (id_catastro, distrito, zona, superficie_m2, fecha_registro, id_ci) 
            VALUES ('$id_catastro', '$distrito', '$zona', '$superficie_m2', '$fecha_registro', '$id_ci')";

    
    mysqli_query($con, $sql);

    
    header("Location: propiedades.php");
?>
