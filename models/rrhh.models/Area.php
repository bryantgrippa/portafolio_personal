<?php

class Area {
    private $pdo;
    public $id_area;
    public $detalle_area;
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
            $stm = $this->pdo->prepare("SELECT * FROM areas ORDER BY detalle_area ASC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM areas WHERE id_area = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM areas WHERE id_area=?;");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE areas SET
                    detalle_area = ?
                    WHERE id_area = ?;";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->detalle_area,
                                $data->id_area
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Area $data) {
        try {
            $sql = "INSERT INTO areas (detalle_area) 
		        VALUES (?);";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->detalle_area
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ActivarArea($id) {
        try {
            $sql = "UPDATE areas SET activo = 1 WHERE id_area = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function DesactivarArea($id) {
        try {
            $sql = "UPDATE areas SET activo = 0 WHERE id_area = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
        public function Area($id) {
            try {
                $sql = "SELECT * FROM usuarios WHERE area = ?";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$id]);
                return $stmt->fetchAll(PDO::FETCH_OBJ); // Devolver resultados como un array de objetos
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Cargo() {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM cargos WHERE activo=1;");
                $stm->execute();
    
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Areas() {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM areas WHERE activo= 1 ORDER BY detalle_area ASC;");
                $stm->execute();
    
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
}
