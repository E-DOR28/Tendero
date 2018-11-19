<?php


class ReportesCtrl {
    
    public function reporteDelDia() {
        $reportes = new Reports();
        return $reportes->reporteDelDia();
    }

    public function reporteByRange($nDays) {
        $reportes = new Reports();
        return $reportes->reporteByRange($nDays);
    }


}
