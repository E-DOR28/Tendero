<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        if((string)filter_input(INPUT_GET,'sesionStatus')=="1"){
            echo "El usuario no existe";
        } else if ((string)filter_input(INPUT_GET,'sesionStatus')=="2") {
            echo "La contraseña es incorrecta";
        }
        ?>
    </body>
</html>
