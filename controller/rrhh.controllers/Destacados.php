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
require_once "models/rrhh.models/Destacado.php";    


class Destacados{  
    private $model;  
    public function __CONSTRUCT() {
        $this->model = new Destacado();
    }
    public function main(){
        require_once "views/rrhh.views/destacados/destacados.view.php";
    }
    public function Crud() {
        $alm = new Destacado();

        if (isset($_REQUEST['id_destacado'])) {
            $alm = $this->model->Obtener($_REQUEST['id_destacado']);
        } else {
            $alm = $this->model->Obtener(0);
        }
        require_once "views/rrhh.views/destacados/destacados_crud.view.php";

    }
    public function Guardar() {
        $alm = new Destacado();

        $alm->id_destacado = $_REQUEST['id_destacado'];
        $alm->usuario_creado = $_REQUEST['usuario_creado'];
        $alm->titulo = $_REQUEST['titulo'];
        $alm->area = $_REQUEST['area'];
        $alm->area_2 = $_REQUEST['area_2'];
        $alm->area_3 = $_REQUEST['area_3'];
        $alm->area_4 = $_REQUEST['area_4'];
        $alm->area_5 = $_REQUEST['area_5'];
        $alm->area_6 = $_REQUEST['area_6'];
        $alm->area_7 = $_REQUEST['area_7'];
        $alm->area_8 = $_REQUEST['area_8'];
        $alm->area_9 = $_REQUEST['area_9'];
        $alm->area_10 = $_REQUEST['area_10'];
        $alm->nombre_img = $_FILES['imagen']['name'];
        $alm->temporal = $_FILES['imagen']['tmp_name'];
        $alm->destacado_noticia = $_REQUEST['destacado_noticia'];
        

        if (empty($_REQUEST['orden']) || $_REQUEST['orden'] == "") {
            $alm->orden = NULL;
        } else {
            $alm->orden = $_REQUEST['orden'];
        }
        if (isset($_REQUEST['publicado']) && $_REQUEST['publicado'] == 'on') {
            $alm->publicado = 1;
        } else {
            $alm->publicado = 0;
        }
        if (isset($_REQUEST['activo'])) {
            $alm->activo = $_REQUEST['activo'];
        } else {
            $alm->activo = 1;
        }

        $alm->id_destacado != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
        header("Location:?p=rrhh&c=Destacados&a=main");

    }
        public function Eliminar() {
            $this->model->Elimina($_REQUEST['id']);
            header("Location:?p=rrhh&c=Destacados&a=main");

        }
    }
    
?>