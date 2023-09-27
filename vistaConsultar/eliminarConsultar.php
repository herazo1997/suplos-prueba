<?php
include("../database/conexionBD.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $idEvento = $_GET['id'];

  $eliminacion = "DELETE FROM procesos WHERE id = ?";
  $resultado = $db->prepare($eliminacion);
  $resultado->execute([$idEvento]);

  if ($resultado->rowCount() > 0) {
    echo '<script>alert("Evento eliminado exitosamente.");</script>';
    echo '<script>setTimeout(function() { window.location.href = "listarFiltrarEventos.php?id=' . $idEvento . '"; });</script>';
    exit();
  } else {
    echo "Hubo un error al eliminar el evento.";
  }
} else {
  echo "No se proporcionó un ID válido para la eliminación.";
}
