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
            $hazard = $reporte["hazard"];
            $reefer = $reporte["reefer"];
            $fee += $reporte["fee"];
            $total += $reporte["total"];

            $sql = 'INSERT INTO costeo_final (id_viaje, kilometros, combustible, viaticos, peajes_pesajes, extras, hazard, reefer, fee, total) VALUES
                (' . $idViaje . ', ' . $kilometros . ',' . $combustible . ',' . $viaticos . ', ' . $peajes . ', 
                ' . $extras . ', ' . $hazard . ', ' . $reefer . ', ' . $fee . ', ' . $total . ')';

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
}