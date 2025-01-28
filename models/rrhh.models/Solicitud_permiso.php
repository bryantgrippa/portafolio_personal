<?php

require_once 'assets/gestionhumana/mail/phpmailer/Exception.php';
require_once 'assets/gestionhumana/mail/phpmailer/PHPMailer.php';
require_once 'assets/gestionhumana/mail/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Solicitud_permiso
{

    private $pdo;
    public $id_permiso;
    public $date_range;
    public $id_usuario;
    public $id_tipo_permiso;
    public $motivo;
    public $horario_laboral_entrada;
    public $horario_laboral_salida;
    public $horario_permiso_salida;
    public $horario_permiso_entrada;
    public $correo;
    public $fecha_permiso;
    public $duracion_permiso;
    public $observaciones;
    public $archivo;
    public $supervisor;
    public $jefe_area;
    public $permiso_supervisor;
    public $permiso_jefeope;
    public $permiso_rrhh;
    public $observaciones_supervisor;
    public $observaciones_jefeope;
    public $observaciones_rrhh;
    public $correo_sup;
    public $correo_jefe_area;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();
            $registro_por_pagina = 10;
            $pagina = '';
            $usuario = $_SESSION['id_usuario'];
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }
            $start_from = ($pagina - 1) * $registro_por_pagina;
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE fecha_creado LIKE '%" . $_GET['busqueda'] . "%' AND id_usuario=$usuario ORDER BY id_permiso DESC LIMIT $start_from, $registro_por_pagina;";
            } else {
                $resto = " WHERE id_usuario=$usuario ORDER BY id_permiso DESC  LIMIT $start_from, $registro_por_pagina";
            }


            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales as spl INNER JOIN  solicitudes_tipo as st ON st.id_tipo=spl.id_tipo_permiso " . $resto . " ;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar2()
    {
        try {
            $usuario = $_SESSION['id_usuario'];
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE fecha_creado LIKE '%" . $_GET['busqueda'] . "%' AND id_usuario=$usuario  ORDER BY id_permiso DESC;";
            } else {
                $resto = " WHERE id_usuario=$usuario ORDER BY id_permiso DESC";
            }
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales " . $resto . ";");
            $stm->execute();
            return $stm->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TipoPermiso()
    {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_tipo WHERE activo=1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function FirmaSupervisor($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
            $stm->execute(array($id_usuario));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function FirmaJefeOperaciones($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
            $stm->execute(array($id_usuario));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function FirmaRRHH($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
            $stm->execute(array($id_usuario));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function FirmaNomina($id_usuario)
    {
        try {
            $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
            $stm->execute(array($id_usuario));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Supervisor($id_usuario)
    {
        try {
            // $stm1 = $this->pdo->prepare("SELECT supervisor FROM usuarios WHERE id_usuario=?;");
            $stm1 = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario=?;");
            $stm1->execute(array($id_usuario));
            foreach ($stm1->fetchAll(PDO::FETCH_OBJ) as $sup) :
                $id_sup = $sup->supervisor;
            endforeach;

            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario=? AND activo=1;");

            $stm->execute(array($id_sup));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function JefeOperciones()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (10) AND activo=1 ORDER BY id_usuario DESC;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Nomina()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (8,9,11) AND activo=1 ORDER BY id_usuario DESC;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TalentoH()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (8,9,11,7) AND activo=1 ORDER BY id_usuario DESC;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function IntervaloHora($hora_inicio, $hora_fin, $intervalo = 30)
    {
        try {

            $hora_inicio = new DateTime($hora_inicio);
            $hora_fin = new DateTime($hora_fin);
            $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que muestre $hora_fin
            // Si la hora de inicio es superior a la hora fin
            // añadimos un día más a la hora fin
            if ($hora_inicio > $hora_fin) {

                $hora_fin->modify('+1 day');
            }

            // Establecemos el intervalo en minutos

            $intervalo = new DateInterval('PT' . $intervalo . 'M');

            // Sacamos los periodos entre las horas
            $periodo = new DatePeriod($hora_inicio, $intervalo, $hora_fin);

            foreach ($periodo as $hora) {

                // Guardamos las horas intervalos 
                $horas[] = $hora->format('H:i:s');
            }

            return $horas;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales p RIGHT JOIN usuarios u ON p.id_usuario=u.id_usuario WHERE p.id_permiso=? AND p.id_usuario=?");
            $stm->execute(array($id, $_SESSION["id_usuario"]));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM solicitudes_permisos_laborales WHERE id_permiso = ? AND id_usuario = ?;");
            $stm->execute(array($id, $_SESSION["id_usuario"]));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Solicitud_permiso $data)
    {
        try {
            $sql = "INSERT INTO solicitudes_permisos_laborales (
                id_usuario,
                id_tipo_permiso,
                motivo,
                supervisor,
                jefe_area,
                horario_laboral_entrada,
                horario_laboral_salida,
                horario_permiso_salida,
                horario_permiso_entrada,
                fecha_permiso,
                duracion_permiso,
                observaciones,
                date_range,
                autorizado_sup, 
                autorizado_ope,
                autorizado_rrhh,
                observaciones_supervisor,
                observaciones_jefe_operaciones,
                observaciones_rrhh,
                archivo,
                correo_sup,
                correo_jefe_area
                ) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $_SESSION['id_usuario'],
                        $data->id_tipo_permiso,
                        $data->motivo,
                        $data->supervisor,
                        $data->jefe_area,
                        $data->horario_laboral_entrada,
                        $data->horario_laboral_salida,
                        $data->horario_permiso_salida,
                        $data->horario_permiso_entrada,
                        $data->fecha_permiso,
                        $data->duracion_permiso,
                        $data->observaciones,
                        $data->date_range,
                        $data->permiso_supervisor,
                        $data->permiso_jefeope,
                        $data->permiso_rrhh,
                        $data->observaciones_supervisor,
                        $data->observaciones_jefeope,
                        $data->observaciones_rrhh,
                        $data->archivo,
                        $data->correo_sup,
                        $data->correo_jefe_area
                    )
                );
            $mail = new PHPMailer(true);

            $supervisores = $this->Super();
            foreach ($supervisores as $s){
                if ($data->supervisor == $s->id_usuario) {
                    $nombre_s = $s->nombres;
                }
            }
            foreach ($supervisores as $supervisor) {
                if ($_SESSION['id_usuario'] == $supervisor->id_usuario) {
                    $nombre_u = $supervisor->nombres;
                }
            }
            $email = $data->correo_sup;

            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'gestionhumana.arcoscloud.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'arcosbpo@gestionhumana.arcoscloud.com';
            $mail->Password   = 'Arcos2021';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('arcosbpo@gestionhumana.arcoscloud.com', 'GESTION HUMANA ARCOS'); //quien manda el mensaje
            $mail->addAddress($email, 'Supervisor');

            //Attachments
            // $mail->addAttachment('');         //Add attachments

            $mail->isHTML(true);
            $mail->Subject = 'Solicitud de Permisos';



            // Creación de la vista HTML directamente en el mismo archivo PHP
            $html_content = '
        <body>        
            <p>
                Estimado/a ' . $nombre_s . '
            </p>
            <br>
            <p>        
                Se le informa desde el aplicativo GESTIONHUMANA ARCOS que el usuario ' . $nombre_u . '
                ha creado un permiso el cual debe ser revisado y manipulado por su persona siguiendo el siguiente link: 
            </p>
            <br>  
            <p>  
                https://gestionhumana.arcoscloud.com/
            </p>
            <br>
            <p>
                Cordialmente, Area de Tecnologia de Arcos
            </p>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                crossorigin="anonymous"></script>
        </body>
            ';

            $mail->Body = $html_content;

            $mail->send();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Super()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Jefeope()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function User()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
