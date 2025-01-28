<?php
require "assets/gestionhumana/dompdf/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

class Certificados_PDF
{
  private $pdo;

  public function __construct()
  {
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

  public function Certificado_laboral()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    }

    $consulta = "SELECT * FROM usuarios WHERE id_usuario = $id";
    $stmt = $this->pdo->prepare($consulta);
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $options = new Options();
    $options->set('defaultFont', 'Courier'); // Fuente predeterminada
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true); // Para cargar imágenes externas

    $imagePath = 'assets/gestionhumana/img/certificado_laboral/encabezado.png';
    $imageData = base64_encode(file_get_contents($imagePath));
    $src = 'data:' . mime_content_type($imagePath) . ';base64,' . $imageData;

    $imagePath2 = 'assets/gestionhumana/img/certificado_laboral/firma.PNG';
    $imageData2 = base64_encode(file_get_contents($imagePath2));
    $src2 = 'data:' . mime_content_type($imagePath2) . ';base64,' . $imageData2;

    $imagePath4 = 'assets/gestionhumana/img/certificado_laboral/pie.PNG';
    $imageData4 = base64_encode(file_get_contents($imagePath4));
    $src4 = 'data:' . mime_content_type($imagePath4) . ';base64,' . $imageData4;

    if (!file_exists($imagePath)) {
      die("Error: No se encontró la imagen en $imagePath");
  }
  if (!file_exists($imagePath2)) {
    die("Error: No se encontró la imagen en $imagePath");
}
if (!file_exists($imagePath4)) {
  die("Error: No se encontró la imagen en $imagePath");
}

    $dompdf = new Dompdf($options);

    // Contenido HTML del PDF
    foreach ($datos as $fila) {
      $nombres = $fila['nombres'];
      $n_documento = $fila['n_documento'];
      $fecha_ingreso = strtotime($fila['fecha_ingreso']);
      $puesto_contratado = $fila['puesto_contratado'];
      $valor_sueldo_letras = $fila['valor_sueldo_letras'];
      $valor_sueldo = $fila['valor_sueldo'];
    }

    $diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $mes = date("m", $fecha_ingreso);
    $dia = date("w", $fecha_ingreso);
    $year = date("Y", $fecha_ingreso);
    $mesmostrar = $meses[date($mes) - 1];
    $diamostrar = $diassemana[date($dia)];

    $html = '
              <html>
              <head>
              <!-- 1 atras 2 delante -->
              <style>
                  .justificado {
                      text-align: justify; z-index:2;
                  }
.header-image {
    position: absolute;
    top: -33; /* Ajusta según sea necesario */
    left: -32; /* Ajusta según sea necesario */
    width: 112%; /* O ajusta según tus necesidades específicas */
    z-index: 1;
}

