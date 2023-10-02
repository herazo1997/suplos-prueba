<?php

function filtrarDatos() {
  $filtroId = $_POST['filtroId'];
  $filtroObjeto = $_POST['filtroObjeto'];
  $filtroEstado = $_POST['filtroEstado'];
  $filtroResponsable = $_POST['filtroResponsable'];

  $query = "SELECT * FROM procesos WHERE 1";

  if ($filtroId != "") {
    $query .= " AND id = '$filtroId'";
  }

  if ($filtroObjeto != "") {
    $query .= " AND proc_objeto LIKE '%$filtroObjeto%'";
  }

  if ($filtroEstado != "") {
    $query .= " AND proc_estado = '$filtroEstado'";
  }

  if ($filtroResponsable != "") {
    $query .= " AND proc_nombre_responsable LIKE '%$filtroResponsable%'";
  }

  include("../database/conexionBD.php");
  $resultado = $db->query($query);

  $datos = array();
  while ($lista = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $datos[] = $lista;
  }

  echo json_encode($datos);
}

filtrarDatos();
?>