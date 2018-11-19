<?php

class Products {

    public function crearProducto($nombre, $detalle, $tipo, $costo, $precio, $cantidad, $unidad){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
        	session_start();
            
            $sql="INSERT INTO tblproductos (TblUsuario_UsUser, ProNombre, ProTipo, ProDetalle, ProCant, ProUnidades, ProCostProm, ProPrecio) 
            VALUES (
            		'".$_SESSION["user_id"]."',
			        '".$nombre."',
			        '".$tipo."',
			        '".$detalle."',
			        '".$cantidad."',
			        '".$unidad."',
			        '".$costo."',
			        '".$precio."'
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

    public function modificarProducto($codigo, $nombre, $detalle, $tipo, $precio, $unidad){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="UPDATE tblproductos SET 
            ProNombre='".$nombre."', 
            ProTipo='".$tipo."', 
            ProDetalle='".$detalle."',
            ProPrecio='".$precio."', 
            ProUnidades='".$unidad."' WHERE ProCodigo='".$codigo."'";

            if ($conn->query($sql) === TRUE) {
                $done = true;
            } else {
                $done = false;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function asociarProductoAProveedor($productId,$supplierId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            
            $sql="INSERT INTO tblproveedores_has_tblproductos (TblProveedores_ProId, TblProductos_ProCodigo) 
            VALUES (".$supplierId.",".$productId.")";

			if ($conn->query($sql) === TRUE) {
			    $done = true;
			} else {
			    $done = false;
			}

            $conexion->cerrar();
            return $done;

        }
    }


    public function verProducto($proCodigo){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT * FROM tblproductos WHERE ProCodigo=".$proCodigo;
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

    public function eliminarProducto($codigoProducto){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {            
            $sql="DELETE FROM tblproductos WHERE ProCodigo='".$codigoProducto."'";

            if ($conn->query($sql) === TRUE) {
                $done = 1;
            } else {
                $done = 0;
            }

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function listarProductos(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT * FROM tblproductos";
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
