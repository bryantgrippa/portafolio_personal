<?php

class Producto
{
    private $pdo;
    public $id_producto;
    public $nombre;
    public $precio;
    public $fecha_ingreso;
    public $talla;
    public $cantidad;
    public $fecha_modificado;
    public $proveedor;


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
            $stm = $this->pdo->prepare("SELECT * FROM producto ORDER BY id_producto DESC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM producto WHERE id_producto = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM producto WHERE id_producto = ?;");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE producto SET
                    nombre = ?,
                    precio = ?,
                    talla = ?,
                    fecha_modificado = current_timestamp(),
                    proveedor = ?
                    WHERE id_producto = ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->precio,
                        $data->talla,
                        $data->proveedor,
                        $data->id_producto
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Producto $data)
    {
        try {
            $sql = "INSERT INTO producto (
                    nombre,
                    precio,
                    talla,
                    proveedor
                    )
		        VALUES (?, ?, ?, ?);";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->precio,
                        $data->talla,
                        $data->proveedor
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Productos()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM producto");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Proveedor()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM proveedor");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Cantidad(Producto $data)
    {
        try {
            $sql = "UPDATE producto SET
            cantidad = ((cantidad) + ?),
            fecha_modificado = current_timestamp()
            WHERE id_producto = ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->cantidad,
                        $data->id_producto
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
