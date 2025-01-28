<head>
    <title>Ventas Totales</title>
</head>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        Ventas Totales
    </h1>
    <p>
        <a href="?p=claro&c=Excel_porta&a=Total" class="btn btn-primary btn-icon-split">
            <span class="text">Generar Todas las ventas</span>
        </a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Asesor</th>
                            <th>Cliente</th>
                            <th>Cedula Cliente</th>
                            <th>MIN</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Asesor</th>
                            <th>Cliente</th>
                            <th>Cedula Cliente</th>
                            <th>MIN</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>


                    <tbody>
                        <?php foreach ($this->model->total() as $d) :
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
                                <td><?php echo $d->nombre_asesor ?> </td>
                                <td><?php echo $d->nombres ?> </td>
                                <td><?php echo $d->numero_cedula ?> </td>
                                <td><?php echo $d->min?> </td>
                                <td class="<?php echo $color ?>">
                                    <?php echo $estado ?>
                                </td>
                                <td>
                                    <a href="?p=claro&c=Back_porta&a=venta&id_venta=<?php echo $d->id_venta ?>" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="?p=claro&c=Excel_porta&a=VentaID&id=<?php  echo $d->id_venta ?>" class="btn btn-primary">
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