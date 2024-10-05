<?php
include "./conexion.php";

$distrito = $_GET['distrito'];

$sql = "SELECT DISTINCT zona FROM propiedad WHERE distrito = '$distrito'";
$resultado = mysqli_query($con, $sql);

$zonas = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $zonas[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($zonas);
?>
