<?php


class ReporteModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function verificarSiYaHizoReporte($idViaje)
    {
        $resultado = $this->database->reporteDelDia($idViaje);

        return $resultado;
    }

    public function guardarReporte($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes,
                                   $extras, $fee, $latitud, $longitud)
    {
        $total = $this->calcularTotal($idViaje, $kilometros, $combustible, $viaticos, $peajes, $extras, $fee);
        $sql = 'INSERT INTO reporte(id_viaje, kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, fee, latitud, longitud, total)
                VALUES (' . $idViaje . ', ' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', 
                ' . $fee . ', ' . $latitud . ', ' . $longitud . ', ' . $total . ')';

        return $this->database->query($sql);

    }

    public function calcularTotal($idViaje, $kilometros, $combustible, $viaticos, $peajes, $extras, $fee){
        $precioKilometro = $this->database->obtenerPrecioPorKm();
        $precioLitro = $this->database->obtenerPrecioPorLitro();
        $precioPeaje = $this->database->obtenerPrecioDePeaje();

        $kilometrosFinal = $kilometros * $precioKilometro;
        $combustibleFinal = $combustible * $precioLitro;
        $peajeFinal = $peajes * $precioPeaje;
        $hazardCosto = $this->database->obtenerPrecioHazard($idViaje);
        $reeferCosto = $this->database->obtenerPrecioReefer($idViaje);

        $total = $peajeFinal + $kilometrosFinal + $combustibleFinal + $viaticos + $extras + $fee + $hazardCosto + $reeferCosto;

        return $total;
    }
}