<?php 
    include "./conexion.php";
    $id_ci = $_GET["id_ci"];
    $sql = "DELETE FROM usuario WHERE id_ci = $id_ci";
    mysqli_query($con, $sql);
    header("Location: admin.php");
?>