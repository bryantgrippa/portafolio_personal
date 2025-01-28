<?php
class Usuarios_porta
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

    public function obtener($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT vc.*
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_portabilidad
                WHERE cedula_asesor = ?
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.cedula_asesor = ?
            ORDER BY vc.ultima_modificacion DESC;");
            $stmt->execute(array($id, $id));

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function get($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT vc.*
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_portabilidad
                WHERE id_venta = ?
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.id_venta = ?
            ORDER BY vc.ultima_modificacion DESC;");
            $stmt->execute(array($id, $id));

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar(Usuarios_porta $data)
    {
        try {
            $fields = [
                'cedula_asesor', 'nombre_asesor', 'nombres', 'numero_cedula', 'tipo_cedula', 'fecha_nacimiento',
                'fecha_expedicion', 'correo', 'departamento', 'ciudad', 'operador', 'dias', 'ventana_cambio', 'barrio', 'direccion',
                'cel_1', 'cel_2', 'numero_grabacion_contrato', 'tipo_contrato', 'venta_tp','referido', 'nip', 'operador_donante',
                'estado_actual_operador_donante', 'codigo_plan', 'detalles_plan', 'valor', 'valor_iva',
                'tipo_solicitud', 'tipo_validacion', 'sim', 'numero_sim', 'min', 'numero_min_sim', 'descuento',
                'observaciones', 'link', 'link2'
            ];

            $placeholders = rtrim(str_repeat('?,', count($fields)), ',');

            $sql = "INSERT INTO venta_portabilidad (" . implode(',', $fields) . ") VALUES ($placeholders)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_map(function ($field) use ($data) {
                return $data->$field;
            }, $fields));

            // Insertar los mismos datos en la tabla historico_portabilidad
            $sqlVentaControl = "INSERT INTO historico_portabilidad (id_venta, " . implode(',', $fields) . ")
            SELECT LAST_INSERT_ID(), " . implode(',', $fields) . " FROM venta_portabilidad WHERE id_venta = LAST_INSERT_ID()";
            $this->pdo->query($sqlVentaControl);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Departamento()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM departamento");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
