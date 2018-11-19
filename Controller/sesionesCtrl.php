<?php


class SesionesCtrl {
    
    public function iniciarSesion($email, $password) {
        $Sesiones = new Sesiones($email, $password);
        $loggedSucceded=$Sesiones->validarUsuario();

        switch ($loggedSucceded) {
            case 0:
                //echo $loggedSucceded.' Acceso concedido';
                header("Location: index.php?accion=listarProductos");
                break;
            case 1:
                //echo $loggedSucceded.' El usuario no existe';
                header("Location: index.php?sesionStatus=1");
                break;
            case 2:
                //echo $loggedSucceded.' La contraseña es incorrecta';
                header("Location: index.php?sesionStatus=2");
                break;
        }
    }

    public function cerrarSesion() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}
