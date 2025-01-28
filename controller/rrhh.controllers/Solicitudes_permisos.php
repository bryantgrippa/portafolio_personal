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
require_once "models/rrhh.models/Solicitud_permiso.php";
    class Solicitudes_permisos{
        
    private $model;

    public function __CONSTRUCT() {
        $this->model = new Solicitud_permiso();
    }

        public function main(){
            require_once "views/rrhh.views/solicitudes_permisos/solicitudes_permisos.view.php";
        }
        public function Crud() {
            $alm = new Solicitud_permiso();
    
            if (isset($_REQUEST['id_permiso'])) {
                $alm = $this->model->Obtener($_REQUEST['id_permiso']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once 'views/rrhh.views/solicitudes_permisos/solicitudes_permisos_crud.php';
        }
        public function Guardar() {
            $alm = new Solicitud_permiso();
    
            $alm->id_permiso = $_REQUEST['id_permiso'];
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->supervisor = $_REQUEST['supervisor'];
            $alm->jefe_area = $_REQUEST['jefe_area'];


            $alm->correo_sup = $_REQUEST['correo_sup'];
            $alm->correo_jefe_area = $_REQUEST['correo_jefe_area'];

            $alm->id_tipo_permiso = $_REQUEST['id_tipo_permiso'];
            $alm->motivo = $_REQUEST['motivo'];
            $alm->horario_laboral_entrada = $_REQUEST['horario_laboral_entrada'];
            $alm->horario_laboral_salida = $_REQUEST['horario_laboral_salida'];
            if($_REQUEST['id_tipo_permiso'] == 6){
                $alm->horario_permiso_salida = NULL;
                $alm->horario_permiso_entrada = NULL;
            }else{
                if($_REQUEST['horario_permiso_salida'] != ""){
                    $alm->horario_permiso_salida = $_REQUEST['horario_permiso_salida'];
                }else{
                    $alm->horario_permiso_salida = null;
                }
                if($_REQUEST['horario_permiso_entrada'] != ""){
                    $alm->horario_permiso_entrada = $_REQUEST['horario_permiso_entrada'];
                }else{
                    $alm->horario_permiso_entrada = null;
                }
            }
            $alm->fecha_permiso = $_REQUEST['fecha_permiso'];
            $alm->duracion_permiso = $_REQUEST['duracion_permiso'];
            $alm->date_range = $_REQUEST['date_range'];
            $alm->observaciones = $_REQUEST['observaciones'];


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $destino = 'assets/evidencias/';
                if (!file_exists($destino)) {
                    mkdir($destino, 0777, true);
                }
                $nombre_imagen = $_FILES['archivo']['name'];
                $ruta_imagen_temporal = $_FILES['archivo']['tmp_name'];
                $ruta_nueva_imagen = $destino . $nombre_imagen;
        
                if (move_uploaded_file($ruta_imagen_temporal, $ruta_nueva_imagen)) {
                    $alm->archivo = $nombre_imagen;
                } else{
                    $alm->archivo = null;
                }
                
            }

                

            if (isset($_REQUEST['permiso_supervisor'])) {
                $alm->permiso_supervisor = $_REQUEST['permiso_supervisor'];
                $alm->observaciones_supervisor = "Permiso autorizado automaticamente Debido a cargo del usuario.";
            } else {
                $alm->permiso_supervisor = 0;
                $alm->observaciones_supervisor = "";

            }
            if (isset($_REQUEST['permiso_jefeope'])) {
                $alm->permiso_jefeope = $_REQUEST['permiso_jefeope'];
                $alm->observaciones_jefeope = "Permiso autorizado automaticamente Debido a cargo del usuario.";
            } else {
                $alm->permiso_jefeope = 0;
                $alm->observaciones_jefeope = "";

            }
            if (isset($_REQUEST['permiso_rrhh'])) {
                $alm->permiso_rrhh = $_REQUEST['permiso_rrhh'];
                $alm->observaciones_rrhh = "Permiso autorizado automaticamente Debido a cargo del usuario.";
            } else {
                $alm->permiso_rrhh = 0;
                $alm->observaciones_rrhh = "";

            }
            
            // $alm->id_permiso != "" ? $this->model->Actualizar($alm) : 
            $this->model->Registrar($alm);


            header("Location:?p=rrhh&c=Solicitudes_permisos&a=main");

        }
    
        public function Eliminar() {
            if ($_REQUEST['id_usuario'] == $_SESSION['id_usuario']) {
                $this->model->Eliminar($_REQUEST['id_permiso']);
                header("Location:?p=rrhh&c=Solicitudes_permisos&a=main");

        }
    
    }
}
?>