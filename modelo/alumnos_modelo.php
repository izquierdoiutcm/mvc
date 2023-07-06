<?php   
    class Alumnos{
        private $conexion;
        private $alumnos;

        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
            $this->alumnos = array();
        }

        public function get_alumnos(){
            $sql = 'SELECT id, cedula, nombre FROM alumnos WHERE activo = 1';
            $st = $this->conexion->prepare($sql);
            $st->execute();
            $alumnos = $st->fetchAll();           
            $st = NULL;
            $conexion = NULL;
            return $alumnos;
        }  
        function get_alumno($id){
            $sql = 'SELECT id, cedula, nombre, direccion FROM alumnos WHERE id= ? && activo = 1';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $alumno = $st->fetch(PDO::FETCH_ASSOC);
            $st = NULL;
            $conexion = NULL;
            return $alumno;
        } 
        function consultarAlumnoCedula($cedula){
            $sql = 'SELECT id, cedula, nombre FROM alumnos WHERE cedula= ? && activo = 1 ';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $cedula);
            $st->execute();
            $alumno = $st->fetch(PDO::FETCH_ASSOC);
            $st = NULL;
            $conexion = NULL;
            return $alumno;
        } 
        function consultarAlumnoCedulaTodos($cedula){
            $sql = 'SELECT id, cedula, nombre, activo FROM alumnos WHERE cedula= ? ';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $cedula);
            $st->execute();
            $alumno = $st->fetch(PDO::FETCH_ASSOC);
            $st = NULL;
            $conexion = NULL;
            return $alumno;
        } 
        function update_alumnos($id, $ced, $nom, $dir){
            $exito = false;
             $sql = 'UPDATE alumnos set nombre = ?, direccion = ? WHERE id = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $nom);
            $st->bindParam(2, $dir);
            $st->bindParam(3, $id);
            if($st->execute()){
                $exito = true;
            }
            $st = NULL;
            $conexion = NULL;           
           return $exito;
        }
        function delete_alumnos($id){
            $exito = false;
            $sql = 'UPDATE alumnos set activo = 0 WHERE id = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $id);
            if($st->execute()){
                $exito = true;
            }
            $st = NULL;
           $conexion = NULL;           
            return $exito; 
        }
        function insert_alumno($cedula, $nombre, $direccion){
            $exito = array(
                'exito' => false,
                'activo' => 0
            );
            $alumno = $this->consultarAlumnoCedulaTodos($cedula);
            if(!isset($alumno['cedula'])){                
                $sql = 'INSERT INTO alumnos (cedula, nombre, direccion) VALUES (?,?,?)';
                $st  = $this->conexion->prepare($sql);
                $st->bindParam(1, $cedula);
                $st->bindParam(2, $nombre);
                $st->bindParam(3, $direccion);
                if($st->execute()){
                    $exito['exito'] = true;
                    $exito['activo'] = 1;
                }                
            }else{
                $exito['exito'] = false;
                $exito['activo'] = $alumno['activo'];
            }     
            $st = NULL;
            $conexion = NULL;     
            return $exito; 
        }
        function reactivar_alumnos($ced){
            $exito = false;
             $sql = 'UPDATE alumnos set activo = 1 WHERE cedula = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $ced);
            if($st->execute()){
                $exito = true;
            }
            $st = NULL;
            $conexion = NULL;           
           return $exito;
        }
    }
//2023 Ing. Carlos R. Izquierdo G.