<?php
require 'models/DataBase.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$dbController = new DBController();
$this->conn = $dbController->connectDB();
$mysqli = $this->conn;

if (!$mysqli) {
    echo json_encode(['error' => 'Failed to connect to database']);
    exit;
}

$idEstado = $mysqli->real_escape_string($_POST['departamento']);

$sql = "SELECT DISTINCT ciudad FROM operador_logico WHERE departamento = '$idEstado' ORDER BY `ciudad` ASC;";
$resultado = $mysqli->query($sql);

if (!$resultado) {
    echo json_encode(['error' => 'Query failed: ' . $mysqli->error]);
    exit;
}

$respuesta = [];

while ($row = $resultado->fetch_assoc()) {
    $respuesta[] = [
        'value' => $row['ciudad'],
        'label' => $row['ciudad']
    ];
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>
