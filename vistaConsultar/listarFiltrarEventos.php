<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Suplos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Lista de Eventos/Procesos</h1>

    <?php include("../includes/filtroProcesoEvento.php"); ?>

    <div class="text-left mb-5">
      <a href="../index.php" class="btn btn-dark btn-sm float-right">Volver</a>
    </div>

    <table class="table table-bordered" id="tablaEventos">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Ronda</th>
          <th scope="col">Objeto</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Cierre</th>
          <th scope="col">Estado</th>
          <th scope="col">Responsable Evento</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("../database/conexionBD.php");
        $listado = "SELECT * FROM procesos";
        $resultado = $db->query($listado);

        $contador = 1;
        while ($lista = $resultado->fetch(PDO::FETCH_ASSOC)) {
          echo '<tr>';
          echo '<td>' . $lista['id'] . '</td>';
          echo '<th scope="row">' . $contador . '</th>';
          echo '<td>' . $lista['proc_objeto'] . '</td>';
          echo '<td>' . $lista['proc_descripcion'] . '</td>';
          echo '<td>' . $lista['proc_fecha_inicio'] . '</td>';
          echo '<td>' . $lista['proc_fecha_fin'] . '</td>';
          echo '<td>' . $lista['proc_estado'] . '</td>';
          echo '<td>' . $lista['proc_nombre_responsable'] . '</td>';
          echo '<td>';
          echo '<a href="editarConsultar.php?id= ' . $lista['id'] . '" class="btn btn-info btn-sm">Editar</a>';
          echo '<a href="eliminarConsultar.php?id=' . $lista['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este evento?\')">Eliminar</a>';
          echo '</td>';
          echo '</tr>';
          $contador++;
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>