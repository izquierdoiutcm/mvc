<?php
include ('validar.php');
if (isset($_REQUEST['id'])) {
    $id = test_input($_REQUEST['id']);
    $accion = test_input($_REQUEST['accion']);

    switch ($accion) {
        case 'llamarEditar':
            llamarEditar($id);
            break;
        case 'actualizar_datos':
            $cedula = test_input($_POST['cedula']);
            $nombre = test_input(strtoupper($_POST['nombre']));
            $direccion = test_input(strtoupper(($_POST['direccion'])));
            actualizarDatosAlumno($id, $cedula, $nombre, $direccion);
            break;
        case 'llamarValidarEliminar':
            $cedula = test_input($_POST['cedula']);
            $nombre = test_input(strtoupper($_POST['nombre']));
            validarEliminar($id, $cedula, $nombre);
            break;
        case 'eliminar_alumno':
            $id = test_input($_POST['id']);
            eliminarAlumno($id);
            break;
        case 'llamar_nuevo_alumno':
            header('location:../vista/alumnos_new_view.php');
            break;
        case 'agregar_alumno':
            $cedula = test_input($_POST['cedula']);
            $nombre = test_input(strtoupper($_POST['nombre']));
            $direccion = test_input(strtoupper($_POST['direccion']));
            nuevoAlumno($cedula, $nombre, $direccion);
            break;
        case 'reactivar_alumno':
            $cedula = test_input($_POST['cedula']);
            reactivarAlumno($cedula);

    }
    
} else {
    //funciona para la primera carga luego del login
    require_once('../modelo/alumnos_modelo.php');
    $alumno = new Alumnos();
    $matrizAlumnos = $alumno->get_alumnos();
    header('location:../vista/alumnos_view.php');
}
//funciones
function llamarEditar($id)
{
    require_once('../modelo/alumnos_modelo.php');
    $alumno = new Alumnos();
    $datos = $alumno->get_alumno($id);
    include_once('../vista/alumnos_editar_view.php');
}
function actualizarDatosAlumno($id, $cedula, $nombre, $direccion)
{
    require_once('../modelo/alumnos_modelo.php');
    $alumno = new Alumnos();
    $exito = $alumno->update_alumnos($id, $cedula, $nombre, $direccion);
    if ($exito) {
        header('location:../vista/alumnos_view.php');
    }
}
function validarEliminar($id, $cedula, $nombre)
{
    $datos = array(
        'id' => $id,
        'cedula' => $cedula,
        'nombre' => $nombre
    );
    include_once('../vista/validar_eliminar_view.php');
}
function eliminarAlumno($id)
{
    require_once('../modelo/alumnos_modelo.php');
    $alumno = new Alumnos();
    $exito = $alumno->delete_alumnos($id);
    if($exito){
        header('location:../vista/alumnos_view.php'); 
    }

}
function nuevoAlumno($cedula, $nombre, $direccion){
    require_once('../modelo/alumnos_modelo.php');
    $alumno = new Alumnos();
    $exito = $alumno->insert_alumno($cedula, $nombre, $direccion);
    if($exito['exito'] == true){
        header('location:../vista/alumnos_view.php'); 
    }else{
        if($exito['activo'] == 1){
            header('location:../vista/alumnos_new_view.php?error=true&cedula=' . $cedula); 
        }else{
        header('location:../vista/alumnos_new_view.php?error=true&cedula=' . $cedula . "&activar=true"); 
        }
    }
}
function reactivarAlumno($cedula){
    require_once('../modelo/alumnos_modelo.php');
    $alumno = new Alumnos();
    $exito = $alumno->reactivar_alumnos($cedula);
    if($exito == true){
        header('location:../vista/alumnos_view.php'); 
    }

}
    //2023 Ing. Carlos R. Izquierdo G.