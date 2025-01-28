<title>Usuarios</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo "Configuraci&oacute;n de usuarios"; ?>
        </small>
    </h1>
</center>
<center>
    <div class="container">
        <div class="row">
            <div class="well well-sm">
                <div class="text-right">
                    <a class="btn btn-primary" href="?p=rrhh&c=Excel&a=usuarios">Generar de usuarios</a>
                    <a class="btn btn-primary" href="?p=rrhh&c=Usuarios&a=Carga">Cargar de usuarios</a>
                    <a class="btn btn-primary" href="?p=rrhh&c=Usuarios&a=Crud">Nuevo usuario</a>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    <input class="form-control" type="text" value="<?PHP
                                                                    if (isset($_GET['busqueda']) && $_GET['busqueda'] != "") {
                                                                        echo $_GET['busqueda'];
                                                                    }
                                                                    ?>" placeholder="Buscar" id="valor_busqueda">
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-info" id="buscar">Buscar</button>&nbsp;&nbsp;
                </div>
            </div>

            <table class="t-usuarios">
            <thead>
                    <tr>
                        <th>Fotos</th>
                        <th>Nombres</th>
                        <th>Usuario</th>
                        <th>Identificaci&oacute;n</th>
                        <th>Cargo</th>
                        <th colspan="3">Acci&oacute;n</th>
                        <th colspan="3">Estado de usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cantidad = count($this->model->Listar());
                    if ($cantidad > 0) {
                        foreach ($this->model->Listar() as $r) :
                            foreach ($this->model->Cargo() as $c) :
                                if ($r->cargo == $c->id_cargo) {
                                    $cargo = $c->detalle_cargo;
                                }
                            endforeach;
                            if ($r->id_usuario != 0) {
                    ?>
                                <tr>
                                    <td><img width="70" class="img img-circle img-responsive" src="<?php echo $r->foto; ?>" /></td>
                                    <td><?php echo $r->nombres; ?></td>
                                    <td><?php echo $r->usuario; ?></td>
                                    <td><?php echo $r->n_documento; ?></td>
                                    <td><?php echo $cargo; ?></td>

                                    

                                    <td>
                                        <a href="?p=rrhh&c=Usuarios&a=Crud&id_usuario=<?php echo $r->id_usuario; ?>">
                                            <li class="fa fa-edit"></li>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="javascript:return confirm('¿Estas seguro de eliminar este usuario?');" href="?p=rrhh&c=Usuarios&a=Eliminar&id=<?php echo $r->id_usuario; ?>">
                                            <li class="fa fa-user-times"></li>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="?p=rrhh&c=Usuarios&a=Pass&id_usuario=<?php echo $r->id_usuario; ?>">
                                            <li class="fa fa-key"></li>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($r->activo == 1) : ?>
                                            <button type="button" class="btn btn-danger" >
                                                <a onclick="javascript:return confirm('¿Seguro que desea desactivar el usuario?');" href="?p=rrhh&c=Usuarios&a=Desactivar&id=<?php echo $r->id_usuario; ?>" class="link-light">
                                                    Desactivar
                                                </a>
                                            </button>
                                        <?php elseif ($r->activo == 0) : ?>
                                            <button type="button" class="btn btn-success">
                                                <a onclick="javascript:return confirm('¿Seguro que desea activar el usuario?');" href="?p=rrhh&c=Usuarios&a=Activar&id=<?php echo $r->id_usuario; ?>" class="link-light">
                                                    Activar
                                                </a>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        endforeach;
                        ?>
                        <tr>
                            <?php
                            $registro_por_pagina = 10;
                            $pagina = '';
                            if (isset($_GET["pagina"])) {
                                $pagina = $_GET["pagina"];
                            } else {
                                $pagina = 1;
                            }
                            $total_records = $this->model->Listar2();
                            $total_pages = ceil($total_records / $registro_por_pagina);
                            $start_loop = $pagina;
                            $diferencia = $total_pages - $pagina;
                            if ($diferencia <= 4) {
                                $start_loop = $total_pages - 5;
                            }
                            $end_loop = $start_loop + 5;
                            ?>
                            <td>
                                <?php
                                if ($pagina > 1) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=1&busqueda=" . $_GET["busqueda"] . "'>Primera</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=1'>Primera</a>";
                                    }
                                ?>
                            </td>
                            <td>
                            <?php
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=" . ($pagina - 1) . "&busqueda=" . $_GET["busqueda"] . "'><<</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=" . ($pagina - 1) . "'><<</a>";
                                    }
                                }
                            ?>
                            </td>
                            <td colspan="3" style="text-align: center;">
                                <?php
                                for ($i = $start_loop; $i <= $end_loop; $i++) {
                                    if ($i > 0) {
                                        if ($i == $pagina) {
                                            $disabled = 'disabled';
                                        } else {
                                            $disabled = '';
                                        }
                                        if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . " href='?p=rrhh&c=Usuarios&a=main&pagina=" . $i . "&busqueda=" . $_GET["busqueda"] . "'> &nbsp;" . $i . "</a>";
                                        } else {
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . "  href='?p=rrhh&c=Usuarios&a=main&pagina=" . $i . "'> &nbsp;" . $i . "</a>";
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=" . ($pagina + 1) . "&busqueda=" . $_GET["busqueda"] . "'>>></a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=" . ($pagina + 1) . "'>>></a>";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=" . $total_pages . "&busqueda=" . $_GET["busqueda"] . "'>Última</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Usuarios&a=main&pagina=" . $total_pages . "'>Última</a>";
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td class="text-danger">
                                Usuario no existe o está inhabilitado, consultar con área de desarrollo.
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <script>    
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });</script>
        </div>
    </div>
</center>
<script>
    $('#buscar').click(function() {
        var elem = $('#valor_busqueda')[0];
        //    alert(elem.value);
        location.href = "?p=rrhh&c=Usuarios&a=main&pagina=1&busqueda=" + elem.value;
    });
</script>