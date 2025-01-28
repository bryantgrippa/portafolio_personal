<?php
session_start();

    require "assets/gestionhumana/excel/vendor/autoload.php";
    // require "models/Producto.php";
    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    use PhpOffice\PhpSpreadsheet\CELL\Coordinate;

class Excel{
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function usuarios(){

        $sql = "SELECT * FROM usuarios";
        $resultado = $this->pdo->query($sql);
        
        $excel = new Spreadsheet();
        $hojaactiva = $excel->getActiveSheet();
        $hojaactiva->setTitle("usuarios");
        
        $hojaactiva->getColumnDimension('A')->setWidth(10);
        $hojaactiva->setCellValue("A1",'id_usuario');
        
        $hojaactiva->getColumnDimension('B')->setWidth(35);
        $hojaactiva->setCellValue("B1",'nombres');
        
        $hojaactiva->getColumnDimension('C')->setWidth(20);
        $hojaactiva->setCellValue("C1",'usuario');
        
        $hojaactiva->getColumnDimension('D')->setWidth(15);
        $hojaactiva->setCellValue("D1",'n_documento');
        
        $hojaactiva->getColumnDimension('E')->setWidth(16.6);
        $hojaactiva->setCellValue("E1",'fecha_nacimiento');
        
        $hojaactiva->getColumnDimension('F')->setWidth(14);
        $hojaactiva->setCellValue("F1",'fecha_ingreso');
        
        $hojaactiva->getColumnDimension('G')->setWidth(20);
        $hojaactiva->setCellValue("G1",'cargo');
        
        $hojaactiva->getColumnDimension('H')->setWidth(20);
        $hojaactiva->setCellValue("H1",'puesto_contratado');
        
        $hojaactiva->getColumnDimension('I')->setWidth(26);
        $hojaactiva->setCellValue("I1",'valor_sueldo_letras');
        
        $hojaactiva->getColumnDimension('J')->setWidth(17);
        $hojaactiva->setCellValue("J1",'valor_sueldo');
        
        $hojaactiva->getColumnDimension('K')->setWidth(14);
        $hojaactiva->setCellValue("K1",'permiso');
        
        $hojaactiva->getColumnDimension('L')->setWidth(7);
        $hojaactiva->setCellValue("L1",'genero');

        
        $fila = 2;
        while($rows = $resultado->fetch(PDO::FETCH_ASSOC)){
            $hojaactiva->setCellValue("A".$fila,$rows['id_usuario']);
            $hojaactiva->setCellValue("B".$fila,$rows['nombres']);
            $hojaactiva->setCellValue("C".$fila,$rows['usuario']);
            $hojaactiva->setCellValue("D".$fila,$rows['n_documento']);
            $hojaactiva->setCellValue("E".$fila,$rows['fecha_nacimiento']);
            $hojaactiva->setCellValue("F".$fila,$rows['fecha_ingreso']);
            $hojaactiva->setCellValue("G".$fila,$rows['cargo']);
            $hojaactiva->setCellValue("H".$fila,$rows['puesto_contratado']);
            $hojaactiva->setCellValue("I".$fila,$rows['valor_sueldo_letras']);
            $hojaactiva->setCellValue("J".$fila,$rows['valor_sueldo']);
            $hojaactiva->setCellValue("K".$fila,$rows['permiso']);
            $hojaactiva->setCellValue("L".$fila,$rows['genero']);
            $fila++;
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Usuarios.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
        exit;
        }
        
        public function Guardar() {
            try {
                if (isset($_FILES['excel']['tmp_name']) && !empty($_FILES['excel']['tmp_name'])) {
                    $archivo = $_FILES['excel']['tmp_name'];
                    $documento = IOFactory::load($archivo);
                    $hojaActual = $documento->getSheet(0);
                    $numeroFilas = $hojaActual->getHighestDataRow();
    
                    for ($indiceFila = 2; $indiceFila < $numeroFilas; $indiceFila++) {
                        $nombres = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                        $usuario = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                        $password = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                        $n_documento = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                        $fecha_nacimiento = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                        $fecha_ingreso = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
                        $cargo = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
                        $puesto_contratado = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
                        $valor_sueldo_letras = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
                        $valor_sueldo = $hojaActual->getCellByColumnAndRow(10, $indiceFila);
                        $area = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
                        $permiso = $hojaActual->getCellByColumnAndRow(12, $indiceFila);
                        $genero = $hojaActual->getCellByColumnAndRow(13, $indiceFila);

                        if ($n_documento != "") {
                            $sql = "INSERT INTO usuarios (nombres, usuario, password, n_documento, fecha_nacimiento, fecha_ingreso, cargo,
                                puesto_contratado, valor_sueldo_letras, valor_sueldo, area, permiso, genero)
                                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
                            $stmt = $this->pdo->prepare($sql);
                            $stmt->execute([$nombres, $usuario, $password, $n_documento, $fecha_nacimiento, $fecha_ingreso, $cargo,
                                $puesto_contratado, $valor_sueldo_letras, $valor_sueldo, $area, $permiso, $genero]);
                        }
                    }
                    ?>
                    <script language='JavaScript'>
                        alert("Registros completados correctamente.");
                        location.href = "?p=rrhh&c=Usuarios&a=main";
                    </script>
                    <?php      
                } else {                    
                    ?>
                    <script language='JavaScript'>
                        alert("No se proporcionó un archivo Excel.");
                        location.href = "?p=rrhh&c=Usuarios&a=Carga";
                    </script>
                    <?php     
                }
            } catch (Exception $e) {
                ?>
                <script language='JavaScript'>
                    alert("Hubo un error al insertar datos. por favor verifique nuevamente");
                    location.href = "?p=rrhh&c=Usuarios&a=Carga";
                </script>
                <?php     
                // echo "Error: " . $e->getMessage();
            }
        }
        public function Generar(){

            $nombreArchivo = 'assets/gestionhumana/excel/Formulario.xlsx';

            // Cargar el archivo de Excel
            $spreadsheet = IOFactory::load($nombreArchivo);
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Formulario.xlsx"');
            header('Cache-Control: max-age=0');
            
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            }
    }

?>
