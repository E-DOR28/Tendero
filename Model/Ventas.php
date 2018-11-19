<?php

class Sales {

    public function registrarVenta($uniqid, $idProd, $cnt, $precio){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            if(session_id() == '' || !isset($_SESSION)) {
                session_start();
            }
            
            $sql="INSERT INTO tblventas (id, TblEmpleado_EmpId, VenCodArticulos, VenArtCant, VenArtPrecio) 
            VALUES ('".$uniqid."','".$_SESSION["user_id"]."', ".$idProd.", ".$cnt.", ".$precio.")";
			if ($conn->query($sql) === TRUE) {
			    $done = true;
			} else {
                $done = null;
			}

            $conexion->cerrar();
            return $done;

        }
    
    }

    public function listarVentas(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT *, GROUP_CONCAT(VenCodArticulos) AS 'Articulos', SUM(VenArtCant*VenArtPrecio) AS 'Total' 
            FROM tblventas GROUP BY id";
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

    public function ampliarVenta($venId){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT *, GROUP_CONCAT(VenCodArticulos) AS 'Articulos', SUM(VenArtCant*VenArtPrecio) AS 'Total' 
            FROM tblventas WHERE id='".$venId."' GROUP BY id";
            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $resultado = null;
                } else {
                    $resultado =$resultado->fetch_object();
                }
            }

            $conexion->cerrar();
            return $resultado;

        }
    
    }

}