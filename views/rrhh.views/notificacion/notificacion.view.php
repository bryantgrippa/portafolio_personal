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



                </div>

            </div>
            <table class="t-usuarios"> 
                <?php


if($_SESSION['permiso']== 1){
    $modelo = 'General';
}else{
    if($_SESSION['cargo'] == 3){
        $modelo = 'NominaView';
    }else{
    if($_SESSION['cargo'] == 4){
        $modelo = 'RRHHView';
    }else{
    if($_SESSION['cargo'] == 5 || $_SESSION['cargo'] == 6 || $_SESSION['cargo'] == 2){
        $modelo = 'JefeAreaView';
    }else{
    if($_SESSION['permiso']== 4){
        $modelo = 'SupervisorView';
                }
            }
        }
    }
}

                if (count($this->model->$modelo())) {
                    ?>
                    <thead>
                        <tr>
                            <th>Permiso por</th>
                            <th>Tipo de permiso</th>
                            <th>Duraci&oacute;n del permiso</th>
                            <th>Creado</th>
                            <th>Solicitud Orden</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        // aqui esta la funcion para decir si esta autorizado o no
                        foreach ($this->model->$modelo() as $r):
                            if ($r->autorizado_sup == 0 || $r->autorizado_nomina == 0 || $r->autorizado_rrhh == 0 || $r->autorizado_ope == 0) {
                                $autorizado = "Esperando por autorizacion";
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
                            foreach ($this->model->DatosEm($r->id_usuario) as $de):
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
                                    <a href="?p=rrhh&c=Notificaciones&a=Crud&id_permiso=<?php echo $r->id_permiso; ?>"><li class="fa fa-edit"></li></a>
                                </td>
                                <!-- boton de eliminar -->
                            </tr>

                            <?php
                        endforeach;
                        ?>
                    </tbody>
                    <?php
                } else {
                    if ($_SESSION['genero'] == "M") {
                        $saludo = "Sr.";
                    } else {
                        $saludo = "Sra.";
                    }
                    echo $saludo . " " . $_SESSION['nombres'] . " usted no ha realizado hasta el momento ningún permiso.";
                }
                ?>
            </table>
        </div>
    </div>
</center>
<script>
    $('#buscar').click(function () {
        var elem = $('#valor_busqueda')[0];
//    alert(elem.value);
        location.href = "solicitudes_permiso_laboral.php?pagina=1&busqueda=" + elem.value;
    });
</script>
<script>    
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });</script>