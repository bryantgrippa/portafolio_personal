<?php

require 'conexion.php';

$idDetalles = $mysqli->real_escape_string($_POST['detalles']);

$respuesta = "";

if ($idDetalles == 'ACTIVA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'ANULADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'ASIGNADO A RUTA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'AUDITADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'CANTADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'CERRADO') {

    $respuesta .= "<option value='Cliente desiste del servicio'>Cliente desiste del servicio</option>";
    $respuesta .= "<option value='Devolución por posible fraude'>Devolución por posible fraude</option>";
    $respuesta .= "<option value='Dirección errada'>Dirección errada</option>";
    $respuesta .= "<option value='El servicio no sale a reparto por solicitud de claro'>El servicio no sale a reparto por solicitud de claro</option>";
    $respuesta .= "<option value='Error disponibilidad de inventario'>Error disponibilidad de inventario</option>";
    $respuesta .= "<option value='Fuera de zona de cubrimiento'>Fuera de zona de cubrimiento</option>";
    $respuesta .= "<option value='Referencia no Coincide'>Referencia no Coincide</option>";
    $respuesta .= "<option value='Reserva anulada'>Reserva anulada</option>";
    $respuesta .= "<option value='Serial cuenta con Crédito Activo en Ascar'>Serial cuenta con Crédito Activo en Ascar</option>";
    $respuesta .= "<option value='Servicio reportado para anulacion de credito'>Servicio reportado para anulacion de credito</option>";
    $respuesta .= "<option value='Solicitud pendiente por Anulación de plan de pagos'>Solicitud pendiente por Anulación de plan de pagos</option>";


    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'CONFIRMADO') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'DESPACHADO') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'DEVOLUCION SOLICITADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'DIGITADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

if ($idDetalles == 'ENTREGADO') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'INCOMPLETA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'LEGALIZADO') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'PENDIENTE') {
    $respuesta .= "<option value='Cliente en mora'>Cliente en mora</option>";
    $respuesta .= "<option value='Error aplicativos'>Error aplicativos</option>";
    $respuesta .= "<option value='Escalada'>Escalada</option>";
    $respuesta .= "<option value='Llamada de confirmación'>Llamada de confirmación</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'PENDIENTE DE CIERRE') {

    $respuesta .= "<option value='Cliente desiste del servicio'>Cliente desiste del servicio</option>";
    $respuesta .= "<option value='Devolución por posible fraude'>Devolución por posible fraude</option>";
    $respuesta .= "<option value='Dirección errada'>Dirección errada</option>";
    $respuesta .= "<option value='El servicio no sale a reparto por solicitud de claro'>El servicio no sale a reparto por solicitud de claro</option>";
    $respuesta .= "<option value='Error disponibilidad de inventario'>Error disponibilidad de inventario</option>";
    $respuesta .= "<option value='Fuera de zona de cubrimiento'>Fuera de zona de cubrimiento</option>";
    $respuesta .= "<option value='Referencia no Coincide'>Referencia no Coincide</option>";
    $respuesta .= "<option value='Reserva anulada'>Reserva anulada</option>";
    $respuesta .= "<option value='Serial cuenta con Crédito Activo en Ascar'>Serial cuenta con Crédito Activo en Ascar</option>";
    $respuesta .= "<option value='Servicio reportado para anulacion de credito'>Servicio reportado para anulacion de credito</option>";
    $respuesta .= "<option value='Solicitud pendiente por Anulación de plan de pagos'>Solicitud pendiente por Anulación de plan de pagos</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'RECHAZADA') {

    $respuesta .= "<option value='Cliente en Mora'>Cliente en Mora</option>";
    $respuesta .= "<option value='Datos errados'>Datos errados</option>";
    $respuesta .= "<option value='Informacion Incompleta'>Informacion Incompleta</option>";
    $respuesta .= "<option value='Interferencia de llamada'>Interferencia de llamada</option>";
    $respuesta .= "<option value='Leg. Altera Orden de contrato o cambia palabras'>Leg. Altera Orden de contrato o cambia palabras</option>";
    $respuesta .= "<option value='Leg. Asesor confirma informacion'>Leg. Asesor confirma informacion</option>";
    $respuesta .= "<option value='Leg. Cliente no acepta términos'>Leg. Cliente no acepta términos</option>";
    $respuesta .= "<option value='Leg. Omite párrafos o contrato incompleto'>Leg. Omite párrafos o contrato incompleto</option>";
    $respuesta .= "<option value='Leg. Tiempo de Ocio o Interrupción'>Leg. Tiempo de Ocio o Interrupción</option>";
    $respuesta .= "<option value='Leg. Voces de terceros'>Leg. Voces de terceros</option>";
    $respuesta .= "<option value='Material no coincide'>Material no coincide</option>";
    $respuesta .= "<option value='No aplica validación de identidad'>No aplica validación de identidad</option>";
    $respuesta .= "<option value='Oferta comercial errada'>Oferta comercial errada</option>";
    $respuesta .= "<option value='Sin llamada de contrato'>Sin llamada de contrato</option>";
    $respuesta .= "<option value='Suplantación titular'>Suplantación titular</option>";
    $respuesta .= "<option value='Validación de identidad vencido'>Validación de identidad vencido</option>";
    $respuesta .= "<option value='Venta duplicada'>Venta duplicada</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'RESERVA TRAMITADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'TRANSITO') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'TRÁMITADA') {

    $respuesta .= "<option value='NA'>Sin Subestado</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
if ($idDetalles == 'VISITA FALLIDA') {

    $respuesta .= "<option value='Cliente no se encuentra en punto'>Cliente no se encuentra en punto</option>";
    $respuesta .= "<option value='Cliente sin Disponibilidad para'>Cliente sin Disponibilidad para</option>";
    $respuesta .= "<option value='Factores Climaticos'>Factores Climaticos</option>";
    $respuesta .= "<option value='Orden Publico'>Orden Publico</option>";
    $respuesta .= "<option value='Reagendamiento con cliente'>Reagendamiento con cliente</option>";
    $respuesta .= "<option value='Restricción en transito'>Restricción en transito</option>";

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
