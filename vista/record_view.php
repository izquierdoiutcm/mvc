<?php
    include('templates/header.php');
    $id = $_POST['id'];
    include_once('../controlador/calificaciones_controlador.php');
    $record =  verRecordAlumno($id);
?>
<div class='container-fluid'>
    <div class='row'>
        <div class='col-sm-2'>
            <tabla class="table table-striped table-bordered mt-5" style="width:100%">
        </div>
        <div class='col-sm-8' id=''>
            <div class="card bg-primary mt-3 text-center text-light">
                <h1> Record Académico del Estudiante</h1>
                <p>Departamento de Control de Estudios IUTCM Ext. Mérida</p>
            </div>
            <button class='btn btn-danger mt-5' onclick="window.location.assign('alumnos_view.php')">Regresar</button>
            <br>
            <thead>
                <tr>
                    <td class='p-4' colspan='4'>
                        <p class='h3 text-center'>Record Académico</p>
                    </td>
                </tr>
            </thead>
            </table>
            <table class='table mt-2' id='talumnos'>
                <thead>
                    <tr>
                        <td class='p-2'>Id</td>
                        <td class='p-2'>Código</td>
                        <td class='p-2'>Asignatura</td>
                        <td class='p-2'>Periodo Académico</td>
                        <td class='text-center p-2'>Calificación</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($record as $registro){?>
                    <tr>
                        <td><?=$registro["id"]?></td>
                        <td><?=$registro["codigo"]?></td>
                        <td><?=$registro["nombre"]?></td>
                        <td><?=$registro["periodo"]?></td>
                        <td><?=$registro["nota"]?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class='col-sm-2'></div>
    </div>
</div>


<?php    
    include('templates/footer.php');
?>
<!--2023 Ing. Carlos R. Izquierdo G.-->