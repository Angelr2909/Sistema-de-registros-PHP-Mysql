<?php

    require_once('../modelo/conection_db.php');
    
    require_once('../modelo/registros_model.php');
    
    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $acceso = new Registros;

    $registros = $acceso->get_registros($codigo);
    require_once('../vista/administrador.php');


?>