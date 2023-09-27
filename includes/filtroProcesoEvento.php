<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suplos</title>
</head>

<body>
  <form method="POST" action="filtrarEventosAjax.php" id="formularioFiltros">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="text" class="form-control" id="filtroId" name="filtroId" placeholder="ID Proceso">
      </div>
      <div class="form-group col-md-2">
        <input type="text" class="form-control" id="filtroObjeto" name="filtroObjeto" placeholder="Objeto">
      </div>
      <div class="form-group col-md-2">
        <select class="form-control" id="filtroEstado" name="filtroEstado">
          <option value="">Estado</option>
          <option value="evaluado">Evaluado</option>
          <option value="publicado">Publicado</option>
          <option value="activo">Activo</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <input type="text" class="form-control" id="filtroResponsable" name="filtroResponsable" placeholder="Responsable">
      </div>
      <div class="form-group col-md-2">
        <button type="submit" class="btn btn-info btn-block" id="btnFiltrar">Buscar</button>
      </div>
      <div class="form-group col-md-2">
        <a href="../includes/generarExcel.php?filtroId=<?php echo $filtroId; ?>filtroCreador=<?php echo $filtroCreador; ?>&filtroObjeto=<?php echo $filtroObjeto; ?>filtroActividad=<?php echo $filtroActividad; ?>filtroDescripcion=<?php echo $filtroDescripcion; ?>filtroMoneda=<?php echo $filtroMoneda; ?>filtroPresupuesto=<?php echo $filtroPresupuesto; ?>filtroInicio=<?php echo $filtroFechaInicio; ?>filtroHoraInicio=<?php echo $filtroHoraInicio; ?>filtroFechaCierre=<?php echo $filtroFechaCierre; ?>&filtroEstado=<?php echo $filtroEstado; ?>" class="btn btn-info btn-block">Generar Excel</a>
      </div>
    </div>
  </form>
</body>

</html>