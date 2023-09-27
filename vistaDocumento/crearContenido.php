<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Suplos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Documentos</h1>
        <div class="text-left mb-3">
            <a href="crearDocumento.php" class="btn btn-info btn-sm">AGREGAR CONTENIDO</a>
            <a href="../vistaProcesos/crearProceso.php" class="btn btn-dark btn-sm float-right">Volver</a>
            
        </div>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include ("../database/conexionBD.php");
                $listado = "SELECT * FROM documentos";
                $resultado = $db->query($listado);

                $contador = 1;
                while ($lista = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $contador . '</th>';
                    echo '<td>' . $lista['titulo_docu'] . '</td>';
                    echo '<td>' . $lista['descripcion_docu'] . '</td>';
                    echo '<td>';
                    echo '<a href="editarDocumento.php?id= ' . $lista['id'] . ' &tit=' .$lista['titulo_docu']. ' &desc=' .$lista['descripcion_docu']. '" class="btn btn-info btn-sm">Editar</a>';
                    echo '<a href="eliminarDocumento.php?id=' . $lista['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este evento?\')">Eliminar</a>';
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
