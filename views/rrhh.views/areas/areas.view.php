<title>Areas</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo "Configuraci&oacute;n de &Aacute;reas"; ?>
        </small>
    </h1>
</center>
<center>
    <div class="container">
        <div class="row">
            <div class="well well-sm">
                <div class="text-right">
                    <a class="btn btn-primary" href="?p=rrhh&c=Areas&a=Crud">Nueva &Aacute;rea</a>
                </div>
            </div>
            <table class="t-usuarios">                
                <thead>
                    <tr>
                        <th>&Aacute;reas</th>
                        <th>Activo</th>
                        <th colspan="2">Acci&oacute;n</th>
                        <th>Estado</th>
                        <th>Usuarios</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($this->model->Listar()) > 0) {
                        foreach ($this->model->Listar() as $r):
                            if ($r->activo == 1) {
                                $activo = "Si";
                            } else {
                                $activo = "No";
                            }
                            ?>
                            <tr>
                                <td><?php echo $r->detalle_area; ?></td>
                                <td><?php echo $activo; ?></td>
                                <td>
                                    <a href="?p=rrhh&c=Areas&a=Crud&id_area=<?php echo $r->id_area; ?>"><li class="fa fa-edit"></li></a>
                                </td>
                                    <td>
                                        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?p=rrhh&c=Areas&a=Eliminar&id=<?php echo $r->id_area; ?>"><li class="fa fa-times"></li></a>
                                    </td>
                                    <td>


                                        <?php if ($r->activo == 1) : ?>
                                            <button type="button" class="btn btn-danger" >
                                                <a href="?p=rrhh&c=Areas&a=Desactivar&id=<?php echo $r->id_area; ?>" class="link-light">
                                                    Desactivar
                                                </a>
                                            </button>
                                        <?php elseif ($r->activo == 0) : ?>
                                            <button type="button" class="btn btn-success">
                                                <a href="?p=rrhh&c=Areas&a=Activar&id=<?php echo $r->id_area; ?>" class="link-light">
                                                    Activar
                                                </a>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="?p=rrhh&c=Areas&a=Area&id_area=<?php echo $r->id_area; ?>"><li class="fa fa-fa fa-key"></li></a>
                                    </td>
                            </tr>
                            <?php
                        endforeach;
                    } else {
                        echo "No hay áreas";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</center>
<script>    
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });</script>