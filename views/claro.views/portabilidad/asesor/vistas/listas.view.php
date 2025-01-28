<head>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Cedula Cliente</th>
                            <th>Tipo de Solicitud</th>
                            <th>MIN</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Cedula Cliente</th>
                            <th>Tipo de Solicitud</th>
                            <th>MIN</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>


                    <tbody>
                        <?php foreach ($alm as $d) :
                            if ($d->estado == "CANTADA") {
                                $estado = "CANTADA";
                                $color = "bg-warning text-dark";
                            }
                            if ($d->estado == "AUDITADA") {
                                $estado = "AUDITADA";
                                $color = "bg-warning text-dark";
                            }
                            if ($d->estado == "ENVIADA AL ABD") {
                                $estado = "ENVIADA AL ABD";
                                $color = "bg-warning text-dark";
                            }
                            if ($d->estado == "PENDIENTE") {
                                $estado = "PENDIENTE";
                                $color = "bg-info text-white";
                            }
                            if ($d->estado == "RECHAZADA") {
                                $estado = "RECHAZADA";
                                $color = "bg-danger text-white";
                            }
                            if ($d->estado == "DEVUELTA ABD") {
                                $estado = "DEVUELTA ABD";
                                $color = "bg-danger text-white";
                            }
                            if ($d->estado == "ACTIVA") {
                                $estado = "ACTIVA";
                                $color = "bg-success text-white";
                            }
                            if ($d->estado == "LEGALIZADA") {
                                $estado = "LEGALIZADA";
                                $color = "bg-success text-white";
                            }
                            if ($d->estado == "EXITOSA") {
                                $estado = "EXITOSA";
                                $color = "bg-success text-white";
                            }
                            if ($d->estado == "DESACTIVA") {
                                $estado = "DESACTIVA";
                                $color = "bg-danger text-white";
                            }
                            if ($d->estado == "RECUPERADA") {
                                $estado = "RECUPERADA";
                                $color = "bg-info text-white";
                            }
                            if ($d->estado == "DIGITAL") {
                                $estado = "DIGITAL";
                                $color = "bg-warning text-white";
                            }
                        ?>
                            <tr>
                                <td><?php echo $d->fecha_grabacion_contrato ?></td>
                                <td><?php echo $d->nombres ?> </td>
                                <td><?php echo $d->numero_cedula ?> </td>
                                <td><?php echo $d->tipo_solicitud ?> </td>
                                <td><?php echo $d->min?> </td>
                                <td class="<?php echo $color ?>">
                                    <?php echo $estado ?>
                                </td>
                                <td>
                                    <a href="?p=claro&c=Usuario_porta&a=venta&id_venta=<?php echo $d->id_venta ?>" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="?p=claro&c=Excel_porta&a=VentaID&id=<?php echo $d->id_venta ?>" class="btn btn-primary">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>