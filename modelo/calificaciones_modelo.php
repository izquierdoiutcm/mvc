<?php
    class Calificaciones{
        private $conexion;
        private $calificaciones;

        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
        }
        public function consulta_record($id_alumno){
            $sql = 'SELECT c.id, c.cedula, c.codigo, a.nombre , c.periodo, c.nota
                    FROM calificaciones c
                    LEFT JOIN asignaturas a on a.codigo = c.codigo
                    WHERE id_alumno = ? order by c.codigo, c.periodo';
            $st = $this->conexion->prepare($sql);
            $st->bindParam(1, $id_alumno);
            $st->execute();
            $record = $st->fetchAll(PDO::FETCH_ASSOC);
            $st = NULL;
            $conexion = NULL;
            return $record;
        }
    }

    //2023 Ing. Carlos R. Izquierdo G.