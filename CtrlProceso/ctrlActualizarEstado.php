<?php
require_once './database/conexionBD.php'; 
// Con este Script se Actualiza de forma periodica el estado del proceso y se incluye en el archivo principal
date_default_timezone_set('America/Bogota');
$fechaHoraActual = date("Y-m-d H:i:s");

$estado = "UPDATE procesos SET proc_estado = 
    CASE 
        WHEN proc_fecha_inicio <= '$fechaHoraActual' AND proc_fecha_fin >= '$fechaHoraActual' THEN 'Publicado'
        WHEN proc_fecha_fin < '$fechaHoraActual' THEN 'Evaluado'
        ELSE 'Activo' 
    END";
$db->exec($estado);
?>
