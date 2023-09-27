<?php
include_once '../database/conexionBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idDocumento = $_GET['id'];
    $eliminar = "DELETE FROM documentos WHERE id = ?";
    $resultado = $db->prepare($eliminar);

    if ($resultado->execute([$idDocumento])) {
        echo '<script>alert("Documento eliminado exitosamente.");</script>';
        echo '<script>setTimeout(function() { window.location.href = "crearContenido.php?id=' . $idDocumento . '"; });</script>';
        exit();
    } else {
        echo '<script>alert("Hubo un error al eliminar el documento.");</script>';
        header('Location: crearContenido.php');
        exit();
    }
}
