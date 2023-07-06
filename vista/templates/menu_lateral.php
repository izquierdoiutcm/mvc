<nav class="navbar  mt-3">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item text-center">
    <form method='post' action="../controlador/alumnos_controlador.php">
        <input type='image' src='imagenes/nuevo_alumno.png' value='Editar' title="Nuevo Alumno">
        <input type='hidden' name='accion' value="llamar_nuevo_alumno">
        <input type='hidden' name='id' value="0"><!-- lleva un id falso -->
    </form>
    </li>
   <!-- <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>-->
  </ul>

</nav>
