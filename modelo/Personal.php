<?php
require_once('conection_db.php');

class Personal extends Conectar{
    private $db;
    private $usuarios;
    
    
    
    public function __construct(){
  

        $this->db=Conectar::conexion();

        $this->usuarios=array();
    }

    // metodo para insertar usuarios desde el administrador
    public function set_usuarios($email, $pass, $name, $lastname, $id_school, $school){
        $sql="INSERT INTO `user` (`email`, `password`, `name`, `lastname`, `id_cargo`, `id_school`, `nombre_escuela`) VALUES ( :email, :pass, :nameU, :lastname, 2 ,:id_school, :school )";
        $sentencia = $this->db->prepare($sql);
        
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('pass', $pass);
        $sentencia->bindParam('nameU', $name);
        $sentencia->bindParam('lastname', $lastname);
        $sentencia->bindParam('id_school', $id_school);
        $sentencia->bindParam('school', $school);

        $sentencia->execute();

    }

    // metodo para recuperar usuarios para el administrador
    public function get_usuarios($id_school){

        $sql = "SELECT * FROM user WHERE id_school = $id_school AND id_cargo=2";
        $consulta = $this->db->query($sql);

        while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->usuarios[]=$datos;
        }
        
        return $this->usuarios;
    
    }

    public function delete_Usuarios($email){

        $sql = "DELETE FROM user WHERE email = '$email'";
        $sentencia = $this->db->prepare($sql);
        
        return $sentencia->execute();

    }

    // public function set_usuarios(){

    // }
    
    
}



?>