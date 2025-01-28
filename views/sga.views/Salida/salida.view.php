  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0-weight-bold text-primary">Ventas</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                      <thead class="thead-dark">
                          <tr>
                              <th>Producto</th>
                              <th>Fecha Venta</th>
                              <th>Cantidad</th>
                              <th>Cliente</th>
                              <th>ID Cliente</th>
                              <th>Celular Cliente</th>
                              <th>Direccion Cliente</th>
                              <th>Observaciones</th>
                              <th>Acciones</th>
                              <th>factura</th>

                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            foreach ($this->model->Listar() as $r) :
                            ?>
                              <tr>
                                  <?php foreach ($this->model->Producto() as $p) : ?>
                                      <?php if (isset($r->producto) && ($r->producto == $p->id_producto)) { ?>
                                          <td><?php echo $p->nombre ?></td>
                                  <?php    }
                                    endforeach; ?>
                                  <td><?php echo $r->fecha_venta ?></td>
                                  <td><?php echo $r->cantidad ?></td>
                                  <td><?php echo $r->cliente_nombre ?></td>
                                  <td><?php echo $r->cliente_id ?></td>
                                  <td><?php echo $r->cliente_contacto ?></td>
                                  <td><?php echo $r->cliente_direccion ?></td>
                                  <td><?php echo $r->observaciones ?></td>

                                  <td>
                                      <a href="?p=sga&c=Ventas&a=nuevo&id_salida=<?php echo $r->id_salida; ?>" class="btn btn-info btn-flat"><i class="fas fa-sync-alt"></i></a>
                                  </td>
                                  <td>
                                      <a href="?p=sga&c=Certificados_PDF&a=Factura&id=<?php echo $r->id_salida ?>" target="_blank" class="btn btn-primary">
                                              Generar
                                      </a>
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