<?php

require 'conexion.php';

// Verificar si se ha recibido el valor del departamento
if (isset($_POST['departamento'])) {
    // Escapar y limpiar el valor recibido
    $idEstado = $mysqli->real_escape_string($_POST['departamento']);

    // Consulta SQL para obtener las ciudades del departamento especificado
    $sql = "SELECT DISTINCT ciudad FROM operador_logico WHERE departamento = '$idEstado' ORDER BY ciudad ASC";

    // Ejecutar la consulta
    $resultado = $mysqli->query($sql);

    // Verificar si se obtuvieron resultados
    if ($resultado) {
        // Inicializar la variable de respuesta
        $respuesta = "<option value=''>Ciudades de $idEstado</option>";

        // Iterar sobre los resultados y construir las opciones del select
        while ($row = $resultado->fetch_assoc()) {
            $ciudad = htmlspecialchars($row['ciudad']); // Escapar la ciudad para evitar XSS
            $respuesta .= "<option value='$ciudad'>$ciudad</option>";
        }

        // Codificar la respuesta como JSON y enviarla
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    } else {
        // Si no se obtuvieron resultados, devolver un mensaje de error
        echo json_encode("No se encontraron ciudades para el departamento especificado", JSON_UNESCAPED_UNICODE);
    }
} else {
    // Si no se recibió el valor del departamento, devolver un mensaje de error
    echo json_encode("No se recibió el valor del departamento", JSON_UNESCAPED_UNICODE);
}
