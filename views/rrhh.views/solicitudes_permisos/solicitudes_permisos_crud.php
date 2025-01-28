<title>Crear permiso</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<!-- echo $_SESSION['supervisor']; -->
<?php


?>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_permiso)) { ?>Historial de permiso N° <?php echo $alm[0]->id_permiso; ?><?PHP } else { ?>Solicitud de permiso ARCOS<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal" id="frm-permisoLaboral" action="?p=rrhh&c=Solicitudes_permisos&a=Guardar" method="post" enctype="multipart/form-data">
                <h1 class="permisos-usuario-titulo">
                    <small class="text-white">
                        DATOS DEL EMPLEADO
                    </small>
                </h1>
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
                <input type="hidden" name="supervisor" id="supervisor" class="supervisor" value="<?php
                                                                                                    echo $_SESSION['supervisor'];
                                                                                                    ?>" />
                <input type="hidden" name="jefe_area" id="jefe_area" class="jefe_area" value="<?php
                                                                                                echo $_SESSION['jefe_area'];
                                                                                                ?>" />
                <input type="hidden" name="nombres" value="<?php echo $_SESSION['nombres'] ?>">

                <?php
                if ($_SESSION['cargo'] == 2 || $_SESSION['cargo'] == 3 || $_SESSION['cargo'] == 4) {
                ?>
                    <input type="hidden" name="permiso_supervisor" id="permiso_supervisor" class="permiso_supervisor" value=1 />
                    <input type="hidden" name="permiso_jefeope" id="permiso_jefeope" class="permiso_jefeope" value=1 />
                    <input type="hidden" name="permiso_rrhh" id="permiso_rrhh" class="permiso_rrhh" value=1 />
                <?php
                }
                ?>
                <?php
                foreach ($this->model->Super() as $c) :
                    if ($_SESSION['supervisor'] == $c->id_usuario) {
                        $supervisor_e = $c->nombres;
                        $supervisor_i = $c->correo;
                    }
                endforeach;
                foreach ($this->model->Super() as $j) :
                    if ($_SESSION['jefe_area'] == $j->id_usuario) {
                        $jefe_area_e = $j->nombres;
                        $jefe_area_i = $j->correo;
                    }
                endforeach;

                ?>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Nombres y apellido</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="nombres" placeholder="Nombres y apellido" class="form-control" type="text" readonly="" value="<?php
                                                                                                                                        if (isset($_SESSION['nombres'])) {
                                                                                                                                            echo $_SESSION['nombres'];
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        }
                                                                                                                                        ?>">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">C&eacute;dula</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="cedula" placeholder="Numero de documento" class="form-control" type="text" readonly="" value="<?php
                                                                                                                                        if (isset($_SESSION['n_documento'])) {
                                                                                                                                            echo $_SESSION['n_documento'];
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        }
                                                                                                                                        ?>">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Cargo</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                            <input name="cargo" placeholder="Cargo" class="form-control" type="text" readonly="" value="<?php
                                                                                                                        if (isset($_SESSION['puesto_contratado'])) {
                                                                                                                            echo $_SESSION['puesto_contratado'];
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        }
                                                                                                                        ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">supervisor encargado</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input placeholder="No tiene supervisor" class="form-control" type="text" readonly="" value="<?php echo $supervisor_e; ?>">
                            <input type="hidden" value="<?php echo $supervisor_i ?>" name="correo_sup">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Jefe de Area</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input class="form-control" placeholder="No tiene jefe de area" type="text" readonly="" value="<?php echo $jefe_area_e; ?>">
                            <input type="hidden" value="<?php echo $jefe_area_i ?>" name="correo_jefe_area">

                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <?PHP if (isset($alm[0]->id_permiso)) { ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Fecha de ultima modificacion</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input name="fecha_permiso" placeholder="Fecha elabor&oacute;" class="form-control" type="text" readonly="" value="<?php
                                                                                                                                                    if (isset($_SESSION['fecha'])) {
                                                                                                                                                        echo $_SESSION['fecha'];
                                                                                                                                                    } else {
                                                                                                                                                        echo date("Y/m/d");
                                                                                                                                                    }
                                                                                                                                                    ?>">
                            </div>
                        </div>
                    </div>

                <?PHP } else { ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Fecha elaboracion;</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input name="fecha_permiso" placeholder="Fecha elabor&oacute;" class="form-control" type="text" readonly="" value="<?php
                                                                                                                                                    if (isset($_SESSION['fecha'])) {
                                                                                                                                                        echo $_SESSION['fecha'];
                                                                                                                                                    } else {
                                                                                                                                                        echo date("Y/m/d");
                                                                                                                                                    }
                                                                                                                                                    ?>">
                            </div>
                        </div>
                    </div>
                <?PHP } ?>
                <!-- Select-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Tipo de permiso</label>
                    <div class="col-md-8 selectContainer">
                        <?php foreach ($this->model->TipoPermiso() as $tp) : ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_tipo_permiso" id="id_tipo_permiso" value="<?php echo $tp->id_tipo ?>" <?php if (isset($alm[0]->id_tipo_permiso) && ($alm[0]->id_tipo_permiso == $tp->id_tipo)) { ?> checked="" <?php } ?>>
                                <label class="form-check-label" for="id_tipo_permiso"><?php echo $tp->detalle_tipo; ?></label>
                            </div>
                        <?php endforeach; ?>
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
                                <option selected disabled>Seleccione</option>
                                <?php foreach ($this->model->IntervaloHora('05:00:00', '20:00:00') as $ih => $h) : ?>
                                    <option value="<?php echo $h; ?>" <?php if (isset($alm[0]->horario_laboral_entrada) && ($alm[0]->horario_laboral_entrada == $h)) { ?>selected<?php } ?>><?php echo $h; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora Salida</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_laboral_salida" id="horario_laboral_salida">
                                <option selected disabled>Seleccione</option>
                                <?php foreach ($this->model->IntervaloHora('05:00:00', '20:00:00') as $ih => $h) : ?>
                                    <option value="<?php echo $h; ?>" <?php if (isset($alm[0]->horario_laboral_salida) && ($alm[0]->horario_laboral_salida == $h)) { ?>selected<?php } ?>><?php echo $h; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Horario del Permiso</label>
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora de Salida</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_permiso_salida" id="horario_permiso_salida">
                                <option>Seleccione</option>
                                <?php foreach ($this->model->IntervaloHora('05:00:00', '20:00:00') as $ih => $h) : ?>
                                    <option value="<?php echo $h; ?>" <?php if (isset($alm[0]->horario_permiso_salida) && ($alm[0]->horario_permiso_salida == $h)) { ?>selected<?php } ?>><?php echo $h; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 selectContainer">
                        <label class="control-label">Hora De Entrada</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="horario_permiso_entrada" id="horario_permiso_entrada">
                                <option>Seleccione</option>
                                <?php foreach ($this->model->IntervaloHora('05:00:00', '20:00:00') as $ih => $h) : ?>
                                    <option value="<?php echo $h; ?>" <?php if (isset($alm[0]->horario_permiso_entrada) && ($alm[0]->horario_permiso_entrada == $h)) { ?>selected<?php } ?>><?php echo $h; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
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
                            ?><input type="hidden" id="date_range" name="date_range" value="<?php echo $alm[0]->date_range; ?>"><?php
                                                                                                                            } else {
                                                                                                                                ?>
                                <input onChange="saveToDatabase(this, 'rango fecha permisos')" type="text" id="date_range" name="date_range" class="form-control">
                            <?php } ?>
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
                            ?><input type="hidden" id="duracion_permiso" name="duracion_permiso" value="<?php echo $alm[0]->duracion_permiso; ?>"><?php
                                                                                                                                                } else {
                                                                                                                                                    ?>
                                <input name="duracion_permiso2" id="duracion_permiso2" placeholder="Duraci&oacute;n permiso" class="form-control duracion_permiso2" type="text" readonly="">
                                <input name="duracion_permiso" id="duracion_permiso" placeholder="Duraci&oacute;n permiso" class="form-control duracion_permiso" type="hidden">
                            <?php } ?>
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
                            <textarea name="motivo" id="motivo" class="form-control motivo" cols="5" rows="6"><?php
                                                                                                                if (isset($alm[0]->motivo)) {
                                                                                                                    echo $alm[0]->motivo;
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                }
                                                                                                                ?></textarea>
                        </div>
                    </div>
                </div>
                <!-- Text Area observaciones-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Observaciones</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-height"></i></span>
                            <textarea name="observaciones" id="observaciones" class="form-control observaciones" cols="5" rows="6"><?php
                                                                                                                                    if (isset($alm[0]->observaciones)) {
                                                                                                                                        echo $alm[0]->observaciones;
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    }
                                                                                                                                    ?></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <?php
                if (isset($alm[0]->archivo)) { 
                ?>
                    <div class="form-group">
                        <div class="col-md-5 inputGroupContainer">
                            <a href="./assets/evidencias/<?php echo $alm[0]->archivo; 
                                                            ?>" download="<?php echo $alm[0]->archivo; 
                                                                                                        ?>">
                                Descargar Archivo Subido por <?php echo $_SESSION['nombres'] 
                                                                ?>
                            </a>
                        </div>
                    </div> 

                <?php
                } else { 
                ?>
                <div class="form-group">
                        <label class="col-md-4 control-label">Archivo</label>
                        <div class="col-md-5 inputGroupContainer">
                            <input type="file" name="archivo">
                        </div>
                    </div>
                <?php  } 
                ?>
                <br>



                <?php if (isset($alm[0]->id_permiso)) { ?>
                    <!-- Check box firma autorización-->
                    <!--Firmas supervisores-->
                    <?php
                    foreach ($this->model->Supervisor($alm[0]->id_usuario) as $sup) :
                        if (isset($sup) && $sup != "") {
                            $nombre_supervisor[] = $sup->nombres;
                            $id_supervisor[] = $sup->id_usuario;
                        }
                    endforeach;
                    foreach ($this->model->JefeOperciones() as $jefe_operciones) :
                        if (isset($jefe_operciones) && $jefe_operciones != "") {
                            $nombre_jefeOperciones[] = $jefe_operciones->nombres;
                            $id_jefeOperciones[] = $jefe_operciones->id_usuario;
                        }
                    endforeach;
                    foreach ($this->model->Nomina() as $nomina) :
                        if (isset($nomina) && $nomina != "") {
                            $nombre_nomina[] = $nomina->nombres;
                            $id_nomina[] = $nomina->id_usuario;
                        }
                    endforeach;
                    foreach ($this->model->TalentoH() as $rec_hum) :
                        if (isset($rec_hum) && $rec_hum != "") {
                            $nombre_rrhh[] = $rec_hum->nombres;
                            $id_rrhh[] = $rec_hum->id_usuario;
                        }
                    endforeach;



                    foreach ($this->model->User($alm[0]->id_usuario) as $de) :
                        $nombres_e = $de->nombres;
                        $documento_e = $de->n_documento;
                        $puesto_e = $de->puesto_contratado;
                        $area_e = $de->area;
                        $cargo_e = $de->cargo;

                    endforeach;
                    foreach ($this->model->Super($alm[0]->id_usuario) as $c) :
                        if ($de->supervisor == $c->id_usuario) {
                            $supervisor_e = $c->nombres;
                        }
                    endforeach;


                    foreach ($this->model->Jefeope($alm[0]->id_usuario) as $j) :
                        if ($de->jefe_area == $j->id_usuario) {
                            $jefearea_e = $j->nombres;
                        }
                    endforeach;

                    ?>
                    <!-- Botones de autorizado para supervisor -->
                    <?php
                    foreach ($this->model->Listar() as $s) :
                        if ($s->autorizado_sup == 0) {
                            $autorizado = "Esperando autorizacion";
                        }
                        if ($s->autorizado_sup > 0) {
                            $autorizado = "Autorizado";
                        }
                        if ($s->autorizado_sup < 0) {
                            $autorizado = "Permiso Denegado";
                        }
                    endforeach;
                    ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Autorizado de Supervisor </label>
                        <div class="col-md-1 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-check"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 inputGroupContainer">
                            <td><?php echo $autorizado; ?></td>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Observaciones Supervisor</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-text-height"></i>
                                </span>
                                <div class="text-center">
                                    <?php
                                    if (isset($alm[0]->observaciones_supervisor)) {
                                        echo nl2br($alm[0]->observaciones_supervisor);
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <!-- Botones de autorizado para jefe de area -->
                    <?php
                    foreach ($this->model->Listar() as $jf) :
                        if ($jf->autorizado_ope == 0) {
                            $autorizado2 = "Esperando autorizacion";
                        }
                        if ($jf->autorizado_ope > 0) {
                            $autorizado2 = "Autorizado";
                        }
                        if ($jf->autorizado_ope < 0) {
                            $autorizado2 = "Permiso Denegado";
                        }
                        if ($jf->autorizado_sup >= 0) {
                            $jf_auto = $jf->autorizado_sup;
                        }
                    endforeach;
                    if ($jf_auto >= 0) {
                    ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Autorizado de jefe de operaciones</label>
                            <div class="col-md-1 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-check"></i>
                                    </span>
                                </div>
                            </div>



                            <div class="col-md-4 inputGroupContainer">
                                <td><?php echo $autorizado2; ?></td>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Observaciones de jefe de operaciones</label>
                            <div class="col-md-5 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-text-height"></i>
                                    </span>
                                    <div class="text-center">
                                        <?php
                                        if (isset($alm[0]->observaciones_jefe_operaciones)) {
                                            echo nl2br($alm[0]->observaciones_jefe_operaciones);
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    <?php
                    }
                    ?>

                    <!-- Botones de autorizado para rrhh -->
                    <?php
                    foreach ($this->model->Listar() as $rrhh) :
                        if ($rrhh->autorizado_rrhh == 0) {
                            $autorizado3 = "Esperando autorizacion";
                        }
                        if ($rrhh->autorizado_rrhh > 0) {
                            $autorizado3 = "Autorizado";
                        }
                        if ($rrhh->autorizado_rrhh < 0) {
                            $autorizado3 = "Permiso Denegado";
                        }
                        if ($rrhh->autorizado_ope >= 0) {
                            $rrhh_auto == $rrhh->autorizado_ope;
                        }
                    endforeach;
                    if ($rrhh_auto >= 0) {
                    ?>
                        <!-- Check box firma autorización-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Autorizado Talento Humano </label>
                            <div class="col-md-1 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 inputGroupContainer">

                                <td><?php echo $autorizado3; ?></td>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Observaciones Talento Humano</label>
                            <div class="col-md-5 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-text-height"></i>
                                    </span>
                                    <div class="text-center">

                                        <?php
                                        if (isset($alm[0]->observaciones_rrhh)) {
                                            echo nl2br($alm[0]->observaciones_rrhh);
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    <?php
                    }

                    ?>


                    <?php
                    foreach ($this->model->Listar() as $nomina_a) :
                        if ($nomina_a->autorizado_nomina == 0) {
                            $autorizado4 = "Esperando autorizacion";
                        }
                        if ($nomina_a->autorizado_nomina > 0) {
                            $autorizado4 = "Autorizado";
                        }
                        if ($nomina_a->autorizado_nomina < 0) {
                            $autorizado4 = "Permiso Denegado";
                        }
                        if ($nomina_a->autorizado_rrhh >= 0) {
                            $nomina_auto = $nomina_a->autorizado_rrhh;
                        }
                    endforeach;
                    if ($nomina_auto >= 0) {
                    ?>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Autorizado N&oacute;mina</label>
                            <div class="col-md-1 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-check"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 inputGroupContainer">
                                <td><?php echo $autorizado4; ?></td>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Observaciones N&oacute;mina</label>
                            <div class="col-md-5 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-text-height"></i>
                                    </span>
                                    <div class="text-center">

                                        <?php
                                        if (isset($alm[0]->observaciones_nomina)) {
                                            echo nl2br($alm[0]->observaciones_nomina);
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Check box firma autorización-->
                <?php
                }
                ?>
                <!-- Label para tener en cuenta -->
                <?PHP if (isset($alm[0]->id_permiso)) { ?>
        </div>

        <center style="margin-left:25px">
            <h3 class="creacion-usuario-titulo"><small class="text-white">
                    SI USTED SE HA EQUIVOCADO AL MOMENTO DE ELABORAR SU PERMISO. O EN SU DEFECTO EL PERMISO HA SIDO DENEGADO. POR FAVOR REGISTRAR UN NUEVO PERMISO.
                </small></h3>
        </center>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-6">
                <div>
                    <a href="?p=rrhh&c=Solicitudes_permisos&a=main" type="button" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </div>

    <?php
                } else {
    ?>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-6">
                <div>
                    <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-6">
                <div>
                    <a href="?p=rrhh&c=Solicitudes_permisos&a=main" type="button" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
        </form>
</div>
</center>
</div>
<?PHP } ?>
<script>
    $(window).on('load', function() {
        setTimeout(function() {
            $(".loader-page").css({
                visibility: "hidden",
                opacity: "0"
            });
        }, 500);
    });

    $(document).ready(function() {
        if ($("#id_permiso").val() === "") {
            $('#frm-permisoLaboral').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    id_tipo_permiso: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa tipo de permiso'
                            }
                        }
                    },
                    horario_laboral_entrada: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa hora de ingreso asignado'
                            }
                        }
                    },
                    horario_laboral_salida: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa hora de salida asingado'
                            }
                        }
                    },
                    motivo: {
                        validators: {
                            stringLength: {
                                min: 20,
                                message: 'Por favor motivo mayor a 20 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor justifica el motivo de permiso'
                            }
                        }
                    }
                }
            });
        } else {
            $('#frm-permisoLaboral').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    id_tipo_permiso: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa tipo de permiso'
                            }
                        }
                    },
                    horario_laboral_entrada: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa hora de ingreso asignado'
                            }
                        }
                    },
                    horario_laboral_salida: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa hora de salida asingado'
                            }
                        }
                    },
                    motivo: {
                        validators: {
                            stringLength: {
                                min: 20,
                                message: 'Por favor motivo mayor a 20 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor justifica el motivo de permiso'
                            }
                        }
                    }
                }
            });
        }

    });
    $('#date_range').daterangepicker();
    $(function() {
        $('#date_range').daterangepicker({
            "locale": {
                "format": "YYYY-MM-DD H:mm:ss",
                "separator": " al ",
                "applyLabel": "Guardar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 7
            },
            timePicker: true,
            timePicker24Hour: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(4, 'hour'),
            "opens": "center"
        });
    });

    function saveToDatabase(editableObj, column) {
        //alert(editableObj.value);
        $(editableObj).css("background", "#FFF url(img/loaderIcon.gif) no-repeat right");
        $.ajax({
            url: "models/rrhh.models/guardar_empleado_mes.php",
            type: "POST",
            data: 'editval=' + editableObj.value + '&column=' + column,
            beforeSend: function() {
                //                alert(editableObj.value+" "+column)
                //                 setting a timeout
            },

            success: function(data) {
                $("#duracion_permiso").val(data);
                $("#duracion_permiso2").val(data);
                $(editableObj).css("background", "#FDFDFD");
                $("#duracion_permiso2").load(location.href + " #duracion_permiso2", "");
            }
        });
    }
</script>