.bottomcenter {
    position: absolute;
    bottom: -33; /* Ajusta según sea necesario */
    left: -32; /* Ajusta según sea necesario */
    width: 112%; /* O ajusta según tus necesidades específicas */
    z-index: 1;
}
                  .titulo {text-align: center;
                      margin-top: 10px;
                      font-family: Arial; 
                      sans-serif;
                      z-index:2;
                  }
                  .titulo1 {text-align: center;
                      margin-top: 50px;
                      font-family: Arial; 
                      sans-serif;
                      z-index:2;
                  }
                  .titulo2 {text-align: center;
                      margin-top: 25px;
                      font-family: Arial; 
                      sans-serif;
                      z-index:2;
                  }
                  .texto {
                      text-align: justify; 
                      margin-left: 80px; 
                      margin-right: 80px; 
                      line-height: 1.1cm; 
                      font-family: Arial;
                      z-index:2;
                      }
                  .subrayado {
                      text-decoration: underline; 
                      font-size: 15px; 
                      font-family: Arial;
                      z-index:2; 
                  }
                  .final {
                      margin-left: 100px; 
                      font-family: Arial;  
                      z-index:2;
                  }
              
              </style>
              </head>
              <body>
              <img src="' . $src . '"   class="header-image" >
              <br>
              <br>
              <br>
              <br>
              
              <h2 class="titulo1">
                  ARCOS BPO SAS<br>NIT 900.571.923-7
              </h2>
              
              <h3 class="titulo2">
                  CERTIFICA QUE:
              </h3>
  
              <p class="texto justificado">
                  El(la) señor(a),<strong> <span> ' . $nombres . ' </span></strong>identificado(a) con numero de documento de
                  identidad N°.<strong> ' . $n_documento . ' </strong>, mantiene vínculo laboral con la empresa, 
                  desde el <span> ' . $diamostrar . ' ' . date("d", $fecha_ingreso) . ' ' . $mesmostrar . ' del ' . $year . ', </span> ejerciendo el cargo como
                  <strong> ' . $puesto_contratado . '</strong>, devengando un salario de <span>' . $valor_sueldo_letras . ' </span> 
                  pesos $<span>' . $valor_sueldo . '</span> 
                  <br>
                  <br>
                  Para constancia de lo anterior se firma en Bogotá a los <span>' . date("d") . ' días del mes de 
                  <span> ' . $meses[date('n') - 1] . ' </span> de <span>' . date('Y') . '</span>
              </p>
              <br>
              <div class="final">
                      Cordialmente:
                  <br> 
                  <img src = "' . $src2 . '"           >    
                  <br> 
                      Paola Ramirez Medina.
                  <br> 
                      Jefe Administrativa y Financiera
                  <br> 
                  <br>
                  <p style="font-size: 12px;"> 
                      Este certificado ha sido generado de manera electronica
                  </p>
              </div>
              
              <img src="' . $src4 . '" class="bottomcenter"/>
              </body>
              </html>
                          
      ';
    // Cambiar el tamaño de papel a 'letter' (carta) para un formato más pequeño

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    // Guardar o mostrar el PDF
    $dompdf->stream('Certificado Laboral ' . $nombres . '.pdf', array('Attachment' => false));
  }




  public function Certificado_permisos()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    }

    $consulta = "SELECT * FROM solicitudes_permisos_laborales WHERE id_permiso = $id";
    $stmt = $this->pdo->prepare($consulta);

    $consulta2 = "SELECT * FROM usuarios";
    $stmt2 = $this->pdo->prepare($consulta2);

    $consulta3 = "SELECT * FROM solicitudes_tipo";
    $stmt3 = $this->pdo->prepare($consulta3);

    $stmt->execute();
    $stmt2->execute();
    $stmt3->execute();


    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $datos2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $datos3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    $imagePath = 'assets/gestionhumana/img/certificado_permisos/form.PNG';
    $imageData = base64_encode(file_get_contents($imagePath));
    $src = 'data:' . mime_content_type($imagePath) . ';base64,' . $imageData;


    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $dompdf = new Dompdf($options);

    // Contenido HTML del PDF
    foreach ($datos as $fila) {
      $id_usuario = $fila['id_usuario'];
      $id_tipo_permiso = $fila['id_tipo_permiso'];
      $motivo = $fila['motivo'];
      $horario_laboral_entrada = $fila['horario_laboral_entrada'];
      $horario_laboral_salida = $fila['horario_laboral_salida'];
      $horario_permiso_entrada = $fila['horario_permiso_entrada'];
      $horario_permiso_salida = $fila['horario_permiso_salida'];
      $fecha_permiso = $fila['fecha_permiso'];
      $duracion_permiso = $fila['duracion_permiso'];
      $observaciones  = $fila['observaciones'];
      $supervisor = $fila['supervisor'];
      $jefe_area = $fila['jefe_area'];
      $autorizado_sup = $fila['autorizado_sup'];
      $observaciones_supervisor = $fila['observaciones_supervisor'];
      $autorizado_ope = $fila['autorizado_ope'];
      $observaciones_jefe_operaciones  = $fila['observaciones_jefe_operaciones'];
      $autorizado_nomina = $fila['autorizado_nomina'];
      $observaciones_nomina = $fila['observaciones_nomina'];
      $autorizado_rrhh = $fila['autorizado_rrhh'];
      $observaciones_rrhh = $fila['observaciones_rrhh'];
      $date_range = $fila['date_range'];
      $fecha_creado = $fila['fecha_creado'];
    }
    foreach ($datos2 as $fila2) :

      $id_user = $fila2['id_usuario'];

      if ($id_user == $id_usuario) {
        $nombre_user = $fila2['nombres'];
        $n_documento = $fila2['n_documento'];
        $puesto_contratado = $fila2['puesto_contratado'];
      }
      if ($id_user == $autorizado_sup) {
        $nombre_sup = $fila2['nombres'];
      }
      if ($id_user == $autorizado_ope) {
        $nombre_ope = $fila2['nombres'];
      }
      if ($id_user == $autorizado_nomina) {
        $nombre_nom = $fila2['nombres'];
      }
      if ($id_user == $autorizado_rrhh) {
        $nombre_rrhh = $fila2['nombres'];
      }
    endforeach;

    foreach ($datos3 as $fila3) :

      $id_tipo = $fila3['id_tipo'];

      if ($id_tipo == $id_tipo_permiso) {
        $tipo_permiso = $fila3['detalle_tipo'];
      }
    endforeach;



    $html = '
        <html>
        <head>
        
        <style>
        img {
          z-index: 1;
          position: absolute;
          width: 112.5%;
          top: -25px;
          margin-left: -45px;
          height: 100%
        }
        
        .contenedor {
          /* display: flex; */
          /* justify-content: center; */
          /* align-items: center; */
          /* border: dotted; */
          height: 20px;
          width: 80%;
          z-index: 2;
          margin-left:150px;
          position: absolute;
        }
        .contenedor2 { 
          /* border: dotted; */
          z-index: 2;
          position: absolute;
        }
        p{
          margin-top:0px;
          font-size: 18px;
          color: black;
        }
        </style>
        </head>
        <body>
            <img src="' . $src . '" class="center"></img>
        
            <!-- Nombres y Apellidos-->  
        <div class="contenedor" style="
          margin-top:83px;
        ">
        <p style="
        margin-top:4px;
        ">' . $nombre_user . '</p>
        </div>
        
            <!-- N° de Documento-->  
        <div class="contenedor" style="
          margin-top:106px;
        ">
        <p style="
        margin-top:4px;
        ">' . $n_documento . '</p>
        </div>
        
            <!-- Cargo-->  
        <div class="contenedor" style="
          margin-top:127px;
        ">
        <p style="
        margin-top:4px;
        ">' . $puesto_contratado . '</p>
        </div>
        
            <!-- Fecha Elaborado-->  
        <div class="contenedor" style="
          margin-top:156px;
        ">
        <p style="
        margin-top:4px;
        ">' . $fecha_creado . '</p>
        </div>
        
            <!-- Tipo de Permiso-->  
        <div class="contenedor2" style="
          margin-top:250px;
          margin-left:-40px;
          width: 24%;
          height: 60px;
        ">
            <p style="
            text-align:center;
            margin-top: 10px
            ">' . $tipo_permiso . '</p>
        </div>
        
            <!-- Hora Entrada-->  
        <div class="contenedor2" style="
          margin-top:285px;
          margin-left:145px;
          width: 11%;
          height: 30px;
        ">
            <p style="
            text-align:center;
            font-size:15px;
            margin-top: 8px;
            ">' . $horario_laboral_entrada . '</p>
        </div>
        
            <!-- Hora Salida-->  
        <div class="contenedor2" style="
          margin-top:285px;
          margin-left:232px;
          width: 11%;
          height: 30px;
        ">
            <p style="
            text-align:center;
            font-size:15px;
            margin-top: 8px;
            ">' . $horario_laboral_salida . '</p>
        </div>
        
        
        
            <!-- Dia-->  
        <div class="contenedor2" style="
        margin-top:250px;
        margin-left:319px;
          width: 25%;
          height: 60px;
        ">
            <p style="
            text-align:center;
            font-size:20px;
            margin-top:5px;
            ">' . $date_range . '</p>
        </div>
        
            <!-- Duracion del Permiso-->  
        <div class="contenedor2" style="
        margin-top:250px;
        margin-left:510px;
          width: 10%;
          height: 60px;
        ">
            <p style="
            text-align:center;
            font-size:15px;
            ">' . $duracion_permiso . '</p>
        </div>
        
            <!-- Hora Salida-->  
        <div class="contenedor2" style="
          margin-top:285px;
          margin-left:595px;
          width: 11%;
          height: 30px;
        ">
            <p style="
            text-align:center;
            font-size:15px;
            margin-top: 8px;
            ">' . $horario_permiso_salida . '</p>
        </div>
        
            <!-- Hora Regreso-->  
        <div class="contenedor2" style="
          margin-top:285px;
          margin-left:683px;
          width: 11%;
          height: 30px;
        ">
            <p style="
            text-align:center;
            font-size:15px;
            margin-top:8px;
            ">' . $horario_permiso_entrada . '</p>
        </div>
        
            <!-- Motivo-->  
        <div class="contenedor" style="
          margin-top:381px;
          margin-left:-40px;
          width: 110%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:15px;
          margin-top:10px;
          ">' . $motivo . '</p>
        </div>
        
            <!-- Observaciones-->  
        <div class="contenedor" style="
          margin-top:446px;
          margin-left:-40px;
          width: 110%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:15px;
          margin-top:10px;
          ">aaaaaaaaaaaa' . $observaciones . '</p>
        </div>
        
            <!-- Firma empleado-->  
        <div class="contenedor" style="
          margin-top:496px;
          margin-left:-40px;
          width: 110%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:25px;
          margin-top:9px;
          ">' . $nombre_user . '</p>
        
        </div>
        
            <!-- Firma Supervisor-->  
        <div class="contenedor" style="
          margin-top:580px;
          margin-left:-25px;
          width: 50%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:25px;
          margin-top:9px;
          ">' . $nombre_sup . '</p>
        </div>
        
            <!-- Firma Jefe Inmediato-->  
        <div class="contenedor" style="
          margin-top:580px;
          margin-left:385px;
          width: 50%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:25px;
          margin-top:9px;
          ">' . $nombre_ope . '</p>
        </div>
        
        
            <!-- Firma Nomina-->  
        <div class="contenedor" style="
          margin-top:730px;
          margin-left:-25px;
          width: 50%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:25px;
          margin-top:9px;
          ">' . $nombre_nom . '</p>
        </div>
        
            <!-- Firma Recursos Humanos-->  
        <div class="contenedor" style="
          margin-top:730px;
          margin-left:385px;
          width: 50%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:25px;
          margin-top:9px;
          ">' . $nombre_rrhh . '</p>
        </div>
        
            <!-- Observaciones Supervisor-->  
        <div class="contenedor" style="
          margin-top:658.5px;
          margin-left:-40px;
          width: 57%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:13px;
          margin-top:2px;
          ">' . $observaciones_supervisor . '</p>
        </div>
        
            <!-- Observaciones Jefe Inmediato-->  
        <div class="contenedor" style="
          margin-top:658.5px;
          margin-left:380px;
          width: 53%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:13px;
          margin-top:2px;
          ">' . $observaciones_jefe_operaciones . '</p>
        </div>
        
            <!-- Observaciones Nomina-->  
        <div class="contenedor" style="
          margin-top:807px;
          margin-left:-40px;
          width: 57%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:13px;
          margin-top:2px;
          ">' . $observaciones_nomina . '</p>
        </div>
        
            <!-- Observaciones Recursos Humanos-->  
        <div class="contenedor" style="
          margin-top:807px;
          margin-left:380px;
          width: 53%;
          height: 38px;
        ">
          <p style="
          text-align:center;
          font-size:13px;
          margin-top:2px;
          ">' . $observaciones_rrhh . '</p>
        </div>
        
        </body>
        </html>
                    
';

    $dompdf->loadHtml($html);
    $dompdf->render();

    // Guardar o mostrar el PDF
    $dompdf->stream('Solicitud de permiso.pdf', array('Attachment' => 0));

    // Manejar el error, por ejemplo, redirigiendo a una página de error
  }
}
