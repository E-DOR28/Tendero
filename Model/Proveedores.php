<?php

class Proveedores {

    public function crearProveedor($nombre, $servicios, $NIT, $telefono, $direccion, $email){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            session_start();
            
            $sql="INSERT INTO tblproveedores (ProNIT, TblAdministrador_AdmId, ProNombre, ProProducServ, ProTelefono, ProDireccion, ProEmail) 
            VALUES (
                    '".$NIT."',
                    '".$_SESSION["user_id"]."',
                    '".$nombre."',
                    '".$servicios."',
                    '".$telefono."',
                    '".$direccion."',
                    '".$email."'
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

    public function listarProveedores(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT * FROM tblproveedores";
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

    public function verProveedor($proId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT * FROM tblproveedores WHERE ProId=".$proId;
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

    public function buscarProveedor($codigoProducto){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT * FROM tblproveedores_has_tblproductos WHERE TblProductos_ProCodigo=".$codigoProducto;
            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $ProvInfo = null;
                } else {
                    while ($proveedor=$resultado->fetch_object()) {
                        $ProvInfo=$proveedor->TblProveedores_ProId;
                    }
                }
            }


            $conexion->cerrar();
            return $ProvInfo;

        }
    
    }

    public function reasignarProveedor($codigoProducto, $codigoProveedor){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="UPDATE tblproveedores_has_tblproductos SET 
            TblProveedores_ProId='".$codigoProveedor."' WHERE TblProductos_ProCodigo='".$codigoProducto."'";

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = false;
            }

            echo $done;

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function desvincularProducto($codigoProducto){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="DELETE FROM tblproveedores_has_tblproductos WHERE TblProductos_ProCodigo='".$codigoProducto."'";

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = false;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function desvincularProveedor($proId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="DELETE FROM tblproveedores_has_tblproductos WHERE TblProveedores_ProId='".$proId."'";

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = false;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function modificarProveedor($codigo, $nombre, $servicios, $NIT, $telefono, $direccion, $email){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="UPDATE tblproveedores SET 
            ProNombre='".$nombre."', 
            ProProducServ='".$servicios."', 
            ProNIT='".$NIT."', 
            ProTelefono='".$telefono."',
            ProDireccion='".$direccion."',
            ProEmail='".$email."' WHERE proId='".$codigo."'";

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = false;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function eliminarProveedor($proId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="DELETE FROM tblproveedores WHERE proId='".$proId."'";

            if ($conn->query($sql) === TRUE) {
                $done = 1;
            } else {
                $done = 0;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

}
