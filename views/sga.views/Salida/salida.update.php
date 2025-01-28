<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="?p=sga&c=Ventas&a=main" class="btn btn-primary">Regresar</a>
    </div>

    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Modificar Venta
            </div>
            <div class="card-body">
                <form action="?p=sga&c=Ventas&a=Actualizar" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="id_salida" id="id_salida" value="<?php echo $alm[0]->id_salida ?>">
                    </div>
                    <div class="form-group">
                        <label for="cliente_nombre">Nombre De Cliente</label>
                        <input type="text" class="form-control" name="cliente_nombre" id="cliente_nombre" value="<?php echo $alm[0]->cliente_nombre ?>">
                    </div>
                    <div class="form-group">
                        <label for="cliente_id">Cedula De Cliente</label>
                        <input type="text" class="form-control" name="cliente_id" id="cliente_id" value="<?php echo $alm[0]->cliente_id ?>">
                    </div>
                    <div class="form-group">
                        <label for="cliente_contacto">Celular De Cliente</label>
                        <input type="number" class="form-control" name="cliente_contacto" id="cliente_contacto" value="<?php echo $alm[0]->cliente_contacto ?>">
                    </div>


                    <div class="form-group">
                        <label for="cliente_direccion">Direccion De Cliente</label>
                        <input type="text" class="form-control" name="cliente_direccion" id="cliente_direccion" value="<?php echo $alm[0]->cliente_direccion ?>">
                    </div>


                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3"><?php echo $alm[0]->observaciones; ?></textarea>
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