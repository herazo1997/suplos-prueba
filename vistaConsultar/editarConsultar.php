<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar Evento/Proceso</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Editar Evento/Proceso</h1>
    <div class="text-left mb-3">
      <a href="listarFiltrarEventos.php" class="btn btn-dark btn-sm float-right">Volver</a>

    </div>
    <?php
    include("../database/conexionBD.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
      $idEvento = $_GET['id'];
      $consulta = "SELECT * FROM procesos WHERE id = ?";
      $resultado = $db->prepare($consulta);
      $resultado->execute([$idEvento]);
      $evento = $resultado->fetch(PDO::FETCH_ASSOC);

      if (!$evento) {
        echo "No se encontró el evento.";
      }
    }
    ?>
    <form action="procesarEdicionEvento.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
      <div class="form-group">
        <label for="objeto">Objeto:</label>
        <input type="text" class="form-control" id="objeto" name="objeto" value="<?php echo $evento['proc_objeto']; ?>">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripcion:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $evento['proc_descripcion']; ?>">
      </div>
      <div class="form-row">
        <div class="col-md-6 form-group">
          <label for="fechaInicio">Fecha Inicio:</label>
          <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="<?php echo $evento['proc_fecha_inicio']; ?>">
        </div>
        <div class="col-md-6 form-group">
          <label for="fechaFin">Fecha Cierre:</label>
          <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo $evento['proc_fecha_fin']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="estado">Estado:</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $evento['proc_estado']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nombreResponsable">Responsable Evento:</label>
        <input type="text" class="form-control" id="nombreResponsable" name="nombreResponsable" value="<?php echo $evento['proc_nombre_responsable']; ?>">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-info btn-sm">Guardar Edición</button>
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>