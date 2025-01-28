<?php
session_start();

require "assets/claro/excel/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\CELL\Coordinate;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Excel_tyt
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = Database::connection();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Ventashoy()
    {
        try {
            $sql = "SELECT vc.* 
            FROM historico_tyt vc 
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion 
                FROM historico_tyt 
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE DATE(vc.fecha_grabacion_contrato) = CURDATE() 
            ORDER BY vc.id_venta ASC;";
            $resultado = $this->pdo->query($sql);

            $excel = new Spreadsheet();

            $hojaactiva = $excel->getActiveSheet();
            $hojaactiva->setTitle("ventas de hoy");

            $hojaactiva->getColumnDimension('A')->setWidth(20);
            $hojaactiva->setCellValue("A1", 'FECHA VENTA');
            
            $hojaactiva->getColumnDimension('B')->setWidth(20);
            $hojaactiva->setCellValue("B1", 'NOMBRE ASESOR');
            
            $hojaactiva->getColumnDimension('C')->setWidth(20);
            $hojaactiva->setCellValue("C1", 'CEDULA ASESOR');
            
            $hojaactiva->getColumnDimension('D')->setWidth(20);
            $hojaactiva->setCellValue("D1", 'NOMBRE COMPLETO CLIENTE');
            
            $hojaactiva->getColumnDimension('E')->setWidth(20);
            $hojaactiva->setCellValue("E1", 'TIPO DE DOCUMENTO');
            
            $hojaactiva->getColumnDimension('F')->setWidth(20);
            $hojaactiva->setCellValue("F1", 'CEDULA CLIENTE');
            
            $hojaactiva->getColumnDimension('G')->setWidth(20);
            $hojaactiva->setCellValue("G1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'NOMBRE DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DOCUMENTO DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'CELULAR DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'REFERENCIA DEL EQUIPO. POLIEDRO');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'MATERIAL DEL EQUIPO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'FABRICANTE');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'VALOR SIN IVA');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'VALOR CON IVA');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'NUMERO DE CUENTA');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'TIPO DE VENTA');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'ESTADO CLARO UP/LITE');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'MEDIO DE PAGO');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE VALIDCION SECUNDARIA');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'MESES A DIFERIR');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'VALOR CUOTA INICIAL');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'VALOR COUTA MENSUAL');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'FECHA DE ENTREGA');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'COMENTARIOS DE RECUPERACION');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'ULTIMO EN MODIFICAR');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'ULTIMA MODIFICACION');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'otp');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'doble validacion de identidad');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'consulta de creditos');
            
            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Radicado');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Reserva'); 

            $hojaactiva->getColumnDimension('AS')->setWidth(20);
            $hojaactiva->setCellValue("AS1", 'Notus'); 
            
            $hojaactiva->getColumnDimension('AT')->setWidth(20);
            $hojaactiva->setCellValue("AT1", 'CusCode'); 

            $style = [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FF0000']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FFFFCC'], // Amarillo claro
                ],
            ];

            // Aplicar el estilo a las celdas A1:B1
            $hojaactiva->getStyle('A1:AT1')->applyFromArray($style);



            $fila = 2;
            while ($rows = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $fecha_original = $rows['fecha_grabacion_contrato'];
                $fecha_formateada = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_original)->format('d/m/Y H:i:s');
    
                $hojaactiva->setCellValue("A" . $fila, $fecha_formateada);            
                $hojaactiva->setCellValue("B" . $fila, $rows['nombre_asesor']);
                $hojaactiva->setCellValue("C" . $fila, $rows['cedula_asesor']);
                $hojaactiva->setCellValue("D" . $fila, $rows['nombres']);
                $hojaactiva->setCellValue("E" . $fila, $rows['tipo_cedula']);
                $hojaactiva->setCellValue("F" . $fila, $rows['numero_cedula']);
                $hojaactiva->setCellValue("G" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("H" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("I" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("J" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("K" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("L" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("M" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("N" . $fila, $rows['nombres_tercero']);
                $hojaactiva->setCellValue("O" . $fila, $rows['documento_tercero']);
                $hojaactiva->setCellValue("P" . $fila, $rows['cel_tercero']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("R" . $fila, $rows['referencia_equipo']);
                $hojaactiva->setCellValue("S" . $fila, $rows['material']);
                $hojaactiva->setCellValue("T" . $fila, $rows['fabricante']);
                $hojaactiva->setCellValue("U" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("V" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("W" . $fila, $rows['numero_cuenta_venta']);
                $hojaactiva->setCellValue("X" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['tipo_venta']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['activo']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['medio_pago']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_validacion_sec']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['meses_diferir']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['valor_cuota_inicial']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['valor_cuota_mensual']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['fecha_entrega']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['link2']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['link3']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['tramitado']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['reserva']);
                $hojaactiva->setCellValue("AS" . $fila, $rows['notus']);
                $hojaactiva->setCellValue("AT" . $fila, $rows['cuscode']);



                $fila++;
            }
            $fechaActual = date("Y-m-d");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Ventas dia ' . $fechaActual . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Asesorventa()
    {
        try {
            $cedula = $_REQUEST['cedula'];
            $nombre = $_REQUEST['nombre'];

            $sql = "SELECT vc.* 
            FROM historico_tyt vc 
            INNER JOIN (
                SELECT id_venta, cedula_asesor, MAX(ultima_modificacion) AS ultima_modificacion 
                FROM historico_tyt 
                WHERE cedula_asesor = $cedula
                GROUP BY id_venta, cedula_asesor
            ) ult ON vc.id_venta = ult.id_venta AND vc.cedula_asesor = ult.cedula_asesor AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.cedula_asesor = $cedula
            ORDER BY vc.id_venta DESC;";
            $resultado = $this->pdo->query($sql);

            $excel = new Spreadsheet();

            $hojaactiva = $excel->getActiveSheet();
            $hojaactiva->setTitle("ventas de hoy");

            $hojaactiva = $excel->getActiveSheet();
            $hojaactiva->setTitle("ventas de hoy");

            $hojaactiva->getColumnDimension('A')->setWidth(20);
            $hojaactiva->setCellValue("A1", 'FECHA VENTA');
            
            $hojaactiva->getColumnDimension('B')->setWidth(20);
            $hojaactiva->setCellValue("B1", 'NOMBRE ASESOR');
            
            $hojaactiva->getColumnDimension('C')->setWidth(20);
            $hojaactiva->setCellValue("C1", 'CEDULA ASESOR');
            
            $hojaactiva->getColumnDimension('D')->setWidth(20);
            $hojaactiva->setCellValue("D1", 'NOMBRE COMPLETO CLIENTE');
            
            $hojaactiva->getColumnDimension('E')->setWidth(20);
            $hojaactiva->setCellValue("E1", 'TIPO DE DOCUMENTO');
            
            $hojaactiva->getColumnDimension('F')->setWidth(20);
            $hojaactiva->setCellValue("F1", 'CEDULA CLIENTE');
            
            $hojaactiva->getColumnDimension('G')->setWidth(20);
            $hojaactiva->setCellValue("G1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'NOMBRE DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DOCUMENTO DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'CELULAR DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'REFERENCIA DEL EQUIPO. POLIEDRO');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'MATERIAL DEL EQUIPO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'FABRICANTE');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'VALOR SIN IVA');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'VALOR CON IVA');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'NUMERO DE CUENTA');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'TIPO DE VENTA');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'ESTADO CLARO UP/LITE');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'MEDIO DE PAGO');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE VALIDCION SECUNDARIA');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'MESES A DIFERIR');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'VALOR CUOTA INICIAL');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'VALOR COUTA MENSUAL');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'FECHA DE ENTREGA');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'COMENTARIOS DE RECUPERACION');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'ULTIMO EN MODIFICAR');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'ULTIMA MODIFICACION');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'otp');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'doble validacion de identidad');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'consulta de creditos');

            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Radicado');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Reserva'); 

            $hojaactiva->getColumnDimension('AS')->setWidth(20);
            $hojaactiva->setCellValue("AS1", 'Notus'); 
            
            $hojaactiva->getColumnDimension('AT')->setWidth(20);
            $hojaactiva->setCellValue("AT1", 'CusCode'); 

            $style = [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FF0000']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FFFFCC'], // Amarillo claro
                ],
            ];

            // Aplicar el estilo a las celdas A1:B1
            $hojaactiva->getStyle('A1:AT1')->applyFromArray($style);



            $fila = 2;
            while ($rows = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $fecha_original = $rows['fecha_grabacion_contrato'];
                $fecha_formateada = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_original)->format('d/m/Y H:i:s');
    
                $hojaactiva->setCellValue("A" . $fila, $fecha_formateada);            
                $hojaactiva->setCellValue("B" . $fila, $rows['nombre_asesor']);
                $hojaactiva->setCellValue("C" . $fila, $rows['cedula_asesor']);
                $hojaactiva->setCellValue("D" . $fila, $rows['nombres']);
                $hojaactiva->setCellValue("E" . $fila, $rows['tipo_cedula']);
                $hojaactiva->setCellValue("F" . $fila, $rows['numero_cedula']);
                $hojaactiva->setCellValue("G" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("H" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("I" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("J" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("K" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("L" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("M" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("N" . $fila, $rows['nombres_tercero']);
                $hojaactiva->setCellValue("O" . $fila, $rows['documento_tercero']);
                $hojaactiva->setCellValue("P" . $fila, $rows['cel_tercero']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("R" . $fila, $rows['referencia_equipo']);
                $hojaactiva->setCellValue("S" . $fila, $rows['material']);
                $hojaactiva->setCellValue("T" . $fila, $rows['fabricante']);
                $hojaactiva->setCellValue("U" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("V" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("W" . $fila, $rows['numero_cuenta_venta']);
                $hojaactiva->setCellValue("X" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['tipo_venta']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['activo']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['medio_pago']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_validacion_sec']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['meses_diferir']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['valor_cuota_inicial']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['valor_cuota_mensual']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['fecha_entrega']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['link2']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['link3']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['tramitado']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['reserva']);
                $hojaactiva->setCellValue("AS" . $fila, $rows['notus']);
                $hojaactiva->setCellValue("AT" . $fila, $rows['cuscode']);


                $fila++;
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Ventas por ' . $nombre . '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function VentaID()
    {
        try {
            $id = $_REQUEST['id'];

            $sql = "SELECT vc.*
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MIN(ultima_modificacion) AS primera_modificacion
                FROM historico_tyt
                WHERE id_venta = $id
                GROUP BY id_venta
            ) primer_mod ON vc.id_venta = primer_mod.id_venta
            WHERE vc.id_venta = $id
            ORDER BY vc.ultima_modificacion ASC;";
            $resultado = $this->pdo->query($sql);

            $excel = new Spreadsheet();

            $hojaactiva = $excel->getActiveSheet();
            $hojaactiva->setTitle("ventas de hoy");

            $hojaactiva->getColumnDimension('A')->setWidth(20);
            $hojaactiva->setCellValue("A1", 'FECHA VENTA');
            
            $hojaactiva->getColumnDimension('B')->setWidth(20);
            $hojaactiva->setCellValue("B1", 'NOMBRE ASESOR');
            
            $hojaactiva->getColumnDimension('C')->setWidth(20);
            $hojaactiva->setCellValue("C1", 'CEDULA ASESOR');
            
            $hojaactiva->getColumnDimension('D')->setWidth(20);
            $hojaactiva->setCellValue("D1", 'NOMBRE COMPLETO CLIENTE');
            
            $hojaactiva->getColumnDimension('E')->setWidth(20);
            $hojaactiva->setCellValue("E1", 'TIPO DE DOCUMENTO');
            
            $hojaactiva->getColumnDimension('F')->setWidth(20);
            $hojaactiva->setCellValue("F1", 'CEDULA CLIENTE');
            
            $hojaactiva->getColumnDimension('G')->setWidth(20);
            $hojaactiva->setCellValue("G1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'NOMBRE DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DOCUMENTO DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'CELULAR DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'REFERENCIA DEL EQUIPO. POLIEDRO');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'MATERIAL DEL EQUIPO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'FABRICANTE');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'VALOR SIN IVA');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'VALOR CON IVA');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'NUMERO DE CUENTA');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'TIPO DE VENTA');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'ESTADO CLARO UP/LITE');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'MEDIO DE PAGO');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE VALIDCION SECUNDARIA');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'MESES A DIFERIR');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'VALOR CUOTA INICIAL');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'VALOR COUTA MENSUAL');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'FECHA DE ENTREGA');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'COMENTARIOS DE RECUPERACION');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'ULTIMO EN MODIFICAR');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'ULTIMA MODIFICACION');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'otp');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'doble validacion de identidad');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'consulta de creditos');
            
            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Radicado');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Reserva'); 

            $hojaactiva->getColumnDimension('AS')->setWidth(20);
            $hojaactiva->setCellValue("AS1", 'Notus'); 
            
            $hojaactiva->getColumnDimension('AT')->setWidth(20);
            $hojaactiva->setCellValue("AT1", 'CusCode'); 


            $style = [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FF0000']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FFFFCC'], // Amarillo claro
                ],
            ];

            // Aplicar el estilo a las celdas A1:B1
            $hojaactiva->getStyle('A1:AT1')->applyFromArray($style);



            $fila = 2;
            while ($rows = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $fecha_original = $rows['fecha_grabacion_contrato'];
                $fecha_formateada = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_original)->format('d/m/Y H:i:s');
    
                $hojaactiva->setCellValue("A" . $fila, $fecha_formateada);            
                $hojaactiva->setCellValue("B" . $fila, $rows['nombre_asesor']);
                $hojaactiva->setCellValue("C" . $fila, $rows['cedula_asesor']);
                $hojaactiva->setCellValue("D" . $fila, $rows['nombres']);
                $hojaactiva->setCellValue("E" . $fila, $rows['tipo_cedula']);
                $hojaactiva->setCellValue("F" . $fila, $rows['numero_cedula']);
                $hojaactiva->setCellValue("G" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("H" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("I" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("J" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("K" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("L" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("M" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("N" . $fila, $rows['nombres_tercero']);
                $hojaactiva->setCellValue("O" . $fila, $rows['documento_tercero']);
                $hojaactiva->setCellValue("P" . $fila, $rows['cel_tercero']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("R" . $fila, $rows['referencia_equipo']);
                $hojaactiva->setCellValue("S" . $fila, $rows['material']);
                $hojaactiva->setCellValue("T" . $fila, $rows['fabricante']);
                $hojaactiva->setCellValue("U" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("V" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("W" . $fila, $rows['numero_cuenta_venta']);
                $hojaactiva->setCellValue("X" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['tipo_venta']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['activo']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['medio_pago']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_validacion_sec']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['meses_diferir']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['valor_cuota_inicial']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['valor_cuota_mensual']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['fecha_entrega']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['link2']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['link3']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['tramitado']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['reserva']);
                $hojaactiva->setCellValue("AS" . $fila, $rows['notus']);
                $hojaactiva->setCellValue("AT" . $fila, $rows['cuscode']);


                $fila++;
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Venta.xlsx"');
            header('Cache-Control: max-age=0');
            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Fechas()
    {
        try {
            // $fecha_1 = $_REQUEST['fecha_1'];
            // $fecha_2 = $_REQUEST['fecha_2'];

            if($_REQUEST['fecha_2'] != ""){
                $fecha_1 = $_REQUEST['fecha_1'];
                $fecha_2 = $_REQUEST['fecha_2'];

                $sql = "SELECT vc.*
                FROM historico_tyt vc
                INNER JOIN (
                    SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                    FROM historico_tyt
                    WHERE DATE(fecha_grabacion_contrato) BETWEEN STR_TO_DATE('$fecha_1', '%Y-%m-%d') AND STR_TO_DATE('$fecha_2', '%Y-%m-%d')
                    GROUP BY id_venta
                ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
                WHERE DATE(vc.fecha_grabacion_contrato) BETWEEN STR_TO_DATE('$fecha_1', '%Y-%m-%d') AND STR_TO_DATE('$fecha_2', '%Y-%m-%d')
                ORDER BY vc.id_venta ASC;";
            }else{
                $fecha_1 = $_REQUEST['fecha_1'];

                $sql = "SELECT vc.*
FROM historico_tyt vc
INNER JOIN (
    SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
    FROM historico_tyt
    WHERE DATE(fecha_grabacion_contrato) = STR_TO_DATE('$fecha_1', '%Y-%m-%d')
    GROUP BY id_venta
) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
WHERE DATE(vc.fecha_grabacion_contrato) = STR_TO_DATE('$fecha_1', '%Y-%m-%d')
ORDER BY vc.id_venta ASC;";
            }

            $resultado = $this->pdo->query($sql);

            $excel = new Spreadsheet();

            $hojaactiva = $excel->getActiveSheet();
            $hojaactiva->setTitle("ventas de hoy");

            $hojaactiva->getColumnDimension('A')->setWidth(20);
            $hojaactiva->setCellValue("A1", 'FECHA VENTA');
            
            $hojaactiva->getColumnDimension('B')->setWidth(20);
            $hojaactiva->setCellValue("B1", 'NOMBRE ASESOR');
            
            $hojaactiva->getColumnDimension('C')->setWidth(20);
            $hojaactiva->setCellValue("C1", 'CEDULA ASESOR');
            
            $hojaactiva->getColumnDimension('D')->setWidth(20);
            $hojaactiva->setCellValue("D1", 'NOMBRE COMPLETO CLIENTE');
            
            $hojaactiva->getColumnDimension('E')->setWidth(20);
            $hojaactiva->setCellValue("E1", 'TIPO DE DOCUMENTO');
            
            $hojaactiva->getColumnDimension('F')->setWidth(20);
            $hojaactiva->setCellValue("F1", 'CEDULA CLIENTE');
            
            $hojaactiva->getColumnDimension('G')->setWidth(20);
            $hojaactiva->setCellValue("G1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'NOMBRE DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DOCUMENTO DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'CELULAR DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'REFERENCIA DEL EQUIPO. POLIEDRO');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'MATERIAL DEL EQUIPO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'FABRICANTE');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'VALOR SIN IVA');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'VALOR CON IVA');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'NUMERO DE CUENTA');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'TIPO DE VENTA');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'ESTADO CLARO UP/LITE');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'MEDIO DE PAGO');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE VALIDCION SECUNDARIA');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'MESES A DIFERIR');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'VALOR CUOTA INICIAL');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'VALOR COUTA MENSUAL');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'FECHA DE ENTREGA');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'COMENTARIOS DE RECUPERACION');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'ULTIMO EN MODIFICAR');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'ULTIMA MODIFICACION');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'otp');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'doble validacion de identidad');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'consulta de creditos');
            
            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Radicado');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Reserva'); 

            $hojaactiva->getColumnDimension('AS')->setWidth(20);
            $hojaactiva->setCellValue("AS1", 'Notus'); 
            
            $hojaactiva->getColumnDimension('AT')->setWidth(20);
            $hojaactiva->setCellValue("AT1", 'CusCode'); 


            $style = [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FF0000']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FFFFCC'], // Amarillo claro
                ],
            ];

            // Aplicar el estilo a las celdas A1:B1
            $hojaactiva->getStyle('A1:AT1')->applyFromArray($style);



            $fila = 2;
            while ($rows = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $fecha_original = $rows['fecha_grabacion_contrato'];
                $fecha_formateada = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_original)->format('d/m/Y H:i:s');
    
                $hojaactiva->setCellValue("A" . $fila, $fecha_formateada);            
                $hojaactiva->setCellValue("B" . $fila, $rows['nombre_asesor']);
                $hojaactiva->setCellValue("C" . $fila, $rows['cedula_asesor']);
                $hojaactiva->setCellValue("D" . $fila, $rows['nombres']);
                $hojaactiva->setCellValue("E" . $fila, $rows['tipo_cedula']);
                $hojaactiva->setCellValue("F" . $fila, $rows['numero_cedula']);
                $hojaactiva->setCellValue("G" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("H" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("I" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("J" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("K" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("L" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("M" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("N" . $fila, $rows['nombres_tercero']);
                $hojaactiva->setCellValue("O" . $fila, $rows['documento_tercero']);
                $hojaactiva->setCellValue("P" . $fila, $rows['cel_tercero']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("R" . $fila, $rows['referencia_equipo']);
                $hojaactiva->setCellValue("S" . $fila, $rows['material']);
                $hojaactiva->setCellValue("T" . $fila, $rows['fabricante']);
                $hojaactiva->setCellValue("U" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("V" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("W" . $fila, $rows['numero_cuenta_venta']);
                $hojaactiva->setCellValue("X" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['tipo_venta']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['activo']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['medio_pago']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_validacion_sec']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['meses_diferir']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['valor_cuota_inicial']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['valor_cuota_mensual']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['fecha_entrega']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['link2']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['link3']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['tramitado']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['reserva']);
                $hojaactiva->setCellValue("AS" . $fila, $rows['notus']);
                $hojaactiva->setCellValue("AT" . $fila, $rows['cuscode']);

                
                $fila++;
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if($_REQUEST['fecha_2'] != ""){
            header('Content-Disposition: attachment;filename="Ventas desde ' . $fecha_1 . ' hasta ' . $fecha_2 . '.xlsx"');
            }else{
                header('Content-Disposition: attachment;filename="Ventas del dia ' . $fecha_1 .'.xlsx"');

            }
            header('Cache-Control: max-age=0');
            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Total()
    {
        try {
            $sql = "SELECT vc.*
            FROM historico_tyt vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_tyt
                GROUP BY id_venta
            ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
            ORDER BY vc.id_venta ASC;";

            $resultado = $this->pdo->query($sql);

            $excel = new Spreadsheet();

            $hojaactiva = $excel->getActiveSheet();
            $hojaactiva->setTitle("ventas de hoy");

            $hojaactiva->getColumnDimension('A')->setWidth(20);
            $hojaactiva->setCellValue("A1", 'FECHA VENTA');
            
            $hojaactiva->getColumnDimension('B')->setWidth(20);
            $hojaactiva->setCellValue("B1", 'NOMBRE ASESOR');
            
            $hojaactiva->getColumnDimension('C')->setWidth(20);
            $hojaactiva->setCellValue("C1", 'CEDULA ASESOR');
            
            $hojaactiva->getColumnDimension('D')->setWidth(20);
            $hojaactiva->setCellValue("D1", 'NOMBRE COMPLETO CLIENTE');
            
            $hojaactiva->getColumnDimension('E')->setWidth(20);
            $hojaactiva->setCellValue("E1", 'TIPO DE DOCUMENTO');
            
            $hojaactiva->getColumnDimension('F')->setWidth(20);
            $hojaactiva->setCellValue("F1", 'CEDULA CLIENTE');
            
            $hojaactiva->getColumnDimension('G')->setWidth(20);
            $hojaactiva->setCellValue("G1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'NOMBRE DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DOCUMENTO DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'CELULAR DE TERCERO AUTORIZADO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'REFERENCIA DEL EQUIPO. POLIEDRO');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'MATERIAL DEL EQUIPO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'FABRICANTE');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'VALOR SIN IVA');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'VALOR CON IVA');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'NUMERO DE CUENTA');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'TIPO DE VENTA');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'ESTADO CLARO UP/LITE');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'MEDIO DE PAGO');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE VALIDCION SECUNDARIA');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'MESES A DIFERIR');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'VALOR CUOTA INICIAL');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'VALOR COUTA MENSUAL');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'FECHA DE ENTREGA');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'COMENTARIOS DE RECUPERACION');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'ULTIMO EN MODIFICAR');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'ULTIMA MODIFICACION');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'otp');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'doble validacion de identidad');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'consulta de creditos');
            
            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Radicado');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Reserva'); 

            $hojaactiva->getColumnDimension('AS')->setWidth(20);
            $hojaactiva->setCellValue("AS1", 'Notus'); 
            
            $hojaactiva->getColumnDimension('AT')->setWidth(20);
            $hojaactiva->setCellValue("AT1", 'CusCode'); 


            $style = [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FF0000']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FFFFCC'], // Amarillo claro
                ],
            ];

            // Aplicar el estilo a las celdas A1:B1
            $hojaactiva->getStyle('A1:AT1')->applyFromArray($style);



            $fila = 2;
            while ($rows = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $fecha_original = $rows['fecha_grabacion_contrato'];
                $fecha_formateada = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_original)->format('d/m/Y H:i:s');
    
                $hojaactiva->setCellValue("A" . $fila, $fecha_formateada);            
                $hojaactiva->setCellValue("B" . $fila, $rows['nombre_asesor']);
                $hojaactiva->setCellValue("C" . $fila, $rows['cedula_asesor']);
                $hojaactiva->setCellValue("D" . $fila, $rows['nombres']);
                $hojaactiva->setCellValue("E" . $fila, $rows['tipo_cedula']);
                $hojaactiva->setCellValue("F" . $fila, $rows['numero_cedula']);
                $hojaactiva->setCellValue("G" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("H" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("I" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("J" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("K" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("L" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("M" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("N" . $fila, $rows['nombres_tercero']);
                $hojaactiva->setCellValue("O" . $fila, $rows['documento_tercero']);
                $hojaactiva->setCellValue("P" . $fila, $rows['cel_tercero']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("R" . $fila, $rows['referencia_equipo']);
                $hojaactiva->setCellValue("S" . $fila, $rows['material']);
                $hojaactiva->setCellValue("T" . $fila, $rows['fabricante']);
                $hojaactiva->setCellValue("U" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("V" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("W" . $fila, $rows['numero_cuenta_venta']);
                $hojaactiva->setCellValue("X" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['tipo_venta']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['activo']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['medio_pago']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_validacion_sec']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['meses_diferir']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['valor_cuota_inicial']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['valor_cuota_mensual']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['fecha_entrega']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['link2']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['link3']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['tramitado']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['reserva']);
                $hojaactiva->setCellValue("AS" . $fila, $rows['notus']);
                $hojaactiva->setCellValue("AT" . $fila, $rows['cuscode']);


                $fila++;
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Ventas Totales.xlsx"');
            header('Cache-Control: max-age=0');
            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}