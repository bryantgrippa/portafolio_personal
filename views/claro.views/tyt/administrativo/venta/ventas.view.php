<?php
$this->conn->set_charset('utf8');
$sqli = $this->conn;
?>

<head>
    <title><?php echo $alm[0]->nombre_asesor ?></title>

</head>
<?php
$fecha10 = date("d/m/Y H:i:s", strtotime($alm[0]->fecha_grabacion_contrato));
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 style="color:red;"><?php echo "Venta realizada el dia: " . $fecha10 ?></h1>
</div>
<form method="post" action="?p=claro&c=Back_tyt&a=save_tyt" enctype="multipart/form-data">
    <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 5) { ?>

        <button type="submit" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Actualizar Venta</span>
        </button>
    <?php } ?>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                        <h6 class="m-0 font-weight-bold text-primary">Datos del Cliente </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample1">
                        <div class="card-body">
                            <div class="container2">
                                <div class="mb-3">
                                    <input type="hidden" name="id_venta" value="<?php echo $alm[0]->id_venta ?>">
                                    <input type="hidden" name="tipo_solicitud" value="<?php echo $alm[0]->tipo_solicitud ?>">
                                    <input type="hidden" name="cedula_asesor" value="<?php echo $alm[0]->cedula_asesor ?>">
                                    <input type="hidden" name="nombre_asesor" value="<?php echo $alm[0]->nombre_asesor ?>">
                                    <input type="hidden" name="fecha_grabacion_contrato" value="<?php echo $alm[0]->fecha_grabacion_contrato ?>">

                                    <label class="form-label">Nombres y apellidos del cliente</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->nombres; ?>" disabled>
                                            <input type="hidden" class="form-control" name="nombres" value="<?php echo $alm[0]->nombres; ?>">
                                            <input type="text" class="form-control" name="nombres2">
                                        </div>
                                    </div>

                                    <label for="tipoCedula" class="form-label">Tipo de Documento</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_cedula ?>" disabled>
                                            <input type="hidden" class="form-control" name="tipo_cedula" value="<?php echo $alm[0]->tipo_cedula; ?>">
                                            <select id="tipoCedula" name="tipo_cedula2" class="form-control" onchange="mostrarCampoCedula()">
                                                <option value="">Selecciona</option>
                                                <option value="CEDULA DE CIUDADANIA">CC</option>
                                                <option value="CEDULA DE EXTRANJERIA">CE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="campoCedulaCE" style="display: none;">
                                        <label for="tipoCE" class="form-label">Tipo de CE</label>
                                        <select id="tipoCE" name="tipo_cedula_ce" class="form-control">
                                            <option value="M">Migrante (M)</option>
                                            <option value="R">Residente (R)</option>
                                            <option value="TP">Trabajador Permanente (TP)</option>
                                        </select>
                                    </div>


                                    <label for="numeroCC" class="form-label">Número de documento</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cedula; ?>" disabled>
                                            <input type="hidden" class="form-control" name="numero_cedula" value="<?php echo $alm[0]->numero_cedula; ?>">
                                            <input type="number" class="form-control" name="numero_cedula2">
                                        </div>
                                    </div>

                                    <label class="form-label">Correo</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->correo; ?>" disabled>
                                            <input type="hidden" class="form-control" name="correo" value="<?php echo $alm[0]->correo; ?>">
                                            <input type="email" class="form-control" name="correo2">
                                        </div>
                                    </div>

                                    <label class="form-label">Telefono de contacto 1</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->cel_1; ?>" disabled>
                                            <input type="hidden" class="form-control" name="cel_1" value="<?php echo $alm[0]->cel_1; ?>">
                                            <input type="number" class="form-control" name="cel_1_2">
                                        </div>
                                    </div>



                                    <label class="form-label">Telefono de contacto 2</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->cel_2; ?>" disabled>
                                            <input type="hidden" class="form-control" name="cel_2" value="<?php echo $alm[0]->cel_2; ?>">
                                            <input type="number" class="form-control" name="cel_2_2">
                                        </div>
                                    </div>


                                    <label class="form-label">Nombres de un tercero autorizado</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->nombres_tercero; ?>" disabled>
                                            <input type="hidden" class="form-control" name="nombres_tercero" value="<?php echo $alm[0]->nombres_tercero; ?>">
                                            <input type="text" class="form-control" name="nombres_tercero2">
                                        </div>
                                    </div>

                                    <label class="form-label">Número de documento de un tercero autorizado</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->documento_tercero; ?>" disabled>
                                            <input type="hidden" class="form-control" name="documento_tercero" value="<?php echo $alm[0]->documento_tercero; ?>">
                                            <input type="number" class="form-control" name="documento_tercero2">
                                        </div>
                                    </div>

                                    <label class="form-label">Telefono de un tercero autorizado</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->cel_tercero; ?>" disabled>
                                            <input type="hidden" class="form-control" name="cel_tercero" value="<?php echo $alm[0]->cel_tercero; ?>">
                                            <input type="number" class="form-control" name="cel_tercero2">
                                        </div>
                                    </div>

                                    <label class="form-label">Departamento</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->departamento; ?>" disabled>
                                            <input type="hidden" class="form-control" name="departamento" value="<?php echo $alm[0]->departamento; ?>">
                                            <select name="departamento2" id="departamento" class="form-control">
                                                <option value="">Selecciona</option>
                                                <?php
                                                $estado = $sqli->query("SELECT DISTINCT departamento FROM operador_logico ORDER BY departamento ASC");
                                                while ($row = $estado->fetch_assoc()) {
                                                ?>
                                                    <option value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <label class="form-label">Ciudad</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->ciudad; ?>" disabled>
                                            <input type="hidden" class="form-control" name="ciudad" value="<?php echo $alm[0]->ciudad; ?>">
                                            <select name="ciudad2" id="ciudad" class="form-control">
                                                <option value="">Selecciona departamento</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label class="form-label">Direccion</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->direccion; ?>" disabled>
                                            <input type="hidden" class="form-control" name="direccion" value="<?php echo $alm[0]->direccion; ?>">
                                            <input type="text" class="form-control" name="direccion2">
                                        </div>
                                    </div>

                                    <label class="form-label">Barrio</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->barrio; ?>" disabled>
                                            <input type="hidden" class="form-control" name="barrio" value="<?php echo $alm[0]->barrio; ?>">
                                            <input type="text" class="form-control" name="barrio2">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                        <h6 class="m-0 font-weight-bold text-primary">Datos de producto</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample2">
                        <div class="card-body">
                            <div class="mb-3">

                                <label class="form-label">Referencia del equipo poliedro</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->referencia_equipo; ?>" disabled>
                                        <input type="hidden" class="form-control" name="referencia_equipo" value="<?php echo $alm[0]->referencia_equipo; ?>">
                                        <input type="text" class="form-control" name="referencia_equipo2">
                                    </div>
                                </div>

                                <label class="form-label">Material</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->material; ?>" disabled>
                                        <input type="hidden" class="form-control" name="material" value="<?php echo $alm[0]->material; ?>">
                                        <input type="text" class="form-control" name="material2">
                                    </div>
                                </div>

                                <label class="form-label">Fabricante</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->fabricante; ?>" disabled>
                                        <input type="hidden" class="form-control" name="fabricante" value="<?php echo $alm[0]->fabricante; ?>">
                                        <select class="form-control" name="fabricante2">
                                            <option value="" selected>Elegir</option>
                                            <option value="ACER">ACER</option>
                                            <option value="APPLE">APPLE</option>
                                            <option value="ASUS">ASUS</option>
                                            <option value="HONOR">HONOR</option>
                                            <option value="HP">HP</option>
                                            <option value="KALLEY">KALLEY</option>
                                            <option value="LENOVO">LENOVO</option>
                                            <option value="MOTOROLA">MOTOROLA</option>
                                            <option value="NINTENDO">NINTENDO</option>
                                            <option value="OPPO">OPPO</option>
                                            <option value="PANASONIC">PANASONIC</option>
                                            <option value="SAMSUNG">SAMSUNG</option>
                                            <option value="TCL">TCL</option>
                                            <option value="TECNO">TECNO</option>
                                            <option value="VIVO">VIVO</option>
                                            <option value="XIAOMI">XIAOMI</option>
                                            <option value="SONY">SONY</option>
                                            <option value="MICROSOFT">MICROSOFT</option>
                                            <option value="HUAWEI">HUAWEI</option>
                                        </select>
                                    </div>
                                </div>

                                <label class="form-label">Valor de Equipo SIN IVA</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor; ?>" disabled>
                                        <input type="hidden" class="form-control" name="valor" value="<?php echo $alm[0]->valor; ?>">
                                        <input type="number" class="form-control" name="valor2">
                                    </div>
                                </div>

                                <label class="form-label">Valor de Equipo CON IVA</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor_iva; ?>" disabled>
                                        <input type="hidden" class="form-control" name="valor_iva" value="<?php echo $alm[0]->valor_iva; ?>">
                                        <input type="number" class="form-control" name="valor_iva2">
                                    </div>
                                </div>

                                <label class="form-label">Cliente fuera de base</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->referido; ?>" disabled>
                                        <input type="hidden" class="form-control" name="referido" value="<?php echo $alm[0]->referido; ?>">
                                        <select name="referido2" class="form-control">
                                            <option value="">elegir</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="form-label">Franja horaria recomendada</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->franja; ?>" disabled>
                                        <input type="hidden" class="form-control" name="franja" value="<?php echo $alm[0]->franja; ?>">
                                        <select name="franja2" class="form-control">
                                            <option value="">elegir</option>
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card shadow mb-4">

                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Estado de la Venta</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample">
                        <div class="card-body">
                            <label class="form-label">Fecha de entrega</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <?php if (isset($alm[0]->fecha_entrega)) { ?>
<?php
$fecha000 = date("d/m/Y", strtotime($alm[0]->fecha_entrega));
?>
                                        <input type="text" class="form-control" value="<?php echo $fecha000; ?>" disabled>
                                        <input type="hidden" class="form-control" name="fecha_entrega" value="<?php echo $alm[0]->fecha_entrega; ?>">
                                        <input type="date" class="form-control" name="fecha_entrega2" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } else { ?>
                                        <input type="date" class="form-control" name="fecha_entrega2" required <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } ?>
                                </div>
                            </div>
                            <label class="form-label">CUSCODE</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                <?php if (isset($alm[0]->cuscode)) { ?>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->cuscode; ?>" disabled>
                                    <input type="hidden" class="form-control" name="cuscode" value="<?php echo $alm[0]->cuscode; ?>">
                                    <input type="text" class="form-control" name="cuscode2" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php  } else { ?>
                                        <input type="text" class="form-control" name="cuscode2" required <?php  if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } ?>
                                </div>
                            </div>

                            <label class="form-label">Numero de Reserva</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                <?php if (isset($alm[0]->reserva)) { ?>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->reserva; ?>" disabled>
                                    <input type="hidden" class="form-control" name="reserva" value="<?php echo $alm[0]->reserva; ?>">
                                    <input type="text" class="form-control" name="reserva2" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" name="reserva2" required <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } ?>
                                </div>
                            </div>
                            <label class="form-label">Estado de poliedro</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                <?php if (isset($alm[0]->estados_2)) { ?>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->estados_2; ?>" disabled>
                                    <input type="hidden" class="form-control" name="estados_2" value="<?php echo $alm[0]->estados_2; ?>">
                                        <select name="estados_22" id="" class="form-control" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                            <option value="">seleccione</option>
                                            <option value="ACTIVA">ACTIVA</option>
                                            <option value="ANULADA">ANULADA</option>
                                            <option value="TRÁMITADA">TRÁMITADA</option>
                                            <option value="INCOMPLETA">INCOMPLETA</option>
                                        </select>
                                     <?php } else{ ?>
                                        <select name="estados_22" id="" class="form-control" required <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                            <option value="N/A">Sin estado</option>
                                            <option value="ACTIVA">ACTIVA</option>
                                            <option value="ANULADA">ANULADA</option>
                                            <option value="TRÁMITADA">TRÁMITADA</option>
                                            <option value="INCOMPLETA">INCOMPLETA</option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>er es
                            <label class="form-label">Radicado</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                <?php if (isset($alm[0]->tramitado)) { ?>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tramitado; ?>" disabled>
                                    <input type="hidden" class="form-control" name="tramitado" value="<?php echo $alm[0]->tramitado; ?>">
                                    <input type="number" class="form-control" name="tramitado2" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } else { ?>
                                        <input type="number" class="form-control" name="tramitado2" required <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                    <?php } ?>
                                </div>
                            </div>

                            <label class="form-label">Estado Notus</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                <?php if (isset($alm[0]->notus)) { ?>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->notus; ?>" disabled>
                                    <input type="hidden" class="form-control" name="notus" value="<?php echo $alm[0]->notus; ?>">
                                        <select name="notus2" id="" class="form-control" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                            <option value="">seleccione</option>
                                            <option value="CONFIRMADO RESERVA TRAMITADA">CONFIRMADO RESERVA TRAMITADA</option>
                                            <option value="CONFIRMADO">CONFIRMADO</option>
                                            <option value="ASIGNADO A RUTA">ASIGNADO A RUTA</option>
                                            <option value="DESPACHADO CON CAMBIO">DESPACHADO CON CAMBIO</option>
                                            <option value="DESPACHADO">DESPACHADO</option>
                                            <option value="DEVOLUCION SOLICITADA">DEVOLUCION SOLICITADA</option>
                                            <option value="PENDIENTE CIERRE">PENDIENTE CIERRE</option>
                                            <option value="VISITA FALLIDA">VISITA FALLIDA</option>
                                            <option value="CERRADO">CERRADO</option>
                                            <option value="ENTREGADO">ENTREGADO</option>
                                            <option value="LEGALIZADO">LEGALIZADO</option>
                                            <option value="TRANSITO">TRANSITO</option>

                                        </select>
                                     <?php }else{ ?>
                                        <select name="notus2" id="" class="form-control" required <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                            <option value="N/A">Sin estado</option>
                                            <option value="CONFIRMADO RESERVA TRAMITADA">CONFIRMADO RESERVA TRAMITADA</option>
                                            <option value="CONFIRMADO">CONFIRMADO</option>
                                            <option value="ASIGNADO A RUTA">ASIGNADO A RUTA</option>
                                            <option value="DESPACHADO CON CAMBIO">DESPACHADO CON CAMBIO</option>
                                            <option value="DESPACHADO">DESPACHADO</option>
                                            <option value="DEVOLUCION SOLICITADA">DEVOLUCION SOLICITADA</option>
                                            <option value="PENDIENTE CIERRE">PENDIENTE CIERRE</option>
                                            <option value="VISITA FALLIDA">VISITA FALLIDA</option>
                                            <option value="CERRADO">CERRADO</option>
                                            <option value="ENTREGADO">ENTREGADO</option>
                                            <option value="LEGALIZADO">LEGALIZADO</option>
                                            <option value="TRANSITO">TRANSITO</option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>
                            <label class="form-label">Estado CRM</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->estado; ?>" disabled>
                                    <input type="hidden" class="form-control" name="estado" value="<?php echo $alm[0]->estado; ?>">
                                        <select name="estado2" id="detalles" class="form-control" <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3){ echo ""; }else{ echo "disabled"; } ?>>
                                            <option value="">Selecciona</option>
                                            <!-- <option value="ACTIVA">ACTIVA</option> -->
                                            <option value="ANULADA">ANULADA</option>
                                            <!-- <option value="ASIGNADO A RUTA">ASIGNADO A RUTA</option> -->
                                            <option value="AUDITADA">AUDITADA</option>
                                            <option value="CANTADA">CANTADA</option>
                                            <!-- <option value="CERRADO">CERRADO</option> -->
                                            <!-- <option value="CONFIRMADO">CONFIRMADO</option> -->
                                            <!-- <option value="DESPACHADO">DESPACHADO</option> -->
                                            <!-- <option value="DEVOLUCION SOLICITADA">DEVOLUCION SOLICITADA</option> -->
                                            <option value="DIGITADA">DIGITADA</option>
                                            <!-- <option value="ENTREGADO">ENTREGADO</option> -->
                                            <!-- <option value="INCOMPLETA">INCOMPLETA</option> -->
                                            <!-- <option value="LEGALIZADO">LEGALIZADO</option> -->
                                            <option value="PENDIENTE">PENDIENTE</option>
                                            <!-- <option value="PENDIENTE DE CIERRE">PENDIENTE DE CIERRE</option> -->
                                            <option value="RECHAZADA">RECHAZADA</option>
                                            <!-- <option value="RESERVA TRAMITADA">RESERVA TRAMITADA</option> -->
                                            <!-- <option value="TRANSITO">TRANSITO</option> -->
                                            <!-- <option value="TRÁMITADA">TRÁMITADA</option> -->
                                            <!-- <option value="VISITA FALLIDA">VISITA FALLIDA</option> -->
                                        </select>
                                </div>
                            </div>

                            <label class="form-label">Sub-estado</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->detalles; ?>" disabled>
                                    <input type="hidden" class="form-control" name="detalles" value="<?php echo $alm[0]->detalles; ?>">
                                    <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3) { ?>
                                        <select id="subestados" name="detalles2" class="form-control">
                                            <option value="">Selecciona un Estado</option>
                                        </select>
                                    <?php } ?>

                                </div>
                            </div>

                            <?php if ($alm[0]->estado == "RECUPERADA") { ?>
                                <label class="form-label">Comentarios de Recuperacion</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <textarea class="form-control" disabled rows="5" cols="29"><?php echo $alm[0]->comentario; ?></textarea>
                                        <input type="hidden" class="form-control" name="comentario" value="<?php echo $alm[0]->comentario; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            <input type="hidden" class="form-control" name="comentario" value="<?php echo $alm[0]->comentario; ?>">


                            <?php if ($alm[0]->estado == "RECHAZADA") {
                                if ($_SESSION['permiso'] == 5 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 2) { ?>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <label class="form-label">Recuperar Venta</label>
                                        <input type="checkbox" id="miCheckbox" name="estado3" class="form-control" value="RECUPERADA" onchange="handleChange()" <?php if ($_SESSION['permiso'] == 5 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 2) {
                                                                                                                                                                    echo "";
                                                                                                                                                                } else {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                } ?>>
                                    </div>

                                    <label class="form-label">Comentarios de Recuperacion</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <textarea class="form-control" name="comentario2" rows="5" cols="29"><?php echo $alm[0]->comentario ?></textarea>
                                        </div>
                                    </div>
                            <?php }
                            }  ?>

                            <?php if ($alm[0]->usuario_modificado != "") { ?>
<?php
$fecha0 = date("d/m/Y H:i:s", strtotime($alm[0]->ultima_modificacion));
?>
                                <label class="form-label">Ultima Actualizacion</label>
                                <input type="text" class="form-control" value="<?php echo $fecha0
                                                                                ?>" disabled>

                                <label class="form-label">Ultima Actualizacion</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->usuario_modificado
                                                                                ?>" disabled>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">
                        <h6 class="m-0 font-weight-bold text-primary">Datos de Venta</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample3">
                        <div class="card-body">

                            <label class="form-label">N° grabacion de contrato</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->numero_grabacion_contrato; ?>" disabled>
                                    <input type="hidden" class="form-control" name="numero_grabacion_contrato" value="<?php echo $alm[0]->numero_grabacion_contrato; ?>">
                                    <input type="number" class="form-control" name="numero_grabacion_contrato2">
                                </div>
                            </div>

                            <label class="form-label">Tipo de Contrato</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_contrato; ?>" disabled>
                                    <input type="hidden" class="form-control" name="tipo_contrato" value="<?php echo $alm[0]->tipo_contrato; ?>">
                                    <select class="form-control" name="tipo_contrato2">
                                        <option value="" selected>Elegir</option>
                                        <option value="DIGITAL">DIGITAL</option>
                                        <option value="GRABADO">GRABADO</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Numero de Cuenta para la Compra</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cuenta_venta; ?>" disabled>
                                    <input type="hidden" class="form-control" name="numero_cuenta_venta" value="<?php echo $alm[0]->numero_cuenta_venta; ?>">
                                    <input type="number" class="form-control" name="numero_cuenta_venta2">
                                </div>
                            </div>

                            <label class="form-label">Tipo de Venta</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_venta; ?>" disabled>
                                    <input type="hidden" class="form-control" name="tipo_venta" value="<?php echo $alm[0]->tipo_venta; ?>">
                                    <select class="form-control" name="tipo_venta2" id="tipoVenta" onchange="mostrarCampotipoventa()">
                                        <option value="" selected>Elegir</option>
                                        <option value="Tecnologia">Tecnologia</option>
                                        <option value="Terminales">Terminales</option>
                                    </select>
                                </div>
                            </div>
                            <div id="campoVenta" style="display: none;">
                                <label for="tipoCE" class="form-label">Tipo de Terminal</label>
                                <select name="tipo_venta2_2" id="tipoCE" class="form-control">
                                    <!-- <option value="N.A">No Aplica</option> -->
                                    <option value="Claro Up">Claro Up</option>
                                    <option value="Claro Lite">Claro Lite</option>
                                </select>
                            </div>
                            <label class="form-label">Estado terminal CLARO activado</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="activo" value="<?php echo $alm[0]->activo; ?>">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->activo; ?>" disabled>
                                    <select class="form-control" name="activo2" id="tipoVenta2">
                                        <option value="" selected>Elegir</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Medio De Pago</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->medio_pago; ?>" disabled>
                                    <input type="hidden" class="form-control" name="medio_pago" value="<?php echo $alm[0]->medio_pago; ?>">
                                    <select class="form-control" name="medio_pago2" id="tipoVenta" onchange="mostrarCampotipoventa()">
                                        <option value="" selected>Elegir</option>
                                        <option value="Financiado Factura Hogar">Financiado Factura Hogar</option>
                                        <option value="Financiado Factura Postpago">Financiado Factura Postpago</option>
                                        <option value="Pin de pago">Pin de pago</option>
                                        <option value="Cuota Inicial">Cuota Inicial</option>
                                        <option value="Venta Asistida">Venta Asistida</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Tipo de Validacion</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion; ?>" disabled>
                                    <input type="hidden" class="form-control" name="tipo_validacion" value="<?php echo $alm[0]->tipo_validacion; ?>">
                                    <select class="form-control" name="tipo_validacion2">
                                        <option value="" selected>Elegir</option>
                                        <option value="OTP INTERNO">OTP INTERNO</option>
                                        <option value="ID VISION">ID VISION</option>
                                        <option value="BIOMETRICA FACIAL">BIOMETRICA FACIAL</option>
                                        <option value="NO APLICA">NO APLICA</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Tipo de Validacion secundaria</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion_sec; ?>" disabled>
                                    <input type="hidden" class="form-control" name="tipo_validacion_sec" value="<?php echo $alm[0]->tipo_validacion_sec; ?>">
                                    <select class="form-control" name="tipo_validacion_sec2">
                                        <option value="" selected>Elegir</option>
                                        <option value="N.A">NO APLICA</option>
                                        <option value="OTP INTERNO">OTP INTERNO</option>
                                        <option value="ID VISION">ID VISION</option>
                                        <option value="BIOMETRICA FACIAL">BIOMETRICA FACIAL</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Meses a Diferir</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->meses_diferir; ?>" disabled>
                                    <input type="hidden" class="form-control" name="meses_diferir" value="<?php echo $alm[0]->meses_diferir; ?>">
                                    <select class="form-control" name="meses_diferir2">
                                        <option value="" selected>Elegir</option>
                                        <option value="6">6</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Valor Cuota Inicial</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->valor_cuota_inicial; ?>" disabled>
                                    <input type="hidden" class="form-control" name="valor_cuota_inicial" value="<?php echo $alm[0]->valor_cuota_inicial; ?>">
                                    <input type="number" class="form-control" name="valor_cuota_inicial2">
                                </div>
                            </div>

                            <label class="form-label">Valor Cuota Mensual</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->valor_cuota_mensual; ?>" disabled>
                                    <input type="hidden" class="form-control" name="valor_cuota_mensual" value="<?php echo $alm[0]->valor_cuota_mensual; ?>">
                                    <input type="number" class="form-control" name="valor_cuota_mensual2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample4">
                        <h6 class="m-0 font-weight-bold text-primary">Evidencias y Comentarios</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample4">
                        <div class="card-body">
                            <div class="container5">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            <h4>Observaciones</h4>
                                        </label>
                                        <textarea class="form-control" rows="6" name="observaciones"><?php echo $alm[0]->observaciones ?></textarea>

                                        <br>

                                        <label class="form-label">VALIDACION DE OTP</label>
                                        <div class="form-group">
                                            <div class="input-group" style="display: flex; justify-content: space-between; align-items: center;">
                                                <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen" style="width:35%">
                                                    VISUALIZAR
                                                </a>
                                                <input name="link" id="link" type="hidden" value="<?php echo $alm[0]->link ?>">
                                                <input class="btn btn-primary btn-icon-split btn-lg" name="link_2" id="link_2" type="file" accept="image/*" style="width:60%">
                                            </div>
                                        </div>

                                        <label class="form-label">VALIDACION DOBLE DE IDENTIDAD</label>
                                        <div class="form-group">
                                            <div class="input-group" style="display: flex; justify-content: space-between; align-items: center;">
                                                <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen2" style="width:35%">
                                                    VISUALIZAR
                                                </a>
                                                <input name="link2" id="link2" type="hidden" value="<?php echo $alm[0]->link2 ?>">
                                                <input class="btn btn-primary btn-icon-split btn-lg" name="link2_2" id="link2_2" type="file" accept="image/*" style="width:60%">
                                            </div>
                                        </div>

                                        <label class="form-label">CONSULTA DE CREDITOS</label>
                                        <div class="form-group">
                                            <div class="input-group" style="display: flex; justify-content: space-between; align-items: center;">
                                                <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen3" style="width:35%">
                                                    VISUALIZAR
                                                </a>
                                                <input name="link3" id="link3" type="hidden" value="<?php echo $alm[0]->link3 ?>">
                                                <input class="btn btn-primary btn-icon-split btn-lg" name="link3_2" id="link3_2" type="file" accept="image/*" style="width:60%">
                                            </div>
                                        </div>

                                        <!-- El Modal -->
                                        <div class="modal fade" id="imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE OTP</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/img/evidencia_tyt/<?php echo $alm[0]->link;
                                                                                                                ?>" alt="Evidencia">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- El Modal -->
                                        <div class="modal fade" id="imagen2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">VALIDACION DOBLE DE IDENTIDAD</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/img/evidencia_tyt/<?php echo $alm[0]->link2;
                                                                                                                ?>" alt="Evidencia">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- El Modal -->
                                        <div class="modal fade" id="imagen3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">CONSULTA DE CREDITOS</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/img/evidencia_tyt/<?php echo $alm[0]->link3;
                                                                                                                ?>" alt="Evidencia">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="views/portabilidad/asesor/reporte/pais/peticiones.js"></script>
    <script src="views/tyt/administrativo/venta/estado/estado.js"></script>

    <script>
        function mostrarCampoCedula() {
            var tipoCedula = document.getElementById("tipoCedula").value;
            var campoCE = document.getElementById("campoCedulaCE");
            var campoTipoCE = document.getElementById("tipoCE");

            if (tipoCedula === "CEDULA DE CIUDADANIA") {
                campoCE.style.display = "none";
            } else if (tipoCedula === "CEDULA DE EXTRANJERIA") {
                campoCE.style.display = "block";
            }
        }
        document.getElementById("tipoCedula").addEventListener("change", mostrarCampoCedula);

        function actualizar() {
            var tipo_via = document.getElementById("tipo_via").value;
            var via_principal = document.getElementById("via_principal").value;
            var letra_1 = document.getElementById("letra_1").value;
            var prefijo_1 = document.getElementById("prefijo_1").value;
            var letra_2 = document.getElementById("letra_2").value;
            var cuadrante = document.getElementById("cuadrante").value;
            var via_generadora = document.getElementById("via_generadora").value;
            var letra_3 = document.getElementById("letra_3").value
            var prefijo_2 = document.getElementById("prefijo_2").value;
            var numero_placa = document.getElementById("numero_placa").value;
            var cuadrante_2 = document.getElementById("cuadrante_2").value;
            var nomenclatura = document.getElementById("nomenclatura").value;

            var direccion = tipo_via + " " + via_principal + letra_1 + " " + prefijo_1 + " " + letra_2 + " " + cuadrante + " " + via_generadora +
                " " + letra_3 + " " + prefijo_2 + " " + numero_placa + " " + cuadrante_2 + " " + nomenclatura;
            document.getElementById("direccion").value = direccion;
        }

        function handleChange() {
            var checkbox = document.getElementById("miCheckbox");
            var valor = checkbox.checked ? "RECUPERADA" : null;
            console.log("Valor actual del checkbox:", valor);
        }

        function mostrarCampotipoventa() {
            var tipoVenta = document.getElementById("tipoVenta").value;
            var campoVenta = document.getElementById("campoVenta");
            var campoVenta2 = document.getElementById("campoVenta2");

            if (tipoVenta === "Terminales") {
                campoVenta.style.display = "block";

            } else {
                campoVenta.style.display = "none";

            }
        }
    </script>