<title>Carga de usuarios</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo">
        <small class="titulo-creacion-usuario">
            <?php echo "Carga de usuarios"; ?>
        </small>
    </h1>
</center>
<div class="container">
<div class="text-right">
<form class="well form-horizontal"  id="frm-usuario" action="?p=rrhh&c=Excel&a=Guardar" method="post" enctype="multipart/form-data">

    <label class="col-md-1 control-label">Excel</label>  
        <div class="col-md-4 inputGroupContainer">
            <input type="file" name="excel" class="form-control" id="">
        </div>
        <div class="well well-sm">
                <div class="text-right">
                        <a href="?p=rrhh&c=Excel&a=Generar" type="button" class="btn btn-primary">Generar de Formulario</a>
                            <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
                        <a href="?p=rrhh&c=Usuarios&a=main" type="button" class="btn btn-danger">Cancelar</a>
                </div>

        </div>
        </form>
        </div>    
    </div>

    <script>    
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });</script>