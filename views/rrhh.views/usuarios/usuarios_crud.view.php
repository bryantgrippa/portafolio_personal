<?PHP if (isset($alm[0]->id_usuario)) { ?>
    <title>Modificacion de usuario</title>
<?PHP } else { ?>
    <title>Creacion de usuario</title>
<?PHP } ?>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_usuario)) { ?>Modificaci&oacute;n de usuario <?php echo $alm[0]->nombres; ?><?PHP } else { ?>Creaci&oacute;n de un nuevo usuario<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="row">
            <form class="well form-horizontal" id="frm-usuario" action="?p=rrhh&c=Usuarios&a=Guardar" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_usuario" id="id_usuario" class="id_usuario" value="<?php if (isset($alm[0]->id_usuario)) {
                                                                                                        echo $alm[0]->id_usuario;
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Nombres Completos</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="nombres" placeholder="Nombres Completos" class="form-control" type="text" value="<?php
                                                                                                                            if (isset($alm[0]->nombres)) {
                                                                                                                                echo $alm[0]->nombres;
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            }
                                                                                                                            ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Usuario</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="usuario" placeholder="Username" class="form-control" type="text" value="<?php
                                                                                                                    if (isset($alm[0]->usuario)) {
                                                                                                                        echo $alm[0]->usuario;
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    }
                                                                                                                    ?>" <?php if (isset($alm[0]->usuario)) { ?>readonly="" <?php } ?>>
                        </div>
                    </div>
                </div>

                <?PHP if (empty($alm[0]->id_usuario)) { ?>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Contrase&ntilde;a</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                <input name="password" placeholder="Password" class="form-control" type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirmar contrase&ntilde;a</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                <input name="confirm_password" placeholder="Confirme Contrase&ntilde;a" class="form-control" type="password">
                            </div>
                        </div>
                    </div>
                <?PHP } ?>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">No. de documento</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="n_documento" placeholder="n_documento" class="form-control" type="text" value="<?php
                                                                                                                        if (isset($alm[0]->n_documento)) {
                                                                                                                            echo $alm[0]->n_documento;
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        }
                                                                                                                        ?>">
                        </div>
                    </div>
                </div>
                <!-- Text date-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de nacimiento</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input name="fecha_nacimiento" placeholder="dd/mm/aaaa" class="form-control" type="date" value="<?php
                                                                                                                            if (isset($alm[0]->fecha_nacimiento)) {
                                                                                                                                echo $alm[0]->fecha_nacimiento;
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            }
                                                                                                                            ?>">
                        </div>
                    </div>
                </div>
                <!-- Text date-->

                <!-- Text date-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de Ingreso</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input name="fecha_ingreso" placeholder="dd/mm/aaaa" class="form-control" type="date" value="<?php
                                                                                                                            if (isset($alm[0]->fecha_ingreso)) {
                                                                                                                                echo $alm[0]->fecha_ingreso;
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            }
                                                                                                                            ?>">
                        </div>
                    </div>
                </div>
                <!-- Select-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Cargo a desempe&ntilde;ar</label>
                    <div class="col-md-5 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="cargo" id="cargo">
                                <?php foreach ($this->model->Cargo() as $cu) : ?>
                                    <option value="<?php echo $cu->id_cargo ?>" <?php if (isset($alm[0]->cargo) && ($alm[0]->cargo == $cu->id_cargo)) { ?>selected<?php } ?>><?php echo $cu->detalle_cargo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Supervisor</label>
                    <div class="col-md-5 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="supervisor" id="supervisor">
                                <option value="0">Ninguno</option>
                                <?php foreach ($this->model->Supervisor() as $su) : ?>
                                    <option value="<?php echo $su->id_usuario ?>" <?php if (isset($alm[0]->supervisor) && ($alm[0]->supervisor == $su->id_usuario)) { ?>selected<?php } ?>><?php echo $su->nombres; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Jefe de Area</label>
                    <div class="col-md-5 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="jefe_area" id="jefe_area">
                                <option value="0">Ninguno</option>
                                <?php foreach ($this->model->jefe_area() as $ja) : ?>
                                    <option value="<?php echo $ja->id_usuario ?>" <?php if (isset($alm[0]->jefe_area) && ($alm[0]->jefe_area == $ja->id_usuario)) { ?>selected<?php } ?>><?php echo $ja->nombres; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Email date-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Puesto a deempeñar</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                            <input name="puesto_contratado" placeholder="Asesor Call Center" class="form-control" type="text" value="<?php
                                                                                                                                        if (isset($alm[0]->puesto_contratado)) {
                                                                                                                                            echo $alm[0]->puesto_contratado;
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        }
                                                                                                                                        ?>">
                        </div>
                    </div>
                </div>
                <!-- Email date-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Sueldo en n&uacute;mero (sin puntos, sin comas)</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                            <input name="valor_sueldo" placeholder="123456789" class="form-control" type="number" value="<?php
                                                                                                                            if (isset($alm[0]->valor_sueldo)) {
                                                                                                                                echo $alm[0]->valor_sueldo;
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            }
                                                                                                                            ?>">
                        </div>
                    </div>
                </div>
                <!-- Email date-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Sueldo en letras</label>
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                            <input name="valor_sueldo_letras" placeholder="Un millón" class="form-control" type="text" value="<?php
                                                                                                                                if (isset($alm[0]->valor_sueldo_letras)) {
                                                                                                                                    echo $alm[0]->valor_sueldo_letras;
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                }
                                                                                                                                ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">


                    <!-- Select-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area" id="area">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area) && ($alm[0]->area == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 2</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_1" id="area_1">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_1) && ($alm[0]->area_1 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 3</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_2" id="area_2">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_2) && ($alm[0]->area_2 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 4</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_3" id="area_3">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_3) && ($alm[0]->area_3 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 5</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_4" id="area_4">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_4) && ($alm[0]->area_4 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 6</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_5" id="area_5">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_5) && ($alm[0]->area_5 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 7</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_6" id="area_6">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_6) && ($alm[0]->area_6 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">&Aacute;rea 8</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="area_7" id="area_7">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($this->model->Area() as $a) : ?>
                                        <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_7) && ($alm[0]->area_7 == $a->id_area)) { ?>selected<?php } ?>><?php echo $a->detalle_area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>



                    <!-- Select-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">G&eacute;nero</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select class="form-control form-control-lg" name="genero" id="genero">
                                    <option value="F" <?php if (isset($alm[0]->genero) && ($alm[0]->genero == "F")) { ?>selected<?php } ?>>Femenino</option>
                                    <option value="M" <?php if (isset($alm[0]->genero) && ($alm[0]->genero == "M")) { ?>selected<?php } ?>>Masculino</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Select-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dar la bienvenida</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                                <select class="form-control form-control-lg" name="bienvenida" id="bienvenida">
                                    <option value="0" <?php if (isset($alm[0]->bienvenida) && ($alm[0]->bienvenida == 0)) { ?>selected<?php } ?>>No</option>
                                    <option value="1" <?php if (isset($alm[0]->bienvenida) && ($alm[0]->bienvenida == 1)) { ?>selected<?php } ?>>Si</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Select-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Permisos</label>
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select class="form-control form-control-lg" name="permiso" id="permiso">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($this->model->Permiso() as $p) : ?>
                                        <option value="<?php echo $p->id_permiso ?>" <?php if (isset($alm[0]->permiso) && ($alm[0]->permiso == $p->id_permiso)) { ?>selected<?php } else if (empty($alm[0]->permiso) && $p->id_permiso == 4) { ?>selected<?php } ?>><?php echo $p->detalle_permiso; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--Text input-->

                    <!--Text input-->

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-6">
                            <div>
                                <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-6">
                            <div>
                                <a href="?p=rrhh&c=Usuarios&a=main" type="button" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
            </form>
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
    </center>
