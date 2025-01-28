<?php

require 'conexion.php';

$idEstado = $mysqli->real_escape_string($_POST['departamento']);

$sql = "SELECT * FROM operador_logico WHERE departamento = '$idEstado' ORDER BY `ciudad` ASC;";
$resultado = $mysqli->query($sql);
$respuesta = "<option value=''>Ciudades de $idEstado</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['ciudad']."'>".$row['ciudad']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);


?>