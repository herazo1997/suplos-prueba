<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Agregar Documento</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/documento.css" rel="stylesheet">
  <link href="../css/proceso.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
  <div class="text-center">
        <a href="crearContenido.php" class="btn btn-dark btn-sm" style="float: left;">Volver</a>
        <h1 class="text-center" style="display: inline-block;">Documento Petición</h1>
    </div>
    <form action="../CtrlDocumento/controladorDocumento.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="tituloDocumento" style="margin-top: 25px;">Título del Documento:</label>
        <input type="text" class="form-control" id="tituloDocumento" name="tituloDocumento" required>
      </div>
      <div class="form-group">
        <label for="descripcionDocumento" >Descripción:</label>
        <input type="text" class="form-control" id="descripcionDocumento" name="descripcionDocumento" required>
      </div>
      <div class="form-group">
        <label for="archivo">Seleccionar Archivo:</label>
        <input type="file" class="form-control-file" id="archivo" name="archivo" required>
      </div> <hr>
      <div class="btn-center">
        <button type="submit" class="btn btn-info btn-sm">Guardar Documento</button>
      </div>
    </form>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>