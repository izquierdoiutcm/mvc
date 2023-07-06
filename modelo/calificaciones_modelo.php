<?php
    class Calificaciones{
        private $conexion;
        private $calificaciones;

        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
        }
        public function consulta_record($cedula){
            $sql = 'SELECT cedula, codigo, periodo, nota FROM calificaciones WHERE cedula = ? order by codigo, periodo';
            $st = $this->conexion->prepare($sql);
            $st->bindParam(1, $cedula);
            $st->execute();
            $calificaciones = $st->fetch(PDO::FETCH_ASSOC);
            return $calificaciones;
        }
    }

    //2023 Ing. Carlos R. Izquierdo G.