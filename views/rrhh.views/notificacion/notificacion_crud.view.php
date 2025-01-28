<style>
    .checkboxprueba {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2);
        /* IE */
        -moz-transform: scale(2);
        /* FF */
        -webkit-transform: scale(2);
        /* Safari and Chrome */
        -o-transform: scale(2);
        /* Opera */
        padding: 10px;
    }
</style>
<title>Otorgar permisos</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_permiso)) { ?>Historial de permiso N° <?php echo $alm[0]->id_permiso; ?><?PHP } else { ?>Solicitud de permiso ARCOS<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal" id="frm-permisoLaboralAdmin" action="?p=rrhh&c=Notificaciones&a=Guardar" method="post" enctype="multipart/form-data">
                <h1 class="permisos-usuario-titulo">
                    <small class="text-white">
                        DATOS DEL EMPLEADO
                    </small>
                </h1>
                <?php
                foreach ($this->model->DatosEm($alm[0]->id_usuario) as $de) :
                    $nombres_e = $de->nombres;
                    $documento_e = $de->n_documento;
                    $cargo_e = $de->puesto_contratado;
                    $area_e = $de->area;

                    foreach ($this->model->Super($alm[0]->id_usuario) as $c) :
                        if ($de->supervisor == $c->id_usuario) {
                            $supervisor_e = $c->nombres;
                            $supervisor_n = $de->supervisor;
                        }
                        if ($de->jefe_area == $c->id_usuario) {
                            $jefe_area_e = $c->nombres;
                            $correo_jefe_area = $c->correo;
                        }
                    endforeach;

                endforeach;
                ?>
                
                <input type="hidden" name="correo_jefe_area" value="<?php echo $correo_jefe_area ?>">
                <input type="hidden" name="nombres_e" id="nombres_e" class="nombres_e" value="<?php
                                                                                                if (isset($nombres_e)) {
                                                                                                    echo $nombres_e;
                                                                                                }

                                                                                                ?>" />
                <input type="hidden" name="id_permiso" id="id_permiso" class="id_permiso" value="<?php
                                                                                                    if (isset($alm[0]->id_permiso)) {
                                                                                                        echo $alm[0]->id_permiso;
                                                                                                    }
                                                                                                    ?>" />
                <input type="hidden" name="id_usuario" id="id_usuario" class="id_usuario" value="<?php
                                                                                                    if (isset($_SESSION['id_usuario'])) {
                                                                                                        echo $_SESSION['id_usuario'];
                                                                                                    }
                                                                                                    ?>" />



                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Nombres y apellido</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="nombres" placeholder="Nombres y apellido" class="form-control" type="text" readonly="" value="<?php echo $nombres_e ?>">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">C&eacute;dula</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="cedula" placeholder="Numero de documento" class="form-control" type="text" readonly="" value="<?php echo $documento_e; ?>">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Cargo</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="cargo" placeholder="Cargo" class="form-control" type="text" readonly="" value="<?php echo $cargo_e ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">supervisor encargado</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="supervisor" placeholder="supervisor" class="form-control" type="text" readonly="" value="<?php echo $supervisor_e; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Jefe de Area</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="jefe_area" placeholder="jefe_area" class="form-control" type="text" readonly="" value="<?php echo $jefe_area_e; ?>">
                        </div>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha elabor&oacute;</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input name="fecha_permiso" placeholder="Fecha elabor&oacute;" class="form-control" type="text" readonly="" value="<?php echo $alm[0]->fecha_creado; ?>">
                        </div>
                    </div>
                </div>
                <!-- Select-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Tipo de permiso</label>
                    <div class="col-md-8 selectContainer text-left">
                        <?php foreach ($this->model->TipoPermiso() as $tp) : ?>
                            <?php
                            if (isset($alm[0]->id_tipo_permiso) && ($alm[0]->id_tipo_permiso == $tp->id_tipo)) {
                                $detalle_permiso = $tp->detalle_tipo;
                            }
                            ?>
                        <?php endforeach; ?>
                        <div class="form-check form-check-inline">
                            <?php echo $detalle_permiso ?>
                        </div>
                    </div>
                </div>
                <!-- Select-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Horario Laboral</label>
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora Entrada</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_laboral_entrada" id="horario_laboral_entrada">
                                <option <?php if (isset($alm[0]->horario_laboral_entrada)) { ?>selected<?php } ?>><?php echo $alm[0]->horario_laboral_entrada; ?></option>
                            </select>
                        </div>
                    </div>
                    <!--<div class="form-group">-->
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora Salida</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_laboral_salida" id="horario_laboral_salida">
                                <option <?php if (isset($alm[0]->horario_laboral_salida)) { ?>selected<?php } ?>><?php echo $alm[0]->horario_laboral_salida; ?></option>
                            </select>
                        </div>
                    </div>
                    <!--</div>-->
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Horario de Permiso</label>
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora Salida</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_permiso_salida" id="horario_permiso_salida">
                                <option <?php if (isset($alm[0]->horario_permiso_salida)) { ?>selected<?php } ?>><?php echo $alm[0]->horario_permiso_salida; ?></option>
                            </select>
                        </div>
                    </div>
                    <!--<div class="form-group">-->
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora Entrada</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_permiso_entrada" id="horario_permiso_entrada">
                                <option <?php if (isset($alm[0]->horario_permiso_entrada)) { ?>selected<?php } ?>><?php echo $alm[0]->horario_permiso_entrada; ?></option>
                            </select>
                        </div>
                    </div>
                    <!--</div>-->
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Rango fecha y hora permiso</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <?php
                            if (isset($alm[0]->date_range)) {
                                echo $alm[0]->date_range;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Duraci&oacute;n Permiso</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-hourglass"></i></span>
                            <?php
                            if (isset($alm[0]->duracion_permiso)) {
                                echo $alm[0]->duracion_permiso;
                            ?>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <h1 class="permisos-usuario-titulo"><small class="text-white">
                        MOTIVO / OBSERVACIONES
                    </small>
                </h1>
                <!-- Text Area motivo-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Motivo</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-height"></i></span>
                            <?php
                            if (isset($alm[0]->motivo)) {
                                echo $alm[0]->motivo;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Text Area observaciones-->

                <div class="">
                    <label class="">Observaciones</label>
                    <div class="">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-height"></i></span>
                            <?php
                            if (isset($alm[0]->observaciones)) {
                                echo $alm[0]->observaciones;
                            }
                            ?>
                        </div>
                    </div>
                </div>



                <?php
                if (isset($alm[0]->archivo)) { ?>

                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mx-auto text-center">
                            <a href="././assets/evidencias/<?php echo $alm[0]->archivo; ?>" download="<?php echo $alm[0]->archivo; ?>" class="text-center">
                                        Descargar Archivo Subido por <?php echo $_SESSION['nombres'] ?>
                                    </a>
                            </div>
                        </div>
                    </div>



                <?php
                } else { ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label">El usuario no ha subido ningun archivo</label>
                    </div>
                <?php } ?>
                <br>

                <!-- SUPERVISOR -->
                <?php
                foreach ($this->model->Supervisor() as $sup) :
                    if (isset($sup) && $sup != "") {
                        $nombre_supervisor[] = $sup->nombres;
                        $id_supervisor[] = $sup->id_usuario;
                    }
                endforeach;


                if (in_array($_SESSION['id_usuario'], $id_supervisor) && $alm[0]->supervisor == $_SESSION['id_usuario']) {
                    $disabled_s = "";
                } else {
                    $disabled_s = "disabled";
                }

                ?>

                <div class="form-group">
                    <label class="col-md-4 control-label">Autorizado de Supervisor</label>
                    <div class="col-md-1 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-check"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4 inputGroupContainer">
                        <?php

                        if (isset($alm[0]->autorizado_sup) && $alm[0]->autorizado_sup == 0) {

                            echo "Esperando Autorizacion<br><br>"
                        ?>
                            <input <?php echo $disabled_s; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_supervisor_check" class="checkboxprueba" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <label for="autoriza_supervisor_check">Autorizar permiso</label>
                            <br>
                            <br>
                            <input <?php echo $disabled_s; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_supervisor_check" class="checkboxprueba" value="<?php echo -$_SESSION['id_usuario']; ?>">
                            <label for="autoriza_supervisor_check">Rechazar permiso</label>
                        <?php
                        }

                        if (isset($alm[0]->autorizado_sup) && $alm[0]->autorizado_sup < 0) {

                            echo "Permiso Denegado <br><br>";
                        }

                        if (isset($alm[0]->autorizado_sup) && $alm[0]->autorizado_sup > 0) {

                            echo "Autorizado<br>";
                        }
                        ?>
                        </label>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-4 control-label">Observaciones Supervisor</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-text-height"></i>
                            </span>
                            <textarea <?php echo $disabled_s; ?> name="observaciones_supervisor" id="observaciones_supervisor" class="form-control observaciones_supervisor text-justify" cols="5" rows="6"><?php
                                                                                                                                                                                                            if (isset($alm[0]->observaciones_supervisor)) {
                                                                                                                                                                                                                echo ($alm[0]->observaciones_supervisor);
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo "";
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?></textarea>
                        </div>
                    </div>
                </div>
                <?php
                ?>
                <!-- SUPERVISOR -->


                <!-- JEFE DE OPERACIONES -->
                <?php
                if ($alm[0]->autorizado_sup > 0) {
                ?>
                    <?php
                    foreach ($this->model->JefeOperciones() as $jefe_operaciones) :
                        if (isset($jefe_operaciones) && $jefe_operaciones != "") {
                            $nombre_jefeOperaciones[] = $jefe_operaciones->nombres;
                            $id_jefeOperaciones[] = $jefe_operaciones->id_usuario;
                        }
                    endforeach;


                    if (in_array($_SESSION['id_usuario'], $id_jefeOperaciones) && $alm[0]->jefe_area == $_SESSION['id_usuario']) {
                        $disabled_op = "";
                    } else {
                        $disabled_op = "disabled";
                    }
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Autorizado de Jefe de Operaciones</label>
                        <div class="col-md-1 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-check"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 inputGroupContainer">
                            <?php

                            if (isset($alm[0]->autorizado_ope) && $alm[0]->autorizado_ope == 0) {

                                echo "Esperando Autorizacion<br><br>"
                            ?>
                                <input <?php echo $disabled_op; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_jefeope_check" class="checkboxprueba" value="<?php echo $_SESSION['id_usuario']; ?>">
                                <label for="autoriza_jefeope_check">Autorizar permiso</label>
                                <br>
                                <br>
                                <input <?php echo $disabled_op; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_jefeope_check" class="checkboxprueba" value="<?php echo -$_SESSION['id_usuario']; ?>">
                                <label for="autoriza_jefeope_check">Rechazar permiso</label>
                            <?php
                            }

                            if (isset($alm[0]->autorizado_ope) && $alm[0]->autorizado_ope < 0) {

                                echo "Permiso Denegado <br><br>";
                            }

                            if (isset($alm[0]->autorizado_ope) && $alm[0]->autorizado_ope > 0) {

                                echo "Autorizado<br>";
                            }
                            ?>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Observaciones Jefe de Operaciones</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-text-height"></i>
                                </span>
                                <textarea <?php echo $disabled_op; ?> name="observaciones_jefe_operaciones" id="observaciones_jefe_operaciones" class="form-control observaciones_jefe_operaciones text-justify" cols="5" rows="6"><?php
                                                                                                                                                                                                                                    if (isset($alm[0]->observaciones_jefe_operaciones)) {
                                                                                                                                                                                                                                        echo ($alm[0]->observaciones_jefe_operaciones);
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- JEFE DE OPERACIONES -->

                <!-- RRHH -->
                <?php
                if ($alm[0]->autorizado_ope > 0) {
                ?>
                    <?php
                    foreach ($this->model->TalentoH() as $rec_hum) :
                        if (isset($rec_hum) && $rec_hum != "") {
                            $nombre_rrhh[] = $rec_hum->nombres;
                            $id_rrhh[] = $rec_hum->id_usuario;
                        }
                    endforeach;


                    if (in_array($_SESSION['id_usuario'], $id_rrhh)) {
                        $disabled_rrhh = "";
                    } else {
                        $disabled_rrhh = "disabled";
                    }
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Autorizado de Recursos Humanos</label>
                        <div class="col-md-1 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-check"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 inputGroupContainer">
                            <?php

                            if (isset($alm[0]->autorizado_rrhh) && $alm[0]->autorizado_rrhh == 0) {

                                echo "Esperando Autorizacion<br><br>"
                            ?>
                                <input <?php echo $disabled_rrhh; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_rrhh_check" class="checkboxprueba" value="<?php echo $_SESSION['id_usuario']; ?>">
                                <label for="autoriza_rrhh_check">Autorizar permiso</label>
                                <br>
                                <br>
                                <input <?php echo $disabled_rrhh; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_rrhh_check" class="checkboxprueba" value="<?php echo -$_SESSION['id_usuario']; ?>">
                                <label for="autoriza_rrhh_check">Rechazar permiso</label>
                            <?php
                            }

                            if (isset($alm[0]->autorizado_rrhh) && $alm[0]->autorizado_rrhh < 0) {

                                echo "Permiso Denegado <br><br>";
                            }

                            if (isset($alm[0]->autorizado_rrhh) && $alm[0]->autorizado_rrhh > 0) {

                                echo "Autorizado<br>";
                            }
                            ?>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Observaciones de Recursos Humanos</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-text-height"></i>
                                </span>
                                <textarea <?php echo $disabled_rrhh; ?> name="observaciones_rrhh" id="observaciones_rrhh" class="form-control observaciones_rrhh text-justify" cols="5" rows="6"><?php
                                                                                                                                                                                                    if (isset($alm[0]->observaciones_rrhh)) {
                                                                                                                                                                                                        echo ($alm[0]->observaciones_rrhh);
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "";
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- RRHH -->

                <!-- NOMINA -->
                <?php
                if ($alm[0]->autorizado_rrhh > 0) {
                ?>
                    <?php
                    foreach ($this->model->Nomina() as $nomina) :
                        if (isset($nomina) && $nomina != "") {
                            $nombre_nomina[] = $nomina->nombres;
                            $id_nomina[] = $nomina->id_usuario;
                        }
                    endforeach;


                    if (in_array($_SESSION['id_usuario'], $id_nomina)) {
                        $disabled_nomina = "";
                    } else {
                        $disabled_nomina = "disabled";
                    }
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Autorizado de Nomina</label>
                        <div class="col-md-1 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-check"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 inputGroupContainer">
                            <?php

                            if (isset($alm[0]->autorizado_nomina) && $alm[0]->autorizado_nomina == 0) {

                                echo "Esperando Autorizacion<br><br>"
                            ?>
                                <input <?php echo $disabled_nomina; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_nomina_check" class="checkboxprueba" value="<?php echo $_SESSION['id_usuario']; ?>">
                                <label for="autoriza_nomina_check">Autorizar permiso</label>
                                <br>
                                <br>
                                <input <?php echo $disabled_nomina; ?> type="radio" style="margin: 0px 12px 0px 0px;" name="autoriza_nomina_check" class="checkboxprueba" value="<?php echo -$_SESSION['id_usuario']; ?>">
                                <label for="autoriza_nomina_check">Rechazar permiso</label>
                            <?php
                            }

                            if (isset($alm[0]->autorizado_nomina) && $alm[0]->autorizado_nomina < 0) {

                                echo "Permiso Denegado <br><br>";
                            }

                            if (isset($alm[0]->autorizado_nomina) && $alm[0]->autorizado_nomina > 0) {

                                echo "Autorizado<br>";
                            }
                            ?>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Observaciones Nomina</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-text-height"></i>
                                </span>
                                <textarea <?php echo $disabled_nomina; ?> name="observaciones_nomina" id="observaciones_nomina" class="form-control observaciones_nomina text-justify" cols="5" rows="6"><?php
                                                                                                                                                                                                            if (isset($alm[0]->observaciones_nomina)) {
                                                                                                                                                                                                                echo ($alm[0]->observaciones_nomina);
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo "";
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- NOMINA -->


















                <!-- Label para tener en cuenta -->
                <div class="form-group">
                    <center>
                        <!-- <label class="col-md-12 text-center">La aprobaci&oacute;n de los permisos s&oacute;lo tiene validez cuando se tienen la confirmaci&oacute;n y aprobaci&oacute;n de: Jefe inmediato, N&oacute;mina y Talento humano.<br>Al completar las aprobaciones se le enviar&aacute; a su email registrado en el sistema confirmando ya sea aprobado o rechazado su solicitud de permiso.</label> -->
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <a href="?p=rrhh&c=Notificaciones&a=main" type="button" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>

<script>
    $(window).on('load', function() {
        setTimeout(function() {
            $(".loader-page").css({
                visibility: "hidden",
                opacity: "0"
            });
        }, 500);
    });
    $('#buscar').click(function() {
        var elem = $('#valor_busqueda')[0];
        //    alert(elem.value);
        location.href = "solicitudes_permiso_laboral.php?pagina=1&busqueda=" + elem.value;
    });
</script>