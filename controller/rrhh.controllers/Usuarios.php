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
require_once "models/rrhh.models/usuario.php";
class Usuarios{
    private $model;

    public function __CONSTRUCT() {
        $this->model = new Usuario();
    }
        public function main(){
            if (isset($_REQUEST['id_usuario'])) {
                $alm = $this->model->Listar($_REQUEST['busqueda']);
            } else {
                $alm = $this->model->Listar();
            }  
            require_once "views/rrhh.views/usuarios/usuarios.view.php";
        }
        public function Crud(){
            if (isset($_REQUEST['id_usuario'])) {
                $alm = $this->model->Obtener($_REQUEST['id_usuario']);
            } else {
                $alm = $this->model->Obtener(0);
            }
                        
        require_once 'views/rrhh.views/usuarios/usuarios_crud.view.php';

        }
        public function Guardar() {
            $alm = new Usuario();
    
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->nombres = $_REQUEST['nombres'];
            $alm->usuario = $_REQUEST['usuario'];
            $alm->password = $_REQUEST['password'];
            $alm->n_documento = $_REQUEST['n_documento'];
            $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
            $alm->fecha_ingreso = $_REQUEST['fecha_ingreso'];
            $alm->cargo = $_REQUEST['cargo'];
            if (isset($_REQUEST['foto']) && $_REQUEST['foto'] != "") {
                $alm->foto = $_REQUEST['foto'];
            } else {
                $alm->foto = "assets/img/user/defecto.png";
            }
            $alm->area = $_REQUEST['area'];
            $alm->area_1 = $_REQUEST['area_1'];
            $alm->area_2 = $_REQUEST['area_2'];
            $alm->area_3 = $_REQUEST['area_3'];
            $alm->area_4 = $_REQUEST['area_4'];
            $alm->area_5 = $_REQUEST['area_5'];
            $alm->area_6 = $_REQUEST['area_6'];
            $alm->area_7 = $_REQUEST['area_7'];
            $alm->permiso = $_REQUEST['permiso'];
            $alm->puesto_contratado = $_REQUEST['puesto_contratado'];
            $alm->valor_sueldo = $_REQUEST['valor_sueldo'];
            $alm->valor_sueldo_letras = $_REQUEST['valor_sueldo_letras'];
            $alm->bienvenida = $_REQUEST['bienvenida'];
            $alm->genero = $_REQUEST['genero'];
            $alm->supervisor = $_REQUEST['supervisor'];
            $alm->jefe_area = $_REQUEST['jefe_area'];


            if ($_REQUEST['id_usuario'] != "") {
                $this->model->Actualizar($alm);
            } else{
                $this->model->Registrar($alm);
            }
                // var_dump($alm);
            if ($_REQUEST['id_usuario'] != "") {
        ?>
        <script language='JavaScript'>
            alert("Cualquier usuario que se haya hecho una actualizacion. este tendra que iniciar sesion nuevamente");
            location.href = "?p=rrhh&c=Usuarios&a=main";
        </script>
        <?php
            }else{
            ?>
            <script language='JavaScript'>
                alert("Usuario creado exitosamente");
                location.href = "?p=rrhh&c=Usuarios&a=main";
            </script>
            <?php
        }
    }
        public function Eliminar() { 
            $this->model->Eliminar($_REQUEST['id']);
            header("Location:?p=rrhh&c=Usuarios&a=main");
        }
        public function Activar() {
            $id_usuario = $_REQUEST['id'];
            $this->model->ActivarUsuario($id_usuario); 
            header("Location:?p=rrhh&c=Usuarios&a=main");
        }
    
        public function Desactivar() {
            $id_usuario = $_REQUEST['id'];
            $this->model->DesactivarUsuario($id_usuario); 
            header("Location:?p=rrhh&c=Usuarios&a=main");
        }

