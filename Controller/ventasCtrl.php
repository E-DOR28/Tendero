<?php

class ventasCtrl {


    public function registrarVenta() {
        $ventas = new Sales();
        $productos = new Products();
        $inventario = new Inventory();
        $disponibilidadError = false;

		if(isset($_COOKIE['carrito'])) {
			$aCarrito = unserialize($_COOKIE['carrito']);
		}

		
		if (count($aCarrito)>0) {
			$uniqID = uniqid();


            foreach ($aCarrito as $key => $value) {
                $disponibilidad=$inventario->contarProducto($value['idPr']);
                if ($disponibilidad!=null) {
                    if ($disponibilidad<=0) {
                        $disponibilidadError = true;
                        break;
                    } else {
                        if ($disponibilidad<$value['cntPr']) {
                            $disponibilidadError = true;
                            break;
                        }
                    }
                } else {
                    $disponibilidadError = true;
                    break;
                }
            }

            if ($disponibilidadError==false) {
                foreach ($aCarrito as $key => $value) {
                    $prodInfo=$productos->verProducto($value['idPr']);
                        while ($fila=$prodInfo->fetch_object()) {
                            $inventario->registrarInventario($value['idPr'], 1, $value['cntPr'], 0, $fila->ProPrecio);
                            $ventas->registrarVenta($uniqID, $value['idPr'], $value['cntPr'], $fila->ProPrecio);
                        }
                }
                header("Location: index.php?accion=listarVentas&result=nuevaVenta");
            } else {
                header("Location: index.php?accion=fomularioNuevaVenta&err=2");
            }
		} else {
			header("Location: index.php?accion=fomularioNuevaVenta&err=1");
		}
    }


    public function listarVentas() {
        $ventas = new Sales();
        return $ventas->listarVentas();
    }

    public function ampliarVenta($id) {
        $ventas = new Sales();
        $ventaInfo=$ventas->ampliarVenta($id);
        $empleados = new Empleados();
        $result=$empleados->verEmpleado($ventaInfo->TblEmpleado_EmpId);
        while ($NomEmpleado=$result->fetch_object()) {
        	$ventaInfo->NomEmpleado = $NomEmpleado->UsRol==0 ? $NomEmpleado->EmpNombre : $NomEmpleado->AdmNombre; 	
        }
        return $ventaInfo;
    }

}

?>