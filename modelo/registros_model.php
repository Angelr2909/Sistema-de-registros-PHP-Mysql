<?php

    require_once ('conection_db.php');
    
    class Registros extends Conectar{

        private $db;
        private $registro;


        public function __construct(){
            
            $this->db=Conectar::conexion();

            $this->registro=array();
        }

        // devuelve los registros de la base de datos solicitados 
        // por el ADMINISTRADOR
        public function get_registros($idschool){
            
            // consulta de registros 

            $sql = "SELECT * FROM registro WHERE id_school = $idschool ";
            $consulta = $this->db->query($sql);

            while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->registro[]=$datos;
            }
            
            return $this->registro;

        }



    }





?>