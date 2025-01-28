<?php
session_start();

require "assets/claro/excel/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\CELL\Coordinate;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Excel_porta
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
            FROM historico_portabilidad vc 
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion 
                FROM historico_portabilidad 
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
            $hojaactiva->setCellValue("G1", 'FECHA NACIMIENTO CLIENTE');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'FECHA EXPEDICION CLIENTE');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'OPERADOR');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'FECHA ENTREGA');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'FECHA VENTANA DE CAMBIO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'REFERIDO');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'NIP');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'OPERADOR DONANTE');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'ESTADO ACTUAL DE OPERADOR');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'CODIGO DEL PLAN');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'DETALLES DEL PLAN');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'VALOR DEL PLAN');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'VALOR DEL PLAN CON IVA');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE SOLICITUD');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'SIM');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'NUMERO DE SIM');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'MIN');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'NUMERO DE MIN SIM');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'DESCUENTO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'TIPO DE VENTA');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'COMENTARIOS D RECUPERACION');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'ULTIMA MODIFICACION');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'ULTIMO EN MODIFICAR');

            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Validacion de identidad');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Validacion de creditos');


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
            $hojaactiva->getStyle('A1:AR1')->applyFromArray($style);


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
                $hojaactiva->setCellValue("G" . $fila, $rows['fecha_nacimiento']);
                $hojaactiva->setCellValue("H" . $fila, $rows['fecha_expedicion']);
                $hojaactiva->setCellValue("I" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("J" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("K" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("L" . $fila, $rows['operador']);
                $hojaactiva->setCellValue("M" . $fila, $rows['dias']);
                $hojaactiva->setCellValue("N" . $fila, $rows['ventana_cambio']);
                $hojaactiva->setCellValue("O" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("P" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("R" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("S" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("T" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("U" . $fila, $rows['referido']);
                $hojaactiva->setCellValue("V" . $fila, $rows['nip']);
                $hojaactiva->setCellValue("W" . $fila, $rows['operador_donante']);
                $hojaactiva->setCellValue("X" . $fila, $rows['estado_actual_operador_donante']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['codigo_plan']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['detalles_plan']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_solicitud']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['sim']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['numero_sim']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['min']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['numero_min_sim']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['descuento']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['venta_tp']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['link2']);


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
            FROM historico_portabilidad vc 
            INNER JOIN (
                SELECT id_venta, cedula_asesor, MAX(ultima_modificacion) AS ultima_modificacion 
                FROM historico_portabilidad 
                WHERE cedula_asesor = $cedula
                GROUP BY id_venta, cedula_asesor
            ) ult ON vc.id_venta = ult.id_venta AND vc.cedula_asesor = ult.cedula_asesor AND vc.ultima_modificacion = ult.ultima_modificacion
            WHERE vc.cedula_asesor = $cedula
            ORDER BY vc.id_venta DESC;";
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
            $hojaactiva->setCellValue("G1", 'FECHA NACIMIENTO CLIENTE');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'FECHA EXPEDICION CLIENTE');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'OPERADOR');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'FECHA ENTREGA');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'FECHA VENTANA DE CAMBIO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'REFERIDO');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'NIP');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'OPERADOR DONANTE');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'ESTADO ACTUAL DE OPERADOR');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'CODIGO DEL PLAN');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'DETALLES DEL PLAN');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'VALOR DEL PLAN');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'VALOR DEL PLAN CON IVA');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE SOLICITUD');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'SIM');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'NUMERO DE SIM');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'MIN');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'NUMERO DE MIN SIM');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'DESCUENTO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'TIPO DE VENTA');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'COMENTARIOS D RECUPERACION');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'ULTIMA MODIFICACION');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'ULTIMO EN MODIFICAR');

            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Validacion de identidad');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Validacion de creditos');


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
            $hojaactiva->getStyle('A1:AR1')->applyFromArray($style);


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
                $hojaactiva->setCellValue("G" . $fila, $rows['fecha_nacimiento']);
                $hojaactiva->setCellValue("H" . $fila, $rows['fecha_expedicion']);
                $hojaactiva->setCellValue("I" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("J" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("K" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("L" . $fila, $rows['operador']);
                $hojaactiva->setCellValue("M" . $fila, $rows['dias']);
                $hojaactiva->setCellValue("N" . $fila, $rows['ventana_cambio']);
                $hojaactiva->setCellValue("O" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("P" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("R" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("S" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("T" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("U" . $fila, $rows['referido']);
                $hojaactiva->setCellValue("V" . $fila, $rows['nip']);
                $hojaactiva->setCellValue("W" . $fila, $rows['operador_donante']);
                $hojaactiva->setCellValue("X" . $fila, $rows['estado_actual_operador_donante']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['codigo_plan']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['detalles_plan']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_solicitud']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['sim']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['numero_sim']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['min']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['numero_min_sim']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['descuento']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['venta_tp']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['link2']);


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
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MIN(ultima_modificacion) AS primera_modificacion
                FROM historico_portabilidad
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
            $hojaactiva->setCellValue("G1", 'FECHA NACIMIENTO CLIENTE');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'FECHA EXPEDICION CLIENTE');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'OPERADOR');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'FECHA ENTREGA');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'FECHA VENTANA DE CAMBIO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'REFERIDO');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'NIP');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'OPERADOR DONANTE');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'ESTADO ACTUAL DE OPERADOR');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'CODIGO DEL PLAN');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'DETALLES DEL PLAN');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'VALOR DEL PLAN');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'VALOR DEL PLAN CON IVA');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE SOLICITUD');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'SIM');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'NUMERO DE SIM');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'MIN');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'NUMERO DE MIN SIM');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'DESCUENTO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'TIPO DE VENTA');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'COMENTARIOS D RECUPERACION');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'ULTIMA MODIFICACION');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'ULTIMO EN MODIFICAR');

            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Validacion de identidad');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Validacion de creditos');


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
            $hojaactiva->getStyle('A1:AR1')->applyFromArray($style);


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
                $hojaactiva->setCellValue("G" . $fila, $rows['fecha_nacimiento']);
                $hojaactiva->setCellValue("H" . $fila, $rows['fecha_expedicion']);
                $hojaactiva->setCellValue("I" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("J" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("K" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("L" . $fila, $rows['operador']);
                $hojaactiva->setCellValue("M" . $fila, $rows['dias']);
                $hojaactiva->setCellValue("N" . $fila, $rows['ventana_cambio']);
                $hojaactiva->setCellValue("O" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("P" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("R" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("S" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("T" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("U" . $fila, $rows['referido']);
                $hojaactiva->setCellValue("V" . $fila, $rows['nip']);
                $hojaactiva->setCellValue("W" . $fila, $rows['operador_donante']);
                $hojaactiva->setCellValue("X" . $fila, $rows['estado_actual_operador_donante']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['codigo_plan']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['detalles_plan']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_solicitud']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['sim']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['numero_sim']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['min']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['numero_min_sim']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['descuento']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['venta_tp']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['link2']);


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
                FROM historico_portabilidad vc
                INNER JOIN (
                    SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                    FROM historico_portabilidad
                    WHERE DATE(fecha_grabacion_contrato) BETWEEN STR_TO_DATE('$fecha_1', '%Y-%m-%d') AND STR_TO_DATE('$fecha_2', '%Y-%m-%d')
                    GROUP BY id_venta
                ) ult ON vc.id_venta = ult.id_venta AND vc.ultima_modificacion = ult.ultima_modificacion
                WHERE DATE(vc.fecha_grabacion_contrato) BETWEEN STR_TO_DATE('$fecha_1', '%Y-%m-%d') AND STR_TO_DATE('$fecha_2', '%Y-%m-%d')
                ORDER BY vc.id_venta ASC;";
            }else{
                $fecha_1 = $_REQUEST['fecha_1'];

                $sql = "SELECT vc.*
FROM historico_portabilidad vc
INNER JOIN (
    SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
    FROM historico_portabilidad
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
            $hojaactiva->setCellValue("G1", 'FECHA NACIMIENTO CLIENTE');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'FECHA EXPEDICION CLIENTE');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'OPERADOR');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'FECHA ENTREGA');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'FECHA VENTANA DE CAMBIO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'REFERIDO');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'NIP');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'OPERADOR DONANTE');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'ESTADO ACTUAL DE OPERADOR');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'CODIGO DEL PLAN');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'DETALLES DEL PLAN');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'VALOR DEL PLAN');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'VALOR DEL PLAN CON IVA');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE SOLICITUD');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'SIM');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'NUMERO DE SIM');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'MIN');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'NUMERO DE MIN SIM');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'DESCUENTO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'TIPO DE VENTA');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'COMENTARIOS D RECUPERACION');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'ULTIMA MODIFICACION');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'ULTIMO EN MODIFICAR');

            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Validacion de identidad');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Validacion de creditos');


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
            $hojaactiva->getStyle('A1:AR1')->applyFromArray($style);


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
                $hojaactiva->setCellValue("G" . $fila, $rows['fecha_nacimiento']);
                $hojaactiva->setCellValue("H" . $fila, $rows['fecha_expedicion']);
                $hojaactiva->setCellValue("I" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("J" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("K" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("L" . $fila, $rows['operador']);
                $hojaactiva->setCellValue("M" . $fila, $rows['dias']);
                $hojaactiva->setCellValue("N" . $fila, $rows['ventana_cambio']);
                $hojaactiva->setCellValue("O" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("P" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("R" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("S" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("T" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("U" . $fila, $rows['referido']);
                $hojaactiva->setCellValue("V" . $fila, $rows['nip']);
                $hojaactiva->setCellValue("W" . $fila, $rows['operador_donante']);
                $hojaactiva->setCellValue("X" . $fila, $rows['estado_actual_operador_donante']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['codigo_plan']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['detalles_plan']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_solicitud']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['sim']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['numero_sim']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['min']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['numero_min_sim']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['descuento']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['venta_tp']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['link2']);

                
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
            FROM historico_portabilidad vc
            INNER JOIN (
                SELECT id_venta, MAX(ultima_modificacion) AS ultima_modificacion
                FROM historico_portabilidad
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
            $hojaactiva->setCellValue("G1", 'FECHA NACIMIENTO CLIENTE');
            
            $hojaactiva->getColumnDimension('H')->setWidth(20);
            $hojaactiva->setCellValue("H1", 'FECHA EXPEDICION CLIENTE');
            
            $hojaactiva->getColumnDimension('I')->setWidth(20);
            $hojaactiva->setCellValue("I1", 'CORREO ELECTRONICO');
            
            $hojaactiva->getColumnDimension('J')->setWidth(20);
            $hojaactiva->setCellValue("J1", 'DEPARTAMENTO');
            
            $hojaactiva->getColumnDimension('K')->setWidth(20);
            $hojaactiva->setCellValue("K1", 'CIUDAD');
            
            $hojaactiva->getColumnDimension('L')->setWidth(20);
            $hojaactiva->setCellValue("L1", 'OPERADOR');
            
            $hojaactiva->getColumnDimension('M')->setWidth(20);
            $hojaactiva->setCellValue("M1", 'FECHA ENTREGA');
            
            $hojaactiva->getColumnDimension('N')->setWidth(20);
            $hojaactiva->setCellValue("N1", 'FECHA VENTANA DE CAMBIO');
            
            $hojaactiva->getColumnDimension('O')->setWidth(20);
            $hojaactiva->setCellValue("O1", 'DIRECCION');
            
            $hojaactiva->getColumnDimension('P')->setWidth(20);
            $hojaactiva->setCellValue("P1", 'BARRIO');
            
            $hojaactiva->getColumnDimension('Q')->setWidth(20);
            $hojaactiva->setCellValue("Q1", 'CELULAR 1');
            
            $hojaactiva->getColumnDimension('R')->setWidth(20);
            $hojaactiva->setCellValue("R1", 'CELULAR 2');
            
            $hojaactiva->getColumnDimension('S')->setWidth(20);
            $hojaactiva->setCellValue("S1", 'NUMERO DE GRABACION DE CONTRATO');
            
            $hojaactiva->getColumnDimension('T')->setWidth(20);
            $hojaactiva->setCellValue("T1", 'TIPO DE CONTRATO');
            
            $hojaactiva->getColumnDimension('U')->setWidth(20);
            $hojaactiva->setCellValue("U1", 'REFERIDO');
            
            $hojaactiva->getColumnDimension('V')->setWidth(20);
            $hojaactiva->setCellValue("V1", 'NIP');
            
            $hojaactiva->getColumnDimension('W')->setWidth(20);
            $hojaactiva->setCellValue("W1", 'OPERADOR DONANTE');
            
            $hojaactiva->getColumnDimension('X')->setWidth(20);
            $hojaactiva->setCellValue("X1", 'ESTADO ACTUAL DE OPERADOR');
            
            $hojaactiva->getColumnDimension('Y')->setWidth(20);
            $hojaactiva->setCellValue("Y1", 'CODIGO DEL PLAN');
            
            $hojaactiva->getColumnDimension('Z')->setWidth(20);
            $hojaactiva->setCellValue("Z1", 'DETALLES DEL PLAN');
            
            $hojaactiva->getColumnDimension('AA')->setWidth(20);
            $hojaactiva->setCellValue("AA1", 'VALOR DEL PLAN');
            
            $hojaactiva->getColumnDimension('AB')->setWidth(20);
            $hojaactiva->setCellValue("AB1", 'VALOR DEL PLAN CON IVA');
            
            $hojaactiva->getColumnDimension('AC')->setWidth(20);
            $hojaactiva->setCellValue("AC1", 'TIPO DE SOLICITUD');
            
            $hojaactiva->getColumnDimension('AD')->setWidth(20);
            $hojaactiva->setCellValue("AD1", 'TIPO DE VALIDACION');
            
            $hojaactiva->getColumnDimension('AE')->setWidth(20);
            $hojaactiva->setCellValue("AE1", 'SIM');
            
            $hojaactiva->getColumnDimension('AF')->setWidth(20);
            $hojaactiva->setCellValue("AF1", 'NUMERO DE SIM');
            
            $hojaactiva->getColumnDimension('AG')->setWidth(20);
            $hojaactiva->setCellValue("AG1", 'MIN');
            
            $hojaactiva->getColumnDimension('AH')->setWidth(20);
            $hojaactiva->setCellValue("AH1", 'NUMERO DE MIN SIM');
            
            $hojaactiva->getColumnDimension('AI')->setWidth(20);
            $hojaactiva->setCellValue("AI1", 'DESCUENTO');
            
            $hojaactiva->getColumnDimension('AJ')->setWidth(20);
            $hojaactiva->setCellValue("AJ1", 'OBSERVACIONES');
            
            $hojaactiva->getColumnDimension('AK')->setWidth(20);
            $hojaactiva->setCellValue("AK1", 'ESTADO');
            
            $hojaactiva->getColumnDimension('AL')->setWidth(20);
            $hojaactiva->setCellValue("AL1", 'SUB ESTADO');
            
            $hojaactiva->getColumnDimension('AM')->setWidth(20);
            $hojaactiva->setCellValue("AM1", 'TIPO DE VENTA');

            $hojaactiva->getColumnDimension('AN')->setWidth(20);
            $hojaactiva->setCellValue("AN1", 'COMENTARIOS D RECUPERACION');
            
            $hojaactiva->getColumnDimension('AO')->setWidth(20);
            $hojaactiva->setCellValue("AO1", 'ULTIMA MODIFICACION');
            
            $hojaactiva->getColumnDimension('AP')->setWidth(20);
            $hojaactiva->setCellValue("AP1", 'ULTIMO EN MODIFICAR');

            $hojaactiva->getColumnDimension('AQ')->setWidth(20);
            $hojaactiva->setCellValue("AQ1", 'Validacion de identidad');

            $hojaactiva->getColumnDimension('AR')->setWidth(20);
            $hojaactiva->setCellValue("AR1", 'Validacion de creditos');


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
            $hojaactiva->getStyle('A1:AR1')->applyFromArray($style);


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
                $hojaactiva->setCellValue("G" . $fila, $rows['fecha_nacimiento']);
                $hojaactiva->setCellValue("H" . $fila, $rows['fecha_expedicion']);
                $hojaactiva->setCellValue("I" . $fila, $rows['correo']);
                $hojaactiva->setCellValue("J" . $fila, $rows['departamento']);
                $hojaactiva->setCellValue("K" . $fila, $rows['ciudad']);
                $hojaactiva->setCellValue("L" . $fila, $rows['operador']);
                $hojaactiva->setCellValue("M" . $fila, $rows['dias']);
                $hojaactiva->setCellValue("N" . $fila, $rows['ventana_cambio']);
                $hojaactiva->setCellValue("O" . $fila, $rows['direccion']);
                $hojaactiva->setCellValue("P" . $fila, $rows['barrio']);
                $hojaactiva->setCellValue("Q" . $fila, $rows['cel_1']);
                $hojaactiva->setCellValue("R" . $fila, $rows['cel_2']);
                $hojaactiva->setCellValue("S" . $fila, $rows['numero_grabacion_contrato']);
                $hojaactiva->setCellValue("T" . $fila, $rows['tipo_contrato']);
                $hojaactiva->setCellValue("U" . $fila, $rows['referido']);
                $hojaactiva->setCellValue("V" . $fila, $rows['nip']);
                $hojaactiva->setCellValue("W" . $fila, $rows['operador_donante']);
                $hojaactiva->setCellValue("X" . $fila, $rows['estado_actual_operador_donante']);
                $hojaactiva->setCellValue("Y" . $fila, $rows['codigo_plan']);
                $hojaactiva->setCellValue("Z" . $fila, $rows['detalles_plan']);
                $hojaactiva->setCellValue("AA" . $fila, $rows['valor']);
                $hojaactiva->setCellValue("AB" . $fila, $rows['valor_iva']);
                $hojaactiva->setCellValue("AC" . $fila, $rows['tipo_solicitud']);
                $hojaactiva->setCellValue("AD" . $fila, $rows['tipo_validacion']);
                $hojaactiva->setCellValue("AE" . $fila, $rows['sim']);
                $hojaactiva->setCellValue("AF" . $fila, $rows['numero_sim']);
                $hojaactiva->setCellValue("AG" . $fila, $rows['min']);
                $hojaactiva->setCellValue("AH" . $fila, $rows['numero_min_sim']);
                $hojaactiva->setCellValue("AI" . $fila, $rows['descuento']);
                $hojaactiva->setCellValue("AJ" . $fila, $rows['observaciones']);
                $hojaactiva->setCellValue("AK" . $fila, $rows['estado']);
                $hojaactiva->setCellValue("AL" . $fila, $rows['detalles']);
                $hojaactiva->setCellValue("AM" . $fila, $rows['venta_tp']);
                $hojaactiva->setCellValue("AN" . $fila, $rows['comentario']);
                $hojaactiva->setCellValue("AO" . $fila, $rows['ultima_modificacion']);
                $hojaactiva->setCellValue("AP" . $fila, $rows['usuario_modificado']);
                $hojaactiva->setCellValue("AQ" . $fila, $rows['link']);
                $hojaactiva->setCellValue("AR" . $fila, $rows['link2']);


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