</div>
</div>
<script>
    // Esperamos a que todo el HTML esté cargado antes de ejecutar Javascrip
    document.addEventListener('DOMContentLoaded', () => {

        // Input File
        const inputImage = document.querySelector('#foto');
        // Nodo donde estará el editor
        const editor = document.querySelector('#editor');
        // El canvas donde se mostrará la previa
        const miCanvas = document.querySelector('#preview');
        // Contexto del canvas
        const contexto = miCanvas.getContext('2d');
        // Ruta de la imagen seleccionada
        let urlImage = undefined;
        // Evento disparado cuando se adjunte una imagen
        inputImage.addEventListener('change', abrirEditor, false);

        /**
         * Método que abre el editor con la imagen seleccionada
         */
        function abrirEditor(e) {
            // Obtiene la imagen
            urlImage = URL.createObjectURL(e.target.files[0]);

            // Borra editor en caso que existiera una imagen previa
            editor.innerHTML = '';
            let cropprImg = document.createElement('img');
            cropprImg.setAttribute('id', 'croppr');
            editor.appendChild(cropprImg);

            // Limpia la previa en caso que existiera algún elemento previo
            contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);

            // Envia la imagen al editor para su recorte
            document.querySelector('#croppr').setAttribute('src', urlImage);

            // Crea el editor
            new Croppr('#croppr', {
                aspectRatio: 1,
                startSize: [70, 70],
                maxSize: [200, 200],
                onCropEnd: recortarImagen
            })
        }

        /**
         * Método que recorta la imagen con las coordenadas proporcionadas con croppr.js
         */
        function recortarImagen(data) {
            // Variables
            const inicioX = data.x;
            const inicioY = data.y;
            const nuevoAncho = data.width;
            const nuevaAltura = data.height;
            const zoom = 1;
            let imagenEn64 = '';
            //            alert(nuevoAncho);
            //            alert(nuevaAltura);
            // La imprimo
            miCanvas.width = nuevoAncho;
            miCanvas.height = nuevaAltura;
            // La declaro
            let miNuevaImagenTemp = new Image();
            // Cuando la imagen se carge se procederá al recorte
            miNuevaImagenTemp.onload = function() {
                // Se recorta
                contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
                // Se transforma a base64
                imagenEn64 = miCanvas.toDataURL("image/jpeg");
                // Mostramos el código generado
                document.querySelector('#base64').value = imagenEn64;
                //                document.querySelector('#base64HTML').textContent = '<img src="' + imagenEn64.slice(0, 40) + '...">';

            }
            // Proporciona la imagen cruda, sin editarla por ahora
            miNuevaImagenTemp.src = urlImage;
        }
    });
    $(document).ready(function() {

        $(document).on('change', 'input[type="file"]', function() {
            // this.files[0].size recupera el tamaño del archivo
            // alert(this.files[0].size);

            var fileName = this.files[0].name;
            var fileSize = this.files[0].size;

            if (fileSize > 3000000) {
                alert('El archivo no debe superar 1 MB');
                this.value = '';
                this.files[0].name = '';
            } else {
                // recuperamos la extensión del archivo
                var ext = fileName.split('.').pop();

                // Convertimos en minúscula porque 
                // la extensión del archivo puede estar en mayúscula
                ext = ext.toLowerCase();

                // console.log(ext);
                switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'gif':
                    case 'JPG':
                    case 'JPEG':
                    case 'PNG':
                    case 'GIF':
                        break;
                    default:
                        alert('El archivo no tiene la extensión adecuada');
                        this.value = ''; // reset del valor
                        this.files[0].name = '';
                }
            }
        });
        if ($("#id_usuario").val() === "") {
            $('#frm-usuario').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombres: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un nombre válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa nombres completos'
                            }
                        }
                    },
                    usuario: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un usuario válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa usuaro'
                            },
                        }
                    },
                    password: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa contraseña de por lo menos 8 carácteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa contraseña'
                            }
                        }
                    },
                    confirm_password: {
                        validators: {
                            identical: {
                                field: 'password',
                                message: 'No coincide con la contraseña'
                            },
                            notEmpty: {
                                message: 'Por favor confirma contraseña'
                            }
                        }
                    },
                    n_documento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa documento'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa número valido'
                            },
                        }
                    },

                    fecha_nacimiento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de nacimiento'
                            }
                        },
                        date: {
                            format: 'DD/mm/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    fecha_ingreso: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de ingreso'
                            }
                        },
                        date: {
                            format: 'DD/MM/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    cargo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione cargo'
                            }
                        }
                    },
                    puesto_contratado: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor digita puesto a desempeñar'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa puesto valido'
                            }
                        }
                    },
                    valor_sueldo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor digita sueldo'
                            },
                            integer: {
                                message: 'Por favor digita solo números'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa sueldo válido'
                            }
                        }
                    },
                    valor_sueldo_letras: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor digita sueldo en letras'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa sueldo en letras válido'
                            }
                        }
                    },
                    foto: {
                        validators: {

                            file: {
                                extension: 'jpeg,jpg,png,jfif',
                                type: 'image/jpeg,image/png',
                                maxSize: 1 * 1024 * 1024, // 5 MB
                                message: 'Solo imagen (png,jpeg,jpg), 2 MB como máximo y dimensión de 700 x 700 máximo.'
                            }
                        }
                    },
                    supervisor: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Supervisor'
                            }
                        }
                    },
                    area: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Área de desempeño del usuario'
                            }
                        }
                    },
                }

            });
        } else {
            $('#frm-usuario').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombres: {
                        validators: {
                            stringLength: {
                                min: 3,
                                message: 'Por favor ingresa un nombre válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa nombres completos'
                            }
                        }
                    },
                    usuario: {
                        validators: {
                            stringLength: {
                                min: 3,
                                message: 'Por favor ingresa un usuario válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa usuaro'
                            }
                        }
                    },
                    n_documento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa documento'
                            },
                            stringLength: {
                                min: 3,
                                message: 'Por favor ingresa número valido'
                            }
                        }
                    },
                    fecha_nacimiento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de nacimiento'
                            }
                        },
                        date: {
                            format: 'DD/mm/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    fecha_ingreso: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de ingreso'
                            }
                        },
                        date: {
                            format: 'DD/MM/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    cargo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione cargo'
                            }
                        }
                    },
                    puesto_contratado: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor digita puesto a desempeñar'
                            },
                            stringLength: {
                                min: 3,
                                message: 'Por favor ingresa puesto valido'
                            }
                        }
                    },
                    valor_sueldo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor digita sueldo'
                            },
                            integer: {
                                message: 'Por favor digita solo números'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa sueldo válido'
                            }
                        }
                    },
                    valor_sueldo_letras: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor digita sueldo en letras'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa sueldo en letras válido'
                            }
                        }
                    },

                    foto: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,jfif',
                                type: 'image/jpeg,image/png',
                                maxSize: 1 * 1024 * 1024, // 5 MB
                                message: 'Solo imagen (png,jpeg,jpg), 2 MB como máximo y dimensión de 700 x 700 máximo.'
                            }
                        }
                    },

                    supervisor: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Supervisor'
                            }
                        }
                    },
                    area: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Área de desempeño del usuario'
                            }
                        }
                    },

                }

            });
        }
    });
</script>