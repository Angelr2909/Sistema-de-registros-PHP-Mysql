<?php
    require_once('../modelo/conection_db.php');
    require_once('../modelo/Personal.php');
    require_once('../vista/register.php');
    
    $usuariosCargados = new Personal;
    
    $query = $usuariosCargados->get_usuarios($codigo);
    require_once('../vista/register.php');
    
?>
