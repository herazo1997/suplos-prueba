<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Suplos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/proceso.css">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-left">Crear Procesos</h2>

    <div class="col-md-12 text-center" style="margin-top: 15px;">
      <a href="../index.php" class="btn btn-dark btn-sm float-right">Volver</a>
    </div>
    <div class="col-md-11 text-left" style="margin-top: 15px;">
      <a href="../vistaDocumento/crearcontenido.php" class="btn btn-secondary btn-sm float-right">Documentacion Peticion de Ofertas</a>
    </div>

    <div class="row mt-3">
      <div class="col-md-12 text-left">
        <button type="button" class="btn btn-secondary btn-sm active" id="mostrarInformacionBasicaBtn">Información Básica</button>
        <button type="button" class="btn btn-secondary btn-sm" id="mostrarCronogramaBtn">Cronograma</button>
      </div>
    </div>
    <hr>

    <form action="../CtrlProceso/controladorProceso.php" method="POST">
      <div class="row">
        <div class="col-md-10">
          <div id="informacionBasicaSection">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="objeto" class="wide-label">Objeto(*)</label>
                  <input type="text" class="form-control" id="objeto" name="objeto" required>
                </div>
                <div class="col-md-6">
                  <label for="actividad" class="wide-label">Actividad(*)</label>
                  <select class="form-control" id="actividad" name="actividad" required>
                    <option>Seleccionar</option>
                    <?php
                    include('../database/conexionBD.php');
                    $query = "SELECT id, nombre_segmento FROM actividades";
                    $stmt = $db->query($query);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo '<option value="' . $row['id'] . '">' . $row['nombre_segmento'] . '</option>';
                    }
                    ?>

                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="descripcion">Descripción(*)</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <label for="objeto" class="wide-label">Nombre Responsable(*)</label>
              <input type="text" class="form-control" id="nombreResponsable" name="nombreResponsable" required>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="moneda">Moneda(*)</label>
                  <select class="form-control" id="moneda" name="moneda" required>
                    <option>Selecionar</option>
                    <option value="COP">COP</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="presupuesto">Presupuesto(*)</label>
                  <input type="number" step="0.01" class="form-control" id="presupuesto" name="presupuesto" required>
                  <input type="hidden" class="form-control" id="estado" name="estado">
                </div>
              </div>
            </div>
          </div>

          <div id="cronogramaSection" style="display: none;">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="fechainicio">Fecha de Inicio(*)</label>
                  <input type="date" class="form-control" id="fechainicio" name="fechainicio" required>
                </div>
                <div class="col-md-6">
                  <label for="horainicio">Hora de Inicio(*)</label>
                  <input type="time" class="form-control" id="horainicio" name="horainicio" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="fechafin">Fecha de Fin(*)</label>
                  <input type="date" class="form-control" id="fechafin" name="fechafin" required>
                </div>
                <div class="col-md-6">
                  <label for="horafin">Hora de Fin(*)</label>
                  <input type="time" class="form-control" id="horafin" name="horafin" required>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row mt-3">
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-info">Guardar Proceso</button>
        </div>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Función para mostrar la sección de Información Básica y ocultar Cronograma
    document.getElementById("mostrarInformacionBasicaBtn").addEventListener("click", function() {
      document.getElementById("informacionBasicaSection").style.display = "block";
      document.getElementById("cronogramaSection").style.display = "none";

      // Cambiar el estado activo de los botones
      document.getElementById("mostrarInformacionBasicaBtn").classList.add("active");
      document.getElementById("mostrarCronogramaBtn").classList.remove("active");
    });

    // Función para mostrar la sección de Cronograma y ocultar Información Básica
    document.getElementById("mostrarCronogramaBtn").addEventListener("click", function() {
      document.getElementById("cronogramaSection").style.display = "block";
      document.getElementById("informacionBasicaSection").style.display = "none";

      // Cambiar el estado activo de los botones
      document.getElementById("mostrarCronogramaBtn").classList.add("active");
      document.getElementById("mostrarInformacionBasicaBtn").classList.remove("active");
    });
  </script>
</body>

</html>