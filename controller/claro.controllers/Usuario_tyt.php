<?php
session_start();
if (empty($_SESSION['id_usuario'])) {

?>
    <script language='JavaScript'>
        alert("Ingreso no correcto");
        location.href = "index.php";
    </script>
    <?php
}
if ($_SESSION['nuevo'] == 0) {
?>
    <script>
        alert("Por favor cambie su contraseña");
        location.href = "?p=claro&c=Pass&a=pass&id_usuario=<?php echo $_SESSION['id_usuario'] ?>"
    </script>
    <?php
}
require_once "models/claro.models/Usuarios_tyt.php";
class Usuario_tyt
{
    private $model;
    private $conn;

    public function __construct()
    {
        $this->model = new Usuarios_tyt();

        $dbController = new DBController();
        $this->conn = $dbController->connectDB();
    }
    public function main()
    {
        $alm = $this->model->obtener($_SESSION['cedula']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/asesor/vistas/listas.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function new()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/asesor/reporte/reporte.nueva.php";
        require_once "views/claro.views/footer.php";
    }
    public function save()
    {
        $alm = new Usuarios_tyt;

        $alm->cedula_asesor = $_REQUEST['cedula_asesor'];
        $alm->nombre_asesor = $_REQUEST['nombre_asesor'];
        $alm->nombres = $_REQUEST['nombres'];
        $alm->numero_cedula = ($_REQUEST['tipo_cedula'] == "CEDULA DE CIUDADANIA") ? $_REQUEST['numero_cedula'] : $_REQUEST['tipo_cedula_ce'] . $_REQUEST['numero_cedula'];
        $alm->tipo_cedula = $_REQUEST['tipo_cedula'];

        $alm->correo = $_REQUEST['correo'];
        $alm->departamento = $_REQUEST['departamento'];
        $alm->ciudad = $_REQUEST['ciudad'];
        $alm->barrio = $_REQUEST['barrio'];
        $alm->referido = $_REQUEST['referido'];

        $alm->direccion = $_REQUEST['direccion'];
        $alm->cel_1 = $_REQUEST['cel_1'];
        $alm->cel_2 = ($_REQUEST['cel_2'] != "") ? $_REQUEST['cel_2'] : 0;
        $alm->nombres_tercero = $_REQUEST['nombres_tercero'];
        $alm->documento_tercero = $_REQUEST['documento_tercero'];
        $alm->cel_tercero = $_REQUEST['cel_tercero'];
        $alm->numero_grabacion_contrato = $_REQUEST['numero_grabacion_contrato'];
        $alm->referencia_equipo = $_REQUEST['referencia_equipo'];
        $alm->material = $_REQUEST['material'];
        $alm->fabricante = $_REQUEST['fabricante'];
        $alm->valor = $_REQUEST['valor'];
        $alm->valor_iva = $_REQUEST['valor_iva'];
        $alm->tipo_contrato = $_REQUEST['tipo_contrato'];
        $alm->numero_cuenta_venta = $_REQUEST['numero_cuenta_venta'];
        $alm->tipo_venta = ($_REQUEST['tipo_venta'] == 'Terminales') ? $_REQUEST['tipo_venta2'] : $_REQUEST['tipo_venta'];
        $alm->medio_pago = $_REQUEST['medio_pago'];
        $alm->tipo_validacion = $_REQUEST['tipo_validacion'];
        $alm->tipo_validacion_sec = $_REQUEST['tipo_validacion_sec'];
        $alm->meses_diferir = $_REQUEST['meses_diferir'];
        $alm->valor_cuota_inicial = ($_REQUEST['valor_cuota_inicial'] == 0) ? 0 : $_REQUEST['valor_cuota_inicial'];
        $alm->valor_cuota_mensual = $_REQUEST['valor_cuota_mensual'];
        $alm->observaciones = $_REQUEST['observaciones'];
        $alm->franja = $_REQUEST['franja'];

        // Procesamiento de archivos "link" y "link2"
        foreach (["link", "link2", "link3"] as $fileKey) {
            if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]["tmp_name"] !== '') {
                $archivo_nombre = $_FILES[$fileKey]["name"];
                $archivo_temporal = $_FILES[$fileKey]["tmp_name"];
                $directorio_destino = "assets/img/evidencia_tyt/";
        
                // Verificar si el archivo ya existe en el destino
                $nombre_base = pathinfo($archivo_nombre, PATHINFO_FILENAME);
                $extension = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
                $i = 1;
                while (file_exists($directorio_destino . $archivo_nombre)) {
                    $archivo_nombre = $nombre_base . "($i)." . $extension;
                    $i++;
                }
        
                if (getimagesize($archivo_temporal) !== false) {
                    if (move_uploaded_file($archivo_temporal, $directorio_destino . $archivo_nombre)) {
                        $alm->$fileKey = $archivo_nombre;
                    } else {
                        echo "Hubo un error al subir la imagen.";
                    }
                } else {
                    echo "El archivo seleccionado no es una imagen válida.";
                }
            } else {
                $alm->$fileKey = ($fileKey == "link2") ? 0 : null;
            }
        }
        

        // Llamada al método Registrar del modelo
        $this->model->Registrar($alm);
    ?>
        <script language='JavaScript'>
            alert("Venta Registrada Correctamente.");
            location.href = "?p=claro&c=Login&a=Dashboard";
        </script>
<?php
    }
    public function venta(){
        $alm = $this->model->get($_REQUEST['id_venta']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/asesor/vistas/venta.view.php";
        require_once "views/claro.views/footer.php";
    }
}
