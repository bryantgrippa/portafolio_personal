<title>Creacion de Cargos</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_cargo)) { ?>Modificaci&oacute;n de cargo <?php echo $alm[0]->detalle_cargo; ?><?PHP } else { ?>Creaci&oacute;n de un nuevo cargo<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-cargo" action="?p=rrhh&c=Cargos&a=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_cargo" id="id_cargo" class="id_cargo" value="<?php
                if (isset($alm[0]->id_cargo)) {
                    echo $alm[0]->id_cargo;
                }
                ?>" />
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Detalle Cargo</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
                            <input name="detalle_cargo" placeholder="Detalle Cargo" class="form-control"  type="text" value="<?php
                            if (isset($alm[0]->detalle_cargo)) {
                                echo $alm[0]->detalle_cargo;
                            } else {
                                echo "";
                            }
                            ?>">
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
                            <a href="?p=rrhh&c=Cargos&a=main" type="button" class="btn btn-danger" >Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
<script>
    $(document).ready(function () {
        $('#frm-cargo').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                detalle_cargo: {
                    validators: {
                        stringLength: {
                            min: 5,
                            message: 'Por favor ingresa un cargo válido'
                        },
                        notEmpty: {
                            message: 'Por favor ingresa cargo'
                        }
                    }
                }
            }
        });
    });
    $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });

//    // Validate the form manually
//    $('#guardar').click(function () {
//        $('#frm-cargo').bootstrapValidator('validate');
//    });
//    $('#resetBtn').click(function () {
//        $('#defaultForm').data('bootstrapValidator').resetForm(true);
//    });
</script>
