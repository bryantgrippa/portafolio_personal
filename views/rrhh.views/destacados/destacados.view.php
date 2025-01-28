<title>Destacados</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo "Configuraci&oacute;n de Destacados"; ?>
        </small>
    </h1>
</center>
<center>
    <div class="container">
        <div class="row">
            <div class="well well-sm">
                <div class="text-right">
                    <a class="btn btn-primary" href="?p=rrhh&c=Destacados&a=Crud">Nuevo destacado</a>
                </div>
            </div>
            <div class="row mb-5">
            <table class="t-usuarios">                
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Activo</th>
                        <th>Publicado</th>
                        <th>Orden</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($this->model->Listar()) > 0) {
                        foreach ($this->model->Listar() as $r):
                            if ($r->publicado == 1) {
                                $publicado = "Publicado";
                            } else {
                                $publicado = "No publicado";
                            }
                            if ($r->activo == 1) {
                                $activo = "Si";
                            } else {
                                $activo = "No";
                            }
                            ?>
                            <tr>
                                <td><?php echo $r->titulo; ?></td>
                                <td><?php echo $activo; ?></td>
                                <td><?php echo $publicado; ?></td>
                                <td><?php echo $r->orden; ?></td>
                                <td>
                                    <a href="?p=rrhh&c=Destacados&a=Crud&id_destacado=<?php echo $r->id_destacado; ?>"><li class="fa fa-edit"></li></a>
                                </td>
                                    <td>
                                        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?p=rrhh&c=Destacados&a=Eliminar&id=<?php echo $r->id_destacado; ?>"><li class="fa fa-times"></li></a>
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
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=1&busqueda=" . $_GET["busqueda"] . "'>Primera</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=1'>Primera</a>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=" . ($pagina - 1) . "&busqueda=" . $_GET["busqueda"] . "'><<</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=" . ($pagina - 1) . "'><<</a>";
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
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . " href='configuracion_destacados.php?pagina=" . $i . "&busqueda=" . $_GET["busqueda"] . "'> &nbsp;" . $i . "</a>";
                                        } else {
                                            echo "<a class='pagina btn btn-info' role='button' " . $disabled . "  href='configuracion_destacados.php?pagina=" . $i . "'> &nbsp;" . $i . "</a>";
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=" . ($pagina + 1) . "&busqueda=" . $_GET["busqueda"] . "'>>></a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=" . ($pagina + 1) . "'>>></a>";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pagina < $end_loop) {
                                    if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=" . $total_pages . "&busqueda=" . $_GET["busqueda"] . "'>Última</a>";
                                    } else {
                                        echo "<a class='pagina btn btn-info' role='button'  href='configuracion_destacados.php?pagina=" . $total_pages . "'>Última</a>";
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    } else {
                        echo "No hay destacados";
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
    $('#buscar').click(function () {
        var elem = $('#valor_busqueda')[0];
//    alert(elem.value);
        location.href = "configuracion_destacados.php?pagina=1&busqueda=" + elem.value;
    });
</script>