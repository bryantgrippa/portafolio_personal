<?php
session_start();

if (empty($_SESSION['id_usuario'])) {
    ?>
    <script language='JavaScript'>
        alert("Ingreso no correcto");
        location.href = "?controller/rrhh.controllers/Historiales.phpc=Login&a=main";
    </script>
    <?php
}
require_once 'models/rrhh.models/Historial.php';
class Historiales{
    private $model;
    public function __CONSTRUCT()
    {
        $this->model = new Historial();
    }
    public function main(){
        if (isset($_REQUEST['id_usuario'])) {
            $alm = $this->model->ListarDone($_REQUEST['busqueda']);
        } else {
            $alm = $this->model->ListarDone();
        }  
        require_once "views/rrhh.views/historial/historial.done.view.php";
    }
    public function main2(){
        if (isset($_REQUEST['id_usuario'])) {
            $alm = $this->model->ListarDeny($_REQUEST['busqueda']);
        } else {
            $alm = $this->model->ListarDeny();
        }  
        require_once "views/rrhh.views/historial/historial.deny.view.php";
    }
}