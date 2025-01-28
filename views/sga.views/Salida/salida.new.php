<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="?p=sga&c=Ventas&a=main" class="btn btn-primary">Regresar</a>
    </div>

    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Generar Venta
            </div>


            <div class="card-body">
                <form action="?p=sga&c=Ventas&a=Guardar" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="id_" id="id_producto" required>
                    </div>

                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <select class="form-control" name="producto" id="producto" required>
                            <option disabled selected>selecciona un producto</option>
                            <?php foreach ($this->model->Producto() as $p) : ?>
                                <option value=<?php echo $p->id_producto ?>>
                                    <?php echo $p->nombre . " talla " . $p->talla; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad" id="cantidad" required>

                    </div>
                    <div class="form-group">
                        <label for="cliente_nombre">Nombre De Cliente</label>
                        <input type="text" class="form-control" name="cliente_nombre" id="cliente_nombre" required>
                    </div>


                    <div class="form-group">
                        <label for="cliente_id">Cedula De Cliente</label>
                        <input type="number" class="form-control" name="cliente_id" id="cliente_id" required>
                    </div>


                    <div class="form-group">
                        <label for="cliente_contacto">Celular De Cliente</label>
                        <input type="number" class="form-control" name="cliente_contacto" id="cliente_contacto" required>
                    </div>

                    <div class="form-group">
                        <label for="cliente_direccion">Direccion De Cliente</label>
                        <input type="text" class="form-control" name="cliente_direccion" id="cliente_direccion" required>
                    </div>

                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                    </div>


                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>

                 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Desea Cerrar Sesion?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
             <div class="modal-footer">
                 <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                 <a class="btn btn-primary" href="?p=sga&c=Login&a=main">Cerrar Sesion</a>
             </div>
         </div>
     </div>
 </div>
            </div>
        </div>
    </div>
</div>