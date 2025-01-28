  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0-weight-bold text-primary">Proveedores</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                      <thead class="thead-dark">
                          <tr>
                              <th>Nombre de proveedor</th>
                              <th>Nit</th>
                              <th>Correo electronico</th>
                              <th>Nombre de contacto</th>
                              <th>Celular de contacto</th>
                              <th>Acciones</th>

                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            foreach ($this->model->Listar() as $r) :
                            ?>
                              <tr>
                                  <td><?php echo $r->nombre ?></td>
                                  <td><?php echo $r->nit ?></td>
                                  <td><?php echo $r->correo ?></td>
                                  <td><?php echo $r->contacto_nombre ?></td>
                                  <td><?php echo $r->contacto_cel ?></td>

                                  <td>
                                      <a href="?p=sga&c=Proveedores&a=nuevo&id_proveedor=<?php echo $r->id_proveedor; ?>" class="btn btn-info btn-flat"><i class="fas fa-sync-alt"></i></a>
                                      <a href="javascript:void(0);" onclick="fntdel2(<?php echo $r->id_proveedor; ?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                      <!-- <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?p=sga&c=Proveedores&a=Eliminar&id=<?php echo $r->id_proveedor; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> -->
                                  </td>

                              </tr>
                          <?php
                            endforeach;
                            ?>
                      </tbody>
                  </table>

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