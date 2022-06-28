<?php


    session_start();
    $varsesion = $_SESSION['usuario'];
    $name = $_SESSION['usuario'];    
    $lastName = $_SESSION['apellido'];
    $escuela = $_SESSION['escuela'];
    $rol = $_SESSION['cod']; 
    $codigo = $_SESSION['id_school'];

    
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
    <script src="/app.js"></script>

    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">


    <title>Administrador</title>
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
                        <li class="nav-item "><a class="nav-link me-3 active" href="../vista/register.php">Agregar Personal</a>
                        </li>
                        <li class="nav-item"><a class="btn btn-outline-light" href="../controlador/cerrar_sesion.php">Cerrar Sesión</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <main>

        <div class="container">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4 class="text-center m-4">Registros </h4>
            </div>

            <div class="row py-3">
                <div class="col">

                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Horas</th>
                                <th>Motivo</th>
                                <th>Firma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                        require_once('../controlador/administrador_controler.php');
                                        foreach ($registros as $registro ) {
                                            echo '<tr><td>'. $registro['id'] . '</td>'; 
                                            echo '<td>'. $registro['fecha'] . '</td>'; 
                                            echo '<td>'. $registro['nombre'] . '</td>'; 
                                            echo '<td>'. $registro['cargo'] . '</td>'; 
                                            echo '<td>'. $registro['horas'] . '</td>'; 
                                            echo '<td>'. $registro['motivo'] . '</td>'; 
                                            echo '<td>'. $registro['firma'] . '</td></tr>'; 
                                        }
                                    ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
</body>

</html>