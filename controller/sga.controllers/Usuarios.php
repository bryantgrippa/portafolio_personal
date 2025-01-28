<?php
session_start();

if (empty($_SESSION['id_usuario'])) {
?>
    <script language='JavaScript'>
        alert("Ingreso no correcto");
        location.href = "index.php";
    </script>
<?php
}
require_once "models/sga.models/Usuario.php";
class Usuarios
{
    private $model;
    public function __CONSTRUCT()
    {
        $this->model = new Usuario();
    }

    public function main()
    {
        require_once "views/sga.views/encabezado.php";
        require_once "views/sga.views/pie.php";
        require_once "views/sga.views/Usuario/usuario.view.php";
    }
    public function nuevo()
    {
        if (isset($_REQUEST['id_usuario'])) {
            $alm = $this->model->Obtener($_REQUEST['id_usuario']);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Usuario/usuario.update.php";
        } else {
            $alm = $this->model->Obtener(0);
            require_once "views/sga.views/encabezado.php";
            require_once "views/sga.views/pie.php";
            require_once "views/sga.views/Usuario/usuario.new.php";
        }
    }
    public function Guardar()
    {
        $alm = new Usuario();

        $alm->id_usuario = $_REQUEST['id_usuario'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->usuario = $_REQUEST['usuario'];
        $alm->contraseña = $_REQUEST['contraseña'];
        $alm->permiso = $_REQUEST['permiso'];

        $alm->id_usuario != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
        header("Location:?p=sga&c=Usuarios&a=main");
    }
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header("Location:?p=sga&c=Usuarios&a=main");
    }
}
