<?php

$mysqli = new mysqli("localhost:3306", "root", "", "claro_claro");

if ($mysqli->connect_error) {
    echo "error " . $mysqli->connect_error;
    exit;
}
$mysqli->set_charset("utf8");
