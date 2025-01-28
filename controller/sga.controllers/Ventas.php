<?php
session_start();

if (empty($_SESSION['id_usuario'])) {
?>
    <script language='JavaScript'>
        alert("Ingreso no correcto");
        location.href = "?p=sga&c=Login&a=main";
    </script>
<?php
}
require_once "models/sga.models/Venta.php";
class Ventas
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Venta();
    }

    public function main()
    {
        require_once "views/sga.views/encabezado.php";
        require_once "views/sga.views/pie.php";
        require_once "views/sga.views/Salida/salida.view.php";
    }
    public function nuevo()
    {
        if (isset($_REQUEST['id_salida'])) {
            $alm = $this->model->Obtener($_REQUEST['id_salida']);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Salida/salida.update.php";
        } else {
            $alm = $this->model->Obtener(0);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Salida/salida.new.php";
        }
    }
    public function Guardar()
    {
        $alm = new Venta();

        $alm->producto = $_REQUEST['producto'];
        $alm->cantidad = $_REQUEST['cantidad'];
        $alm->cliente_nombre = $_REQUEST['cliente_nombre'];
        $alm->cliente_id = $_REQUEST['cliente_id'];
        $alm->cliente_contacto = $_REQUEST['cliente_contacto'];
        $alm->cliente_direccion = $_REQUEST['cliente_direccion'];
        $alm->observaciones = $_REQUEST['observaciones'];

        $this->model->Registrar($alm);
        header("Location:?p=sga&c=Ventas&a=main");
    }

    public function Actualizar()
    {
        $alm = new Venta();

        $alm->id_salida = $_REQUEST['id_salida'];

        $alm->cliente_nombre = $_REQUEST['cliente_nombre'];
        $alm->cliente_id = $_REQUEST['cliente_id'];
        $alm->cliente_contacto = $_REQUEST['cliente_contacto'];
        $alm->cliente_direccion = $_REQUEST['cliente_direccion'];
        $alm->observaciones = $_REQUEST['observaciones'];

        $this->model->Actualizar($alm);
        header("Location:?p=sga&c=Ventas&a=main");
    }
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header("Location:?p=sga&c=Ventas&a=main");
    }
}
?>