<?php
require_once '../database/conexionBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $objeto = $_POST['objeto'];
    $descripcion = $_POST['descripcion'];
    $nombreResponsable = $_POST['nombreResponsable'];
    $presupuesto = $_POST['presupuesto'];
    $moneda = $_POST['moneda'];
    $fechainicio = $_POST['fechainicio'];
    $horainicio = $_POST['horainicio'];
    $fechafin = $_POST['fechafin'];
    $horafin = $_POST['horafin'];
    $actividad = $_POST['actividad'];

    // Calcular la fecha y hora actual
    date_default_timezone_set('America/Bogota');
    $fechaHoraActual = date('Y-m-d H:i:s');    
    $estado = "Activo";

    // Comparar con la fecha y hora actual para cambiar el estado
    if ($fechaHoraActual >= "$fechainicio $horainicio" && $fechaHoraActual < "$fechafin $horafin") {
        $estado = "Publicado";
    } elseif ($fechaHoraActual >= "$fechafin $horafin") {
        $estado = "Evaluado";
    }

    $insert = "INSERT INTO procesos (proc_nombre_responsable, actividades_id, proc_objeto, proc_descripcion, proc_moneda, proc_presupuesto, proc_estado, proc_fecha_inicio, proc_hora_inicio, proc_fecha_fin, proc_hora_fin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $proceso = $db->prepare($insert);

    $proceso->execute([$nombreResponsable, $actividad, $objeto, $descripcion, $moneda, $presupuesto, $estado, $fechainicio, $horainicio, $fechafin, $horafin]);
    if ($proceso->rowCount() > 0) {
        echo "<script>alert('El Proceso se ha creado Correctamente.');";
        echo "window.location.href = '../vistaProcesos/crearProceso.php';</script>";
    } else {
        echo "Hubo un error al insertar los datos.";
    }
}
