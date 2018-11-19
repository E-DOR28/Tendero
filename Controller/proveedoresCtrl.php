<?php


class SuppliersCtrl {

    public function crearProveedor($nombre, $servicios, $NIT, $telefono, $direccion, $email) {
        $proveedores = new Proveedores();
        $result = $proveedores->crearProveedor($nombre, $servicios, $NIT, $telefono, $direccion, $email);

        if ($result!=null) {
            header("Location: index.php?accion=listarProveedores&result=nuevoProveedor");
        } else {
            header("Location: index.php?accion=fomularioNuevoProveedor&result=error");
        }


    }
    
    public function listarProveedores() {
        $proveedores = new Proveedores();
        return $proveedores->listarProveedores();
    }

    public function verProveedor($proId) {
        $proveedores = new Proveedores();
        return $proveedores->verProveedor($proId);
    }

    public function buscarProveedor($codigoProducto) {
        $proveedores = new Proveedores();
        return $proveedores->buscarProveedor($codigoProducto);
    }

    public function reasignarProveedor($codigoProducto, $codigoProveedor) {
        $proveedores = new Proveedores();
        return $proveedores->reasignarProveedor($codigoProducto, $codigoProveedor);   
    }

    public function desvincularProducto($codigoProducto) {
        $proveedores = new Proveedores();
        return $proveedores->desvincularProducto($codigoProducto);   
    }

    public function desvincularProveedor($proId) {
        $proveedores = new Proveedores();
        return $proveedores->desvincularProveedor($proId);   
    }

    public function modificarProveedor($codigo, $nombre, $servicios, $NIT, $telefono, $direccion, $email) {
        $proveedores = new Proveedores();
        $proveedores->modificarProveedor($codigo, $nombre, $servicios, $NIT, $telefono, $direccion, $email);
        header("Location: index.php?accion=listarProveedores");
    }

    public function eliminarProveedor($proId) {
        $proveedores = new Proveedores();
        return $proveedores->eliminarProveedor($proId);   
    }


}