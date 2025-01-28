<?php
session_start();

if (empty($_SESSION['id_usuario'])) {
?>
    <script language='JavaScript'>
        location.href = "?p=sga&c=Login&a=main";
    </script>
<?php
}
require_once "models/sga.models/Producto.php";
class Productos
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Producto();
    }

    public function main()
    {
        require_once "views/sga.views/encabezado.php";
        require_once "views/sga.views/pie.php";
        require_once "views/sga.views/Producto/producto.view.php";
    }
    public function nuevo()
    {
        if (isset($_REQUEST['id_producto'])) {
            $alm = $this->model->Obtener($_REQUEST['id_producto']);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Producto/producto.update.php";
        } else {
            $alm = $this->model->Obtener(0);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Producto/producto.new.php";
        }
    }
    public function Guardar()
    {
        $alm = new Producto();

        $alm->id_producto = $_REQUEST['id_producto'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->precio = $_REQUEST['precio'];
        $alm->talla = $_REQUEST['talla'];
        $alm->cantidad = $_REQUEST['cantidad'];
        $alm->proveedor = $_REQUEST['proveedor'];

        $alm->id_producto != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
        header("Location:?p=sga&c=Productos&a=main");
    }
    public function Cant()
    {
        if (isset($_REQUEST['id_producto'])) {
            $alm = $this->model->Obtener($_REQUEST['id_producto']);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Producto/producto.cantidad.php";
        }
    }
    public function Cantidad()
    {
        $alm = new Producto();

        $alm->id_producto = $_REQUEST['id_producto'];
        $alm->cantidad = $_REQUEST['cantidad'];

        // var_dump($alm);
        $this->model->Cantidad($alm);
        header("Location:?p=sga&c=Productos&a=main");
    }
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header("Location:?p=sga&c=Productos&a=main");
    }
}
?>