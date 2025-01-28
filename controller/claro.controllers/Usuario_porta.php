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
require_once "models/claro.models/Usuarios_porta.php";
class Usuario_porta
{
    private $model;
    private $conn;

    public function __construct()
    {
        $this->model = new Usuarios_porta();

        $dbController = new DBController();
        $this->conn = $dbController->connectDB();
    }
    public function main()
    {
        $alm = $this->model->obtener($_SESSION['cedula']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/asesor/vistas/listas.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function portabilidad()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/asesor/reporte/reporte.portabilidad.php";
        require_once "views/claro.views/footer.php";
    }
    public function linea_nueva()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/asesor/reporte/reporte.lineanueva.php";
        require_once "views/claro.views/footer.php";
    }
    public function migracion()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/asesor/reporte/reporte.migracion.php";
        require_once "views/claro.views/footer.php";
    }
    public function savelineanueva()
    {
        $alm = new Usuarios_porta();

        $alm->cedula_asesor = $_REQUEST['cedula_asesor'];
        $alm->nombre_asesor = $_REQUEST['nombre_asesor'];
        $alm->nombres = $_REQUEST['nombres'];

        $alm->tipo_cedula = $_REQUEST['tipo_cedula'];
        $alm->numero_cedula = ($_REQUEST['tipo_cedula'] == "CEDULA DE CIUDADANIA") ? $_REQUEST['numero_cedula'] : $_REQUEST['tipo_cedula_ce'] . $_REQUEST['numero_cedula'];

        $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $alm->fecha_expedicion = $_REQUEST['fecha_expedicion'];
        $alm->correo = $_REQUEST['correo'];
        $alm->departamento = $_REQUEST['departamento'];
        $alm->ciudad = $_REQUEST['ciudad'];
        $alm->operador = $_REQUEST['operador'];
        $alm->dias = $_REQUEST['dias'];
        $alm->ventana_cambio = $_REQUEST['ventana_cambio'];
        
        $alm->barrio = $_REQUEST['barrio'];
        $alm->direccion = $_REQUEST['direccion'];
        $alm->cel_1 = $_REQUEST['cel_1'];

        $alm->cel_2 = ($_REQUEST['cel_2'] != "") ? $_REQUEST['cel_2'] : 0;

        $alm->numero_grabacion_contrato = $_REQUEST['numero_grabacion_contrato'];
        $alm->referido = $_REQUEST['referido'];
        $alm->tipo_contrato = $_REQUEST['tipo_contrato'];
        $alm->venta_tp = $_REQUEST['venta_tp'];


        $alm->tipo_solicitud = $_REQUEST['tipo_solicitud'];
        $alm->operador_donante = "CLARO";
        $alm->nip = 0;
        $alm->numero_sim = 0;
        $alm->numero_min_sim = 0;

        $alm->estado_actual_operador_donante = $_REQUEST['estado_actual_operador_donante'];
        $alm->codigo_plan = $_REQUEST['codigo_plan'];
        $alm->detalles_plan = $_REQUEST['detalles_plan'];
        $alm->valor = $_REQUEST['valor'];
        $alm->valor_iva = $_REQUEST['valor_iva'];
        $alm->tipo_validacion = $_REQUEST['tipo_validacion'];
        $alm->sim = $_REQUEST['sim'];

        $alm->min = 0;

        $alm->descuento = $_REQUEST['descuento'];
        $alm->observaciones = $_REQUEST['observaciones'];

        foreach (["link", "link2"] as $fileKey) {
            if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]["tmp_name"] !== '') {
                $archivo_nombre = $_FILES[$fileKey]["name"];
                $archivo_temporal = $_FILES[$fileKey]["tmp_name"];
                $directorio_destino = "assets/img/evidencia_portabilidad/";
        
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
                    ?>
                    <script language='JavaScript'>
                        alert("AL PARECER HAY UN ERROR AL SUBIR LA IMAGEN. VERIFIQUE QUE SU IMAGEN ESTE EN EL FORMATO CORRECTO O QUE SE ENCUENTRE EN OPTIMAS CONDICIONES.");
                        location.href = "?p=claro&c=Usuario_porta&a=main";
                    </script>
            <?php                      
            }
                } else {
                    echo "El archivo seleccionado no es una imagen válida.";
                }
            }
        }

        $this->model->Registrar($alm);
    ?>
        <script language='JavaScript'>
            alert("Venta Registrada Correctamente.");
            location.href = "?p=claro&c=Usuario_porta&a=main";
        </script>
    <?php
    }
    public function saveporta()
    {
        $alm = new Usuarios_porta();

        $alm->cedula_asesor = $_REQUEST['cedula_asesor'];
        $alm->nombre_asesor = $_REQUEST['nombre_asesor'];
        $alm->nombres = $_REQUEST['nombres'];

        $alm->tipo_cedula = $_REQUEST['tipo_cedula'];
        $alm->numero_cedula = ($_REQUEST['tipo_cedula'] == "CEDULA DE CIUDADANIA") ? $_REQUEST['numero_cedula'] : $_REQUEST['tipo_cedula_ce'] . $_REQUEST['numero_cedula'];

        $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $alm->fecha_expedicion = $_REQUEST['fecha_expedicion'];
        $alm->correo = $_REQUEST['correo'];
        $alm->departamento = $_REQUEST['departamento'];
        $alm->ciudad = $_REQUEST['ciudad'];
        $alm->operador = $_REQUEST['operador'];
        $alm->dias = $_REQUEST['dias'];
        $alm->ventana_cambio = $_REQUEST['ventana_cambio'];

        $alm->barrio = $_REQUEST['barrio'];
        $alm->direccion = $_REQUEST['direccion'];
        $alm->cel_1 = $_REQUEST['cel_1'];

        $alm->cel_2 = ($_REQUEST['cel_2'] != "") ? $_REQUEST['cel_2'] : 0;

        $alm->numero_grabacion_contrato = $_REQUEST['numero_grabacion_contrato'];
        $alm->referido = $_REQUEST['referido'];
        $alm->tipo_contrato = $_REQUEST['tipo_contrato'];
        $alm->venta_tp = $_REQUEST['venta_tp'];

        $alm->tipo_solicitud = $_REQUEST['tipo_solicitud'];
        $alm->operador_donante = $_REQUEST['operador_donante'];
        $alm->nip = $_REQUEST['nip'];
        $alm->numero_sim = $_REQUEST['numero_sim'];
        $alm->numero_min_sim = $_REQUEST['numero_min_sim'];

        $alm->estado_actual_operador_donante = $_REQUEST['estado_actual_operador_donante'];
        $alm->codigo_plan = $_REQUEST['codigo_plan'];
        $alm->detalles_plan = $_REQUEST['detalles_plan'];
        $alm->valor = $_REQUEST['valor'];
        $alm->valor_iva = $_REQUEST['valor_iva'];
        $alm->tipo_validacion = $_REQUEST['tipo_validacion'];
        $alm->sim = $_REQUEST['sim'];

        $alm->min = $_REQUEST['min'];

        $alm->descuento = $_REQUEST['descuento'];
        $alm->observaciones = $_REQUEST['observaciones'];

        foreach (["link", "link2"] as $fileKey) {
            if (isset($_FILES[$fileKey])) {
                $archivo_nombre = $_FILES[$fileKey]["name"];
                $archivo_temporal = $_FILES[$fileKey]["tmp_name"];
                $archivo_tamano = $_FILES[$fileKey]["size"];

                if (getimagesize($archivo_temporal) !== false) {
                    $directorio_destino = "assets/img/evidencia_portabilidad/";

                    if (move_uploaded_file($archivo_temporal, $directorio_destino . $archivo_nombre)) {
                        $alm->$fileKey = $archivo_nombre;
                    } else {
                    ?>
                    <script language='JavaScript'>
                        alert("AL PARECER HAY UN ERROR AL SUBIR LA IMAGEN. VERIFIQUE QUE SU IMAGEN ESTE EN EL FORMATO CORRECTO O QUE SE ENCUENTRE EN OPTIMAS CONDICIONES.");
                        location.href = "?p=claro&c=Usuario_porta&a=main";
                    </script>
            <?php                      
            }
                } else {
                    echo "El archivo seleccionado no es una imagen válida.";
                }
            }
        }

        $this->model->Registrar($alm);
    ?>
        <script language='JavaScript'>
            alert("Venta Registrada Correctamente.");
            location.href = "?p=claro&c=Usuario_porta&a=main";
        </script>
    <?php
    }
    public function savemigracion()
    {
        $alm = new Usuarios_porta();

        $alm->cedula_asesor = $_REQUEST['cedula_asesor'];
        $alm->nombre_asesor = $_REQUEST['nombre_asesor'];
        $alm->nombres = $_REQUEST['nombres'];

        $alm->tipo_cedula = $_REQUEST['tipo_cedula'];
        $alm->numero_cedula = ($_REQUEST['tipo_cedula'] == "CEDULA DE CIUDADANIA") ? $_REQUEST['numero_cedula'] : $_REQUEST['tipo_cedula_ce'] . $_REQUEST['numero_cedula'];

        $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $alm->fecha_expedicion = $_REQUEST['fecha_expedicion'];
        $alm->correo = $_REQUEST['correo'];
        $alm->departamento = $_REQUEST['departamento'];
        $alm->ciudad = $_REQUEST['ciudad'];
        $alm->operador = $_REQUEST['operador'];
        $alm->dias = $_REQUEST['dias'];
        $alm->ventana_cambio = $_REQUEST['ventana_cambio'];

        $alm->barrio = $_REQUEST['barrio'];
        $alm->direccion = $_REQUEST['direccion'];
        $alm->cel_1 = $_REQUEST['cel_1'];

        $alm->cel_2 = ($_REQUEST['cel_2'] != "") ? $_REQUEST['cel_2'] : 0;

        $alm->numero_grabacion_contrato = $_REQUEST['numero_grabacion_contrato'];
        $alm->referido = $_REQUEST['referido'];
        $alm->tipo_contrato = $_REQUEST['tipo_contrato'];
        $alm->venta_tp = $_REQUEST['venta_tp'];


        $alm->tipo_solicitud = $_REQUEST['tipo_solicitud'];
        $alm->operador_donante = "CLARO";
        $alm->nip = 0;
        $alm->numero_sim = 0;
        $alm->numero_min_sim = 0;

        $alm->estado_actual_operador_donante = $_REQUEST['estado_actual_operador_donante'];
        $alm->codigo_plan = $_REQUEST['codigo_plan'];
        $alm->detalles_plan = $_REQUEST['detalles_plan'];
        $alm->valor = $_REQUEST['valor'];
        $alm->valor_iva = $_REQUEST['valor_iva'];
        $alm->tipo_validacion = $_REQUEST['tipo_validacion'];
        $alm->sim = $_REQUEST['sim'];

        $alm->min = $_REQUEST['min'];

        $alm->descuento = $_REQUEST['descuento'];
        $alm->observaciones = $_REQUEST['observaciones'];

        foreach (["link", "link2"] as $fileKey) {
            if (isset($_FILES[$fileKey])) {
                $archivo_nombre = $_FILES[$fileKey]["name"];
                $archivo_temporal = $_FILES[$fileKey]["tmp_name"];
                $archivo_tamano = $_FILES[$fileKey]["size"];

                if (getimagesize($archivo_temporal) !== false) {
                    $directorio_destino = "assets/img/evidencia_portabilidad/";

                    if (move_uploaded_file($archivo_temporal, $directorio_destino . $archivo_nombre)) {
                        $alm->$fileKey = $archivo_nombre;
                    } else {
                        echo "Hubo un error al subir la imagen.";
                    }
                } else {
                    ?>
                    <script language='JavaScript'>
                        alert("AL PARECER HAY UN ERROR AL SUBIR LA IMAGEN. VERIFIQUE QUE SU IMAGEN ESTE EN EL FORMATO CORRECTO O QUE SE ENCUENTRE EN OPTIMAS CONDICIONES.");
                        location.href = "?p=claro&c=Usuario_porta&a=main";
                    </script>
            <?php                
            }
            }
        }

        $this->model->Registrar($alm);
    ?>
        <script language='JavaScript'>
            alert("Venta Registrada Correctamente.");
            location.href = "?p=claro&c=Usuario_porta&a=main";
        </script>
<?php
    }
    public function venta()
    {
        $alm = $this->model->get($_REQUEST['id_venta']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/asesor/vistas/ventas.view.php";
        require_once "views/claro.views/footer.php";
    }
}
