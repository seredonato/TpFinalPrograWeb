<?php


class CosteoFinalModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarCosteoFinal($idViaje)
    {
        $reportes = $this->database->obtenerReportesDelViajePorIdViaje($idViaje);
        $reefer = $this->obtenerReeferSegunViaje($idViaje);
        $hazard = $this->obtenerHazardSegunViaje($idViaje);
        foreach ($reportes as $reporte) {
            $kilometros = 0;
            $combustible = 0;
            $viaticos = 0;
            $peajes = 0;
            $extras = 0;
            $fee = 0;
            $total = 0;

            $kilometros += $reporte["kilometros"];
            $combustible += $reporte["combustible"];
            $viaticos += $reporte["viaticos"];
            $peajes += $reporte["peajes_pesajes"];
            $extras += $reporte["extras"];
            $fee += $reporte["fee"];
            $total += $reporte["total"];

            $sql = 'UPDATE costeo_final SET id_viaje=' . $idViaje . ', kilometros= ' . $kilometros . ', combustible=' . $combustible . ', 
        viaticos = ' . $viaticos . ', peajes_pesajes= ' . $peajes . ', extras=' . $extras . ', hazard=' . $hazard . ', reefer=' . $reefer . ', fee=' . $fee . ', 
        total=' . $total . ' WHERE id_viaje =' . $idViaje;

            $this->database->query($sql);
        }

    }

    public function guardarHoraSalidayEstado($idViaje)
    {
        $this->database->asignarHoraSalidayEstado($idViaje);
    }

    public function guardarHoraLlegadayEstado($idViaje)
    {
        $this->database->asignarHoraLlegadayEstado($idViaje);
    }

    public function obtenerHazardSegunViaje($idViaje)
    {
        return $this->database->devolverHazardViaje($idViaje);
    }

    public function obtenerReeferSegunViaje($idViaje)
    {
        return $this->database->devolverReeferViaje($idViaje);
    }

}