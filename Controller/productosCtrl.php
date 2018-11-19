<?php


class ProductsCtrl {
    
    public function crearProducto($nombre, $detalle, $tipo, $costo, $precio, $cantidad, $unidad, $proveedor) {
        $productos = new Products();
        $inventario = new Inventory();
        $productoId = $productos->crearProducto($nombre, $detalle, $tipo, $costo, $precio, $cantidad, $unidad);

        if ($productoId!=null) {
            $result=$productos->asociarProductoAProveedor($productoId,$proveedor);
            if ($result) {
                $saved=$inventario->registrarInventario($productoId, 0, $cantidad, $costo, 0);
                if ($saved!=null) {
                    header("Location: index.php?accion=listarProductos&result=nuevoProducto");
                } else {
                    header("Location: index.php?accion=listarProductos&result=error3");
                }
            } else {
                //No se pudo vincular el producto a un proveedor existente
                header("Location: index.php?accion=fomularioNuevoProducto&result=error1");
            }
        } else {
                //No se pudo crear el producto
                header("Location: index.php?accion=fomularioNuevoProducto&result=error2");
        }
    }

    public function verProducto($proCodigo) {
        $productos = new Products();
        return $productos->verProducto($proCodigo);
    }

    public function modificarProducto($codigo, $nombre, $detalle, $tipo, $precio, $unidad) {
        $productos = new Products();
        $productos->modificarProducto($codigo, $nombre, $detalle, $tipo, $precio, $unidad);
        header("Location: index.php?accion=listarProductos");
    }

    public function eliminarProducto($codigoProducto) {
        $productos = new Products();
        return $productos->eliminarProducto($codigoProducto);   
    }

    public function listarProductos() {
        $productos = new Products();
        return $productos->listarProductos();
    }


}
