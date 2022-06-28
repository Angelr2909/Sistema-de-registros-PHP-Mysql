<?php
    require_once('../modelo/validar_model.php');


    $user = new validarLogin();

    $usuario = ($_POST['user']) ;
    $password = ($_POST['password']);

    $fila=$user->get_usuarios($usuario, $password);


    /*si la fila se encuentra vacia 
    devuelve false y se comprueba la condicion que mandará un 
    fallo true, que le envia un mensaje al usuario que no se encontro el 
    usuario */
    if ($fila==false) {
        header ('Location:../index.php?fallo=true');
    }


    /*si la fila nos devuelve un array entonces en ese caso 
    pasara del if anterior y podremos recorrer el array con 
    foreach */
    foreach ($fila as $miArray) {

        echo $miArray['username'];
        echo $miArray['lastname'];

        /*se buscará comparar el array en la posición de id_cargo 
        para determinar si el usuario es administrador o 
        si es personal para poder redireccionar*/
        if ($miArray['id_cargo']==1) {

            session_start();
            $_SESSION['usuario']=$miArray['name'];
            $_SESSION['apellido']=$miArray['lastname'];
            $_SESSION['escuela']=$miArray['nombre_escuela'];
            $_SESSION['rol']='Administrador';
            $_SESSION['cod']=$miArray['id_cargo'];
            $_SESSION['id_school']=$miArray['id_school'];

            header ('location: ../vista/administrador.php');
        }
        else {
            session_start();
            $_SESSION['usuario']=$miArray['name'];
            $_SESSION['apellido']=$miArray['lastname'];
            $_SESSION['escuela']=$miArray['nombre_escuela'];
            $_SESSION['rol']='Personal';
            $_SESSION['cod']=$miArray['id_cargo'];
            $_SESSION['id_school']=$miArray['id_school'];

            header ('location: ../vista/parteDiario.php');
        }
    }

?>