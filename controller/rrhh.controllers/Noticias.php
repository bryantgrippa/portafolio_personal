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
require_once "models/rrhh.models/Noticia.php";
class Noticias{
    private $model;
    
    public function __CONSTRUCT() {
        $this->model = new Noticia();
    }

        public function main(){
            require_once "views/rrhh.views/noticias/noticias.view.php";
        }
        public function Crud() {
            $alm = new Noticia();
    
            if (isset($_REQUEST['id_noticia'])) {
                $alm = $this->model->Obtener($_REQUEST['id_noticia']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once 'views/rrhh.views/noticias/noticias_crud.view.php';
        }
        public function Guardar() {
            $alm = new Noticia();
    
            $alm->id_noticia = $_REQUEST['id_noticia'];
            $alm->titulo = $_REQUEST['titulo'];
            $alm->url_image = $_REQUEST['url_image'];
            $alm->nombre_img = $_FILES['imagen']['name'];
            $alm->tipo = $_FILES['imagen']['type'];
            $alm->tamano = $_FILES['imagen']['size'];
            $alm->temporal = $_FILES['imagen']['tmp_name'];
            $alm->noticia_completa = $_REQUEST['noticia_completa'];
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
            $alm->id_noticia != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
            header("Location:?p=rrhh&c=Noticias&a=main");

        }
        public function Eliminar() {
            $this->model->Eliminar($_REQUEST['id']);
            header("Location:?p=rrhh&c=Noticias&a=main");

        }


    }


?>