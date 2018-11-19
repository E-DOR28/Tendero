<?php

class Inventory {

    public function registrarInventario($codigo, $tipoTrans, $cantidad, $costo, $precio){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
        	session_start();
            
            $sql="INSERT INTO tblinventario (
            TblEmpleado_EmpId, 
            TblProductos_ProCodigo, 
            InvIngreSalid, 
            InvCantidad, 
            InvCosto,
            InvPrecio
            ) 
            VALUES (
            		'".$_SESSION["user_id"]."',
			        '".$codigo."',
			        '".$tipoTrans."',
			        '".$cantidad."',
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


    public function verCostoProducto($id){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT AVG(InvCosto) AS 'CostoPromedio' FROM tblinventario 
            WHERE TblProductos_ProCodigo=".$id." AND InvCosto!=0 GROUP BY TblProductos_ProCodigo LIMIT 1";
            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $resultado = null;
                } else {
                    while ($fila=$resultado->fetch_object()) {
                        echo $fila->CostoPromedio;
                    }
                }
            }

            $conexion->cerrar();
            return $resultado;

        }
    
    }

    public function contarProducto($id){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT 
            SUM(IF(InvIngreSalid=0,InvCantidad, NULL)) 'Ingresos',
            SUM(IF(InvIngreSalid=1,InvCantidad, NULL)) 'Salidas' 
            FROM tblinventario 
            WHERE TblProductos_ProCodigo=".$id;

            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $resultado = null;
                } else {
                    while ($fila=$resultado->fetch_object()) {
                        $finalRes = $fila->Ingresos-$fila->Salidas;
                    }
                }
            }

            $conexion->cerrar();
            return $resultado!=null ? $finalRes : $resultado;

        }
    
    }


    public function listarInventario(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        if (!!$conn) {
            $sql="SELECT I.*, P.* 
            FROM tblinventario I
            INNER JOIN tblproductos P
            ON P.ProCodigo=TblProductos_ProCodigo";
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
