<?php
    include('templates/header.php');
    
?>
 <div class='row'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8'>
<div class="card bg-primary mt-3 text-center text-light">
  <h1> Modificar Datos Personales Alumnos</h1>
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
    <input type="text" class="form-control" value="<?=$datos['nombre']?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" value="<?=$datos['direccion']?>" name="direccion" required>
  </div>
  <input type="hidden" class="form-control" name='accion' value='actualizar_datos' required>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Modificar</button>
    <button type="button" class="btn btn-danger" onclick="history.back()">Regresar</button>
  </div>
</form>
</div>
<div class='col-sm-2'></div>
</div>

<!--2023 Ing. Carlos R. Izquierdo G.-->