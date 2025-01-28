<?php

require 'conexion.php';

$idDetalles = $mysqli->real_escape_string($_POST['detalles']);

$respuesta = "";

if ($idDetalles == 'CANTADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'AUDITADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'ENVIADA AL ABD') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'DEVUELTA ABD') {

    $respuesta .= "<option value='Cliente en Mora'>Cliente en Mora</option>";
    $respuesta .= "<option value='Nip Errado'>Nip Errado</option>";
    $respuesta .= "<option value='Numeracion'>Numeracion</option>";
    $respuesta .= "<option value='Operador Logístico Dirección errada'>Operador Logístico Dirección errada</option>";
    $respuesta .= "<option value='Operador Logístico Mal Georreferenciada'>Operador Logístico Mal Georreferenciada</option>";
    $respuesta .= "<option value='Operador Logístico No contacto con titular'>Operador Logístico No contacto con titular</option>";
    $respuesta .= "<option value='Pendiente Causal'>Pendiente Causal</option>";
    $respuesta .= "<option value='Titularidad'>Titularidad</option>";    

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'ACTIVA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'LEGALIZADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'EXITOSA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'PENDIENTE') {

    $respuesta .= "<option value='Error aplicativos'>Error aplicativos</option>";
    $respuesta .= "<option value='Escalada'>Escalada</option>";
    $respuesta .= "<option value='Confirmación Serial'>Confirmación Serial</option>";
    $respuesta .= "<option value='Compra de SIM'>Compra de SIM</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'RECHAZADA') {

    $respuesta .= "<option value='Cliente en Mora'>Cliente en Mora</option>";
    $respuesta .= "<option value='Datos errados'>Datos errados</option>";
    $respuesta .= "<option value='Documento Bloqueado'>Documento Bloqueado</option>";
    $respuesta .= "<option value='Informacion Incompleta'>Informacion Incompleta</option>";
    $respuesta .= "<option value='Interferencia de llamada'>Interferencia de llamada</option>";
    $respuesta .= "<option value='Leg. Altera Orden de contrato o cambia palabras'>Leg. Altera Orden de contrato o cambia palabras</option>";
    $respuesta .= "<option value='Leg. Asesor confirma informacion'>Leg. Asesor confirma informacion</option>";
    $respuesta .= "<option value='Leg. Cliente no acepta términos'>Leg. Cliente no acepta términos</option>";
    $respuesta .= "<option value='Leg. Omite párrafos o contrato incompleto'>Leg. Omite párrafos o contrato incompleto</option>";
    $respuesta .= "<option value='Leg. Tiempo de Ocio o Interrupción'>Leg. Tiempo de Ocio o Interrupción</option>";
    $respuesta .= "<option value='Leg. Voces de terceros'>Leg. Voces de terceros</option>";
    $respuesta .= "<option value='Nip vencido'>Nip vencido</option>";
    $respuesta .= "<option value='No compra SIM'>No compra SIM</option>";
    $respuesta .= "<option value='No enviado al ABD'>No enviado al ABD</option>";
    $respuesta .= "<option value='Oferta comercial errada'>Oferta comercial errada</option>";
    $respuesta .= "<option value='Reenvia NIP'>Reenvia NIP</option>";
    $respuesta .= "<option value='Sin cobertura a operador'>Sin cobertura a operador</option>";
    $respuesta .= "<option value='Sin llamada de contrato'>Sin llamada de contrato</option>";
    $respuesta .= "<option value='Sin validacion de identidad'>Sin validacion de identidad</option>";
    $respuesta .= "<option value='Suplantación titular'>Suplantación titular</option>";
    $respuesta .= "<option value='Validacion identidad vencida'>Validacion identidad vencida</option>";
    $respuesta .= "<option value='Venta duplicada'>Venta duplicada</option>";    

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'DESACTIVA') {

    $respuesta .= "<option value='Cambio de operador (MOVISTAR)'>Cambio de operador (MOVISTAR)</option>";
    $respuesta .= "<option value='Cambio de operador (OTROS)'>Cambio de operador (OTROS)</option>";
    $respuesta .= "<option value='Cambio de operador (TIGO)'>Cambio de operador (TIGO)</option>";
    $respuesta .= "<option value='Cambio de operador (WOM)'>Cambio de operador (WOM)</option>";
    $respuesta .= "<option value='Cliente desiste'>Cliente desiste</option>";
    $respuesta .= "<option value='Cliente entra en mora'>Cliente entra en mora</option>";    

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'DIGITAL') {
    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
