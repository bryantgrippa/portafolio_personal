<?php
class Passes
{
    private $pdo;
    public $id_usuario;
    public $nombres;
    public $cedula;
    public $usuario;
    public $contraseña;
    public $fecha_registro;
    public $permiso;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::connection();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?;");
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function NewPass($data)
    {

        $password = $data->contraseña;

        // Encriptar la contraseña usando bcrypt
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET 
        pass = ?,
        nuevo = 1
        WHERE id_usuario= ?;";

        $this->pdo->prepare($sql)
            ->execute(
                array(
                    $hashed_password,
                    $data->id_usuario
                )
            );
    }
}
