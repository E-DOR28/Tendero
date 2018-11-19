<?php

class Sesiones {
  
    private $email;
    private $pass;
    
    public function __construct($email, $password) {
        $this->email=$email;
        $this->pass=$password;
    }
    
    public function validarUsuario(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT * FROM tblusuario WHERE UsEmail='".$this->email."' AND UsEstado=0";
            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows > 0) {
                    while ($objRes=$resultado->fetch_object()){
                        if ($this->pass==$objRes->UsPassword) {
                            $loginAllowed = 0;
                            session_start();

                            $_SESSION["user_id"] = $objRes->UsUser;
                            $_SESSION["user_rol"] = $objRes->UsRol;
                            $_SESSION["user_email"] = $objRes->UsEmail;
                        } else {
                        //La Contraseña es incorrecta
                        $loginAllowed = 2;
                        }
                    }
                } else {
                    //El usuario no existe
                    $loginAllowed = 1;
                }
            }

        $conexion->cerrar();
        return $loginAllowed;

        }
    
    }

}
