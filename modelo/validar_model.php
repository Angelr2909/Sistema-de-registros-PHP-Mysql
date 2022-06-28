<?php

    class validarLogin{


        private $db;
        private $usuario;

        public function __construct(){
            
            require_once ('conection_db.php');

            $this->db=Conectar::conexion();

            $this->usuario=array();

        }

        // metodo para validar un login comprobando si
        // existe un usuario y si coincide con la contraseña
        public function get_usuarios( $usuario, $password){

            $sql="SELECT * FROM user WHERE email='$usuario' and password = '$password'";
            $consulta = $this->db->query($sql);
            $rows = $consulta->rowCount();

            if ($rows == 0) {
                return false;
            }
            else {
                $datos = $consulta->fetch(PDO::FETCH_ASSOC);
                $this->usuario[]=$datos;
                return $this->usuario;
            }
        }

        // metodo para corroborar si existe un usuario en la base de datos
        public function get_usuarioExiste($email){
            
            $sql="SELECT * FROM user WHERE email='$email'";
            $consulta = $this->db->query($sql);
            $rows = $consulta->rowCount();

            if ($rows > 0 ) {
                return true;
            }
            else {
                return false;
            }
        }



    }

?>