
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/meidlogo.ico" type="image/x-icon" />

    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- estilos  -->
    <link rel="stylesheet" href="/vista/style2.css" />
    <link rel="stylesheet" href="/node_modules/normalize.css/normalize.css" />

    <!-- font awesome  -->
    <script src="https://kit.fontawesome.com/7dbd50798d.js" crossorigin="anonymous"></script>

    <!-- <script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/app.js"></script>

    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">



    <title>Ingresar</title>
</head>

<body>

    <main class="content-login">
        <div class="col2">
            <img src="img/anotador/3014271.jpg" alt="" />
        </div>
        <div class="col1">

            <!-- inicio del formulario  -->
            <form action="controlador/validar_controler.php" method="post">
                <div class="welcome">
                    <h1>Parte Diario</h1>
                    <h2>MeidClass()</h2>
                </div>

                <label class="login" for="user">Usuario</label>
                <input class="login" type="text" placeholder="@email" name="user" />

                <label class="login" for="password">Contraseña</label>
                <div class="password">
                    <input class="login" maxlength="16" type="password" name="password" placeholder="******"
                        id="pass" />
                    <i class="fa-solid fa-eye" id="show"></i>
                </div>

                <div class="label">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember">Recordar contraseña</label>

                </div>

                <div class="content-btn">
                    <input class="btn" type="submit" value="Entrar">
                    <a class="btn" name="register.php" href="vista/register.php">Registrate</a>

                </div>
                
                <div class="pass">

                    
                    <div class="msj-error">
                        <?php
                            if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                            {
                                echo '<div class="alert alert-danger d-block text-center" role="alert">
                                Usuario o contraseña incorrecto.
                            </div>';
                            }
                        ?>
                    </div>
                    <a href="#">¿Olvidaste tu clave?</a>
                </div>

            </form>
        </div>
    </main>
</body>

</html>