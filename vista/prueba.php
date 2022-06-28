<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <main>
        <?php
    require_once('../modelo/Personal.php');
            $dato = new Personal;
            $matrizUsuario = $dato->get_usuarios(62210307);
            foreach ($matrizUsuario as $registro) {
                echo $registro['name'];
            }
        
        ?>
    </main>
</body>
</html>