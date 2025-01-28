<?php

    class Login{
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Database::StartUp();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    public function login(){
        if($_POST){
            session_start();
    
            try {
    
                $user = $_POST['usuario'];
                $pass = $_POST['password'];

                $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuarios WHERE usuario = :user"
                );
                $stmt->bindParam(':user', $user);
                $stmt->execute();

                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario && password_verify($pass, $usuario['password'])) {
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['nombres'] = $usuario['nombres'];
                    $_SESSION['usuario'] = $usuario['usuario'];
                    $_SESSION['n_documento'] = $usuario['n_documento'];
                    $_SESSION['fecha_nacimiento'] = $usuario['fecha_nacimiento'];
                    $_SESSION['cargo'] = $usuario['cargo'];
                    $_SESSION['puesto_contratado'] = $usuario['puesto_contratado'];
                    $_SESSION['fecha_ingreso'] = $usuario['fecha_ingreso'];
                    $_SESSION['valor_sueldo_letras'] = $usuario['valor_sueldo_letras'];
                    $_SESSION['valor_sueldo'] = $usuario['valor_sueldo'];
                    $_SESSION['foto'] = $usuario['foto'];
                    $_SESSION['area'] = $usuario['area'];
                    $_SESSION['genero'] = $usuario['genero'];
                    $_SESSION['permiso'] = $usuario['permiso'];
                    $_SESSION['supervisor'] = $usuario['supervisor'];
                    $_SESSION['jefe_area'] = $usuario['jefe_area'];
                    $_SESSION['nuevo'] = $usuario['nuevo'];
                    $_SESSION['activo'] = $usuario['activo'];

                    if($_SESSION['activo'] == 0){
                        ?>
                        <script language='JavaScript'>
                            alert("Acceso Bloqueado.");
                            location.href = "index.php";
                        </script>
                        <?php    
                    }
                    if($_SESSION['nuevo'] == 1){
                        ?>
                        <script language='JavaScript'>
                            alert("Por favor cambie su contraseña");
                            location.href = "?p=rrhh&c=Perfiles&a=Pass";
                        </script>
                        <?php  
                    }else{
                        header("Location: ?p=rrhh&c=Novedades&a=main");
                    }

                }else{
                    ?>
                    <script language='JavaScript'>
                        alert("Acceso denegado.");
                        location.href = "index.php";
                    </script>
                    <?php     
                }  
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
    public function log(){
        session_start();
        session_destroy();

        ?>
        <script language='JavaScript'>
            alert("la sesion ha sido cerrada");
            location.href = "index.php";
        </script>
        <?php      

    }
public function main(){
    if(session_start() == true){
        session_destroy();
        require_once "views/rrhh.views/login/login.view.php";
    }
}
public function update()
{
        try{
            $password = "Arcos2021";

    // Encriptar la contraseña usando bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'UPDATE usuarios SET 
    password = ?,
    nuevo = 1
    WHERE nuevo = 0;';

$this->pdo->prepare($sql)
    ->execute(
        array(
            $hashed_password,
        )
    );
        } catch (Exception $e) {
            die($e->getMessage());
        }    


}
}
?>