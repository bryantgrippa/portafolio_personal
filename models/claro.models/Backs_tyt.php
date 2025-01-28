<?php

class Backs_tyt
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
    public $barrio;
    public $direccion;
    public $cel_1;
    public $cel_2;
    public $nombres_tercero;
    public $documento_tercero;
    public $cel_tercero;
    public $numero_grabacion_contrato;
    public $fecha_grabacion_contrato;
    public $referencia_equipo;
    public $referido;
    public $material;
    public $fabricante;
    public $valor;
    public $valor_iva;
    public $tipo_contrato;
    public $numero_cuenta_venta;
    public $tipo_venta;
    public $medio_pago;
    public $tipo_validacion;
    public $tipo_validacion_sec;
    public $meses_diferir;
    public $valor_cuota_inicial;
    public $valor_cuota_mensual;
    public $observaciones;
    public $link;
    public $link2;
    public $link3;
    public $estado;
    public $detalles;
    public $comentario;
    public $fecha_entrega;
    public $reserva;
    public $tramitado;
    public $estados_2;
    public $franja;
    public $notus;
    public $cuscode;
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
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_tyt
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
            $stmt = $this->pdo->prepare("SELECT vc.* FROM historico_tyt vc INNER JOIN ( SELECT id_venta, MAX(ultima_modificacion) 
        AS ultima_modificacion FROM historico_tyt WHERE DATE(fecha_grabacion_contrato) = CURDATE() GROUP BY id_venta ) ult 
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
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE permiso = 7 ORDER BY id_usuario DESC;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
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
    public function asesor($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT vc.*
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_tyt
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.id_venta = ?;");
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ase($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT vc.*
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_tyt
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
                'id_venta', 'cedula_asesor', 'nombre_asesor', 'nombres', 'numero_cedula', 'tipo_cedula', 'activo',
                'correo', 'departamento', 'ciudad', 'barrio', 'direccion', 'cel_1', 'cel_2','referido','fecha_entrega','franja','reserva','tramitado',
                'nombres_tercero', 'documento_tercero', 'cel_tercero', 'numero_grabacion_contrato', 'fecha_grabacion_contrato',
                'referencia_equipo', 'material', 'fabricante', 'valor', 'valor_iva', 'tipo_contrato', 'numero_cuenta_venta',
                'tipo_venta', 'medio_pago', 'tipo_validacion', 'tipo_validacion_sec', 'meses_diferir', 'valor_cuota_inicial','notus','cuscode',
                'valor_cuota_mensual', 'observaciones', 'link', 'link2','link3', 'estado','estados_2', 'detalles', 'comentario', 'usuario_modificado'
            ];

            $placeholders = rtrim(str_repeat('?,', count($fields)), ',');

            $sql = "INSERT INTO historico_tyt (" . implode(',', $fields) . ") VALUES ($placeholders)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_map(function ($field) use ($data) {
                return $data->$field;
            }, $fields));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
