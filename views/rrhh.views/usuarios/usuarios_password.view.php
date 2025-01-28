<title>Cambiar contraseña</title>
<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_usuario)) { ?>Cambio de contrase&ntilde;a del usuario <?php echo $alm[0]->nombres; ?><?PHP } else { ?>Creaci&oacute;n de un nuevo usuario<?PHP } ?></small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-changepss" action="?p=rrhh&c=Usuarios&a=Modificarp" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario" id="id_usuario" class="id_usuario" value="<?php echo $alm[0]->id_usuario; ?>" />
                <input type="hidden" name="usuario" id="usuario" class="usuario" value="<?php echo $alm[0]->usuario; ?>" />

                <!-- Text input-->
                <div class="form-group">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Contrase&ntilde;a</label> 
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                <input name="password" placeholder="Password" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Confirmar contrase&ntilde;a</label> 
                        <div class="col-md-5 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                                <input name="confirm_password" placeholder="Confirme Contrase&ntilde;a" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    <!-- Checkbox input-->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-6">
                            <div>
                                <button type="submit" class="btn btn-success" id="modificar" name="modificar">Modificar</button>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-6">
                            <div>
                                <a href="?p=rrhh&c=Usuarios&a=main" type="button" class="btn btn-danger" >Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
<script>
    $('#frm-changepss').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    stringLength: {
                        min: 8,
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
            }
        }
    });

</script>
