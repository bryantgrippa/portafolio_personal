<title>Creacion sobresalientes</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_sobresaliente)) { ?>Modificaci&oacute;n sobresaliente <?php echo $alm[0]->id_sobresaliente; ?><?PHP } else { ?>Creaci&oacute;n Sobresaliente<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-sobresaliente" action="?p=rrhh&c=Sobresalientes&a=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_sobresaliente" id="id_sobresaliente" class="id_sobresaliente" value="<?php
                if (isset($alm[0]->id_sobresaliente)) {
                    echo $alm[0]->id_sobresaliente;
                }
                ?>" />
                <!-- Text date-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">Texto sobresaliente</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-subscript"></i></span>
                            <textarea id="texto" rows="10" cols="50" name="texto" placeholder="Noticia completo" class="form-control" type="text"> <?php
                                if (isset($alm[0]->texto)) {
                                    echo $alm[0]->texto;
                                } else {
                                    echo "";
                                }
                                ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label">Direccion</label>  
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                <select class="form-control form-control-lg" name="direccion_texto" id="direccion_texto">
                                    <option value="1" <?php if (isset($alm[0]->direccion_texto) && ($alm[0]->direccion_texto == 1)) { ?>selected<?php } ?> >Derecha</option>
                                    <option value="0" <?php if (isset($alm[0]->direccion_texto) && ($alm[0]->direccion_texto == 0)) { ?>selected<?php } ?> >Izquierda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php if ($_SESSION['permiso'] == 1 || $_SESSION['permiso'] == 2) { ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Activo</label>  
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                <select class="form-control form-control-lg" name="activo" id="activo">
                                    <option value="1" <?php if (isset($alm[0]->activo) && ($alm[0]->activo == 1)) { ?>selected<?php } ?> >Activo</option>
                                    <option value="0" <?php if (isset($alm[0]->activo) && ($alm[0]->activo == 0)) { ?>selected<?php } ?> >Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <a href="?p=rrhh&c=Sobresalientes&a=main" type="button" class="btn btn-danger" >Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
<script>
    $(document).ready(function () {
        var editor = CKEDITOR.replace("texto");
        CKFinder.setupCKEditor(editor, 'ckfinder/');
      

        if ($("#id_sobresaliente").val() === "") {
            $('#frm-sobresaliente').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    texto: {
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
            $('#frm-sobresaliente').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
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