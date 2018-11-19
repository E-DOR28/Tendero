<?php


class InventarioCtrl {
    
    public function registrarInventario($codigo, $tipoTrans, $cantidad, $costo, $precio) {
        $inventario = new Inventory();
        if ($precio=="") $precio=0;
        if ($costo=="") $costo=0;

        if ($tipoTrans==1) { 
            $costo=$inventario->verCostoProducto($codigo);
            
            if ($costo==null) { 
                header("Location: index.php?accion=actualizarInventario&result=error2");
            } else {
                $saved=$inventario->registrarInventario($codigo, $tipoTrans, $cantidad, $costo, $precio);

                if ($saved!=null) {
                    header("Location: index.php?accion=listarInventario&result=nuevoRegistro");
                } else {
                    header("Location: index.php?accion=actualizarInventario&result=error1");
                }
            }
        } else {
                $saved=$inventario->registrarInventario($codigo, $tipoTrans, $cantidad, $costo, $precio);

                if ($saved!=null) {
                    header("Location: index.php?accion=listarInventario&result=nuevoRegistro");
                } else {
                    header("Location: index.php?accion=actualizarInventario&result=error1");
                }
        }
    }

    public function listarInventario() {
        $inventario = new Inventory();
        return $inventario->listarInventario();
    }


}
