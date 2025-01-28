<?php
class Login
{
    private $pdo;
    private $conn;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::connection();

            $dbController = new DBController();
            $this->conn = $dbController->connectDB();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function main()
    {
        if (session_start() == true) {
            session_destroy();
        }
        require_once "views/claro.views/landing/login.php";

    }
    public function log()
    {
        session_start();
        session_destroy();

?>
        <script language='JavaScript'>
            alert("la sesion ha sido cerrada");
            location.href = "index.php";
        </script>
        <?php
    }
    public function login()
    {
        if ($_POST) {
            session_start();

            try {

                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuarios WHERE usuario = :user"
                );
                $stmt->bindParam(':user', $user);
                $stmt->execute();

                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario && password_verify($pass, $usuario['pass'])) {
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['cedula'] = $usuario['cedula'];
                    $_SESSION['nombres'] = $usuario['nombres'];
                    $_SESSION['usuario'] = $usuario['usuario'];
                    $_SESSION['estado'] = $usuario['estado'];
                    $_SESSION['permiso'] = $usuario['permiso'];
                    $_SESSION['nuevo'] = $usuario['nuevo'];

                    if ($_SESSION['estado'] == 0) {
        ?>
                        <script language='JavaScript'>
                            alert("Su usuario esta bloqueado.");
                            location.href = "index.php";
                        </script>
                    <?php
                    }else{
                        if ($_SESSION['nuevo'] == 1) {
                            header("Location:?p=claro&c=Login&a=Dashboard");
                        } else {
                        ?>
                            <script>
                                alert("Por favor cambie su contraseña nuevamente");
                                location.href = "?p=claro&c=Pass&a=pass&id_usuario=<?php echo $_SESSION['id_usuario'] ?>"
                            </script>
                        <?php
                        }
                    }
                } else {
                    ?>
                    <script language='JavaScript'>
                        alert("Acceso denegado");
                        location.href = "index.php";
                    </script>
            <?php
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
    public function Dashboard()
    {
        session_start();
        if (empty($_SESSION['id_usuario'])) {
            ?>
            <script language='JavaScript'>
                alert("Ingreso no correcto");
                location.href = "index.php";
            </script>
<?php
        } else {
                require_once "views/claro.views/header.php";
                require_once "views/claro.views/landing/dashboard.php";
                require_once "views/claro.views/footer.php";
        }
    }
    public function update()
{
        try{
            $password = "pass";

    // Encriptar la contraseña usando bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'UPDATE usuarios SET 
    pass = ?,
    nuevo = 1
    WHERE id_usuario > 0;';

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
