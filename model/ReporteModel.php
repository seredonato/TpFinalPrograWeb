<?php


class ReporteModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarCosteoFinal($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes,
                                       $extras, $hazardClass, $reeferCosto, $fee, $latitud, $longitud)
    {
        $sql = 'INSERT INTO costeo_final(id_viaje, kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, reefer, fee, latitud, longitud)
                VALUES (' . $idViaje . ', ' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', ' . $hazardClass . ', ' . $reeferCosto . ',  
                ' . $fee . ', ' . $latitud . ', ' . $longitud . ')';

        return $this->database->query($sql);


    }
}