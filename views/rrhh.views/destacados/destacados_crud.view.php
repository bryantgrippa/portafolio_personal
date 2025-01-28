<title>creacion destacados</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_destacado)) { ?>Modificaci&oacute;n de destacado <?php echo $alm[0]->titulo; ?><?PHP } else { ?>Creaci&oacute;n de un nuevo destacado<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-destacado" action="?p=rrhh&c=Destacados&a=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_destacado" id="id_destacado" class="id_destacado" value="<?php if (isset($alm[0]->id_destacado)) { echo $alm[0]->id_destacado; } ?>" />
                <input type="hidden" name="usuario_creado" id="usuario_creado" class="usuario_creado" value="<?php if (isset($alm[0]->id_usuario)) { echo $alm[0]->id_usuario; } ?>" />

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Titulo Destacado</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
                            <input  name="titulo" placeholder="Titulo destacado" class="form-control"  type="text" value="<?php
                            if (isset($alm[0]->titulo)) {
                                echo $alm[0]->titulo;
                            } else {
                                echo "";
                            }
                            ?>">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control form-control-lg" name="area" id="area">
                                <option value="">Todos</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area) && ($alm[0]->area == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>



                
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 2</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_2" id="area_2">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_2) && ($alm[0]->area_2 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->

                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 3</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_3" id="area_3">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_3) && ($alm[0]->area_3 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 4</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_4" id="area_4">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_4) && ($alm[0]->area_4 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
<div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 5</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_5" id="area_5">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_5) && ($alm[0]->area_5 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 6</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_6" id="area_6">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_6) && ($alm[0]->area_6 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
<div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 7</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_7" id="area_7">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_7) && ($alm[0]->area_7 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 8</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_8" id="area_8">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_8) && ($alm[0]->area_8 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
<div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 9</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_9" id="area_9">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_9) && ($alm[0]->area_9 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->
                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea dirigida 10</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <!-- <select class="form-control form-control-lg" name="Valor" id="nombre de la tabla"> -->
                            <select class="form-control form-control-lg" name="area_10" id="area_10">
                                <option value="-1">Seleccione otro</option>
                                <?php foreach ($this->model->Area() as $a): ?>
                                    <option value="<?php echo $a->id_area ?>" <?php if (isset($alm[0]->area_10) && ($alm[0]->area_10 == $a->id_area)) 
                                    { ?>selected<?php } ?> ><?php echo $a->detalle_area; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
<!-- aaaaaaaaaaaaaaaaaaaaaaaaa -->





                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Imagen del destacado</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-cloud-upload"></i></span>
                            <input  name="imagen" placeholder="imagen" class="form-control"  type="file" readonly="" accept="image/png,image/jpeg,image/gif" id="uploadImage1" onchange="previewImage(1);">
                            <img id="uploadPreview1" width="150" height="150" <?php if (isset($alm[0]->imagen)) { ?> src="<?php echo $alm[0]->imagen; ?>" <?php } ?> />
                            <input id="url_image" name="url_image" type="hidden" value="<?php if (isset($alm[0]->imagen)) {
                                    echo $alm[0]->imagen;
                                } ?>"/>
                        </div>
                    </div>
                </div>
                <!-- Text input-->       

                <!-- Text date-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">Destacado completo</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-subscript"></i></span>
                            <textarea id="destacado_noticia" rows="10" cols="50" name="destacado_noticia" placeholder="Destacado completo" class="form-control" type="text"> <?php
                                if (isset($alm[0]->destacado_noticia)) {
                                    echo $alm[0]->destacado_noticia;
                                } else {
                                    echo "";
                                }
                                ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- Select-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">Orden</label>  
                    <div class="col-md-5 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-order"></i></span>
                            <input class="form-control" name="orden" id="orden" type="number" value="<?php
                            if (isset($alm[0]->orden)) {
                                echo $alm[0]->orden;
                            } else {
                                echo "";
                            }
                            ?>"> 
                        </div>
                    </div>
                </div>
                 <!-- Permisos de publicación Administrador y gestor de contenido -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Publicado</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                            <input name="publicado" class="form-control form-check-input" type="checkbox"  <?php if (isset($alm[0]->publicado) && $alm[0]->publicado == 1) { ?>checked=""<?php } ?>>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <a href="?p=rrhh&c=Destacados&a=main" type="button" class="btn btn-danger" >Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
<script>    
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });</script>
<script>

    function previewImage(nb) {
        var reader = new FileReader();
        reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
        reader.onload = function (e) {
            document.getElementById('uploadPreview' + nb).src = e.target.result;
        };
    }
    $(document).ready(function () {
        var editor = CKEDITOR.replace("resumen");
        CKFinder.setupCKEditor(editor, 'ckfinder/');
        var editor = CKEDITOR.replace("destacado_noticia");
        CKFinder.setupCKEditor(editor, 'ckfinder/');
        CKFinder.setupCKEditor(editor, 'http://192.168.10.222/gestionhumana/ckfinder');
        $(document).on('change', 'input[type="file"]', function () {
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
                        break;
                    default:
                        alert('El archivo no tiene la extensión adecuada');
                        this.value = ''; // reset del valor
                        this.files[0].name = '';
                }
            }
        });
        if ($("#id_destacado").val() === "") {
            $('#frm-destacado').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    titulo: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un titulo válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa titulo'
                            }
                        }
                    },
                    imagen: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,jfif,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: 5 * 4024 * 4024, // 5 MB
                                message: 'Solo imagen (png,jpeg,jpg,gif), 5 MB como máximo.'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa imagen'
                            }
                        }
                    },
                    resumen: {
                        validators: {
                            stringLength: {
                                min: 25,
                                message: 'Por favor ingresa un resumen de por lo menos 25 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa resumen'
                            }
                        }
                    },
                    destacado_noticia: {
                        validators: {
                             stringLength: {
                                min: 40,
                                message: 'Por favor ingresa el destacado completo de por lo menos 40 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa destacado'
                            }
                        }
                    }
                }

            });
        } else {
            $('#frm-destacado').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    titulo: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un titulo válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa titulo'
                            }
                        }
                    },
                    imagen: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,jfif,gif',
                                type: 'image/jpeg,image/png,image/gif',
                                maxSize: 5 * 4024 * 4024, // 5 MB
                                message: 'Solo imagen (png,jpeg,jpg,gif), 5 MB como máximo.'
                            }
                        }
                    },
                    resumen: {
                        validators: {
                            stringLength: {
                                min: 25,
                                message: 'Por favor ingresa un resumen de por lo menos 25 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa resumen'
                            }
                        }
                    },
                    destacado_noticia: {
                        validators: {
                             stringLength: {
                                min: 40,
                                message: 'Por favor ingresa el destacado completo de por lo menos 40 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa destacado'
                            }
                        }
                    }
                }

            });
        }
        
    });

</script>
