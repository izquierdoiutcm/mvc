<?php
    include_once('validar.php');
    if(isset($_POST['accion'])){
        $accion = test_input($_POST['accion']);
        $id_alumno = test_input($_POST['id']);
        switch($accion){
            case 'ver_record':
                verRecordAlumno($id_alumno);
                break;
        }
    }
    function verRecordAlumno($id_alumno){
        include_once('../modelo/calificaciones_modelo.php');
        
        $calificaciones = new Calificaciones();
        $record = $calificaciones->consulta_record($id_alumno);

        //header('location:../vista/record_view.php');
        return $record;
    }