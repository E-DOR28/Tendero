<?php

class Empleados {

    public function crearUsuario($rol, $email, $pass){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
        	session_start();
            
            $sql="INSERT INTO tblusuario (UsRol, UsEmail, UsPassword) 
            VALUES (
			        '".$rol."',
			        '".$email."',
			        '".$pass."'
        	)";
			if ($conn->query($sql) === TRUE) {
			    $last_id = $conn->insert_id;
			} else {
				$last_id = null;
			}

            $conexion->cerrar();
            return $last_id;

        }
    
    }

    public function crearEmpleado($userId, $nombre, $cc, $telefono, $direccion, $email){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            session_start();
            
            $sql="INSERT INTO tblempleado (TblUsuario_UsUser, TblAdministrador_AdmId, EmpCedula, EmpNombre, EmpDireccion, EmpTelefono, EmpEmail) 
            VALUES (
                    '".$userId."',
                    '".$_SESSION["user_id"]."',
                    '".$cc."',
                    '".$nombre."',
                    '".$direccion."',
                    '".$telefono."',
                    '".$email."'
            )";
            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = null;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function crearAdmin($userId, $nombre, $cc, $telefono, $direccion, $email){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            
            $sql="INSERT INTO tbladministrador (TblUsuario_UsUser, AdmCedula, AdmNombre, AdmTelefono, AdmDireccion, AdmEmail) 
            VALUES (
                    '".$userId."',
                    '".$cc."',
                    '".$nombre."',
                    '".$telefono."',
                    '".$direccion."',
                    '".$email."'
            )";
            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = null;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }


    public function modificarUsuario($empId, $email){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="UPDATE tblusuario SET UsEmail='".$email."' WHERE UsUser='".$empId."'";

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = null;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }


    public function modificarEmpleado($empId, $nombre, $cc, $telefono, $direccion, $email, $rol){
        $conexion = new Conexion();
        $conn = $conexion->abrir();


        if (!!$conn) {

            if ($rol==0) {
                $sql="UPDATE tblempleado SET 
                EmpNombre='".$nombre."', 
                EmpCedula='".$cc."', 
                EmpTelefono='".$telefono."',
                EmpDireccion='".$direccion."', 
                EmpEmail='".$email."' WHERE TblUsuario_UsUser=".$empId;
            } else {
                $sql="UPDATE tbladministrador SET 
                AdmNombre='".$nombre."', 
                AdmCedula='".$cc."', 
                AdmTelefono='".$telefono."',
                AdmDireccion='".$direccion."', 
                AdmEmail='".$email."' WHERE TblUsuario_UsUser=".$empId;
            }

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = null;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }



    public function verEmpleado($empId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT U.UsRol, U.UsUser, E.*, A.*
                FROM tblusuario U
                INNER JOIN tblempleado E
                INNER JOIN tbladministrador A
                ON E.TblUsuario_UsUser=U.UsUser || A.TblUsuario_UsUser=U.UsUser 
                WHERE U.UsUser=".$empId." GROUP BY UsUser";
            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $resultado = null;
                }
            }

            $conexion->cerrar();
            return $resultado;

        }
    
    }

    public function eliminarEmpleado($empId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="UPDATE tblusuario SET UsEstado=1 WHERE UsUser=".$empId;

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = null;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function listarEmpleados(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT U.UsRol, U.UsUser AS 'usuarioId', E.*, A.*
                FROM tblusuario U
                INNER JOIN tblempleado E
                INNER JOIN tbladministrador A
                ON E.TblUsuario_UsUser=U.UsUser || A.TblUsuario_UsUser=U.UsUser WHERE U.UsEstado=0 GROUP BY U.UsUser";
            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $resultado = null;
                }
            }

            $conexion->cerrar();
            return $resultado;

        }
    
    }

}