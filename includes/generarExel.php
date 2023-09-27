<?php
require '../vendor/autoload.php';

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$filtroId = $_GET['filtroId'];
$filtroObjeto = $_GET['filtroObjeto'];
$filtroEstado = $_GET['filtroEstado'];
$filtroResponsable = $_GET['filtroResponsable'];


$columnas = ['ID', 'Objeto', 'Descripción', 'Fecha Inicio', 'Fecha Cierre', 'Estado', 'Responsable Evento'];
$columna = 1;

foreach ($columnas as $titulo) {
    $sheet->setCellValueByColumnAndRow($columna, 1, $titulo);
    $columna++;
}

$fila = 2;
foreach ($datosFiltrados as $dato) {
    $sheet->setCellValueByColumnAndRow(1, $fila, $dato['id']);
    $sheet->setCellValueByColumnAndRow(2, $fila, $dato['proc_objeto']);
    $sheet->setCellValueByColumnAndRow(3, $fila, $dato['proc_descripcion']);
    $sheet->setCellValueByColumnAndRow(4, $fila, $dato['proc_fecha_inicio']);
    $sheet->setCellValueByColumnAndRow(5, $fila, $dato['proc_fecha_fin']);
    $sheet->setCellValueByColumnAndRow(6, $fila, $dato['proc_estado']);
    $sheet->setCellValueByColumnAndRow(7, $fila, $dato['proc_nombre_responsable']);
    $fila++;
}

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$filename = 'datos_filtrados.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
