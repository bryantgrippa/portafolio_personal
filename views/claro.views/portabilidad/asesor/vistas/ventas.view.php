<head>
    <title><?php echo $alm[0]->nombre_asesor ?></title>

</head>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 style="color:red;"><?php echo $alm[0]->tipo_solicitud
                            ?></h1>
</div>

<?php if ($alm[0]->tipo_solicitud == "PORTABILIDAD") { ?>

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

                                    <label class="form-label">Nombres del cliente</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->nombres
                                                                                    ?>" disabled>

                                    <label for="tipoCedula" class="form-label">Tipo de Documento</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_cedula
                                                                                    ?>" disabled>

                                    <label for="numeroCC" class="form-label">Número de documento</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cedula
                                                                                    ?>" disabled>

                                    <label class="form-label">Fecha de nacimiento</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_nacimiento
                                                                                    ?>" disabled>

                                    <label class="form-label">Fecha de expedicion</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_expedicion
                                                                                    ?>" disabled>

                                    <label class="form-label">Correo</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->correo
                                                                                    ?>" disabled>

                                    <label class="form-label">Telefono de contacto 1</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->cel_1
                                                                                    ?>" disabled>

                                    <?php if ($alm[0]->cel_2 != 0) { ?>
                                        <label class="form-label">Telefono de contacto 2</label>
                                        <input type="text" class="form-control" value="<?php echo $alm[0]->cel_2
                                                                                        ?>" disabled>
                                    <?php } ?>

                                    <label class="form-label">Referido</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->referido
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
                        <h6 class="m-0 font-weight-bold text-primary">Direccion Cliente </h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapseCardExample2">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Departamento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->departamento
                                                                                ?>" disabled>

                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->ciudad
                                                                                ?>" disabled>


                                <label class="form-label">Operador</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->operador
                                                                                ?>" disabled>

                                <label class="form-label">Día hábil de entrega</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->dias
                                                                                ?>" disabled>

                                <label class="form-label">Día Ventana de Cambio</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->ventana_cambio
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
                            <input type="text" class="form-control" value="<?php echo $alm[0]->estado
                                                                            ?>" disabled>

                            <label class="form-label">Sub-Estado</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->detalles
                                                                            ?>" disabled>

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
                        <h6 class="m-0 font-weight-bold text-primary">Datos de Venta </h6>
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

                            <label class="form-label"> MIN</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->min
                                                                            ?>" disabled>

                            <label class="form-label">Codigo del Plan</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->codigo_plan
                                                                            ?>" disabled>

                            <label class="form-label">Valor del plan sin IVA</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->valor
                                                                            ?>" disabled>

                            <label class="form-label">Valor del plan con IVA</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->valor_iva
                                                                            ?>" disabled>

                            <label class="form-label">Descuento</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->descuento
                                                                            ?>" disabled>

                            <label class="form-label">Operador Donante</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->operador_donante
                                                                            ?>" disabled>

                            <label class="form-label">Estado lineal de operador Donante</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->estado_actual_operador_donante
                                                                            ?>" disabled>

                            <label class="form-label">Detalles del plan</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->detalles_plan
                                                                            ?>" disabled>

                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->nip
                                                                            ?>" disabled>

                            <label class="form-label">Tipo de Validacion</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion
                                                                            ?>" disabled>

                            <label class="form-label">SIM</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->sim
                                                                            ?>" disabled>

                            <label class="form-label">Tipo de Venta</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->venta_tp
                                                                            ?>" disabled>

                            <label class="form-label">N° serial de SIM</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->numero_sim
                                                                            ?>" disabled>

                            <label class="form-label">N° MIN SIM comprada</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->numero_min_sim
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
                                        <textarea class="form-control" rows="6" disabled><?php echo $alm[0]->observaciones
                                                                                            ?></textarea>
                                        <br>
                                        <label for="">EVIDENCIAS</label>
                                        <br>
                                        <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen">
                                            VALIDACION DE IDENTIDAD
                                        </a>
                                        <br>
                                        <br>

                                        <!-- El Modal -->
                                        <div class="modal fade" id="imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE IDENTIDAD</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/claro/img/evidencia_portabilidad/<?php echo $alm[0]->link;
                                                                                                                        ?>" alt="Evidencia">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen2">
                                            VALIDACION DE CREDITOS
                                        </a>

                                        <!-- El Modal -->
                                        <div class="modal fade" id="imagen2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE CREDITOS</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid" src="assets/claro/img/evidencia_portabilidad/<?php echo $alm[0]->link2;
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
<?php } ?>

