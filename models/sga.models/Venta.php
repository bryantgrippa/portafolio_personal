<?php
class Venta
{

    private $pdo;
    public $id_salida;
    public $producto;
    public $cantidad;
    public $cliente_nombre;
    public $cliente_id;
    public $cliente_contacto;
    public $cliente_direccion;
    public $observaciones;

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
            $stm = $this->pdo->prepare("SELECT * FROM salida ORDER BY id_salida DESC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM salida WHERE id_salida = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM salida WHERE id_salida = ?;");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE salida SET
    	            cliente_nombre	= ?,
	                cliente_id	= ?,
	                cliente_contacto = ?,
	                cliente_direccion = ?,
            	    observaciones = ?
                    WHERE id_salida = ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->cliente_nombre,
                        $data->cliente_id,
                        $data->cliente_contacto,
                        $data->cliente_direccion,
                        $data->observaciones,
                        $data->id_salida
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Venta $data)
    {
        try {
            $sql = "INSERT INTO salida (
                        producto,
                        cantidad,
                        cliente_nombre,
                        cliente_id,
                        cliente_contacto,
                        cliente_direccion,
                        observaciones
                    )
		        VALUES (?, ?, ?, ?, ?, ?, ?);";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->producto,
                        $data->cantidad,
                        $data->cliente_nombre,
                        $data->cliente_id,
                        $data->cliente_contacto,
                        $data->cliente_direccion,
                        $data->observaciones
                    )
                );
            $sql2 = "UPDATE producto SET
                cantidad = ((cantidad) - ?)
                WHERE id_producto = ?;";

            $this->pdo->prepare($sql2)
                ->execute(
                    array(
                        $data->cantidad,
                        $data->producto
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Producto()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM producto");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Cantidad(Venta $data)
    {
        try {
            $sql = "UPDATE producto SET
            cantidad = ((cantidad) - ?)
            WHERE id_producto = ?;";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->cantidad,
                        $data->producto
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
