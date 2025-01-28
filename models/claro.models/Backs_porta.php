<?php

class Backs_porta
{
    private $pdo;
    public $id_venta;
    public $cedula_asesor;
    public $nombre_asesor;
    public $nombres;
    public $numero_cedula;
    public $tipo_cedula;
    public $fecha_nacimiento;
    public $fecha_expedicion;
    public $correo;
    public $departamento;
    public $ciudad;
    public $operador;
    public $dias;
    public $ventana_cambio;
    public $barrio;
    public $direccion;
    public $cel_1;
    public $cel_2;
    public $numero_grabacion_contrato;
    public $fecha_grabacion_contrato;
    public $tipo_contrato;
    public $venta_tp;
    public $referido;
    public $nip;
    public $operador_donante;
    public $estado_actual_operador_donante;
    public $codigo_plan;
    public $detalles_plan;
    public $valor;
    public $valor_iva;
    public $tipo_solicitud;
    public $tipo_validacion;
    public $sim;
    public $numero_sim;
    public $min;
    public $numero_min_sim;
    public $descuento;
    public $observaciones;
    public $link;
    public $link2;
    public $estado;
    public $detalles;
    public $comentario;
    public $ultima_modificacion;
    public $usuario_modificado;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::connection();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function total()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT vc.*
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_portabilidad
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            ORDER BY vc.id_venta DESC;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function today()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT vc.* FROM historico_portabilidad vc INNER JOIN ( SELECT id_venta, MAX(ultima_modificacion) 
        AS ultima_modificacion FROM historico_portabilidad WHERE DATE(fecha_grabacion_contrato) = CURDATE() GROUP BY id_venta ) ult 
        ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion 
        WHERE DATE(vc.fecha_grabacion_contrato) = CURDATE()");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function asesores()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE permiso = 6 ORDER BY id_usuario DESC;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function asesor($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT vc.*
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_portabilidad
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.id_venta = ?;");
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function user($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE cedula = ? ");
            $stmt->execute(array($id));

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ase($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT vc.*
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_portabilidad
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.cedula_asesor = ?;");
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function save($data)
    {
        try {

            $fields = [
                'id_venta', 'cedula_asesor', 'nombre_asesor', 'nombres', 'numero_cedula', 'tipo_cedula', 'fecha_nacimiento',
                'fecha_expedicion', 'correo', 'departamento', 'ciudad', 'operador', 'dias', 'ventana_cambio', 'barrio', 'direccion',
                'cel_1', 'cel_2', 'numero_grabacion_contrato', 'fecha_grabacion_contrato' ,'tipo_contrato', 'venta_tp', 'referido', 'nip', 'operador_donante',
                'estado_actual_operador_donante', 'codigo_plan', 'detalles_plan', 'valor', 'valor_iva',
                'tipo_solicitud', 'tipo_validacion', 'sim', 'numero_sim', 'min', 'numero_min_sim', 'descuento',
                'observaciones', 'link', 'link2', 'estado', 'detalles', 'comentario', 'usuario_modificado'
            ];

            $placeholders = rtrim(str_repeat('?,', count($fields)), ',');

            $sql = "INSERT INTO historico_portabilidad (" . implode(',', $fields) . ") VALUES ($placeholders)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_map(function ($field) use ($data) {
                return $data->$field;
                
            }, $fields));
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
