<?php
class Usuario
{
    private $pdo;
    public $id_usuario;
    public $nombre;
    public $usuario;
    public $contraseña;
    public $permiso;
    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::conn();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario ORDER BY nombre ASC;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE id_usuario = ?;");
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Permiso()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM permiso");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try {

            $sql = "UPDATE usuario SET 
                nombre = ?, 
                usuario = ?,
                contraseña = ?,
                permiso = ?
                WHERE id_usuario= ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->usuario,
                        $data->contraseña,
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

            $sql = "INSERT INTO usuario (
                nombre,
                usuario,
                contraseña,
                permiso
                )
                    VALUES (?,?,?,?)
                ";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->usuario,
                        $data->contraseña,
                        $data->permiso
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Eliminar($id)
    {
        try {
            $sql = "DELETE from usuario WHERE id_usuario = ?;";
            $stm = $this->pdo->prepare($sql);

            $stm->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