<?php if ($alm[0]->tipo_solicitud == "MIGRACION") { ?>

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

                                <label class="form-label">Nombres del cliente</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->nombres
                                                                                ?>" disabled>

                                <label for="tipoCedula" class="form-label">Tipo de Documento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_cedula
                                                                                ?>" disabled>

                                <label for="numeroCC" class="form-label">Número de documento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cedula
                                                                                ?>" disabled>

                                <label class="form-label">Fecha de nacimiento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_nacimiento
                                                                                ?>" disabled>

                                <label class="form-label">Fecha de expedicion</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_expedicion
                                                                                ?>" disabled>

                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->correo
                                                                                ?>" disabled>

                                <label class="form-label">Telefono de contacto 1</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->cel_1
                                                                                ?>" disabled>

                                <?php if ($alm[0]->cel_2 != 0) { ?>
                                    <label class="form-label">Telefono de contacto 2</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->cel_2
                                                                                    ?>" disabled>
                                <?php } ?>

                                <label class="form-label">Referido</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->referido
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
                    <h6 class="m-0 font-weight-bold text-primary">Direccion Cliente </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Departamento</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->departamento
                                                                            ?>" disabled>

                            <label class="form-label">Ciudad</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->ciudad
                                                                            ?>" disabled>


                            <label class="form-label">Operador</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->operador
                                                                            ?>" disabled>

                            <label class="form-label">Día hábil de entrega</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->dias
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
                        <input type="text" class="form-control" value="<?php echo $alm[0]->estado
                                                                        ?>" disabled>

                        <label class="form-label">Sub-Estado</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->detalles
                                                                        ?>" disabled>

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
                    <h6 class="m-0 font-weight-bold text-primary">Datos de Venta </h6>
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

                        <label class="form-label"> MIN</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->min
                                                                        ?>" disabled>

                        <label class="form-label">Codigo del Plan</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->codigo_plan
                                                                        ?>" disabled>

                        <label class="form-label">Valor del plan sin IVA</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor
                                                                        ?>" disabled>

                        <label class="form-label">Valor del plan con IVA</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor_iva
                                                                        ?>" disabled>

                        <label class="form-label">Descuento</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->descuento
                                                                        ?>" disabled>

                        <label class="form-label">Operador Donante</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->operador_donante
                                                                        ?>" disabled>

                        <label class="form-label">Estado lineal de operador Donante</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->estado_actual_operador_donante
                                                                        ?>" disabled>

                        <label class="form-label">Detalles del plan</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->detalles_plan
                                                                        ?>" disabled>

                        <label class="form-label">Tipo de Validacion</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion
                                                                        ?>" disabled>

                        <label class="form-label">SIM</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->sim
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
                                    <textarea class="form-control" rows="6" disabled><?php echo $alm[0]->observaciones
                                                                                        ?></textarea>
                                    <br>
                                    <label for="">EVIDENCIAS</label>
                                    <br>
                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen">
                                        VALIDACION DE IDENTIDAD
                                    </a>
                                    <br>
                                    <br>

                                    <!-- El Modal -->
                                    <div class="modal fade" id="imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE IDENTIDAD</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="assets/claro/img/evidencia_portabilidad/<?php echo $alm[0]->link;
                                                                                                                    ?>" alt="Evidencia">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen2">
                                        VALIDACION DE CREDITOS
                                    </a>

                                    <!-- El Modal -->
                                    <div class="modal fade" id="imagen2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE CREDITOS</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="assets/claro/img/evidencia_portabilidad/<?php echo $alm[0]->link2;
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
<?php } ?>

