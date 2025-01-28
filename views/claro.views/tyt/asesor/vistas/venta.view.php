<head>
    <title><?php echo $alm[0]->nombre_asesor ?></title>

</head>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 style="color:red;"><?php echo "Venta realizada " . $alm[0]->fecha_grabacion_contrato
                            ?></h1>
</div>

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

                                <label class="form-label">Nombres y apellidos del cliente</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->nombres
                                                                                ?>" disabled>

                                <label for="tipoCedula" class="form-label">Tipo de Documento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_cedula
                                                                                ?>" disabled>

                                <label for="numeroCC" class="form-label">Número de documento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cedula
                                                                                ?>" disabled>

                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->correo
                                                                                ?>" disabled>

                                <label class="form-label">Telefono de contacto 1</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->cel_1
                                                                                ?>" disabled>

                                <label class="form-label">Telefono de contacto 2</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->cel_2
                                                                                ?>" disabled>

                                <label class="form-label">Nombres de un tercero autorizado</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->nombres_tercero
                                                                                ?>" disabled>

                                <label class="form-label">Número de documento de un tercero autorizado</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->documento_tercero
                                                                                ?>" disabled>

                                <label class="form-label">Telefono de un tercero autorizado</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->cel_tercero
                                                                                ?>" disabled>

                                <label class="form-label">Departamento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->departamento
                                                                                ?>" disabled>

                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->ciudad
                                                                                ?>" disabled>

                                <label class="form-label">Direccion</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->direccion
                                                                                ?>" disabled>

                                <label class="form-label">Barrio</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->barrio
                                                                                ?>" disabled>


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
                    <h6 class="m-0 font-weight-bold text-primary">Datos de Producto</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <div class="mb-3">

                            <label class="form-label">Datos de Producto</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->referencia_equipo
                                                                            ?>" disabled>

                            <label class="form-label">Material</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->material
                                                                            ?>" disabled>

                            <label class="form-label">Fabricante</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->fabricante
                                                                            ?>" disabled>

                            <label class="form-label">Valor de Equipo SIN IVA</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->valor
                                                                            ?>" disabled>

                            <label class="form-label">Valor de Equipo CON IVA</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->valor_iva
                                                                            ?>" disabled>
                            
                            <label class="form-label">Cliente fuera de base</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->referido
                                                                            ?>" disabled>

                            <label class="form-label">Franja horaria recomendada</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->franja
                                                                            ?>" disabled>
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

                    <?PHP if(isset($alm[0]->fecha_entrega)){ ?>
                        <label class="form-label">Fecha de entrega</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_entrega
                                                                        ?>" disabled>
                    <?php } ?>
                    <?PHP if(isset($alm[0]->reserva)){ ?>
                        <label class="form-label">Numero de Reserva</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->reserva
                                                                        ?>" disabled>
                    <?php } ?>
                    <?PHP if(isset($alm[0]->tramitado)){ ?>
                        <label class="form-label">Codido de tramitado</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->tramitado
                                                                        ?>" disabled>
                    <?php } ?>
                        <label class="form-label">Estado CRM</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->estado
                                                                        ?>" disabled>

                        <label class="form-label">Sub-Estado</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->detalles
                                                                        ?>" disabled>
                    <?PHP if(isset($alm[0]->estados_2)){ ?>
                        <label class="form-label">Estado de poliedro</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->estados_2
                                                                        ?>" disabled>
                    <?php } ?>
                        <?php if ($alm[0]->estado == "RECUPERADA") { ?>

                            <label class="form-label">Comentarios de Recuperacion</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->comentario
                                                                            ?>" disabled>
                        <?php } ?>

                        <?php if ($alm[0]->usuario_modificado != "") { ?>

                            <label class="form-label">Ultima Actualizacion</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->ultima_modificacion
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
                        <input type="text" class="form-control" value="<?php echo $alm[0]->numero_grabacion_contrato
                                                                        ?>" disabled>

                        <label class="form-label">Tipo de Contrato</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_contrato
                                                                        ?>" disabled>

                        <label class="form-label">Numero de Cuenta para la Compra</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cuenta_venta
                                                                        ?>" disabled>

                        <label class="form-label">Tipo de Venta</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_venta
                                                                        ?>" disabled>

                        <label class="form-label">Estado terminal CLARO activado</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->activo
                                                                        ?>" disabled>

                        <label class="form-label">Medio De Pago</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->medio_pago
                                                                        ?>" disabled>

                        <label class="form-label">Tipo de Validacion</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion
                                                                        ?>" disabled>

                            <label class="form-label">Tipo de Validacion secundaria</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion_sec
                                                                            ?>" disabled>

                        <label class="form-label">Meses a Diferir</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->meses_diferir
                                                                        ?>" disabled>

                        <label class="form-label">Valor Cuota Inicial</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor_cuota_inicial
                                                                        ?>" disabled>

                        <label class="form-label">Valor Cuota Mensual</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor_cuota_mensual
                                                                        ?>" disabled>
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
                                    <textarea class="form-control" rows="6" disabled><?php echo $alm[0]->observaciones
                                                                                        ?></textarea>
                                    <br>
                                    <label for="">EVIDENCIAS</label>
                                    <br>
                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen">
                                        VALIDACION DE OTP
                                    </a>
                                    <br>
                                    <br>

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

                                    <?php if(isset($alm[0]->link2)){ ?>
                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen2">
                                        VALIDACION DOBLE DE IDENTIDAD
                                    </a>
                                    <br>                                   
                                    <br>

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
                                    <?php } ?>

                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen3">
                                        CONSULTA DE CREDITOS
                                    </a>
                                    <div class="modal fade" id="imagen3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">VALIDACION DOBLE DE IDENTIDAD</h5>
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