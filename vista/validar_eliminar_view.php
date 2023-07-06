<?php
    include('templates/header.php');
?>
 <div class='row'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8' id='panel_mostrar'>
<div class="card bg-primary mt-3 text-center text-light">
  <h1 >Eliminar Alumno del Sistema</h1>
  <p>Departamento de Control de Estudios IUTCM Ext. Mérida</p>
</div>
<form action="../controlador/alumnos_controlador.php" autocomplete='off' method='post'>
<div class="form-group">
    <label for="id">Alumno ID:</label>
    <input type="text" class="form-control" placeholder="<?=$datos['id']?>" value="<?=$datos['id']?>" name="id" readonly>
  </div>
  <div class="form-group">
    <label for="cedula">Número de Cédula:</label>
    <input type="text" class="form-control" value="<?=$datos['cedula']?>" name="cedula" readonly>
  </div>
  <div class="form-group">
    <label for="nombre">Nombre Completo:</label>
    <input type="text" class="form-control" value="<?=$datos['nombre']?>" name="nombre" readonly>
  </div>
  <input type="hidden" class="form-control" name='accion' value='eliminar_alumno' required>
  <div class="form-group">
    <label for="nombre">Confirme eliminar:</label>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Eliminar</button>
    <button type="button" class="btn btn-danger" onclick="history.back()">Regresar</button>
  </div>
</form>
</div>
<div class='col-sm-2'></div>
</div>