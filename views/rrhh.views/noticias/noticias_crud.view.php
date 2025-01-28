<title>Creacion de noticia</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_noticia)) { ?>Modificaci&oacute;n de noticia <?php echo $alm[0]->titulo; ?><?PHP } else { ?>Creaci&oacute;n de un nueva noticia<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-noticia" action="?p=rrhh&c=Noticias&a=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_noticia" id="id_noticia" class="id_noticia" value="<?php if (isset($alm[0]->id_noticia)) { echo $alm[0]->id_noticia; } ?>" />
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Titulo Destacado</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
                            <input  name="titulo" placeholder="Titulo noticia" class="form-control"  type="text" value="<?php
                            if (isset($alm[0]->titulo)) {
                                echo $alm[0]->titulo;
                            } else {
                                echo "";
                            }
                            ?>">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Imagen de la notcia</label>  
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
                    <label class="col-md-4 control-label">Noticia completo</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-subscript"></i></span>
                            <textarea id="noticia_completa" rows="10" cols="50" name="noticia_completa" placeholder="Noticia completo" class="form-control" type="text"> <?php
                                if (isset($alm[0]->noticia_completa)) {
                                    echo $alm[0]->noticia_completa;
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
                            <a href="?p=rrhh&c=Noticias&a=main" type="button" class="btn btn-danger" >Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
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
        var editor = CKEDITOR.replace("noticia_completa");
        CKFinder.setupCKEditor(editor, 'ckfinder/');
        
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
        if ($("#id_noticia").val() === "") {
            $('#frm-noticia').bootstrapValidator({
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
                    noticia_completa: {
                        validators: {
                             stringLength: {
                                min: 40,
                                message: 'Por favor ingresa la noticia de por lo menos 40 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa noticia'
                            }
                        }
                    }
                }

            });
        } else {
            $('#frm-noticia').bootstrapValidator({
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
                    noticia_completa: {
                        validators: {
                             stringLength: {
                                min: 40,
                                message: 'Por favor ingresa la noticia de por lo menos 40 caracteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa noticia'
                            }
                        }
                    }
                }

            });
        }
        
    });
</script>
<script>    
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });</script>