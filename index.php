<?php
require_once 'CtrlProceso/ctrlActualizarEstado.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PROCESOS/EVENTOS</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-buscar {
            background-color: orange;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">PROCESOS/EVENTOS</h1>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a href="./vistaProcesos/crearProceso.php" class="btn btn-primary btn-sm mr-2">
                    <i class="material-icons">add_circle</i> Crear
                </a>
                <a href="#" class="btn btn-warning btn-sm mr-2">
                    <i class="material-icons">content_copy</i> Copiar
                </a>
                <a href="./vistaConsultar/listarFiltrarEventos.php" class="btn btn-buscar btn-sm">
                    <i class="material-icons">search</i> Consultar
                </a>
            </div>
        </div>
    </div>
</body>
</html>
