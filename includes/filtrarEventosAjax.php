<?php
include("../database/conexionBD.php");

$filtroId = $_POST['filtroId'];
$filtroObjeto = $_POST['filtroObjeto'];
$filtroEstado = $_POST['filtroEstado'];
$filtroResponsable = $_POST['filtroResponsable'];

$consulta = "SELECT * FROM procesos WHERE 1";

if (!empty($filtroId)) {
    $consulta .= " AND id = $filtroId";
}

if (!empty($filtroResponsable)) {
  $consulta .= " AND proc_nombre_responsable LIKE '%$filtroResponsable%'";
}

if (!empty($filtroObjeto)) {
    $consulta .= " AND proc_objeto LIKE '%$filtroObjeto%'";
}

if (!empty($filtroEstado)) {
    $consulta .= " AND LOWER(proc_estado) = '$filtroEstado'";
}



$resultado = $db->query($consulta);
