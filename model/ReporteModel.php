<?php


class ReporteModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function verificarSiYaHizoReporte($idViaje){
        $resultado = $this->database->reporteDelDia($idViaje);

        return $resultado;
    }

    public function guardarReporte($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes,
                                       $extras, $fee, $latitud, $longitud)
    {
        $sql = 'INSERT INTO reporte(id_viaje, fecha, kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, fee, latitud, longitud)
                VALUES (' . $idViaje . ', curdate(), ' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', 
                ' . $fee . ', ' . $latitud . ', ' . $longitud . ')';

        return $this->database->query($sql);

    }
}