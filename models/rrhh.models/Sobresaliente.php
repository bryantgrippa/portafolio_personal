<?php

class Sobresaliente {

    private $pdo;
    public $id_sobresaliente;
    public $texto;
    public $direccion_texto;
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
            $result = array();
            $registro_por_pagina = 10;
            $pagina = '';
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }
            $start_from = ($pagina - 1) * $registro_por_pagina;
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE texto LIKE '%" . $_GET['busqueda'] . "%' ORDER BY id_sobresaliente DESC LIMIT $start_from, $registro_por_pagina;";
            } else {
                $resto = " ORDER BY id_sobresaliente DESC  LIMIT $start_from, $registro_por_pagina";
            }
            $stm = $this->pdo->prepare("SELECT * FROM sobresaliente ". $resto .";");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar2() {
        try {
            $result = array();
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE texto LIKE '%" . $_GET['busqueda'] . "%' ORDER BY id_sobresaliente DESC;";
            } else {
                 $resto = " ORDER BY id_sobresaliente DESC";
            }            
            $stm = $this->pdo->prepare("SELECT * FROM sobresaliente " . $resto . ";");
            $stm->execute();
            return $stm->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM sobresaliente WHERE id_sobresaliente = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM sobresaliente WHERE id_sobresaliente=?;");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Activar($id) {
        try {
            $stm = $this->pdo->prepare("UPDATE sobresaliente SET activo = 1
            WHERE id_sobresaliente=?;");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Desactivar($id) {
        try {
            $stm = $this->pdo->prepare("UPDATE sobresaliente SET activo = 0
            WHERE id_sobresaliente=?;");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data) {
        try {
            $sql = "UPDATE sobresaliente SET
                    texto = ?, 
                    direccion_texto = ?
                    WHERE id_sobresaliente=?;";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->texto,
                                $data->direccion_texto,
                                $data->id_sobresaliente
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Sobresaliente $data) {
        try {
            $sql = "INSERT INTO sobresaliente (texto,direccion_texto) 
		        VALUES (?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->texto,
                                $data->direccion_texto
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
