<?php
class Proveedor
{
    private $pdo;
    public $id_proveedor;
    public $nombre;
    public $nit;
    public $correo;
    public $contacto_nombre;
    public $contacto_cel;

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
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM proveedor ORDER BY id_proveedor DESC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM proveedor WHERE id_proveedor = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM proveedor WHERE id_proveedor = ?;");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE proveedor SET
                    nombre = ?,
                    nit = ?,
                    correo = ?,
                    contacto_nombre = ?,
                    contacto_cel = ?
                    WHERE id_proveedor = ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->nit,
                        $data->correo,
                        $data->contacto_nombre,
                        $data->contacto_cel,
                        $data->id_proveedor
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Proveedor $data)
    {
        try {
            $sql = "INSERT INTO proveedor (
                    nombre,
                    nit,
                    correo,
                    contacto_nombre,
                    contacto_cel
                    )
		        VALUES (?, ?, ?, ?, ?);";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->nit,
                        $data->correo,
                        $data->contacto_nombre,
                        $data->contacto_cel
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
