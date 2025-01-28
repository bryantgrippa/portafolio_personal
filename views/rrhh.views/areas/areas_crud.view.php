<title>Ingreso de Areas</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_area)) { ?>Modificaci&oacute;n de &aacute;rea <?php echo $alm[0]->detalle_area; ?><?PHP } else { ?>Creaci&oacute;n de un nueva &aacute;rea<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-area" action="?p=rrhh&c=Areas&a=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_area" id="id_area" class="id_area" value="<?php
                if (isset($alm[0]->id_area)) {
                    echo $alm[0]->id_area;
                }
                ?>" />
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Detalle &Aacute;rea</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
                            <input name="detalle_area" placeholder="Detalle Área" class="form-control"  type="text" value="<?php
                            if (isset($alm[0]->detalle_area)) {
                                echo $alm[0]->detalle_area;
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
                            <a href="?p=rrhh&c=Areas&a=main" type="button" class="btn btn-danger" >Cancelar</a>
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