        public function Pass(){
            $alm = new Usuario();

            if (isset($_REQUEST['id_usuario'])) {
                $alm = $this->model->Obtener($_REQUEST['id_usuario']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once 'views/rrhh.views/usuarios/usuarios_password.view.php';
        }
        public function Modificarp() {
            $alm = new Usuario();
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->password = $_REQUEST['password'];


            $alm->id_usuario != "" ? $this->model->ModificarC($alm) : "";
            header("Location:?p=rrhh&c=Usuarios&a=main");

        }
        public function Carga() {

        require_once "views/rrhh.views/usuarios/usuarios_carga.view.php";

        }

/////////////////////////////////////////////////////////////////////
//////////////// ESTO ES PARA AREAS ////////////////

        public function main2(){
            if (isset($_REQUEST['id_usuario'])) {
                $alm = $this->model->Listar($_REQUEST['busqueda']);
            } else {
                $alm = $this->model->Listar();
            }  
            require_once "views/rrhh.views/areas/areas.view.php";
        }
        public function Crud2(){
            if (isset($_REQUEST['id_usuario'])) {
                $alm = $this->model->Obtener($_REQUEST['id_usuario']);
            } else {
                $alm = $this->model->Obtener(0);
            }
                        
        require_once 'views/rrhh.views/usuarios/usuarios_crud.view.php';

        }
        public function Guardar2() {
            $alm = new Usuario();
    
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->nombres = $_REQUEST['nombres'];
            $alm->usuario = $_REQUEST['usuario'];
            $alm->password = $_REQUEST['password'];
            $alm->n_documento = $_REQUEST['n_documento'];
            $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
            $alm->fecha_ingreso = $_REQUEST['fecha_ingreso'];
            $alm->cargo = $_REQUEST['cargo'];
            if (isset($_REQUEST['foto']) && $_REQUEST['foto'] != "") {
                $alm->foto = $_REQUEST['foto'];
            } else {
                $alm->foto = "assets/gestionhumana/img/user/defecto.png";
            }
            $alm->area = $_REQUEST['area'];
            $alm->area_1 = $_REQUEST['area_1'];
            $alm->area_2 = $_REQUEST['area_2'];
            $alm->area_3 = $_REQUEST['area_3'];
            $alm->area_4 = $_REQUEST['area_4'];
            $alm->area_5 = $_REQUEST['area_5'];
            $alm->area_6 = $_REQUEST['area_6'];
            $alm->area_7 = $_REQUEST['area_7'];
            $alm->permiso = $_REQUEST['permiso'];
            $alm->puesto_contratado = $_REQUEST['puesto_contratado'];
            $alm->valor_sueldo = $_REQUEST['valor_sueldo'];
            $alm->valor_sueldo_letras = $_REQUEST['valor_sueldo_letras'];
            $alm->bienvenida = $_REQUEST['bienvenida'];
            $alm->genero = $_REQUEST['genero'];
            $alm->supervisor = $_REQUEST['supervisor'];
            $alm->jefe_area = $_REQUEST['jefe_area'];


            if ($alm->id_usuario != "") {
                $this->model->Actualizar($alm);
            } elseif ($alm->id_usuario2 != "") {
                $this->model->Registrar($alm);
            }
            $alm->id_usuario != "" ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);
            if ($alm->id_usuario != "") {
        ?>
        <script language='JavaScript'>
            alert("Cualquier usuario que se haya hecho una actualizacion. este tendra que iniciar sesion nuevamente");
            location.href = "?p=rrhh&c=Areas&a=Area&id_area=<?php echo $_REQUEST['id_area'];?>";
        </script>
        <?php
            }else{
            ?>
            <script language='JavaScript'>
                alert("Usuario creado exitosamente");
                location.href = "?p=rrhh&c=Areas&a=Area&id_area=<?php echo $_REQUEST['id_area'];?>";
            </script>
            <?php
        }
    }
        public function Eliminar2() { 
            $id = $_REQUEST['id_area'];
            $this->model->Eliminar($_REQUEST['id']);
            header("Location:?p=rrhh&c=Areas&a=Area&id_area=$id");
        }
        public function Activar2() {
            $id = $_REQUEST['id_area'];
            $id_usuario = $_REQUEST['id'];
            $this->model->ActivarUsuario($id_usuario); 
            header("Location:?p=rrhh&c=Areas&a=Area&id_area=$id");
        }
    
        public function Desactivar2() {
            $id = $_REQUEST['id_area'];
            $id_usuario = $_REQUEST['id'];
            $this->model->DesactivarUsuario($id_usuario); 
            header("Location:?p=rrhh&c=Areas&a=Area&id_area=$id");
        }

        public function Pass2(){
            $alm = new Usuario();

            if (isset($_REQUEST['id_usuario'])) {
                $alm = $this->model->Obtener($_REQUEST['id_usuario']);
            } else {
                $alm = $this->model->Obtener(0);
            }
            require_once 'views/rrhh.views/usuarios/usuarios_password.view.php';
        }
        public function Modificarp2() {
            $id = $_REQUEST['id_area'];

            $alm = new Usuario();
            $alm->id_usuario = $_REQUEST['id_usuario'];
            $alm->password = $_REQUEST['password'];


            $alm->id_usuario != "" ? $this->model->ModificarC($alm) : "";
            header("Location:?p=rrhh&c=Areas&a=Area&id_area=$id");

        }
}
?>