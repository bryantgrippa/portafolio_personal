<?php
function obtenerHoraColombia()
{
    // Establecer el huso horario a Colombia
    date_default_timezone_set('America/Bogota');

    // Obtener la hora actual en formato deseado
    return date('H:i:s');
}
