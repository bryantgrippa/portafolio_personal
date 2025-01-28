<?php
class certificado_pdf{
    private $pdo;
    public $id_usuario;
    public $nombres;
    public $usuario;
    public $password;
    public $n_documento;
    public $fecha_nacimiento;
    public $fecha_ingreso;
    public $cargo;
    public $foto;
    public $area;
    public $activo;
    public $puesto_contratado;
    public $valor_sueldo;
    public $valor_sueldo_letras;
    public $bienvenida;
    public $supervisor;    
    public $permiso;


    public function __construct(){
        try {
            $this->pdo = DataBase::StartUp();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        } 
    }

public function Certificado_laboral_pdf($id){
    try {
        $consulta = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}

}
?>