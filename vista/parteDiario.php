<?php


    // Inicio de sesion abierta de usuario 
    session_start();
    $varsesion = $_SESSION['usuario'];
    $name = $_SESSION['usuario'];    
    $lastName = $_SESSION['apellido'];
    $escuela = $_SESSION['escuela'];
    $rol = $_SESSION['rol'];
    $codigo = $_SESSION['cod'];

    if ($varsesion == null || $varsesion ='') {
        echo 'Usted no tiene autorizacion';
        ?>
        <a href="../index.php">Iniciar Sesion</a>
        <?php 
                die();
    }

?>

<!-- documento html -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">


    <title>Parte Diario</title>
</head>

<body>
    <nav>
        <div class="cont-nav">
            <h2>Bienvenido <?php echo $_SESSION['usuario']?></h2>
            <a href="../controlador/cerrar_sesion.php">Cerrar sesión</a>
        </div>

    </nav>

    <main>
        <div class="msj-error">
            <?php
                    if(isset($_GET["successful"]) && $_GET["successful"] == 'true')
                    {
                        echo '<div class="alert alert-success d-block text-center" role="alert">
                        Datos cargados correctamente.
                    </div>';
                    }
                ?>
        </div>

        <div class="cont-register">
            <form action="../controlador/cRegistros_controler.php" method="post">

                <div class="col1">

                    <!-- seleccion de turno  -->
                    <label for="turno">Turno</label>
                    <select name="turno" id="turno">
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>

                    <!-- nombre del ausente  -->
                    <label for="nombre">Ausente </label>
                    <input type="text" name="nombre" maxlength="40">

                    <!-- cargo del ausente  -->
                    <label for="cargo">Cargo</label>
                    <select name="cargo" id="cargo">
                        <option value="Sin Ausentes">Sin Ausentes</option>
                        <option value="Preceptor/a">Preceptor/a</option>
                        <option value="Docente">Docente</option>
                        <option value="Coordinador/a">Coordinador/a</option>
                        <option value="Secretario/a">Secretario/a</option>
                        <option value="Directivo">Directivo</option>
                    </select>


                </div>

                <div class="col2">

                    <!-- cantidad de horas que la persona trabaja en la institucion  -->
                    <label for="horas">Horas</label>
                    <select name="horas" id="horas">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>

                    <label for="motivo">Motivo</label>
                    <input maxlength="150" name="motivo" id="motivo"></input>

                    <label for="firma">Firma</label>
                    <input name="firma" type="text" maxlength="40" readonly="readonly"
                        value="<?php echo ($name. " ". $lastName) ?>">

                </div>

                <div class="col3">
                    <input class="btn" type="submit" value="Cargar">
                </div>
            </form>


        </div>
    </main>

</body>

</html>