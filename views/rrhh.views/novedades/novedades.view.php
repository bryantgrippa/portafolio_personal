<title>Novedades</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center class="espacio-inicio">
    <div class="container" style="margin-top: -70px;">
        <?php
        $cantidad_s = count($this->model->Sobresaliente());
        if ($cantidad_s > 0) {
             foreach ($this->model->Sobresaliente() as $r) :
        ?>
                <?php
                if ($r->activo == 1) {
                    if ($r->direccion_texto == 1) {
                        $texto = 'right';
                    } elseif ($r->direccion_texto == 0) {
                        $texto = 'left';
                    }
                ?>
                    <div class="row">
                        <marquee direction="<?php echo $texto; ?>"><?php echo $r->texto; ?></marquee>
                    </div>
        <?php
                }
             endforeach;
        }
        ?>

        
<div class="row">
            <?php
            // Obtén todos los destacados sin filtrar por área
            $idUsuario = $_SESSION['id_usuario']; // Obtén el ID del usuario de la sesión
            $novedadesModel = new Novedad();
            $destacados = $novedadesModel->DestacadosPorUsuario($idUsuario);

            if (!empty($destacados)) {
            ?>
                <div class="text-center destacado">
                    <h1>Destacado</h1>
                </div>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach;
            }
            $destacados2 = $novedadesModel->DestacadosPorUsuario2($idUsuario);

            if (!empty($destacados2)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados2 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados3 = $novedadesModel->DestacadosPorUsuario3($idUsuario);

            if (!empty($destacados3)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados3 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados4 = $novedadesModel->DestacadosPorUsuario4($idUsuario);

            if (!empty($destacados4)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados4 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados5 = $novedadesModel->DestacadosPorUsuario5($idUsuario);

            if (!empty($destacados5)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados5 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados6 = $novedadesModel->DestacadosPorUsuario6($idUsuario);

            if (!empty($destacados6)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados6 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados7 = $novedadesModel->DestacadosPorUsuario7($idUsuario);

            if (!empty($destacados7)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados7 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados8 = $novedadesModel->DestacadosPorUsuario8($idUsuario);

            if (!empty($destacados8)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados8 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados9 = $novedadesModel->DestacadosPorUsuario9($idUsuario);

            if (!empty($destacados9)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados9 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
            $destacados10 = $novedadesModel->DestacadosPorUsuario10($idUsuario);

            if (!empty($destacados10)) {
                ?>
                <?php
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($destacados10 as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->destacado_noticia; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach; 
            }
?>
</div>
       
        <div class="row">
            <?PHP
            $limite = count($this->model->Noticias());
            if ($limite > 0) {
            ?>
                <div class="text-center noticia">Noticia</div>
                <?PHP
                $numero = 4;
                $auxiliar = 1;
                $auxiliar2 = 1;
                $x = 0;
                foreach ($this->model->Noticias() as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $r->imagen; ?>" class="card-img-top" alt="<?php echo $r->imagen; ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $r->titulo; ?></h2>
                                <p class="card-text">
                                    <?php echo $r->noticia_completa; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                    $auxiliar++;
                    $x++;
                    $auxiliar2++;
                endforeach;
            }
            ?>
        </div>
        <div class="row">
            <?php
            $limite = count($this->model->Aniversario());
            if ($limite > 0) {
            ?>


                <div class="aniversario_laboral">
                    <h1>¡Feliz Aniversario Laboral!</h1>
                </div>
                <?PHP
                $limite = 8;
                $numero = 4;
                $auxiliar = 1;
                foreach ($this->model->Aniversario() as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card px-2">
                            <div style="position: relative; left: 0; top: 0;">
                                <img src="assets/gestionhumana/img/aniversario.png" class="heaven" />
                                <img src="<?php echo $r->foto; ?>" class="img-aniversary rounded-circle" />
                                <!--<span class="usuario"></span>-->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><strong><?php echo $r->nombres; ?></strong></h5>
                                <h5 class="card-title">Gracias por estar un a&ntilde;o m&aacute;s en ARCOS</h5>
                                <p class="card-text">
                                    Familia Arcos BPO
                                </p>
                            </div>
                        </div>

                    </div>
            <?PHP
                endforeach;
            }
            ?>
        </div>
        <div class="row">
            <?php
            $limite = count($this->model->Birthday());
            if ($limite > 0) {
            ?>


                <div class="cumpleanos">
                    <h1>¡Feliz Cumplea&ntilde;os!</h1>
                </div>
                <?PHP
                $limite = 8;
                $numero = 4;
                $auxiliar = 1;
                foreach ($this->model->Birthday() as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card px-2">
                            <div style="position: relative; left: 0; top: 0;">
                                <img src="assets/gestionhumana/img/happy_birthday.png" class="heaven" />
                                <img src="<?php echo $r->foto; ?>" class="eye rounded-circle" />
                                <span class="usuario"><?php echo $r->nombres; ?></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Felicidades por un a&ntilde;o m&aacute;s de vida</h5>
                                <p class="card-text">
                                    Familia Arcos BPO
                                </p>
                            </div>
                        </div>

                    </div>
            <?PHP
                endforeach;
            }
            ?>
        </div>
        <div class="row">
            <?php
            $limite = count($this->model->Bienvenida());
            if ($limite > 0) {
            ?>


                <div class="titulo_bienvenida">
                    <h1>Una formal ¡Bienvenida!</h1>
                </div>
                <?PHP
                $limite = 8;
                $numero = 4;
                $auxiliar = 1;
                foreach ($this->model->Bienvenida() as $r) :
                ?>
                    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 card-group mt-2 mb-4">
                        <div class="card px-2">
                            <div style="position: relative; left: 0; top: 0;">
                                <img style="min-height: 300px;" src="assets/gestionhumana/img/bienvenida.png" class="heaven" />
                                <img src="<?php echo $r->foto; ?>" class="bienvenida rounded-circle" />
                            </div>
                            <div class="card-body">
                                <h6 class="card-title justity nombres_bienvenida"><?php if ($r->genero == 'F') { ?>Bienvenida<?php } elseif ($r->genero == 'M') { ?>Bienvenido<?php } ?></h6>
                                <h5 class="card-title justity nombres_bienvenida"><?php echo $r->nombres; ?></h5>
                                <p class="card-text">
                                    <?php echo $r->detalle_area; ?>
                                </p>
                            </div>
                        </div>

                    </div>
            <?PHP
                endforeach;
            }
            ?>
        </div>
    </div>
</center>
<script>
    if (localStorage.usuario !== "undefined") {
        localStorage.removeItem('usuario');
        localStorage.removeItem('pass');
    }
    $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 1000);
        });
</script>
