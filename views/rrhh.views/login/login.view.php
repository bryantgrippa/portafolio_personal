<title>Gestion Humana</title>
<?php
require_once "assets/gestionhumana/libreria/librerias.php";
?>

<div class="loader-page"></div>
<h1 class="titulo-login">Bienvenidos a Arcos RRHH Y SG SST</h1>
<div style="position: relative; z-index: 10;">
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div class="centrado">
            <div style="position: relative; z-index: 10;" class="login-form">

                <form method="post" action="?p=rrhh&c=Login&a=Login">
                    <div class="avatar"><i class="fa fa-user"></i></div>
                    <h4 class="modal-title">Ingresa t&uacute; usuario y contrase&ntilde;a</h4>
                    <a href="index.php" type="sumbit">VOLVER</a>

                    <div class="form-group">
                        <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario" value="bryant.grippa" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" value="Arcos2021" autocomplete="off">
                    </div>

                    <input type="submit" class="btn btn-primary btn-block btn-lg" name="boton_login" id="boton_login" value="Ingresar">
                </form>

            </div>
        </div>
    </section>
    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });
    </script>
</div>
