<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Controller/empleadosCtrl.php';
        require_once 'Controller/inventarioCtrl.php';
        require_once 'Controller/productosCtrl.php';
        require_once 'Controller/proveedoresCtrl.php';
        require_once 'Controller/reportesCtrl.php';
        require_once 'Controller/sesionesCtrl.php';
        require_once 'Controller/ventasCtrl.php';
        require_once 'Model/Sesiones.php';
        require_once 'Model/Productos.php';
        require_once 'Model/Proveedores.php';
        require_once 'Model/Empleados.php';
        require_once 'Model/Ventas.php';
        require_once 'Model/Inventario.php';
        require_once 'Model/Reportes.php';
        require_once 'Model/Conexion.php';
        $sesiones = new SesionesCtrl();
        $productos = new ProductsCtrl();
        $proveedores = new SuppliersCtrl();
        $empleados = new EmpleadosCtrl();
        $ventas = new VentasCtrl();
        $inventario = new InventarioCtrl();
        $reportes = new ReportesCtrl();

        /*
        *
        * Enrutadores para Control de Sesiones
        * 
         */
        if((string)filter_input(INPUT_GET,'accion')=="iniciarSesion"){
            $sesiones->iniciarSesion((string)filter_input(INPUT_POST,'email'),(string)filter_input(INPUT_POST,'password'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="cerrarSesion") {
            $sesiones->cerrarSesion();
        } else if ((string)filter_input(INPUT_GET,'sesionStatus')=="1") {
            $sesionStatus = 1;
            require_once 'View/views/home.php';
        } else if ((string)filter_input(INPUT_GET,'sesionStatus')=="2") {
            $sesionStatus = 2;
            require_once 'View/views/home.php';
        }
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        /*
        *
        * Enrutadores para Control de Productos
        * 
         */
         else if ((string)filter_input(INPUT_GET,'accion')=="listarProductos") {
            $listarProductos=$productos->listarProductos();
            require_once "View/views/products/list.php";
        } else if ((string)filter_input(INPUT_GET,'accion')=="fomularioNuevoProducto") {
            if ((string)filter_input(INPUT_GET,'result')=="error1") {
                $newProderror = 1;
            } else if ((string)filter_input(INPUT_GET,'result')=="error2") {
                $newProderror = 2;
            } else {
                $newProderror = null;
            }
            $listarProveedores=$proveedores->listarProveedores();
            require_once 'View/views/products/new.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="crearProducto") {
            $productos->crearProducto(
                (string)filter_input(INPUT_POST,'nombre_articulo'),
                (string)filter_input(INPUT_POST,'detalle_articulo'),
                (string)filter_input(INPUT_POST,'tipo_articulo'),
                (string)filter_input(INPUT_POST,'costo_articulo'),
                (string)filter_input(INPUT_POST,'precio_articulo'),
                (string)filter_input(INPUT_POST,'cantidad_articulo'),
                (string)filter_input(INPUT_POST,'unidad_articulo'),
                (string)filter_input(INPUT_POST,'proveedor_articulo'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="verProducto") {
            $prodInfo=$productos->verProducto((string)filter_input(INPUT_GET,'id'));
            $proveedorInfo=$proveedores->buscarProveedor((string)filter_input(INPUT_GET,'id'));
            $listarProveedores=$proveedores->listarProveedores();
            require_once "View/views/products/products.php";
        } else if ((string)filter_input(INPUT_GET,'accion')=="modificarProducto") {
            $productos->modificarProducto(
                (string)filter_input(INPUT_POST,'codigo_articulo'),
                utf8_decode((string)filter_input(INPUT_POST,'nombre_articulo')),
                utf8_decode((string)filter_input(INPUT_POST,'detalle_articulo')),
                utf8_decode((string)filter_input(INPUT_POST,'tipo_articulo')),
                (string)filter_input(INPUT_POST,'precio_articulo'),
                (string)filter_input(INPUT_POST,'unidad_articulo'));
            $proveedores->reasignarProveedor(
                (string)filter_input(INPUT_POST,'codigo_articulo'),
                (string)filter_input(INPUT_POST,'proveedor_articulo'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="eliminarProducto") {
            $proveedores->desvincularProducto((string)filter_input(INPUT_POST,'codigo_articulo'));
            $productos->eliminarProducto((string)filter_input(INPUT_POST,'codigo_articulo'));
            header("Location: index.php?accion=prodDeleted");
        }
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        /*
        *
        * Enrutador para control de Empleados
        * 
         */
        else if ((string)filter_input(INPUT_GET,'accion')=="listarVentas") {
            $listarVentas=$ventas->listarVentas();
            require_once 'View/views/sales/list.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="fomularioNuevaVenta") {
            $listarProductos=$productos->listarProductos();
            require_once 'View/views/sales/new.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="registrarVenta") {
            $ventas->registrarVenta();
        } else if ((string)filter_input(INPUT_GET,'accion')=="ampliarVenta") {
            $ventaInfo=$ventas->ampliarVenta((string)filter_input(INPUT_GET,'id'));
            require_once "View/views/sales/sale.php";
        }
        /*
        *
        * Enrutador para control de Empleados
        * 
         */
        else if ((string)filter_input(INPUT_GET,'accion')=="listarEmpleados") {
            $listarEmpleados=$empleados->listarEmpleados();
            require_once 'View/views/employees/list.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="fomularioNuevoEmpleado") {
            require_once 'View/views/employees/new.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="crearEmpleado") {
            $empleados->crearEmpleado(
                utf8_decode((string)filter_input(INPUT_POST,'nombre_empleado')),
                (string)filter_input(INPUT_POST,'cedula_empleado'),
                (string)filter_input(INPUT_POST,'telefono_empleado'),
                utf8_decode((string)filter_input(INPUT_POST,'direccion_empleado')),
                (string)filter_input(INPUT_POST,'email_empleado'),
                (string)filter_input(INPUT_POST,'rol_empleado'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="verEmpleado") {
            $empleadoInfo=$empleados->verEmpleado((string)filter_input(INPUT_GET,'id'));
            require_once "View/views/employees/profile.php";
        } else if ((string)filter_input(INPUT_GET,'accion')=="modificarEmpleado") {
            $empleados->modificarEmpleado(
                (string)filter_input(INPUT_POST,'codigo_empleado'),
                utf8_decode((string)filter_input(INPUT_POST,'nombre_empleado')),
                (string)filter_input(INPUT_POST,'cedula_empleado'),
                (string)filter_input(INPUT_POST,'telefono_empleado'),
                utf8_decode((string)filter_input(INPUT_POST,'direccion_empleado')),
                (string)filter_input(INPUT_POST,'email_empleado'),
                (string)filter_input(INPUT_POST,'rol_empleado'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="eliminarEmpleado") {
            $empleados->eliminarEmpleado((string)filter_input(INPUT_POST,'codigo_empleado'));
        }
        /*
        *
        * Enrutador para control de Proveedores
        * 
         */
        else if ((string)filter_input(INPUT_GET,'accion')=="listarProveedores") {
            $listarProveedores=$proveedores->listarProveedores();
            require_once 'View/views/suppliers/list.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="fomularioNuevoProveedor") {
            require_once 'View/views/suppliers/new.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="crearProveedor") {
            $proveedores->crearProveedor(
                utf8_decode((string)filter_input(INPUT_POST,'nombre_proveedor')),
                utf8_decode((string)filter_input(INPUT_POST,'servicios_proveedor')),
                (string)filter_input(INPUT_POST,'NIT_proveedor'),
                (string)filter_input(INPUT_POST,'telefono_proveedor'),
                utf8_decode((string)filter_input(INPUT_POST,'direccion_proveedor')),
                (string)filter_input(INPUT_POST,'email_proveedor'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="verProveedor") {
            $proveedorInfo=$proveedores->verProveedor((string)filter_input(INPUT_GET,'id'));
            require_once "View/views/suppliers/suppliers.php";
        } else if ((string)filter_input(INPUT_GET,'accion')=="modificarProveedor") {
            $proveedores->modificarProveedor(
                (string)filter_input(INPUT_POST,'codigo_proveedor'),
                utf8_decode((string)filter_input(INPUT_POST,'nombre_proveedor')),
                utf8_decode((string)filter_input(INPUT_POST,'servicios_proveedor')),
                (string)filter_input(INPUT_POST,'NIT_proveedor'),
                (string)filter_input(INPUT_POST,'telefono_proveedor'),
                utf8_decode((string)filter_input(INPUT_POST,'direccion_proveedor')),
                (string)filter_input(INPUT_POST,'email_proveedor'));
        } else if ((string)filter_input(INPUT_GET,'accion')=="eliminarProveedor") {
            $proveedores->desvincularProveedor((string)filter_input(INPUT_POST,'codigo_proveedor'));
            $proveedores->eliminarProveedor((string)filter_input(INPUT_POST,'codigo_proveedor'));
            header("Location: index.php?accion=listarProveedores");
        }
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        // >>>>>>>>>>>>>>>>>>>> ********** <<<<<<<<<<<<<<<<<<<<
        /*
        *
        * Enrutador para control de Inventario
        * 
         */
        else if ((string)filter_input(INPUT_GET,'accion')=="listarInventario") {
            $listarInventario=$inventario->listarInventario();
            require_once "View/views/inventory/list.php";
        } else if ((string)filter_input(INPUT_GET,'accion')=="actualizarInventario") {
            $listarProductos=$productos->listarProductos();
            require_once 'View/views/inventory/new.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="registrarInventario") {
            $inventario->registrarInventario(
                (string)filter_input(INPUT_POST,'codigo_articulo'),
                (string)filter_input(INPUT_POST,'tipo_transaccion'),
                (string)filter_input(INPUT_POST,'cantidad_articulo'),
                (string)filter_input(INPUT_POST,'costo_articulo'),
                (string)filter_input(INPUT_POST,'precio_articulo'));
        }
        /*
        *
        * Enrutador para control de Reportes
        * 
         */
        else if ((string)filter_input(INPUT_GET,'accion')=="listarReportesD") {
            $listarReportes=$reportes->reporteDelDia();
            require_once 'View/views/reports/list_day.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="listarReportesW") {
            $listarReportes=$reportes->reporteByRange(7);
            require_once 'View/views/reports/list_week.php';
        } else if ((string)filter_input(INPUT_GET,'accion')=="listarReportesM") {
            $listarReportes=$reportes->reporteByRange(30);
            require_once 'View/views/reports/list_month.php';
        }
        /*
        *
        * Enrutador al mapa del sitio
        * 
         */
        else if ((string)filter_input(INPUT_GET,'accion')=="mapa") {
            require_once 'View/views/map.php';
        }
        /*
        *
        * Enrutador para opciones desconocidas
        * 
         */
         else {
            $sesionStatus = 0;
            require_once 'View/views/home.php';
        }
        ?>
    </body>
</html>
