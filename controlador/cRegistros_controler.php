<?php
    
    require_once('../modelo/conection_db.php');
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    
    session_start();
    $varsesion = $_SESSION['usuario'];
    $name = $_SESSION['usuario'];    
    $lastName = $_SESSION['apellido'];
    $escuela = $_SESSION['escuela'];
    $rol = $_SESSION['cod']; 
    $codigo = $_SESSION['id_school'];
    
    // var de datos ingresados en los registros
    $fecha = date('Y-m-d');
    $turno = $_POST['turno'];
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $horas = $_POST['horas'];
    $motivo = $_POST['motivo'];
    $firma = $name . ' ' . $lastName;
    
    if ($varsesion == null || $varsesion ='') {
        echo 'Usted no tiene autorizacion';
        ?> 
        <a href="../index.php">Iniciar Sesion</a>
        <?php 
                die();
    }
    $db = Conectar::conexion();

    $datosIns = $db->prepare("INSERT INTO `registro` ( `fecha`, `turno`, `cargo`, `nombre`, `horas`, `motivo`, `firma`, `id_user`, `id_school`) VALUES ( :fecha, :turno, :cargo, :nombre, :horas, :motivo, :firma, :id_user, :id_school)");
  
    $datosIns->bindParam(':fecha', $fecha);
    $datosIns->bindParam(':turno', $turno);
    $datosIns->bindParam(':cargo', $cargo);
    $datosIns->bindParam(':nombre', $nombre);
    $datosIns->bindParam(':horas', $horas);
    $datosIns->bindParam(':motivo', $motivo);
    $datosIns->bindParam(':firma', $firma);
    $datosIns->bindParam(':id_user', $rol);
    $datosIns->bindParam(':id_school', $codigo);
        

    if ($datosIns->execute()) {
        header('Location: ../vista/parteDiario.php?successful=true');
        
    }
    else {
        echo 'error al cargar los datos';
        echo '<a href="../vista/parteDiario.php">Volver atras</a>';

    }
    ?>
    