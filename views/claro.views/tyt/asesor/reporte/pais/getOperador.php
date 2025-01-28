<?php

require 'conexion.php';

$idCiudad = $mysqli->real_escape_string($_POST['ciudad']);

$sql = "SELECT * FROM operador_logico WHERE ciudad = '$idCiudad';";
$resultados = $mysqli->query($sql);
$respuesta = "<option>Operadores disponibles</option>";

while ($row = $resultados->fetch_assoc()) {
    $respuesta .= "<option value='". $row['operador'] ."'>" . $row['operador'] ." - ". $row['dias']. " dias habiles"."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>