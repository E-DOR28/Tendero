<?php


class EmpleadosCtrl {

    public function crearEmpleado($nombre, $cc, $telefono, $direccion, $email, $rol) {
        $empleados = new Empleados();
        $userId = $empleados->crearUsuario($rol, $email, "12345");

        if ($userId!=null) {
            if ($rol==0){
                $result = $empleados->crearEmpleado($userId, $nombre, $cc, $telefono, $direccion, $email);
                if ($result!=null) {
                    header("Location: index.php?accion=listarEmpleados&result=nuevoEmpleado");
                } else {
                    header("Location: index.php?accion=fomularioNuevoEmpleado&result=error2");
                }
            } else {
                $result = $empleados->crearAdmin($userId, $nombre, $cc, $telefono, $direccion, $email);
                if ($result!=null) {
                    header("Location: index.php?accion=listarEmpleados&result=nuevoAdministrador");
                } else {
                    header("Location: index.php?accion=fomularioNuevoEmpleado&result=error2");
                }
            }
        } else {
            header("Location: index.php?accion=fomularioNuevoEmpleado&result=error1");
        }


    }
    
    public function listarEmpleados() {
        $empleados = new Empleados();
        return $empleados->listarEmpleados();
    }

    public function verEmpleado($empId) {
        $empleados = new Empleados();
        return $empleados->verEmpleado($empId);
    }

    public function modificarEmpleado($empId, $nombre, $cc, $telefono, $direccion, $email, $rol) {
        $empleados = new Empleados();
        $userModificado=$empleados->modificarUsuario($empId, $email);
        if ($userModificado!=null) {
            $result=$empleados->modificarEmpleado($empId, $nombre, $cc, $telefono, $direccion, $email, $rol);
            if ($result!=null) {
                header("Location: index.php?accion=listarEmpleados&result=usuarioModificado");
            } else {
                header("Location: index.php?accion=listarEmpleados&result=error");
            }
        }
    }

    public function eliminarEmpleado($empId) {
        $empleados = new Empleados();
        $result=$empleados->eliminarEmpleado($empId);
        if ($result!=null) {
            header("Location: index.php?accion=listarEmpleados&result=usuarioBorrado");
        } else {
            header("Location: index.php?accion=listarEmpleados&result=error");
        }
    }


}