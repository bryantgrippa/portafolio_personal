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
require_once "models/rrhh.models/Area.php";
class Areas
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Area();
    }

    public function main()
    {
        require_once "views/rrhh.views/areas/areas.view.php";
    }
    public function Crud()
    {
        $alm = new Area();

        if (isset($_REQUEST['id_area'])) {
            $alm = $this->model->Obtener($_REQUEST['id_area']);
        } else {
            $alm = $this->model->Obtener(0);
        }
        require_once "views/rrhh.views/areas/areas_crud.view.php";
    }

    public function Guardar()
    {
        $alm = new Area();

        $alm->id_area = $_REQUEST['id_area'];
        $alm->detalle_area = $_REQUEST['detalle_area'];
        $alm->id_area != 0 ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
        header("Location:?p=rrhh&c=Areas&a=main");
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header("Location:?p=rrhh&c=Areas&a=main");
    }
    public function Activar()
    {
        $id_area = $_REQUEST['id'];
        $this->model->ActivarArea($id_area);
        header("Location:?p=rrhh&c=Areas&a=main");
    }

    public function Desactivar()
    {
        $id_area = $_REQUEST['id'];
        $this->model->DesactivarArea($id_area);
        header("Location:?p=rrhh&c=Areas&a=main");
    }



    public function Area()
    {
        $alm = new Area();
    
        if (isset($_REQUEST['id_area'])) {
            $alm = $this->model->Area($_REQUEST['id_area']);
        } else {
            $alm = $this->model->Area(0);
        }
        require_once "views/rrhh.views/areas/areas.usuarios.php";
    }
}
?>