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
require_once 'models/rrhh.models/Notificacion.php';
class Notificaciones{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Notificacion();
    }
        public function main(){
            require_once "views/rrhh.views/notificacion/notificacion.view.php";
        }
        public function Crud()
        {
            $alm = new Notificacion();
    
            if (isset($_REQUEST['id_permiso'])) {
                $alm = $this->model->Obtener($_REQUEST['id_permiso']);
    
            } else {
                $alm = $this->model->Obtener(0);
    
            }
            require_once "views/rrhh.views/notificacion/notificacion_crud.view.php";
        }
        public function Guardar()
        {
            $alm = new Notificacion();
    
            $alm->id_permiso = $_REQUEST['id_permiso'];
    
    // supervisor
            if (isset($_REQUEST['autoriza_supervisor_check'])) {
                $alm->autorizado_sup = $_REQUEST['autoriza_supervisor_check'];
                $alm->correo_jefe_area = $_REQUEST['correo_jefe_area'];
                $alm->jefe_area = $_REQUEST['jefe_area'];
                $alm->id_usuario = $_REQUEST['id_usuario'];
                $alm ->id_permiso != "" ? $this->model->Actualizarsuper1($alm): "";
            }

            if ($_REQUEST['observaciones_supervisor'] != "") {
                $alm->observaciones_supervisor = $_REQUEST['observaciones_supervisor'];
                $alm->id_usuario = $_REQUEST['id_usuario'];
                $alm->jefe_area = $_REQUEST['jefe_area'];
                $alm->id_permiso != "" ? $this->model->Actualizarsuper2($alm): "";
            }

    //jefe operaciones
            if (isset($_REQUEST['autoriza_jefeope_check'])) {
                $alm->id_usuario = $_REQUEST['id_usuario'];
                $alm->autorizado_ope = $_REQUEST['autoriza_jefeope_check'];
                $alm ->id_permiso != "" ? $this->model->Actualizarjefeope1($alm): "";
            }
            if ($_REQUEST['observaciones_jefe_operaciones'] != "") {
                $alm->observaciones_jefe_operaciones = $_REQUEST['observaciones_jefe_operaciones'];
                $alm ->id_permiso != "" ? $this->model->Actualizarjefeope2($alm): "";
            }
    // recursos humanos
            if (isset($_REQUEST['autoriza_rrhh_check'])) {
                $alm->autorizado_rrhh = $_REQUEST['autoriza_rrhh_check'];
                $alm->id_usuario = $_REQUEST['id_usuario'];
                $alm ->id_permiso != "" ? $this->model->Actualizarrrhh1($alm): "";
            }
            if ($_REQUEST['observaciones_rrhh']  != "") {
                $alm->observaciones_rrhh = $_REQUEST['observaciones_rrhh'];
                $alm ->id_permiso != "" ? $this->model->Actualizarrrhh2($alm): "";
            }
    // nomina
            if (isset($_REQUEST['autoriza_nomina_check'])) {
                $alm->autorizado_nomina = $_REQUEST['autoriza_nomina_check'];
                $alm ->id_permiso != "" ? $this->model->Actualizarnomina1($alm): "";
            }
            if ($_REQUEST['observaciones_nomina']  != "") {
                $alm->observaciones_nomina = $_REQUEST['observaciones_nomina'];
                $alm ->id_permiso != "" ? $this->model->Actualizarnomina2($alm): "";
            }
            
            // var_dump($alm);
            header("Location:?p=rrhh&c=Notificaciones&a=main");

        }
        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id']);
            header("Location:?p=rrhh&c=Notificaciones&a=main");

                    }
}

?>
