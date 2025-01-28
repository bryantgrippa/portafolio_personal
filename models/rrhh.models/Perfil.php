<?php

class Perfil {

    private $pdo;
    public $id_usuario;
    public $nombres;
    public $usuario;
    public $password;
    public $n_documento;
    public $fecha_nacimiento;
    public $cargo;
    public $foto;
    public $area;
    public $activo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE activo=1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CargoUsuario() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cargos WHERE activo= 1 ORDER BY detalle_cargo ASC");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Area() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM areas WHERE activo=1 ORDER BY detalle_area ASC");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Permiso() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM permisos WHERE activo=1 ORDER BY detalle_permiso ASC");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ultimo_usuario() {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(id_usuario) AS ultimou FROM usuarios");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ModificarC($data) {
        $password = $data->password;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET 
        password = ?, 
        nuevo = 0
        WHERE id_usuario=? ";
        $this->pdo->prepare($sql)
                ->execute(
                        array(
                            $hashed_password,
                            $_SESSION['id_usuario']
                        )
        );
    }

    public function Actualizar($data) {
        try {

            $sql = "UPDATE usuarios SET 
                    nombres = ?, 
                    fecha_nacimiento = ?,
                    foto = ?            
                    WHERE id_usuario=?;";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombres,
                                $data->fecha_nacimiento,
                                $data->foto,
                                $_SESSION['id_usuario']
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
