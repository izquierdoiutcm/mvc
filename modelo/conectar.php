<?php
    class Conectar{
        public static function conexion(){
            try{
                $conexion = new PDO('mysql:host=localhost; dbname=instituto;port=3306', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("SET CHARACTER SET UTF8");
            }catch(Exception $e){
               echo("Error al conectar " . $e->getMessage());
                echo "Linea del error " . $e->getLine();
            }
            return $conexion;
        }
    }
    //2023 Ing. Carlos R. Izquierdo G.