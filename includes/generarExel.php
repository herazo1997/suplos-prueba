<?php
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include("../database/conexionBD.php");

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre Responsable');
$sheet->setCellValue('C1', 'Objeto');
$sheet->setCellValue('D1', 'Actividad');
$sheet->setCellValue('E1', 'Descripcion');
$sheet->setCellValue('F1', 'Moneda');
$sheet->setCellValue('G1', 'Presupuesto');
$sheet->setCellValue('H1', 'Fcha de Inicio');
$sheet->setCellValue('I1', 'Hora de Inicio');
$sheet->setCellValue('J1', 'Fecha de Cierre');
$sheet->setCellValue('K1', 'Estado');
$listado = "SELECT p.id, p.proc_nombre_responsable, p.proc_objeto, a.nombre_segmento, p.proc_descripcion, p.proc_moneda, p.proc_presupuesto, p.proc_fecha_inicio, p.proc_hora_inicio, p.proc_fecha_fin, p.proc_estado
            FROM procesos p
            LEFT JOIN actividades a ON p.actividades_id = a.id";
$resultado = $db->query($listado);


$contador = 3;
while ($lista = $resultado->fetch(PDO::FETCH_ASSOC)) {
  $sheet->setCellValue('A' . $contador, $lista['id']);
  $sheet->setCellValue('B' . $contador, $lista['proc_nombre_responsable']);
  $sheet->setCellValue('C' . $contador, $lista['proc_objeto']);
  $sheet->setCellValue('D' . $contador, $lista['nombre_segmento']);
  $sheet->setCellValue('E' . $contador, $lista['proc_descripcion']);
  $sheet->setCellValue('F' . $contador, $lista['proc_moneda']);
  $sheet->setCellValue('G' . $contador, $lista['proc_presupuesto']);
  $sheet->setCellValue('H' . $contador, $lista['proc_fecha_inicio']);
  $sheet->setCellValue('I' . $contador, $lista['proc_hora_inicio']);
  $sheet->setCellValue('J' . $contador, $lista['proc_fecha_fin']);
  $sheet->setCellValue('K' . $contador, $lista['proc_estado']);
  $contador++;
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporteEventos.xlsx"');
header('Cache-Control: max-age=0');

$sheet->setTitle('Lista de Eventos y Procesos');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
