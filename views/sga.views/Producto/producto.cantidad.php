<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="?p=sga&c=Productos&a=main" class="btn btn-primary">Regresar</a>
    </div>

    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Añadir Cantidad
            </div>
            <div class="card-body">

                <form action="?p=sga&c=Productos&a=Cantidad" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="id_producto" value="<?php echo $alm[0]->id_producto ?>">
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad Actual</label>
                        <input type="text" class="form-control" name="cantidad" id="cantidad" value="<?php echo $alm[0]->cantidad ?>" readonly>
                    </div>



                    <div class="form-group">
                        <label for="cantidad">Agregar Unidades</label>
                        <input type="text" class="form-control" name="cantidad" id="cantidad">
                    </div>


                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
