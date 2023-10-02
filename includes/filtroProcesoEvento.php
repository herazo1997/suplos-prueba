<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suplos</title>
</head>

<body>
  <form method="" action="" id="formularioFiltros">
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
        <button type="button" class="btn btn-info btn-block" id="filtrar">Buscar</button>
      </div>
      <div class="form-group col-md-2">
        <a href="../includes/generarExel.php" class="btn btn-info btn-block">Generar Excel</a>
      </div>
    </div>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#filtrar").click(function(event) {
        event.preventDefault();
        $("#filtrar").val(true);
        $.ajax({
          url: "../includes/filtrarEventosAjax.php",
          type: "POST",
          dataType: "json",
          data: {
            filtroId: $("#filtroId").val(),
            filtroObjeto: $("#filtroObjeto").val(),
            filtroEstado: $("#filtroEstado").val(),
            filtroResponsable: $("#filtroResponsable").val()
          },
          success: function(datos) {
            mostrarResultadosFiltrados(datos);
          }
        });
      });
    });
  </script>
</body>

</html>