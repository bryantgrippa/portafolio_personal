<?php
session_start();
if (empty($_SESSION['id_usuario'])) {
?>
    <script language='JavaScript'>
        alert("Ingreso no correcto");
        location.href = "index.php";
    </script>
<?php
} elseif ($_SESSION['permiso'] != 1) {
?>
    <script language='JavaScript'>
        alert("Usted no tiene los permisos necesarios para estar aqui");
        location.href = "?p=claro&c=Login&a=Dashboard";
    </script>
    <?php
}
if ($_SESSION['nuevo'] == 0) {
?>
    <script>
        alert("Por favor cambie su contraseña");
        location.href = "?p=claro&c=Pass&a=pass&id_usuario=<?php echo $_SESSION['id_usuario'] ?>"
    </script>
    <?php
}
require_once "models/claro.models/Usuarios.php";
class Usuario
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Usuarios();
    }
    public function main()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/usuarios/usuarios.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function crud()
    {
        if (isset($_REQUEST['id_usuario'])) {
            $alm = $this->model->Obtener($_REQUEST['id_usuario']);
        } else {
            $alm = $this->model->Obtener(0);
        }
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/usuarios/usuarios.crud.php";
        require_once "views/claro.views/footer.php";
    }
    public function save()
    {
        $alm = new Usuarios();

        $alm->id_usuario = $_REQUEST['id_usuario'];
        $alm->nombres = $_REQUEST['nombres'];
        $alm->usuario = $_REQUEST['usuario'];
        $alm->contraseña = "Arcos2021";
        $alm->cedula = $_REQUEST['cedula'];
        $alm->permiso = $_REQUEST['permiso'];

        $alm->id_usuario != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
        if ($alm->id_usuario != "") {
    ?>
            <script language='JavaScript'>
                alert("Cualquier usuario que se haya actualizado debe iniciar sesion nuevamente");
                location.href = "?p=claro&c=Usuario&a=main";
            </script>
        <?php
        } else {
        ?>
            <script language='JavaScript'>
                alert("Usuario creado exitosamente.");
                location.href = "?p=claro&c=Usuario&a=main";
            </script>
        <?php
        }
    }

    public function pass()
    {
        $alm = $this->model->Obtener($_REQUEST['id_usuario']);
        $nov = 0;

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/usuarios/pass.crud.php";
        require_once "views/claro.views/footer.php";
    }
    public function savepass()
    {
        $alm = new Usuarios();

        $alm->id_usuario = $_REQUEST['id_usuario'];
        $alm->contraseña = $_REQUEST['pass'];

        $this->model->NewPass($alm);
        ?>
        <script language='JavaScript'>
            alert("Contraseña modificada");
            location.href = "?p=claro&c=Usuario&a=main";
        </script>
<?php
    }
    public function activar()
    {
        // Validar que id_usuario sea un entero
        $id = $_REQUEST['id_usuario'];
        $this->model->activarUsuario($id);
        header("Location: ?p=claro&c=Usuario&a=main");
    }
    public function desactivar()
    {
        $id = $_REQUEST['id_usuario'];
        $this->model->DesactivarUsuario($id);
        header("Location:?p=claro&c=Usuario&a=main");
    }
}
