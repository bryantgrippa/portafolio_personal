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
require_once "models/rrhh.models/Novedad.php";
    class Novedades{    
        private $model;

        public function __CONSTRUCT() {
            $this->model = new Novedad();
        }
        
        public function main(){
            require_once "views/rrhh.views/novedades/novedades.view.php";
        }
        public function institucional(){
            require_once "views/rrhh.views/institucional/institucional.view.php";
        }
}

?>