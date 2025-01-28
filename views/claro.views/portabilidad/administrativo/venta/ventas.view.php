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
<form method="post" action="?p=claro&c=Back_porta&a=save_porta" enctype="multipart/form-data">
    <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 4) { ?>

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

                                    <label class="form-label">Nombres del cliente</label>
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
                                    <?php
                                    $fecha = date("d/m/Y", strtotime($alm[0]->fecha_nacimiento));
                                    $fecha2 = date("d/m/Y", strtotime($alm[0]->fecha_expedicion));
                                    ?>
                                    <label class="form-label">Fecha de nacimiento</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $fecha; ?>" disabled>
                                            <input type="hidden" class="form-control" name="fecha_nacimiento" value="<?php echo $alm[0]->fecha_nacimiento; ?>">
                                            <input type="date" class="form-control" name="fecha_nacimiento2" value="">
                                        </div>
                                    </div>

                                    <label class="form-label">Fecha de expedicion</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $fecha2; ?>" disabled>
                                            <input type="hidden" class="form-control" name="fecha_expedicion" value="<?php echo $alm[0]->fecha_expedicion; ?>">
                                            <input type="date" class="form-control" name="fecha_expedicion2">
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


                                    <label class="form-label">Referido</label>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?php echo $alm[0]->referido; ?>" disabled>
                                            <input type="hidden" class="form-control" name="referido" value="<?php echo $alm[0]->referido; ?>">
                                            <select id="referido" name="referido2" class="form-control">
                                                <option value="">Selecciona</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
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
                        <h6 class="m-0 font-weight-bold text-primary">Direccion Cliente </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample2">
                        <div class="card-body">
                            <div class="mb-3">

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

                                <label class="form-label">Operador</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->operador; ?>" disabled>
                                        <input type="hidden" class="form-control" name="operador" value="<?php echo $alm[0]->operador; ?>">
                                        <select name="operador2" id="operador" class="form-control">
                                            <option value="">Selecciona ciudad</option>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                $fecha3 = date("d/m/Y", strtotime($alm[0]->dias));
                                $fecha4 = date("d/m/Y", strtotime($alm[0]->ventana_cambio));
                                ?>
                                <label class="form-label">Día hábil de entrega</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo $fecha3; ?>" disabled>
                                        <input type="hidden" class="form-control" name="dias" value="<?php echo $alm[0]->dias; ?>">
                                        <input type="date" class="form-control" name="dias2" value="">
                                    </div>
                                </div>

                                <label class="form-label">Día de Ventana de Cambios</label>
                                <div class="form-group" style="display: flex; align-items: center;">
                                    <div class="input-group">
                                        <?php if (isset($alm[0]->ventana_cambio)) { ?>
                                            <input type="text" class="form-control" value="<?php echo $fecha4; ?>" disabled>
                                            <input type="hidden" class="form-control" name="ventana_cambio" value="<?php echo $alm[0]->ventana_cambio; ?>">
                                            <input type="date" class="form-control" name="ventana_cambio2" value="">
                                        <?php } else { ?>
                                            <input type="date" class="form-control" name="ventana_cambio2" value="" required>
                                        <?php } ?>

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
            <div class="card shadow mb-4">
                <div class="card shadow mb-4">

                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Estado de la Venta</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample">
                        <div class="card-body">

                            <label class="form-label">Estado</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->estado; ?>" disabled>
                                    <input type="hidden" class="form-control" name="estado" value="<?php echo $alm[0]->estado; ?>">
                                    <?php if ($_SESSION['permiso'] == 2 || $_SESSION['permiso'] == 3) {
                                    ?>
                                        <select name="estado2" id="detalles" class="form-control">
                                            <option value="">Selecciona</option>
                                            <option value="ACTIVA">ACTIVA</option>
                                            <option value="AUDITADA">AUDITADA</option>
                                            <option value="CANTADA">CANTADA</option>
                                            <option value="DESACTIVA">DESACTIVA</option>
                                            <option value="DEVUELTA ABD">DEVUELTA ABD</option>
                                            <option value="DIGITAL">DIGITAL</option>
                                            <option value="ENVIADA AL ABD">ENVIADA AL ABD</option>
                                            <option value="EXITOSA">EXITOSA</option>
                                            <option value="LEGALIZADA">LEGALIZADA</option>
                                            <option value="PENDIENTE">PENDIENTE</option>
                                            <option value="RECHAZADA">RECHAZADA</option>
                                        </select>

                                    <?php  }
                                    ?>
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
                                    </div>
                                </div>
                            <?php } ?>
                            <input type="hidden" class="form-control" name="comentario" value="<?php echo $alm[0]->comentario; ?>">

                            <?php if ($alm[0]->estado == "RECHAZADA" || $alm[0]->estado == "DEVUELTA ABD" || $alm[0]->estado == "PENDIENTE") { ?>
                                <?php if ($_SESSION['permiso'] == 4 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 2) { ?>

                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <label class="form-label">Recuperar Venta</label>
                                        <input type="checkbox" id="miCheckbox" name="estado3" class="form-control" value="RECUPERADA" onchange="handleChange()" <?php if ($_SESSION['permiso'] == 4 || $_SESSION['permiso'] == 3 || $_SESSION['permiso'] == 2) {
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
                                <?php } ?>
                            <?php } ?>

                            <?php if ($alm[0]->usuario_modificado != "") { ?>
                                <?php
                                $fecha0 = date("d/m/Y H:i:s", strtotime($alm[0]->ultima_modificacion));
                                ?>
                                <label class="form-label">Ultima Actualizacion</label>
                                <input type="text" class="form-control" value="<?php echo $fecha0; ?>" disabled>

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
                        <h6 class="m-0 font-weight-bold text-primary">Datos de Venta </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample3">
                        <div class="card-body">

                            <label class="form-label">Tipo de Solicitud</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_solicitud; ?>" disabled>
                                    <input type="hidden" class="form-control" name="tipo_solicitud" value="<?php echo $alm[0]->tipo_solicitud; ?>">
                                    <select class="form-control" name="tipo_solicitud2">
                                        <option value="" selected>Elegir</option>
                                        <option value="PORTABILIDAD">PORTABILIDAD</option>
                                        <option value="MIGRACION">MIGRACION</option>
                                        <option value="LINEA NUEVA">LINEA NUEVA</option>
                                    </select>
                                </div>
                            </div>

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
                                    <?php if (isset($alm[0]->tipo_contrato)) { ?>
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_contrato; ?>" disabled>
                                        <input type="hidden" class="form-control" name="tipo_contrato" value="<?php echo $alm[0]->tipo_contrato; ?>">
                                        <select class="form-control" name="tipo_contrato2">
                                            <option value="" selected>Elegir</option>
                                            <option value="DIGITAL">DIGITAL</option>
                                            <option value="GRABADO">GRABADO</option>
                                        </select>
                                    <?php } else { ?>
                                        <select class="form-control" name="tipo_contrato2" required>
                                            <option value="" selected>Elegir</option>
                                            <option value="DIGITAL">DIGITAL</option>
                                            <option value="GRABADO">GRABADO</option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>

                            <label class="form-label"> MIN</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->min; ?>" disabled>
                                    <input type="hidden" class="form-control" name="min" value="<?php echo $alm[0]->min; ?>">
                                    <input type="number" class="form-control" name="min2">
                                </div>
                            </div>

                            <label class="form-label">Codigo del Plan</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->codigo_plan; ?>" disabled>
                                    <input type="hidden" class="form-control" name="codigo_plan" value="<?php echo $alm[0]->codigo_plan; ?>">
                                    <input type="number" class="form-control" name="codigo_plan2">
                                </div>
                            </div>

                            <label class="form-label">Valor del plan sin IVA</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->valor; ?>" disabled>
                                    <input type="hidden" class="form-control" name="valor" value="<?php echo $alm[0]->valor; ?>">
                                    <input type="number" class="form-control" name="valor2">
                                </div>
                            </div>

                            <label class="form-label">Valor del plan con IVA</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->valor_iva; ?>" disabled>
                                    <input type="hidden" class="form-control" name="valor_iva" value="<?php echo $alm[0]->valor_iva; ?>">
                                    <input type="number" class="form-control" name="valor_iva2">
                                </div>
                            </div>

                            <label class="form-label">Descuento</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->descuento; ?>" disabled>
                                    <input type="hidden" class="form-control" name="descuento" value="<?php echo $alm[0]->descuento; ?>">
                                    <input type="text" class="form-control" name="descuento2">
                                </div>
                            </div>

                            <label class="form-label">Operador Donante</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->operador_donante; ?>" disabled>
                                    <input type="hidden" class="form-control" name="operador_donante" value="<?php echo $alm[0]->operador_donante; ?>">
                                    <select class="form-control" name="operador_donante2">
                                        <option value="" selected>Elegir</option>
                                        <option value="OPE_2">OPE_2</option>
                                        <option value="OPE_3">OPE_3</option>
                                        <option value="OPE_4">OPE_4</option>
                                        <option value="CP_2">CP_2</option>
                                        <option value="CP_3">CP_3</option>
                                        <option value="CP_5">CP_5</option>
                                        <option value="CLARO">CLARO</option>

                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Estado lineal de operador Donante</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->estado_actual_operador_donante; ?>" disabled>
                                    <input type="hidden" class="form-control" name="estado_actual_operador_donante" value="<?php echo $alm[0]->estado_actual_operador_donante; ?>">
                                    <select class="form-control" name="estado_actual_operador_donante2">
                                        <option value="" selected>Elegir</option>
                                        <option value="POSTPAGO">POSTPAGO</option>
                                        <option value="PREPAGO">PREPAGO</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">Detalles del plan</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->detalles_plan; ?>" disabled>
                                    <input type="hidden" class="form-control" name="detalles_plan" value="<?php echo $alm[0]->detalles_plan; ?>">
                                    <input type="text" class="form-control" name="detalles_plan2">
                                </div>
                            </div>

                            <label class="form-label">NIP</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->nip; ?>" disabled>
                                    <input type="hidden" class="form-control" name="nip" value="<?php echo $alm[0]->nip; ?>">
                                    <input type="number" class="form-control" name="nip2">
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
                                    </select>
                                </div>
                            </div>
                            <label class="form-label">Tipo de Venta</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <?php if (isset($alm[0]->venta_tp)) { ?>
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->venta_tp; ?>" disabled>
                                        <input type="hidden" class="form-control" name="venta_tp" value="<?php echo $alm[0]->venta_tp; ?>">
                                        <select class="form-control" name="venta_tp2">
                                            <option value="" selected>Elegir</option>
                                            <option value="PLANTA">PLANTA</option>
                                            <option value="SEMILLEROS">SEMILLEROS</option>
                                        </select>
                                    <?php } else { ?>
                                        <select class="form-control" name="venta_tp2" required>
                                            <option value="" selected>Elegir</option>
                                            <option value="PLANTA">PLANTA</option>
                                            <option value="SEMILLEROS">SEMILLEROS</option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>

                            <label class="form-label">SIM</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->sim; ?>" disabled>
                                    <input type="hidden" class="form-control" name="sim" value="<?php echo $alm[0]->sim; ?>">
                                    <select class="form-control" name="sim2">
                                        <option value="">Elegir</option>
                                        <option value="ENVIADA">ENVIADA</option>
                                        <option value="COMPRADA">COMPRADA</option>
                                    </select>
                                </div>
                            </div>

                            <label class="form-label">N° serial de SIM</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <?php if (isset($alm[0]->numero_sim)) { ?>
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->numero_sim; ?>" disabled>
                                        <input type="hidden" class="form-control" name="numero_sim" value="<?php echo $alm[0]->numero_sim; ?>">
                                        <input type="number" class="form-control" name="numero_sim2">
                                    <?php } else { ?>
                                        <input type="number" class="form-control" name="numero_sim2" required>
                                    <?php } ?>

                                </div>
                            </div>

                            <label class="form-label">N° MIN SIM comprada</label>
                            <div class="form-group" style="display: flex; align-items: center;">
                                <div class="input-group">
                                    <?php if (isset($alm[0]->numero_min_sim)) { ?>
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->numero_min_sim; ?>" disabled>
                                        <input type="hidden" class="form-control" name="numero_min_sim" value="<?php echo $alm[0]->numero_min_sim; ?>">
                                        <input type="number" class="form-control" name="numero_min_sim2">
                                    <?php } else { ?>
                                        <input type="number" class="form-control" name="numero_min_sim2" required>
                                    <?php } ?>
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
                        <h6 class="m-0 font-weight-bold text-primary">Comentarios del Asesor </h6>
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

                                        <label class="form-label">VALIDACION DE IDENTIDAD</label>
                                        <div class="form-group">
                                            <div class="input-group" style="display: flex; justify-content: space-between; align-items: center;">
                                                <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen" style="width:35%">
                                                    VISUALIZAR
                                                </a>
                                                <input name="link" id="link" type="hidden" value="<?php echo $alm[0]->link ?>">
                                                <input class="btn btn-primary btn-icon-split btn-lg" name="link_2" id="link_2" type="file" accept="image/*" style="width:60%">
                                            </div>
                                        </div>

                                        <label class="form-label">VALIDACION DE CREDITOS</label>
                                        <div class="form-group">
                                            <div class="input-group" style="display: flex; justify-content: space-between; align-items: center;">
                                                <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen2" style="width:35%">
                                                    VISUALIZAR
                                                </a>
                                                <input name="link2" id="link2" type="hidden" value="<?php echo $alm[0]->link2 ?>">
                                                <input class="btn btn-primary btn-icon-split btn-lg" name="link2_2" id="link2_2" type="file" accept="image/*" style="width:60%">
                                            </div>
                                        </div>

                                        <!-- El Modal -->
                                        <div class="modal fade" id="imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE IDENTIDAD</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/img/evidencia_portabilidad/<?php echo $alm[0]->link;
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
                                                        <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE CREDITOS</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/img/evidencia_portabilidad/<?php echo $alm[0]->link2;
                                                                                                                        ?>" alt="Evidencia">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- El Modal -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="views/claro.views/portabilidad/asesor/reporte/pais/peticiones.js"></script>
<script src="views/claro.views/portabilidad/administrativo/venta/estado/estado.js"></script>

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
</script>