<?php if ($alm[0]->tipo_solicitud == "LINEA NUEVA") { ?>

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

                                <label class="form-label">Nombres del cliente</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->nombres
                                                                                ?>" disabled>

                                <label for="tipoCedula" class="form-label">Tipo de Documento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_cedula
                                                                                ?>" disabled>

                                <label for="numeroCC" class="form-label">Número de documento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->numero_cedula
                                                                                ?>" disabled>

                                <label class="form-label">Fecha de nacimiento</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_nacimiento
                                                                                ?>" disabled>

                                <label class="form-label">Fecha de expedicion</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->fecha_expedicion
                                                                                ?>" disabled>

                                <label class="form-label">Correo</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->correo
                                                                                ?>" disabled>

                                <label class="form-label">Telefono de contacto 1</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->cel_1
                                                                                ?>" disabled>

                                <?php if ($alm[0]->cel_2 != 0) { ?>
                                    <label class="form-label">Telefono de contacto 2</label>
                                    <input type="text" class="form-control" value="<?php echo $alm[0]->cel_2
                                                                                    ?>" disabled>
                                <?php } ?>

                                <label class="form-label">Referido</label>
                                <input type="text" class="form-control" value="<?php echo $alm[0]->referido
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
                    <h6 class="m-0 font-weight-bold text-primary">Direccion Cliente </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Departamento</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->departamento
                                                                            ?>" disabled>

                            <label class="form-label">Ciudad</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->ciudad
                                                                            ?>" disabled>


                            <label class="form-label">Operador</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->operador
                                                                            ?>" disabled>

                            <label class="form-label">Día hábil de entrega</label>
                            <input type="text" class="form-control" value="<?php echo $alm[0]->dias
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
                        <input type="text" class="form-control" value="<?php echo $alm[0]->estado
                                                                        ?>" disabled>

                        <label class="form-label">Sub-Estado</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->detalles
                                                                        ?>" disabled>

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
                    <h6 class="m-0 font-weight-bold text-primary">Datos de Venta </h6>
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

                        <label class="form-label">Codigo del Plan</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->codigo_plan
                                                                        ?>" disabled>

                        <label class="form-label">Valor del plan sin IVA</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor
                                                                        ?>" disabled>

                        <label class="form-label">Valor del plan con IVA</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->valor_iva
                                                                        ?>" disabled>

                        <label class="form-label">Descuento</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->descuento
                                                                        ?>" disabled>

                        <label class="form-label">Operador Donante</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->operador_donante
                                                                        ?>" disabled>

                        <label class="form-label">Estado lineal de operador Donante</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->estado_actual_operador_donante
                                                                        ?>" disabled>

                        <label class="form-label">Detalles del plan</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->detalles_plan
                                                                        ?>" disabled>

                        <label class="form-label">Tipo de Validacion</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->tipo_validacion
                                                                        ?>" disabled>

                        <label class="form-label">SIM</label>
                        <input type="text" class="form-control" value="<?php echo $alm[0]->sim
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
                                    <textarea class="form-control" rows="6" disabled><?php echo $alm[0]->observaciones
                                                                                        ?></textarea>
                                    <br>
                                    <label for="">EVIDENCIAS</label>
                                    <br>
                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen">
                                        VALIDACION DE IDENTIDAD
                                    </a>
                                    <br>
                                    <br>

                                    <!-- El Modal -->
                                    <div class="modal fade" id="imagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE IDENTIDAD</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="assets/claro/img/evidencia_portabilidad/<?php echo $alm[0]->link;
                                                                                                                    ?>" alt="Evidencia">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="btn btn-primary btn-icon-split btn-lg" href="#" data-toggle="modal" data-target="#imagen2">
                                        VALIDACION DE CREDITOS
                                    </a>

                                    <!-- El Modal -->
                                    <div class="modal fade" id="imagen2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-sm-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">VALIDACION DE CREDITOS</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="assets/claro/img/evidencia_portabilidad/<?php echo $alm[0]->link2;
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
<?php } ?>