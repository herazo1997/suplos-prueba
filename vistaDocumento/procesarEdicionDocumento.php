<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idDocumento = $_POST['id'];
    $tituloDocumento = $_POST['tituloDocumento'];
    $descripcionDocumento = $_POST['descripcionDocumento'];

    include "../database/conexionBD.php"; 
    $actualizarDocumento = "UPDATE documentos SET titulo_docu=?, descripcion_docu=? WHERE id=?";
    $resultado = $db->prepare($actualizarDocumento);
    $resultado->execute([$tituloDocumento, $descripcionDocumento, $idDocumento]);

    if ($resultado->rowCount() > 0) {
      echo '<script>alert("Documento actualizado exitosamente.");</script>';
        header('Location: crearContenido.php');
    } else {
        echo "Hubo un error al actualizar el documento.";
    }
}
?>
