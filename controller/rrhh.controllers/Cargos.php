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
require_once "models/rrhh.models/Cargo.php";
class Cargos{
    private $model;
    public function __CONSTRUCT() {
        $this->model = new Cargo();
    }
        public function main(){
            require_once "views/rrhh.views/cargos/cargos.view.php";
        }
        public function Crud() {
            $alm = new Cargos();
    
            if (isset($_REQUEST['id_cargo'])) {
                $alm = $this->model->Obtener($_REQUEST['id_cargo']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once "views/rrhh.views/cargos/cargos_crud.view.php";
        }
    
        public function Guardar() {
            $alm = new Cargo();
    
            $alm->id_cargo = $_REQUEST['id_cargo'];
            $alm->detalle_cargo = $_REQUEST['detalle_cargo'];
            $alm->id_cargo != 0 ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
            header("Location:?p=rrhh&c=Cargos&a=main");

        }
    
        public function Eliminar() {
            $this->model->Eliminar($_REQUEST['id']);
            header("Location:?p=rrhh&c=Cargos&a=main");

        }
        public function Activar() {
            $id_cargo = $_REQUEST['id'];
            $this->model->ActivarCargo($id_cargo); 
            header("Location:?p=rrhh&c=Cargos&a=main");
        }
    
        public function Desactivar() {
            $id_cargo = $_REQUEST['id'];
            $this->model->DesactivarCargo($id_cargo); 
            header("Location:?p=rrhh&c=Cargos&a=main");
        }
    
    }

?>