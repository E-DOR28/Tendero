<?php

class Reports {

    public function reporteDelDia(){
        $conexion = new Conexion();
        $conn = $conexion->abrir();
        $hoy = date("Y-m-d",time());
        $hoyI = $hoy.'  00:00:00';
        $hoyF = $hoy.'  23:59:59';

        if (!!$conn) {
            $sql="SELECT 
            SUM(IF(InvIngreSalid=0,(InvCantidad*InvPrecio), NULL)) 'Ingresos',
            SUM(IF(InvIngreSalid=1 AND InvPrecio!=0,(InvCantidad*InvPrecio), NULL)) 'Ventas',
            SUM(IF(InvIngreSalid=1 AND InvCosto!=0,(InvCantidad*InvCosto), NULL)) 'Salidas' 
            FROM tblinventario WHERE InvFecha>='".$hoyI."'";

            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $result = null;
                }
            }

            $conexion->cerrar();
            return $resultado;

        }
    }


    public function reporteByRange($nDays){
        $conexion = new Conexion();
        $conn = $conexion->abrir();

        $hoy = time();
        $fechaInicio = date("Y-m-d", strtotime ( '-'.$nDays.' day' , $hoy));
        $fechaInicio = $fechaInicio.'  00:00:00';

        if (!!$conn) {
            $sql="SELECT 
            SUM(IF(InvIngreSalid=0,(InvCantidad*InvCosto), NULL)) 'Ingresos',
            SUM(IF(InvIngreSalid=1 AND InvPrecio!=0,(InvCantidad*InvPrecio), NULL)) 'Ventas',
            SUM(IF(InvIngreSalid=1 AND InvCosto!=0,(InvCantidad*InvCosto), NULL)) 'Salidas' 
            FROM tblinventario WHERE InvFecha>='".$fechaInicio."'";

            $resultado=$conn->query($sql);

            if (!!$resultado) {
                if ($resultado->num_rows <= 0) {
                    $result = null;
                }
            }

            $conexion->cerrar();
            return $resultado;

        }
    
    }

}
