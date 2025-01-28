<title>Permisos</title>
<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>
<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo "Firma de Permisos "; ?>
        </small>
    </h1>
</center>
<center>
    <div class="container">
        <div class="row">
            <div class="row mb-5">
                <div class="well well-sm">
                    <div class="text-left">
                        <a class="btn btn-primary" href="?p=rrhh&c=Historiales&a=main2">Permisos Denegados</a>
                        <a class="btn btn-primary" href="?p=rrhh&c=Historiales&a=main">Permisos Concedidos</a>
                    </div>
                </div>

                <table class="t-usuarios">
                    <thead>
                        <tr>
                            <th>Permiso por</th>
                            <th>Tipo de permiso</th>
                            <th>Duraci&oacute;n del permiso</th>
                            <th>Creado</th>
                            <th>Solicitud Orden</th>
                            <th>Generar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->model->ListarDone() as $r) :
                            if ($r->autorizado_sup == 0 || $r->autorizado_nomina == 0 || $r->autorizado_rrhh == 0 || $r->autorizado_ope == 0) {
                                $autorizado = "Esperando por autorizacion";
                                $color = "bg-info text-white";
                            }
                            if ($r->autorizado_sup != 0 && $r->autorizado_nomina != 0 && $r->autorizado_rrhh != 0 && $r->autorizado_ope != 0) {
                                $autorizado = "Autorizado";
                                $color = "bg-success text-white";
                            }
                            if ($r->autorizado_sup < 0 || $r->autorizado_nomina < 0 || $r->autorizado_rrhh < 0 || $r->autorizado_ope < 0) {
                                $autorizado = "Permiso Denegado";
                                $color = "bg-danger text-white";
                            }
                            foreach ($this->model->DatosEm($r->id_usuario) as $de) :
                                $nombres_e = $de->nombres;
                            endforeach;

                        ?>


                            <tr>
                                <td><?php echo $nombres_e; ?></td>
                                <td><?php echo $r->detalle_tipo; ?></td>
                                <td><?php echo $r->duracion_permiso; ?></td>
                                <td><?php echo $r->fecha_creado; ?></td>
                                <td class="<?php echo $color; ?>"><?php echo $autorizado; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary text-white">
                                        <a href="?p=rrhh&c=Certificados_PDF&a=Certificado_permisos&id=<?php echo $r->id_permiso; ?>" target="_blank">
                                            Generar permiso
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        <?php
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
                            $total_records = $this->model->ListarDone2();
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
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Historiales&a=main&pagina=" . ($pagina - 1) . "&busqueda=" . $_GET["busqueda"] . "'><<</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Historiales&a=main&pagina=" . ($pagina - 1) . "'><<</a>";
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
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . " href='?p=rrhh&c=Historiales&a=main&pagina=" . $i . "&busqueda=" . $_GET["busqueda"] . "'> &nbsp;" . $i . "</a>";
                                        } else {
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . "  href='?p=rrhh&c=Historiales&a=main&pagina=" . $i . "'> &nbsp;" . $i . "</a>";
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Historiales&a=main&pagina=" . ($pagina + 1) . "&busqueda=" . $_GET["busqueda"] . "'>>></a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='?p=rrhh&c=Historiales&a=main&pagina=" . ($pagina + 1) . "'>>></a>";
                                    }
                                }
                                ?>
                        </tr>
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