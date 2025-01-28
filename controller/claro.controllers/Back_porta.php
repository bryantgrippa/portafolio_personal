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
require_once "models/claro.models/Backs_porta.php";
class Back_porta
{
    private $model;
    private $conn;

    public function __construct()
    {
        $this->model = new Backs_porta();

        $dbController = new DBController();
        $this->conn = $dbController->connectDB();
    }
    public function today()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/administrativo/today.php";
        require_once "views/claro.views/footer.php";
    }
    public function asesores()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/administrativo/asesor.php";
        require_once "views/claro.views/footer.php";
    }
    public function total()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/administrativo/total.php";
        require_once "views/claro.views/footer.php";
    }
    public function asesor()
    {
        $alm = $this->model->ase($_REQUEST['cedula']);
        $user = $this->model->user($_REQUEST['cedula']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/administrativo/venta/asesor.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function fecha()
    {
        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/administrativo/fechas.php";
        require_once "views/claro.views/footer.php";
    }

    public function venta()
    {
        $alm = $this->model->asesor($_REQUEST['id_venta']);

        require_once "views/claro.views/header.php";
        require_once "views/claro.views/portabilidad/administrativo/venta/ventas.view.php";
        require_once "views/claro.views/footer.php";
    }
    public function save_porta()
    {
        $alm = new Backs_porta();

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

        if ($_REQUEST['fecha_nacimiento2'] != "") {
            $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento2'];
        } else {
            $alm->fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        }

        if ($_REQUEST['fecha_expedicion2'] != "") {
            $alm->fecha_expedicion = $_REQUEST['fecha_expedicion2'];
        } else {
            $alm->fecha_expedicion = $_REQUEST['fecha_expedicion'];
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

        if ($_REQUEST['operador2'] != "") {
            $alm->operador = $_REQUEST['operador2'];
        } else {
            $alm->operador = $_REQUEST['operador'];
        }

        if ($_REQUEST['dias2'] != "") {
            $alm->dias = $_REQUEST['dias2'];
        } else {
            $alm->dias = $_REQUEST['dias'];
        }

        if ($_REQUEST['ventana_cambio2'] != "") {
            $alm->ventana_cambio = $_REQUEST['ventana_cambio2'];
        } else {
            $alm->ventana_cambio = $_REQUEST['ventana_cambio'];
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

        $alm->fecha_grabacion_contrato = $_REQUEST['fecha_grabacion_contrato'];

        if ($_REQUEST['tipo_contrato2'] != "") {
            $alm->tipo_contrato = $_REQUEST['tipo_contrato2'];
        } else {
            $alm->tipo_contrato = $_REQUEST['tipo_contrato'];
        }

        if ($_REQUEST['referido2'] != "") {
            $alm->referido = $_REQUEST['referido2'];
        } else {
            $alm->referido = $_REQUEST['referido'];
        }

        if ($_REQUEST['nip2'] != "") {
            $alm->nip = $_REQUEST['nip2'];
        } else {
            $alm->nip = $_REQUEST['nip'];
        }

        if ($_REQUEST['tipo_solicitud2'] != "") {
            $alm->tipo_solicitud = $_REQUEST['tipo_solicitud2'];
        } else {
            $alm->tipo_solicitud = $_REQUEST['tipo_solicitud'];
        }

        if ($_REQUEST['operador_donante2'] != "") {
            $alm->operador_donante = $_REQUEST['operador_donante2'];
        } else {
            $alm->operador_donante = $_REQUEST['operador_donante'];
        }

        if ($_REQUEST['estado_actual_operador_donante2'] != "") {
            $alm->estado_actual_operador_donante = $_REQUEST['estado_actual_operador_donante2'];
        } else {
            $alm->estado_actual_operador_donante = $_REQUEST['estado_actual_operador_donante'];
        }

        if ($_REQUEST['codigo_plan2'] != "") {
            $alm->codigo_plan = $_REQUEST['codigo_plan2'];
        } else {
            $alm->codigo_plan = $_REQUEST['codigo_plan'];
        }

        if ($_REQUEST['detalles_plan2'] != "") {
            $alm->detalles_plan = $_REQUEST['detalles_plan2'];
        } else {
            $alm->detalles_plan = $_REQUEST['detalles_plan'];
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

        if ($_REQUEST['tipo_solicitud2'] != "") {
            $alm->tipo_solicitud = $_REQUEST['tipo_solicitud2'];
        } else {
            $alm->tipo_solicitud = $_REQUEST['tipo_solicitud'];
        }

        if ($_REQUEST['tipo_validacion2'] != "") {
            $alm->tipo_validacion = $_REQUEST['tipo_validacion2'];
        } else {
            $alm->tipo_validacion = $_REQUEST['tipo_validacion'];
        }

        if ($_REQUEST['sim2'] != "") {
            $alm->sim = $_REQUEST['sim2'];
        } else {
            $alm->sim = $_REQUEST['sim'];
        }
        if ($_REQUEST['numero_sim2'] != "") {
            $alm->numero_sim = $_REQUEST['numero_sim2'];
        } else {
            $alm->numero_sim = $_REQUEST['numero_sim'];
        }

        if ($_REQUEST['venta_tp2'] != "") {
            $alm->venta_tp = $_REQUEST['venta_tp2'];
        } else {
            $alm->venta_tp = $_REQUEST['venta_tp'];
        }

        if ($_REQUEST['min2'] != "") {
            $alm->min = $_REQUEST['min2'];
        } else {
            $alm->min = $_REQUEST['min'];
        }

        if ($_REQUEST['numero_min_sim2'] != "") {
            $alm->numero_min_sim = $_REQUEST['numero_min_sim2'];
        } else {
            $alm->numero_min_sim = $_REQUEST['numero_min_sim'];
        }

        if ($_REQUEST['descuento2'] != "") {
            $alm->descuento = $_REQUEST['descuento2'];
        } else {
            $alm->descuento = $_REQUEST['descuento'];
        }

        $alm->observaciones = $_REQUEST['observaciones'];


        if (!empty($_FILES['link_2']['name'])) {
            $archivo_nombre = $_FILES["link_2"]["name"];
            $archivo_temporal = $_FILES["link_2"]["tmp_name"];
            $archivo_tamano = $_FILES["link_2"]["size"];

            // Verifica si el archivo es una imagen real
            if (getimagesize($archivo_temporal) !== false) {
                // Directorio donde se almacenarán las imágenes subidas
                $directorio_destino = "assets/img/evidencia_portabilidad/";
                // Mueve el archivo a la carpeta de destino
                if (move_uploaded_file($archivo_temporal, $directorio_destino . $archivo_nombre)) {
                    $alm->link = $archivo_nombre;
                } else {
                    echo "Hubo un error al subir la imagen.";
                }
            }
        } else {
            $alm->link = $_REQUEST['link'];
        }

        if (!empty($_FILES['link2_2']['name'])) {
            $archivo_nombre = $_FILES["link2_2"]["name"];
            $archivo_temporal = $_FILES["link2_2"]["tmp_name"];
            $archivo_tamano = $_FILES["link2_2"]["size"];

            // Verifica si el archivo es una imagen real
            if (getimagesize($archivo_temporal) !== false) {
                // Directorio donde se almacenarán las imágenes subidas
                $directorio_destino = "assets/img/evidencia_portabilidad/";
                // Mueve el archivo a la carpeta de destino
                if (move_uploaded_file($archivo_temporal, $directorio_destino . $archivo_nombre)) {
                    $alm->link2 = $archivo_nombre;
                } else {
                    echo "Hubo un error al subir la imagen.";
                }
            }
        } else {
            $alm->link2 = $_REQUEST['link2'];
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

        $alm->usuario_modificado = $_SESSION['nombres'];

        $this->model->save($alm);
    ?>
        <script language='JavaScript'>
            alert("Venta Actualizada Exitosamente");
            location.href = "?p=claro&c=Back_porta&a=total";
        </script>
<?php
    }
}
