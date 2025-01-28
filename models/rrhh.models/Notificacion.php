<?php

require_once 'assets/gestionhumana/mail/phpmailer/Exception.php';
require_once 'assets/gestionhumana/mail/phpmailer/PHPMailer.php';
require_once 'assets/gestionhumana/mail/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Notificacion
{

    private $pdo;
    public $id_permiso;
    public $id_usuario;
    public $area;
    public $permiso;
    public $supervisor;
    public $jefe_area;
    public $id_tipo_permiso;
    public $id_tipo_lisencia;
    public $motivo;
    public $horario_laboral_entrada;
    public $horario_laboral_salida;
    public $fecha_permiso;
    public $duracion_permiso;
    public $observaciones;
    public $autorizado_sup;
    public $autorizado_ope;
    public $autorizado_nomina;
    public $autorizado_rrhh;
    public $observaciones_supervisor;
    public $observaciones_jefe_operaciones;
    public $observaciones_nomina;
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
                $resto = " WHERE fecha_creado LIKE '%" . $_GET['busqueda'] . "%' ORDER BY id_permiso DESC LIMIT $start_from, $registro_por_pagina;";
            } else {
                $resto = " ORDER BY id_permiso DESC  LIMIT $start_from, $registro_por_pagina";
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
                $resto = " WHERE fecha_creado LIKE '%" . $_GET['busqueda'] . "%' ORDER BY id_permiso DESC;";
            } else {
                $resto = " ORDER BY id_permiso DESC";
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
            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_tipo st WHERE activo=1");
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

    public function Supervisor()
    {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE permiso IN (1,4) AND activo=1;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function JefeOperciones()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (2,3,4,5,6) AND activo=1;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Nomina()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (3) AND activo=1;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function TalentoH()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (4) AND activo=1;");
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
            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales p RIGHT JOIN usuarios u ON p.id_usuario=u.id_usuario WHERE p.id_permiso=?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function DatosEm($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios u WHERE u.id_usuario=?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM solicitudes_permiso_laborales WHERE id_permiso = ?;");

            $stm->execute(array($id));
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
    public function Actualizarsuper1($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            autorizado_sup = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->autorizado_sup,
                    $data->id_permiso
                )
            );

            if ($data->autorizado_sup > 0) {
                $mail = new PHPMailer(true);

                $supervisores = $this->Super();
                foreach ($supervisores as $s){
                    if ($data->autorizado_sup == $s->id_usuario) {
                        $nombre_s = $s->nombres;
                    }
                }
                foreach ($supervisores as $a){
                    if ($data->jefe_area == $a->id_usuario) {
                        $nombre_j = $a->nombres;
                    }
                }
                foreach ($supervisores as $d) {
                    if ($data->id_usuario == $d->id_usuario) {
                        $nombre_u = $d->nombres;
                    }
                }
                $email = $data->correo_jefe_area;
    
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host       = 'gestionhumana.arcoscloud.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'arcosbpo@gestionhumana.arcoscloud.com';
                $mail->Password   = 'Arcos2021';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
    
                $mail->setFrom('arcosbpo@gestionhumana.arcoscloud.com', 'ARCOS TECNOLOGIA'); //quien manda el mensaje
                $mail->addAddress($email, 'Jefe de Area');
    
                //Attachments
                // $mail->addAttachment('');         //Add attachments
    
                $mail->isHTML(true);
                $mail->Subject = 'Solicitud de Permisos';
    
    
    
                // Creación de la vista HTML directamente en el mismo archivo PHP
                $html_content = '
            <body>        
                <p>
                    Estimado/a ' . $nombre_j . '
                </p>
                <br>
                <p>        
                    Se le informa desde el aplicativo GESTIONHUMANA ARCOS que el usuario ' . $nombre_u . '
                    ha creado un permiso el cual ya ha sido autorizado por '. $nombre_s .' y debe ser revisado y manipulado por su persona siguiendo el siguiente link: 
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
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarsuper2($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            observaciones_supervisor = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->observaciones_supervisor,
                    $data->id_permiso
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarjefeope1($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            autorizado_ope = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->autorizado_ope,
                    $data->id_permiso
                )
            );
            if ($data->autorizado_ope > 0) {
                $mail = new PHPMailer(true);

                $supervisores = $this->Super();
                foreach ($supervisores as $s){
                foreach ($supervisores as $a){
                    if ($a->cargo == 4 && $a->id_usuario == 72) {
                        $nombre_j = $a->nombres;
                    }
                }
                foreach ($supervisores as $d) {
                    if ($data->id_usuario == $d->id_usuario) {
                        $nombre_u = $d->nombres;
                    }
                }
            }
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host       = 'gestionhumana.arcoscloud.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'arcosbpo@gestionhumana.arcoscloud.com';
                $mail->Password   = 'Arcos2021';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('arcosbpo@gestionhumana.arcoscloud.com', 'GESTION HUMANA ARCOS'); //quien manda el mensaje
                $mail->addAddress('lfjarava@arcosbpo.com.co', 'Recursos Humanos');

                $mail->isHTML(true);
                $mail->Subject = 'Solicitud de Permisos';
    
    
    
                // Creación de la vista HTML directamente en el mismo archivo PHP
                $html_content = '
            <body>        
                <p>
                    Estimado/a ' . $nombre_j . '
                </p>
                <br>
                <p>        
                    Se le informa desde el aplicativo GESTIONHUMANA ARCOS que el usuario ' . $nombre_u . '
                    ha creado un permiso el cual ya ha sido autorizado por el supervisor encargado y el jefe de area y ahora debe 
                    ser revisado y manipulado por su persona siguiendo el siguiente link: 
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
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarjefeope2($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            observaciones_jefe_operaciones = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->observaciones_jefe_operaciones,
                    $data->id_permiso
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarrrhh1($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            autorizado_rrhh = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->autorizado_rrhh,
                    $data->id_permiso
                )
            );
            if ($data->autorizado_rrhh > 0) {
                $mail = new PHPMailer(true);

                $supervisores = $this->Super();
                foreach ($supervisores as $a){
                    if ($a->id_usuario == 3 && $a->cargo == 3) {
                        $nombre_j = $a->nombres;
                    }
                }
                foreach ($supervisores as $d) {
                    if ($data->id_usuario == $d->id_usuario) {
                        $nombre_u = $d->nombres;
                    }
                }

                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host       = 'gestionhumana.arcoscloud.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'arcosbpo@gestionhumana.arcoscloud.com';
                $mail->Password   = 'Arcos2021';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('arcosbpo@gestionhumana.arcoscloud.com', 'GESTION HUMANA ARCOS'); //quien manda el mensaje

                $mail->addAddress('pramirez@arcos.com.co', 'Nomina');

                $html_content = '
            <body>        
                <p>
                    Estimado/a ' . $nombre_j . '
                </p>
                <br>
                <p>        
                    Se le informa desde el aplicativo GESTIONHUMANA ARCOS que el usuario ' . $nombre_u . '
                    ha creado un permiso el cual ya ha sido autorizado por el area de recursos humanos y ahora debe 
                    ser revisado y manipulado por su persona siguiendo el siguiente link: 
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
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarrrhh2($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            observaciones_rrhh = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->observaciones_rrhh,
                    $data->id_permiso
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarnomina1($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            autorizado_nomina = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->autorizado_nomina,
                    $data->id_permiso
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizarnomina2($data)
    {
        try {
            $sql = "UPDATE solicitudes_permisos_laborales SET
            observaciones_nomina = ?
            WHERE id_permiso=?;";

            $this->pdo->prepare($sql)->execute(
                array(
                    $data->observaciones_nomina,
                    $data->id_permiso
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function SupervisorView()
    {
        try {
            $supervisor = $_SESSION['id_usuario'];

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales as spl INNER JOIN  solicitudes_tipo as st ON st.id_tipo=spl.id_tipo_permiso WHERE supervisor = " . $supervisor . " AND autorizado_sup = 0;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function JefeAreaView()
    {
        try {
            $supervisor = $_SESSION['id_usuario'];

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales as spl INNER JOIN  solicitudes_tipo as st ON st.id_tipo=spl.id_tipo_permiso WHERE (jefe_area = " . $supervisor . " AND autorizado_sup > 0 AND autorizado_ope = 0) OR (supervisor = " . $supervisor . " AND autorizado_sup = 0);");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function RRHHView()
    {
        try {
            $supervisor = $_SESSION['id_usuario'];

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales as spl INNER JOIN  solicitudes_tipo as st ON st.id_tipo=spl.id_tipo_permiso WHERE (autorizado_ope > 0 AND autorizado_rrhh = 0) OR (supervisor = " . $supervisor . " AND autorizado_sup = 0) OR (jefe_area = " . $supervisor . " AND autorizado_sup > 0 AND autorizado_ope = 0);");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function NominaView()
    {
        try {
            $supervisor = $_SESSION['id_usuario'];

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales as spl INNER JOIN  solicitudes_tipo as st ON st.id_tipo=spl.id_tipo_permiso WHERE (autorizado_rrhh > 0 AND autorizado_nomina = 0) OR (supervisor = " . $supervisor . " AND autorizado_sup = 0) OR (jefe_area = " . $supervisor . " AND autorizado_sup > 0 AND autorizado_ope = 0);");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function General()
    {
        try {

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales as spl INNER JOIN  solicitudes_tipo as st ON st.id_tipo=spl.id_tipo_permiso  ORDER BY `id_permiso` DESC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Bell()
    {
        try {
            // $supervisor = $_SESSION['id_usuario'];

            $stm = $this->pdo->prepare("SELECT * FROM solicitudes_permisos_laborales");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
