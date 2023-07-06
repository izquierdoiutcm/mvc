<?php
    include('templates/header.php');
    
?>
<div class='row'>
    <div class='col-sm-2'></div>
    <div class='col-sm-8'>
        <div class="card bg-primary mt-3 text-center text-light">
            <h1>Ingresar Nuevo Alumno Al Sistema</h1>
            <p>Departamento de Control de Estudios IUTCM Ext. Mérida</p>
        </div>
        <form action="../controlador/alumnos_controlador.php" autocomplete='off' method='post' class='form mt-2'>
            <div class="form-group">
                <label for="cedula">Número de Cédula:</label>
                <input type="text" class="form-control" value="" name="cedula" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" class="form-control" value="" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" value="" name="direccion" required>
            </div>
            <input type="hidden" class="form-control" name='accion' value='agregar_alumno' required>
            <input type="hidden" class="form-control" name='id' value='0' required>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Procesar</button>
                <button type="button" class="btn btn-danger"
                    onclick="window.location.assign('alumnos_view.php')">Regresar</button>
            </div>
        </form>
        <?php if(isset($_GET['error'])){?>

        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= "La cédula " . $_GET['cedula'] . " ya existe en el sistema";?>
        </div>
        <div>
            <?php if(isset($_GET['activar'])){?>
            <form method='post' action='../controlador/alumnos_controlador.php'>
                <input type="hidden" class="form-control" name='accion' value='reactivar_alumno' required>
                <input type="hidden" class="form-control" name='id' value='0' required>
                <input type="hidden" class="form-control" name='cedula' value='<?=  $_GET['cedula'] ?>' required>
                <input type="submit" class="btn btn-primary" value='Reactivar en el Sistema'>
            </form>
            <?php }?>
        </div>

    </div>
    <?php } ?>
</div>

<div class='col-sm-2'></div>
</div>

<!--2023 Ing. Carlos R. Izquierdo G.-->