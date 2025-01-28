  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0-weight-bold text-primary">Usuarios</h6>

          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                      <thead class="thead-dark">
                          <tr>
                              <th>Nombre de Usuario</th>
                              <th>Usuario</th>
                              <th>Permiso</th>
                              <th>Acciones</th>

                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            foreach ($this->model->Listar() as $r) :
                            ?>
                              <tr>
                                  <td><?php echo $r->nombre ?></td>
                                  <td><?php echo $r->usuario ?></td>
                                  <?php foreach ($this->model->Permiso() as $p) : ?>
                                      <?php if (isset($r->permiso) && ($r->permiso == $p->id_permiso)) { ?>
                                          <td><?php echo $p->detalles ?></td>
                                  <?php    }
                                    endforeach; ?>
                                  <td>
                                      <a href="?p=sga&c=Usuarios&a=nuevo&id_usuario=<?php echo $r->id_usuario; ?>" class="btn btn-info btn-flat"><i class="fas fa-sync-alt"></i></a>
                                      <a href="javascript:void(0);" onclick="fntdel1(<?php echo $r->id_usuario; ?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                      <!-- <a href="?p=sga&c=Usuarios&a=Eliminar&id=<?php echo $r->id_usuario; ?>" onclick="javascript:return confirm('¿Seguro de eliminar este Usuario?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> -->
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