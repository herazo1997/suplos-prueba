<?php
include("../database/conexionBD.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $idEvento = $_POST['id'];
  $objeto = $_POST['objeto'];
  $descripcion = $_POST['descripcion'];
  $fechaInicio = $_POST['fechaInicio'];
  $fechaFin = $_POST['fechaFin'];
  $estado = $_POST['estado'];
  $nombreResponsable = $_POST['nombreResponsable'];

  $actualizacion = "UPDATE procesos SET proc_nombre_responsable = ?, proc_objeto = ?, proc_descripcion = ?, proc_estado = ?, proc_fecha_inicio = ?, proc_fecha_fin = ?  WHERE id = ?";
  $resultado = $db->prepare($actualizacion);
  $resultado->execute([$nombreResponsable, $objeto, $descripcion, $estado, $fechaInicio, $fechaFin, $idEvento]);

  if ($resultado->rowCount() > 0) {
    echo '<script>alert("Evento actualizado exitosamente.");</script>';
    echo '<script>setTimeout(function() { window.location.href = "listarFiltrarEventos.php?id=' . $idEvento . '"; });</script>';
    exit();
  } else {
    echo "Hubo un error al actualizar el evento.";
  }
} else {
  echo "No se proporcionaron datos válidos para la edición del evento.";
}
