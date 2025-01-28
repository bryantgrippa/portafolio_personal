<title>Solicitudes para permisos</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>


<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo "Permisos Laborales"; ?>
        </small>
    </h1>
</center>
<center>
    <div class="container">
        <div class="row">
            <div class="well well-sm">
                <div class="text-right">
                    <a class="btn btn-primary" href="?p=rrhh&c=Solicitudes_permisos&a=Crud&id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Crear nueva solicitud para permisos</a>
                </div>
            </div>

            <table class="t-usuarios">
                <?php
                if (count($this->model->Listar()) > 0) {
                ?>
                    <thead>
                        <tr>
                            <th>Permiso N°</th>
                            <th>Motivo permiso</th>
                            <th>Duraci&oacute;n permiso</th>
                            <th>Solicitud Permiso</th>
                            <th>Estado</th>
                            <th>Verificar</th>
                            <th>Eliminar</th>
                            <th>Generar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($this->model->Listar() as $r) :
                            if ($r->autorizado_sup == 0 || $r->autorizado_nomina == 0 || $r->autorizado_rrhh == 0 || $r->autorizado_ope == 0) {
                                $autorizado = "Esperando autorizacion";
                                $color = "bg-info text-white";
                            }
                            if ($r->autorizado_sup != 0 && $r->autorizado_nomina != 0 && $r->autorizado_rrhh != 0 && $r->autorizado_ope != 0) {
                                $autorizado = "Autorizado";
                                $color = "bg-success text-white";
                            } 
                            if ($r->autorizado_sup < 0 || $r->autorizado_nomina < 0 || $r->autorizado_rrhh < 0 || $r->autorizado_ope < 0){
                                $autorizado = "Permiso Denegado";
                                $color = "bg-danger text-white";
                            }
                        ?>
                            <tr>
                                <td><?php echo $r->id_permiso; ?></td>
                                <td><?php echo $r->detalle_tipo; ?></td>
                                <td><?php echo $r->duracion_permiso; ?></td>
                                <td><?php echo $r->fecha_creado; ?></td>
                                <td class="<?php echo $color; ?>"><?php echo $autorizado; ?></td>
                                <td>
                                    <?php
                                    $fecha_actual = date('Y-m-d');

                                    $diff = abs(strtotime($fecha_actual) - strtotime($r->fecha_creado));
                                    $years = floor($diff / (365 * 60 * 60 * 24));
                                    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                    $days2 = floor((($diff / 60) / 60) / 24);
                                    // esta funcion dice cuantos dias deben pasar para que el boton de editar desaparezca
                                    if ($days2 < 20 && $autorizado != "Autorizado") {
                                    ?>
                                        <a href="?p=rrhh&c=Solicitudes_permisos&a=Crud&id_permiso=<?php echo $r->id_permiso; ?>&id_usuario=<?php echo $r->id_usuario; ?>">
                                            <li class="fa fa-edit"></li>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <?php
                                if ($r->autorizado_sup != 0 || $r->autorizado_nomina != 0 || $r->autorizado_rrhh != 0 || $r->autorizado_ope != 0) {
?>
<td>

</td>
                                <?php
                                } else {
?>
                                <td>
                                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?p=rrhh&c=Solicitudes_permisos&a=Eliminar&id_permiso=<?php echo $r->id_permiso; ?>&id_usuario=<?php echo $r->id_usuario; ?>">
                                        <li class="fa fa-times"></li>
                                    </a>
                                </td>
                                <?php
                                }
?>
                                <?php
                                if ($r->autorizado_sup > 0 || $r->autorizado_nomina > 0 || $r->autorizado_rrhh > 0 || $r->autorizado_ope > 0) {
?>
                                <td>
                                    <a href="?p=rrhh&c=Certificados_PDF&a=Certificado_permisos&id=<?php echo $r->id_permiso; ?>" target="_blank">
                                        <li class="fa fa-edit"></li>
                                    </a>
                                </td>
                                <?php
                                }
?>
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
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=1&busqueda=" . $_GET["busqueda"] . "'>Primera</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=1'>Primera</a>";
                                    }
                                ?>
                            </td>
                            <td>
                            <?php
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=" . ($pagina - 1) . "&busqueda=" . $_GET["busqueda"] . "'><<</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=" . ($pagina - 1) . "'><<</a>";
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
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . " href='solicitudes_permiso_laboral.php?pagina=" . $i . "&busqueda=" . $_GET["busqueda"] . "'> &nbsp;" . $i . "</a>";
                                        } else {
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . "  href='solicitudes_permiso_laboral.php?pagina=" . $i . "'> &nbsp;" . $i . "</a>";
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=" . ($pagina + 1) . "&busqueda=" . $_GET["busqueda"] . "'>>></a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=" . ($pagina + 1) . "'>>></a>";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=" . $total_pages . "&busqueda=" . $_GET["busqueda"] . "'>Última</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='solicitudes_permiso_laboral.php?pagina=" . $total_pages . "'>Última</a>";
                                    }
                                }
                                ?>
                            </td>
                        </tr>

                    </tbody>
                <?php
                } else {
                    if ($_SESSION['genero'] == "M") {
                        $saludo = "Sr.";
                    } else {
                        $saludo = "Sra.";
                    }
                    echo $saludo . " " . $_SESSION['nombres'] . ", usted no ha realizado hasta el momento ningún permiso.";
                }
                ?>
            </table>
        </div>
    </div>
</center>
<script>
                    $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });
    $('#buscar').click(function() {
        var elem = $('#valor_busqueda')[0];
        //    alert(elem.value);
        location.href = "solicitudes_permiso_laboral.php?pagina=1&busqueda=" + elem.value;
    });
</script>