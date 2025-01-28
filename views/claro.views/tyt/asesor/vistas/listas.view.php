<title><?php echo $_SESSION['nombres'] ?></title>
</head>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ventas Personales</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $_SESSION['nombres'] ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Cedula</th>
                            <th>Ref Equipo</th>
                            <th>N° de Contrato</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Cedula</th>
                            <th>Ref Equipo</th>
                            <th>N° de Contrato</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>


                    <tbody>
                        <?php foreach ($alm as $d) :
                            if ($d->estado == "CANTADA") {
                                $estado = "CANTADA";
                                $color = "bg-warning text-light";
                            }
                            if ($d->estado == "RECUPERADA") {
                                $estado = "RECUPERADA";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "ASIGNADO A RUTA") {
                                $estado = "ASIGNADO A RUTA";
                                $color = "bg-warning text-light";
                            }
                            if ($d->estado == "AUDITADA") {
                                $estado = "AUDITADA";
                                $color = "bg-warning text-light";
                            }
                            if ($d->estado == "DIGITADA") {
                                $estado = "DIGITADA";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "PENDIENTE") {
                                $estado = "PENDIENTE";
                                $color = "bg-warning text-light";
                            }
                            if ($d->estado == "PENDIENTE DE CIERRE") {
                                $estado = "PENDIENTE DE CIERRE";
                                $color = "bg-warning text-light";
                            }
                            if ($d->estado == "ANULADA") {
                                $estado = "ANULADA";
                                $color = "bg-danger text-light";
                            }
                            if ($d->estado == "CERRADO") {
                                $estado = "CERRADO";
                                $color = "bg-danger text-light";
                            }
                            if ($d->estado == "DEVOLUCION") {
                                $estado = "DEVOLUCION";
                                $color = "bg-danger text-light";
                            }
                            if ($d->estado == "INCOMPLETA") {
                                $estado = "INCOMPLETA";
                                $color = "bg-danger text-light";
                            }
                            if ($d->estado == "RECHAZADA") {
                                $estado = "RECHAZADA";
                                $color = "bg-danger text-light";
                            }
                            if ($d->estado == "VISITA FALLIDA") {
                                $estado = "VISITA FALLIDA";
                                $color = "bg-danger text-light";
                            }
                            if ($d->estado == "ACTIVA") {
                                $estado = "ACTIVA";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "DESPACHADO") {
                                $estado = "DESPACHADO";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "DEVOLUCION SOLICITADA") {
                                $estado = "DEVOLUCION SOLICITADA";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "RESERVA TRAMITADA") {
                                $estado = "RESERVA TRAMITADA";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "TRANSITO") {
                                $estado = "TRANSITO";
                                $color = "bg-info text-light";
                            }
                            if ($d->estado == "CONFIRMADO") {
                                $estado = "CONFIRMADO";
                                $color = "bg-success text-light";
                            }
                            if ($d->estado == "ENTREGADO") {
                                $estado = "ENTREGADO";
                                $color = "bg-success text-light";
                            }
                            if ($d->estado == "LEGALIZADO") {
                                $estado = "LEGALIZADO";
                                $color = "bg-success text-light";
                            }
                            if ($d->estado == "TRÁMITADA") {
                                $estado = "TRÁMITADA";
                                $color = "bg-success text-light";
                            }
                        ?>
                            <tr>
                                <td><?php echo $d->fecha_grabacion_contrato ?></td>
                                <td><?php echo $d->nombres ?> </td>
                                <td><?php echo $d->numero_cedula ?> </td>
                                <td><?php echo $d->referencia_equipo ?> </td>
                                <td><?php echo $d->numero_grabacion_contrato ?> </td>
                                <td class="<?php echo $color ?>">
                                    <?php echo $estado ?>
                                </td>
                                <td>
                                    <a href="?p=claro&c=Usuario_tyt&a=venta&id_venta=<?php echo $d->id_venta ?>" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- <a href="" class="btn btn-primary">
                                        <i class="fas fa-download"></i>
                                    </a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->