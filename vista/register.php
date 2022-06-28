<?php


    session_start();
    $varsesion = $_SESSION['usuario'];
    $name = $_SESSION['usuario'];    
    $lastName = $_SESSION['apellido'];
    $escuela = $_SESSION['escuela'];
    $rol = $_SESSION['cod']; 
    $codigo = $_SESSION['id_school'];


    // alta de personal para cargar registros

    
    
    if (isset($_POST['env'])) {
        
        require_once('../modelo/validar_model.php');
        
        $comprobacion = new validarLogin();
        $email=$_POST['email'];
        
        $fila=$comprobacion->get_usuarioExiste($email);
        
        if ($fila==false) {
            
            require_once('../modelo/conection_db.php');
            require_once('../modelo/Personal.php');
            require_once('../vista/register.php');
            
            $pass=$_POST['pass'];
            $name=$_POST['nombre'];
            $lastname=$_POST['apellido'];
            $id_school= $codigo;
            $school= $escuela;
            
            $carga = new Personal;
            $carga->set_usuarios($email, $pass, $name, $lastname, $id_school, $school);
    
            header('Location:register.php');
        }
        else {
            header('Location:register.php?usuarioexistente=true');
        }   
    }


    // eliminacion de personal del registro de alta
    if (isset($_GET['user'])) {

        require_once('../modelo/conection_db.php');
        require_once('../modelo/Personal.php');
        require_once('../vista/register.php');
    
    
        $user=$_GET['user'];
    
        $delete = new Personal;
    
        $delete->delete_Usuarios($user);
    
        header('Location:register.php');
    }
    
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- estilos  -->
    <link rel="stylesheet" href="/node_modules/normalize.css/normalize.css" />

    <!-- font awesome  -->
    <script src="https://kit.fontawesome.com/7dbd50798d.js" crossorigin="anonymous"></script>

    <!-- <script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Bootstrap  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- bootstrap icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    <title>Registrarse</title>
</head>

<body>

    <div class="container-fluid bg-dark sticky-top">
        <!-- barra de navegacion  -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark border-3 border-bottom border-primary">
            <div class="container">
                <p href="" class="navbar-brand m-0"><?php echo $_SESSION['escuela']?> - Administrador</p>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="MenuNavegacion" class="collapse navbar-collapse ms-auto">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item "><a class="nav-link me-3 active" href="administrador.php">Registros</a>
                        </li>
                        <li class="nav-item"><a class="btn btn-outline-light"
                                href="../controlador/cerrar_sesion.php">Cerrar Sesión</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>

        <div class="container">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4 class="text-center m-4">Cargar nuevo personal</h4>
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="needs-validation" id="formulario">

                <div class="row m-auto">

                    <div class="col-lg-6 m-auto">

                        <label for="nombre" class="form-label mt-4">Nombre</label>
                        <input type="text" maxlength='30' name="nombre" class="form-control" placeholder="Ingrese el nombre...">

                        <label for="apellido" class="form-label mt-4">Apellido</label>
                        <input type="text" maxlength='30' name="apellido" class="form-control" placeholder="Ingrese apellido...">

                        <label for="email" maxlength='50' class="form-label mt-4">Correo electronico</label>
                        <input type="email" name="email" class="form-control" placeholder="mailejemplo@mail.com">
                        <div class="invalid-feedback">
                            Ingrese un correo electrónico válido
                        </div>

                        <label for="pass" class="form-label mt-4">Contraseña</label>
                        <input id="password1" type="password" maxlength='16' name="pass" class="form-control"
                            placeholder="ingrese una contraseña entre 8 y 16 dígitos." required>

                        <label for="pass2" class="form-label mt-4">Repetir contraseña</label>
                        <input id="password2" type="password" maxlength='16' name="pass2"class="form-control"
                            placeholder="Repita la contraseña." required>

                            <?php
                            if(isset($_GET["usuarioexistente"]) && $_GET["usuarioexistente"] == 'true')
                            {
                                echo '<div class="alert alert-danger d-block text-center" role="alert">
                                Usuario ya registrado.
                            </div>';
                            }
                             ?>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col m-auto text-center">
                        <button  class="btn btn-primary" type="submit" name="env">Agregar</button>
                    </div>
                </div>

            </form>
            <div class="row py-3">
            </div>
            <div class="col-lg-6 m-auto ">

            <div class="text-center">USUARIOS REGISTRADOS</div>

                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                            require_once('../controlador/register_controler.php');
                            foreach ($query as $user):?>
                                <tr>
                                    <td><?php echo ($user['name']) ?></td>
                                    <td><?php echo $user['lastname'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td > <a onclick="return confirm('Estás seguro que deseas eliminar el correo?')" href="register.php?user=<?php echo $user['email'] ?>" class="text-danger"> <i class="bi bi-trash-fill"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
    </main>
    <script src="../controlador/altapersonal_controler.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>