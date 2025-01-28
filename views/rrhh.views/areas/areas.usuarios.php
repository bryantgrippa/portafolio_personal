<?php
foreach ($alm as $r) :
    foreach ($this->model->Areas() as $c) :
        if ($r->area == $c->id_area) {
            $area = $c->detalle_area;
        }
    endforeach;
endforeach;
?>

<title><?php echo $area ?></title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo $area; ?>
        </small>
    </h1>
</center>
<center>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="well well-sm">
                    <div class="text-right">
                        <a class="btn btn-primary" href="?p=rrhh&c=Areas&a=main">Volver</a>
                    </div>
                </div>
                <table class="t-usuarios">
                    <thead>
                        <tr>
                            <th>Fotos</th>
                            <th>Nombres</th>
                            <th>Usuario</th>
                            <th>Identificaci&oacute;n</th>
                            <th>Area</th>
                            <th colspan="3">Acci&oacute;n</th>
                            <th colspan="3">Estado de usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($alm as $r) :
                            foreach ($this->model->Areas() as $c) :
                                if ($r->area == $c->id_area) {
                                    $area = $c->detalle_area;
                                }
                            endforeach;
                        ?>
                            <tr>
                                <td><img width="70" class="img img-circle img-responsive" src="<?php echo $r->foto; ?>" /></td>
                                <td><?php echo $r->nombres; ?></td>
                                <td><?php echo $r->usuario; ?></td>
                                <td><?php echo $r->n_documento; ?></td>
                                <td><?php echo $area; ?></td>



                                <td>
                                    <a href="?p=rrhh&c=Usuarios&a=Crud2&id_usuario=<?php echo $r->id_usuario; ?>">
                                        <li class="fa fa-edit"></li>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="javascript:return confirm('¿Estas seguro de eliminar este usuario?');" href="?p=rrhh&c=Usuarios&a=Eliminar2&id=<?php echo $r->id_usuario; ?>&id_area=<?php echo $r->area; ?>">
                                        <li class="fa fa-user-times"></li>
                                    </a>
                                </td>
                                <td>
                                    <a href="?p=rrhh&c=Usuarios&a=Pass2&id_usuario=<?php echo $r->id_usuario; ?>">
                                        <li class="fa fa-key"></li>
                                    </a>
                                </td>
                                <td>
                                    <?php if ($r->activo == 1) : ?>
                                        <button type="button" class="btn btn-danger">
                                            <a onclick="javascript:return confirm('¿Seguro que desea desactivar el usuario?');" href="?p=rrhh&c=Usuarios&a=Desactivar2&id=<?php echo $r->id_usuario; ?>&id_area=<?php echo $r->area; ?>" class="link-light">
                                                Desactivar
                                            </a>
                                        </button>
                                    <?php elseif ($r->activo == 0) : ?>
                                        <button type="button" class="btn btn-success">
                                            <a onclick="javascript:return confirm('¿Seguro que desea activar el usuario?');" href="?p=rrhh&c=Usuarios&a=Activar2&id=<?php echo $r->id_usuario; ?>&id_area=<?php echo $r->area; ?>" class="link-light">
                                                Activar
                                            </a>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <script>
                    $(window).on('load', function() {
                        setTimeout(function() {
                            $(".loader-page").css({
                                visibility: "hidden",
                                opacity: "0"
                            });
                        }, 500);
                    });
                </script>
            </div>
        </div>
</center>