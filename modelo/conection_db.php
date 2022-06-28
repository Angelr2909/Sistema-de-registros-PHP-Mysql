<?php


    require_once('config.php'); 

    class Conectar {
   
        public static function conexion(){
            
            try {
                $conexion = new PDO('mysql:host=localhost; dbname=db_registros', 'root', '');
            } 
            
            catch (Exception $e) {
                die('Error: '. $e);
            }
            return $conexion;
        }

    }
        
?>