<?php
include "./conexion.php";

$sql = "SELECT DISTINCT distrito FROM propiedad";
$resultado = mysqli_query($con, $sql);

$distritos = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $distritos[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($distritos);
?>
