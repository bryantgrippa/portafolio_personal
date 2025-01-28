<?php
session_start();

if (empty($_SESSION['id_usuario'])) {
    ?>
    <script language='JavaScript'>
        alert("Ingreso no correcto");
        location.href = "?p=rrhh&c=Login&a=main";
    </script>
    <?php
}
    require_once "models/rrhh.models/Perfil.php";

class Perfiles{
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new Perfil();
        }
    
        public function main(){
            $alm = new Perfil();
    
            if (isset($_SESSION['id_usuario'])) {
                $alm = $this->model->Obtener($_SESSION['id_usuario']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once "views/rrhh.views/perfiles/perfiles.view.php";
        }
        public function Pass() {
            $alm = new Perfil();
    
            if (isset($_SESSION['id_usuario'])) {
                $alm = $this->model->Obtener($_SESSION['id_usuario']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once "views/rrhh.views/perfiles/perfiles_pass.view.php";
        }
    
        public function Modificarp() {
            $alm = new Perfil();
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->password = $_REQUEST['password'];
            $alm->id_usuario != "" ? $this->model->ModificarC($alm) : "";
            ?>
            <script language='JavaScript'>
                alert("Contraseña actualizada conrrectamente");
                location.href = "?p=rrhh&c=Novedades&main";
            </script>
            <?php

        }
    
        public function Guardar() {
            $alm = new Perfil();
    
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->nombres = $_REQUEST['nombres'];
            $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
            if (isset($_REQUEST['foto']) && $_REQUEST['foto'] != "") {
                $alm->foto = $_REQUEST['foto'];
                $_SESSION['foto'] = $alm->foto;
            } else {
                $alm->foto = "assets/img/user/defecto.png";
            }
            if ($alm->id_usuario != "") {
                $this->model->Actualizar($alm);
            } else {
                header("Location:?p=rrhh&c=Perfiles&a=main");

            }
            $alm->id_usuario != "" ? $this->model->Actualizar($alm): "";
                ?>
                <script language='JavaScript'>
                    alert("Por favor inicie sesion nuevamente para aplicar los cambios");
                    location.href = "?p=rrhh&c=Login&a=main";
                </script>
                    <?php
                }

        }
    