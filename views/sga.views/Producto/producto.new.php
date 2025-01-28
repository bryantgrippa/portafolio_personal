<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="?p=sga&c=Productos&a=main" class="btn btn-primary">Regresar</a>
    </div>

    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Registrar Producto
            </div>
            <div class="card-body">
                <form action="?p=sga&c=Productos&a=Guardar" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="id_producto" id="id_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" id="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="talla">Talla</label>
                        <input type="number" class="form-control" name="talla" id="talla" required>
                    </div>

                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select class="form-control" name="proveedor" id="proveedor" required>
                            <option disabled selected>selecciona un proveedor</option>
                            <?php foreach ($this->model->Proveedor() as $p) : ?>
                                <option value="<?php echo $p->id_proveedor ?>">
                                    <?php echo $p->nombre; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <input type="submit" value="Enviar" class="btn btn-primary">
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
