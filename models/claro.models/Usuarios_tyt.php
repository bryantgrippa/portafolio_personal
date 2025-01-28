<?php
class Usuarios_tyt
{
    private $pdo;
    public $id_venta;
    public $cedula_asesor;
    public $nombre_asesor;
    public $nombres;
    public $numero_cedula;
    public $tipo_cedula;
    public $correo;
    public $departamento;
    public $ciudad;
    public $barrio;
    public $referido;
    public $direccion;
    public $cel_1;
    public $cel_2;
    public $nombres_tercero;
    public $documento_tercero;
    public $cel_tercero;
    public $numero_grabacion_contrato;
    public $fecha_grabacion_contrato;
    public $referencia_equipo;
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
    public $franja;
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
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_tyt
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
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_tyt
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
    public function Registrar(Usuarios_tyt $data)
    {
        try {
            $fields = [
                'cedula_asesor', 'nombre_asesor', 'nombres', 'numero_cedula', 'tipo_cedula', 
                'correo', 'departamento', 'ciudad', 'barrio', 'direccion', 'cel_1', 'cel_2','referido', 'franja',
                'nombres_tercero', 'documento_tercero', 'cel_tercero', 'numero_grabacion_contrato', 'referencia_equipo',
                'material', 'fabricante', 'valor', 'valor_iva', 'tipo_contrato', 'numero_cuenta_venta', 'tipo_venta',
                'medio_pago', 'tipo_validacion', 'tipo_validacion_sec', 'meses_diferir', 'valor_cuota_inicial',
                'valor_cuota_mensual', 'observaciones', 'link', 'link2','link3'
            ];


            $placeholders = rtrim(str_repeat('?,', count($fields)), ',');

            $sql = "INSERT INTO venta_tyt (" . implode(',', $fields) . ") VALUES ($placeholders)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_map(function ($field) use ($data) {
                return $data->$field;
            }, $fields));

            // Insertar los mismos datos en la tabla historico_portabilidad
            $sqlVentaControl = "INSERT INTO historico_tyt (id_venta, " . implode(',', $fields) . ")
            SELECT LAST_INSERT_ID(), " . implode(',', $fields) . " FROM venta_tyt WHERE id_venta = LAST_INSERT_ID()";
            $this->pdo->query($sqlVentaControl);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
