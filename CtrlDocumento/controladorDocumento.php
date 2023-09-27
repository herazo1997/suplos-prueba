<?php
require_once '../database/conexionBD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tituloDocumento = $_POST['tituloDocumento'];
    $descripcionDocumento = $_POST['descripcionDocumento'];
    $nombreArchivo = $_FILES['archivo']['name'];
    $destinoDirectorio = "../archivosDocumento/";
    $rutaCompletaArchivo = $destinoDirectorio . $nombreArchivo;

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompletaArchivo)) {
        $insert = "INSERT INTO documentos (titulo_docu, descripcion_docu, nombre_docu, ubicacion_docu) VALUES (?, ?, ?, ?)";
        $documento = $db->prepare($insert);
        $documento->execute([$tituloDocumento, $descripcionDocumento, $nombreArchivo, $rutaCompletaArchivo]);

        if ($documento->rowCount() > 0) {
            echo "<script>alert('El Documento se ha guardado correctamente.');";
            echo "window.location.href = '../vistaDocumento/crearContenido.php';</script>";
        } else {
            echo "Hubo un error al guardar el documento.";
        }
    } else {
        echo "Hubo un error al mover el archivo.";
    }
}
?>
