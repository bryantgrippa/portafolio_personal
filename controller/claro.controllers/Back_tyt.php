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
if ($_SESSION['permiso'] == 6 || $_SESSION['permiso'] == 7  ) {
    ?>
        <script language='JavaScript'>
            alert("Usted no tiene los permisos necesarios para estar aqui");
            location.href = "?p=claro&c=Login&a=Dashboard";
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
require_once "models/claro.models/Backs_tyt.php";
class Back_tyt
{
    private $model;
    private $conn;

    public function __construct()
    {
        $this->model = new Backs_tyt();

        $dbController = new DBController();
        $this->conn = $dbController->connectDB();
    }
    public function today()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/administrativo/today.php";
        require_once "views/claro.views/footer.php";
    }
    public function asesores()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/administrativo/asesor.php";
        require_once "views/claro.views/footer.php";
    }
    public function total()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/administrativo/total.php";
        require_once "views/claro.views/footer.php";
    }
    public function asesor()
    {
        $alm = $this->model->ase($_REQUEST['cedula']);
        $user = $this->model->user($_REQUEST['cedula']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/administrativo/venta/asesor.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function fecha()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/administrativo/fechas.php";
        require_once "views/claro.views/footer.php";
    }
    public function venta()
    {
        $alm = $this->model->asesor($_REQUEST['id_venta']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/tyt/administrativo/venta/ventas.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function save_tyt()
    {
        $alm = new Backs_tyt();

        $alm->id_venta = $_REQUEST['id_venta'];
        $alm->cedula_asesor = $_REQUEST['cedula_asesor'];
        $alm->nombre_asesor = $_REQUEST['nombre_asesor'];

        if ($_REQUEST['nombres2'] != "") {
            $alm->nombres = $_REQUEST['nombres2'];
        } else {
            $alm->nombres = $_REQUEST['nombres'];
        }

        if ($_REQUEST['tipo_cedula2'] != "") {
            $alm->tipo_cedula = $_REQUEST['tipo_cedula2'];
        } else {
            $alm->tipo_cedula = $_REQUEST['tipo_cedula'];
        }

        if ($_REQUEST['numero_cedula2'] != "") {
            if ($_REQUEST['tipo_cedula2'] == "CEDULA DE EXTRANJERIA") {
                $alm->numero_cedula = $_REQUEST['tipo_cedula_ce'] . $_REQUEST['numero_cedula2'];
            } else {
                $alm->numero_cedula = $_REQUEST['numero_cedula2'];
            }
        } else {
            $alm->numero_cedula = $_REQUEST['numero_cedula'];
        }

        if ($_REQUEST['referido2'] != "") {
            $alm->referido = $_REQUEST['referido2'];
        } else {
            $alm->referido = $_REQUEST['referido'];
        }
        if ($_REQUEST['correo2'] != "") {
            $alm->correo = $_REQUEST['correo2'];
        } else {
            $alm->correo = $_REQUEST['correo'];
        }

        if ($_REQUEST['departamento2'] != "") {
            $alm->departamento = $_REQUEST['departamento2'];
        } else {
            $alm->departamento = $_REQUEST['departamento'];
        }

        if ($_REQUEST['ciudad2'] != "") {
            $alm->ciudad = $_REQUEST['ciudad2'];
        } else {
            $alm->ciudad = $_REQUEST['ciudad'];
        }

        if ($_REQUEST['barrio2'] != "") {
            $alm->barrio = $_REQUEST['barrio2'];
        } else {
            $alm->barrio = $_REQUEST['barrio'];
        }

        if ($_REQUEST['direccion2'] != "") {
            $alm->direccion = $_REQUEST['direccion2'];
        } else {
            $alm->direccion = $_REQUEST['direccion'];
        }

        if ($_REQUEST['cel_1_2'] != "") {
            $alm->cel_1 = $_REQUEST['cel_1_2'];
        } else {
            $alm->cel_1 = $_REQUEST['cel_1'];
        }

        if ($_REQUEST['cel_2_2'] != "") {
            $alm->cel_2 = $_REQUEST['cel_2_2'];
        } else {
            $alm->cel_2 = $_REQUEST['cel_2'];
        }

        if ($_REQUEST['numero_grabacion_contrato2'] != "") {
            $alm->numero_grabacion_contrato = $_REQUEST['numero_grabacion_contrato2'];
        } else {
            $alm->numero_grabacion_contrato = $_REQUEST['numero_grabacion_contrato'];
        }
        if ($_REQUEST['nombres_tercero2'] != "") {
            $alm->nombres_tercero = $_REQUEST['nombres_tercero2'];
        } else {
            $alm->nombres_tercero = $_REQUEST['nombres_tercero'];
        }
        if ($_REQUEST['documento_tercero2'] != "") {
            $alm->documento_tercero = $_REQUEST['documento_tercero2'];
        } else {
            $alm->documento_tercero = $_REQUEST['documento_tercero'];
        }
        if ($_REQUEST['cel_tercero2'] != "") {
            $alm->cel_tercero = $_REQUEST['cel_tercero2'];
        } else {
            $alm->cel_tercero = $_REQUEST['cel_tercero'];
        }
        if ($_REQUEST['referencia_equipo2'] != "") {
            $alm->referencia_equipo = $_REQUEST['referencia_equipo2'];
        } else {
            $alm->referencia_equipo = $_REQUEST['referencia_equipo'];
        }
        if ($_REQUEST['material2'] != "") {
            $alm->material = $_REQUEST['material2'];
        } else {
            $alm->material = $_REQUEST['material'];
        }
        if ($_REQUEST['fabricante2'] != "") {
            $alm->fabricante = $_REQUEST['fabricante2'];
        } else {
            $alm->fabricante = $_REQUEST['fabricante'];
        }
        if ($_REQUEST['valor2'] != "") {
            $alm->valor = $_REQUEST['valor2'];
        } else {
            $alm->valor = $_REQUEST['valor'];
        }
        if ($_REQUEST['valor_iva2'] != "") {
            $alm->valor_iva = $_REQUEST['valor_iva2'];
        } else {
            $alm->valor_iva = $_REQUEST['valor_iva'];
        }
        if ($_REQUEST['tipo_contrato2'] != "") {
            $alm->tipo_contrato = $_REQUEST['tipo_contrato2'];
        } else {
            $alm->tipo_contrato = $_REQUEST['tipo_contrato'];
        }
        if ($_REQUEST['numero_cuenta_venta2'] != "") {
            $alm->numero_cuenta_venta = $_REQUEST['numero_cuenta_venta2'];
        } else {
            $alm->numero_cuenta_venta = $_REQUEST['numero_cuenta_venta'];
        }
        $alm->tipo_venta = ($_REQUEST['tipo_venta'] == 'Terminales') ? $_REQUEST['tipo_venta2'] : $_REQUEST['tipo_venta'];

        if ($_REQUEST['tipo_venta2'] != "") {
            if($_REQUEST['tipo_venta2'] == 'Terminales'){
                $alm->tipo_venta = $_REQUEST['tipo_venta2_2'];
            }else{
                $alm->tipo_venta = $_REQUEST['tipo_venta2'];
            }
        } else {
            $alm->tipo_venta = $_REQUEST['tipo_venta'];
        }
        if ($_REQUEST['activo2'] != "") {
            $alm->activo = $_REQUEST['activo2'];
        } else {
            $alm->activo = $_REQUEST['activo'];
        }
        if ($_REQUEST['medio_pago2'] != "") {
            $alm->medio_pago = $_REQUEST['medio_pago2'];
        } else {
            $alm->medio_pago = $_REQUEST['medio_pago'];
        }
        if ($_REQUEST['tipo_validacion2'] != "") {
            $alm->tipo_validacion = $_REQUEST['tipo_validacion2'];
        } else {
            $alm->tipo_validacion = $_REQUEST['tipo_validacion'];
        }
        if ($_REQUEST['tipo_validacion_sec2'] != "") {
            $alm->tipo_validacion_sec = $_REQUEST['tipo_validacion_sec2'];
        } else {
            $alm->tipo_validacion_sec = $_REQUEST['tipo_validacion_sec'];
        }
        if ($_REQUEST['meses_diferir2'] != "") {
            $alm->meses_diferir = $_REQUEST['meses_diferir2'];
        } else {
            $alm->meses_diferir = $_REQUEST['meses_diferir'];
        }
        if ($_REQUEST['valor_cuota_inicial2'] != "") {
            $alm->valor_cuota_inicial = $_REQUEST['valor_cuota_inicial2'];
        } else {
            $alm->valor_cuota_inicial = $_REQUEST['valor_cuota_inicial'];
        }
        if ($_REQUEST['valor_cuota_mensual2'] != "") {
            $alm->valor_cuota_mensual = $_REQUEST['valor_cuota_mensual2'];
        } else {
            $alm->valor_cuota_mensual = $_REQUEST['valor_cuota_mensual'];
        }
        $alm->observaciones = $_REQUEST['observaciones'];

        $alm->fecha_grabacion_contrato = $_REQUEST['fecha_grabacion_contrato'];

        if (!empty($_FILES['link_2']['name'])) {
            $archivo_nombre1 = $_FILES["link_2"]["name"];
            $archivo_temporal1 = $_FILES["link_2"]["tmp_name"];
            $archivo_tamano1 = $_FILES["link_2"]["size"];

            $nombre_base1 = pathinfo($archivo_nombre1, PATHINFO_FILENAME);
            $extension1 = pathinfo($archivo_nombre1, PATHINFO_EXTENSION);
            $i1 = 1;
            while (file_exists($directorio_destino1 . $archivo_nombre1)) {
                $archivo_nombre1 = $nombre_base1 . "($i1)." . $extension1;
                $i1++;
            }
            // Verifica si el archivo es una imagen real
            if (getimagesize($archivo_temporal1) !== false) {
                // Directorio donde se almacenarán las imágenes subidas
                $directorio_destino1 = "assets/img/evidencia_tyt/";
                // Mueve el archivo a la carpeta de destino
                if (move_uploaded_file($archivo_temporal1, $directorio_destino1 . $archivo_nombre1)) {
                    $alm->link = $archivo_nombre1;
                } else {
                    echo "Hubo un error al subir la imagen.";
                }
            }
        } else {
            $alm->link = $_REQUEST['link'];
        }
        if (!empty($_FILES['link2_2']['name'])) {
            $archivo_nombre2 = $_FILES["link2_2"]["name"];
            $archivo_temporal2 = $_FILES["link2_2"]["tmp_name"];
            $archivo_tamano2 = $_FILES["link2_2"]["size"];

            $nombre_base2 = pathinfo($archivo_nombre2, PATHINFO_FILENAME);
            $extension2 = pathinfo($archivo_nombre2, PATHINFO_EXTENSION);
            $i2 = 1;
            while (file_exists($directorio_destino2 . $archivo_nombre2)) {
                $archivo_nombre2 = $nombre_base2 . "($i2)." . $extension2;
                $i2++;
            }
            // Verifica si el archivo es una imagen real
            if (getimagesize($archivo_temporal2) !== false) {
                // Directorio donde se almacenarán las imágenes subidas
                $directorio_destino2 = "assets/img/evidencia_tyt/";
                // Mueve el archivo a la carpeta de destino
                if (move_uploaded_file($archivo_temporal2, $directorio_destino2 . $archivo_nombre2)) {
                    $alm->link2 = $archivo_nombre2;
                } else {
                    echo "Hubo un error al subir la imagen.";
                }
            }
        } else {
            $alm->link2 = $_REQUEST['link2'];
        }

        if (!empty($_FILES['link3_2']['name'])) {
            $archivo_nombre = $_FILES["link3_2"]["name"];
            $archivo_temporal = $_FILES["link3_2"]["tmp_name"];
            $archivo_tamano = $_FILES["link3_2"]["size"];

            $nombre_base = pathinfo($archivo_nombre, PATHINFO_FILENAME);
            $extension = pathinfo($archivo_nombre, PATHINFO_EXTENSION);
            $i = 1;
            while (file_exists($directorio_destino . $archivo_nombre)) {
                $archivo_nombre = $nombre_base . "($i)." . $extension;
                $i++;
            }

            // Verifica si el archivo es una imagen real
            if (getimagesize($archivo_temporal) !== false) {
                // Directorio donde se almacenarán las imágenes subidas
                $directorio_destino = "assets/img/evidencia_tyt/";
                // Mueve el archivo a la carpeta de destino
                if (move_uploaded_file($archivo_temporal, $directorio_destino . $archivo_nombre)) {
                    $alm->link3 = $archivo_nombre;
                } else {
                    echo "Hubo un error al subir la imagen.";
                }
            }
        } else {
            $alm->link3 = $_REQUEST['link3'];
        }
        
        if (isset($_REQUEST['estado3']) && $_REQUEST['estado3'] != "") {
            $alm->estado = $_REQUEST['estado3'];
        } else {
            if (isset($_REQUEST['estado2']) && $_REQUEST['estado2'] != "") {
                $alm->estado = $_REQUEST['estado2'];
            } else {
                $alm->estado = $_REQUEST['estado'];
            }
        }
        if (isset($_REQUEST['franja2']) && $_REQUEST['franja2'] != "") {
            $alm->franja = $_REQUEST['franja2'];
        } else {
            $alm->franja = $_REQUEST['franja'];
        }
        

        if (isset($_REQUEST['detalles2']) && $_REQUEST['detalles2'] != "") {
            $alm->detalles = $_REQUEST['detalles2'];
        } else {
            $alm->detalles = $_REQUEST['detalles'];
        }

        if (isset($_REQUEST['comentario2']) && $_REQUEST['comentario2'] != "") {
            $alm->comentario = $_REQUEST['comentario2'];
        } else {
            $alm->comentario = $_REQUEST['comentario'];
        }
        if (isset($_REQUEST['fecha_entrega2']) && $_REQUEST['fecha_entrega2'] != "") {
            $alm->fecha_entrega = $_REQUEST['fecha_entrega2'];
        } else {
            $alm->fecha_entrega = $_REQUEST['fecha_entrega'];
        }

        if (isset($_REQUEST['reserva2']) && $_REQUEST['reserva2'] != "") {
            $alm->reserva = $_REQUEST['reserva2'];
        } else {
            $alm->reserva = $_REQUEST['reserva'];
        }
        if (isset($_REQUEST['tramitado2']) && $_REQUEST['tramitado2'] != "") {
            $alm->tramitado = $_REQUEST['tramitado2'];
        } else {
            $alm->tramitado = $_REQUEST['tramitado'];
        }
        if (isset($_REQUEST['estados_22']) && $_REQUEST['estados_22'] != "") {
            $alm->estados_2 = $_REQUEST['estados_22'];
        } else {
            $alm->estados_2 = $_REQUEST['estados_2'];
        }
        if (isset($_REQUEST['notus2']) && $_REQUEST['notus2'] != "") {
            $alm->notus = $_REQUEST['notus2'];
        } else {
            $alm->notus = $_REQUEST['notus'];
        }
        if (isset($_REQUEST['cuscode2']) && $_REQUEST['cuscode2'] != "") {
            $alm->cuscode = $_REQUEST['cuscode2'];
        } else {
            $alm->cuscode = $_REQUEST['cuscode'];
        }
        
        $alm->usuario_modificado = $_SESSION['nombres'];

        // var_dump($alm);
        $this->model->save($alm);
    ?>
        <script language='JavaScript'>
            alert("Venta Actualizada Exitosamente");
            location.href = "?p=claro&c=Back_tyt&a=total";
        </script>
<?php
    }
}
