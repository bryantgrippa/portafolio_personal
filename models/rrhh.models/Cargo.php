<?php

class Cargo {

    private $pdo;
    public $id_cargo;

    public $id_noticia;
    public $detalle_cargo;
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
            $stm = $this->pdo->prepare("SELECT * FROM cargos;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cargos WHERE id_cargo = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM cargos WHERE id_cargo=?;");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE cargos SET
                    detalle_cargo = ?
                    WHERE id_cargo=?;";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->detalle_cargo,
                                $data->id_cargo
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Cargo $data) {
        try {
            $sql = "INSERT INTO cargos (detalle_cargo) 
		        VALUES (?)";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->detalle_cargo
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ActivarCargo($id) {
        try {
            $sql = "UPDATE cargos SET activo = 1 WHERE id_cargo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function DesactivarCargo($id) {
        try {
            $sql = "UPDATE cargos SET activo = 0 WHERE id_cargo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
