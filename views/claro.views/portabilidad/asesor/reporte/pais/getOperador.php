<?php

require 'conexion.php';

if (isset($_POST['departamento']) && isset($_POST['ciudad'])) {
    $idDepartamento = $mysqli->real_escape_string($_POST['departamento']);
    $idCiudad = $mysqli->real_escape_string($_POST['ciudad']);

    $sql = "SELECT DISTINCT operador, ventana_cambio, dias FROM operador_logico WHERE departamento = '$idDepartamento' AND ciudad = '$idCiudad' ORDER BY operador ASC";

    $resultado = $mysqli->query($sql);

    if ($resultado) {
        $respuesta = "<option value=''>Operadores en $idCiudad</option>";

        while ($row = $resultado->fetch_assoc()) {
            $operador = htmlspecialchars($row['operador']); // Escapar el operador para evitar XSS
            $ventana_cambio = htmlspecialchars($row['ventana_cambio']); // Escapar la ventana de cambio para evitar XSS
            $dias = htmlspecialchars($row['dias']); // Escapar los días para evitar XSS
            $respuesta .= "<option value='$operador'>$operador ($ventana_cambio días para ventana de cambio, $dias días habiles)</option>";
        }

        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode("No se encontraron operadores para la ciudad especificada", JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode("No se recibieron los valores del departamento o ciudad", JSON_UNESCAPED_UNICODE);
}
