<?php

class Usuarios
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
    public function Listar()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios ORDER BY id_usuario desc;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
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
    public function Permisos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM permisos");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try {

            $sql = "UPDATE usuarios SET 
                nombres = ?, 
                usuario = ?,
                cedula = ?,
                permiso = ?
                WHERE id_usuario= ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombres,
                        $data->usuario,
                        $data->cedula,
                        $data->permiso,
                        $data->id_usuario
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar($data)
    {
        try {

            $password = $data->contraseña;

            // Encriptar la contraseña usando bcrypt
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO usuarios (
                nombres,
                usuario,
                cedula,
                pass,
                permiso
                )
                    VALUES (?,?,?,?,?)
                ";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombres,
                        $data->usuario,
                        $data->cedula,
                        $hashed_password,
                        $data->permiso
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function activarUsuario($id)
    {
        try {
            $sql = "UPDATE usuarios SET estado = 1 WHERE id_usuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            die("Error al activar usuario: " . $e->getMessage());
        }
    }

    public function DesactivarUsuario($id)
    {
        try {
            $sql = "UPDATE usuarios SET estado = 0 WHERE id_usuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
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
        nuevo = 0
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
