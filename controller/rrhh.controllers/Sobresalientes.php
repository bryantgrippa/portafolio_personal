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
require_once "models/rrhh.models/Sobresaliente.php";
class Sobresalientes{
    private $model;

    public function __CONSTRUCT() {
        $this->model = new Sobresaliente();
    }
        public function main(){
            require_once "views/rrhh.views/sobresalientes/sobresalientes.view.php";
        }
        public function Crud() {
            $alm = new Sobresaliente();
    
            if (isset($_REQUEST['id_sobresaliente'])) {
                $alm = $this->model->Obtener($_REQUEST['id_sobresaliente']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once "views/rrhh.views/sobresalientes/sobresalientes_crud.view.php";
        }
        public function Guardar() {
            $alm = new Sobresaliente();
    
            $alm->id_sobresaliente = $_REQUEST['id_sobresaliente'];
            $alm->texto = $_REQUEST['texto'];
            $alm->direccion_texto = $_REQUEST['direccion_texto'];
            $alm->activo = $_REQUEST['activo'];        

            $alm->id_sobresaliente != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
            header("Location:?p=rrhh&c=Sobresalientes&a=main");
        }

        public function Activar() {
            $id_sobresaliente = $_REQUEST['id'];
            $this->model->Activar($id_sobresaliente); 
            header("Location:?p=rrhh&c=Sobresalientes&a=main");
        }
    
        public function Desactivar() {
            $id_sobresaliente = $_REQUEST['id'];
            $this->model->Desactivar($id_sobresaliente); 
            header("Location:?p=rrhh&c=Sobresalientes&a=main");
        }
        public function Eliminar() {
            $this->model->Eliminar($_REQUEST['id']);
            header("Location:?p=rrhh&c=Sobresalientes&a=main");

        }
    }
?>
<?php




