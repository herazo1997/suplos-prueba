<?php
include_once '../database/conexionBD.php';
$idDocumento = $_GET['id'];
$tituloActual = $_GET['tit'];
$descripcionActual = $_GET['desc'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar Documento</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Editar Documento</h1>
    <form action="procesarEdicionDocumento.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $idDocumento; ?>">
      <div class="form-group">
        <label for="tituloDocumento" style="font-size: 14px;">Título del Documento:</label>
        <input type="text" class="form-control" id="tituloDocumento" name="tituloDocumento" value="<?php echo $tituloActual; ?>" required>
      </div>
      <div class="form-group">
        <label for="descripcionDocumento" style="font-size: 14px;">Descripción:</label>
        <input type="text" class="form-control" id="descripcionDocumento" name="descripcionDocumento" value="<?php echo $descripcionActual; ?>" required>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" style="font-size: 14px;">Guardar Cambios</button>
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>