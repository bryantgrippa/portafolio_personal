<?php

class Log
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::conn();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ProductosCantidad()
    {
        try {
            $stm = $this->pdo->prepare("SELECT COUNT(*) AS total_productos FROM producto");
            $stm->execute();


            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ProveedorCantidad()
    {
        try {
            $stm = $this->pdo->prepare("SELECT COUNT(*) AS total_proveedor FROM proveedor");
            $stm->execute();


            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function SalidaCantidad()
    {
        try {
            $stm = $this->pdo->prepare("SELECT COUNT(*) AS total_salida FROM salida");
            $stm->execute();


            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function UsuariosCantidad()
    {
        try {
            $stm = $this->pdo->prepare("SELECT COUNT(*) AS total_usuario FROM usuario");
            $stm->execute();


            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
