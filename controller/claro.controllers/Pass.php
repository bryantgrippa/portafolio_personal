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
require_once "models/claro.models/Passes.php";

class Pass{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Passes();
    }
    public function pass()
    {
        $alm = $this->model->Obtener($_REQUEST['id_usuario']);
        $nov = 1;

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/usuarios/pass.crud.php";
        require_once "views/claro.views/footer.php";
    }
    public function savepass()
    {
        $alm = new Passes();

        $alm->id_usuario = $_REQUEST['id_usuario'];
        $alm->contraseña = $_REQUEST['pass'];

        $this->model->NewPass($alm);
        ?>
        <script language='JavaScript'>
            alert("Contraseña modificada. Inicie sesion nuevamente");
            location.href = "index.php";
        </script>
<?php
    }
}