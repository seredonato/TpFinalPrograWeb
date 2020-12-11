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

    public function verificarEstadoViaje($idViaje){
        return $this->database->verificarEstadoViaje($idViaje);
}

    public function guardarReporte($idViaje, $kilometros, $combustible, $viaticos, $peajes,
                                   $extras, $fee, $latitud, $longitud)
    {
        $total = $this->calcularTotal($kilometros, $combustible, $viaticos, $peajes, $extras, $fee);
        $sql = 'INSERT INTO reporte(id_viaje, kilometros, combustible, viaticos, peajes_pesajes, extras, fee, latitud, longitud, total)
                VALUES (' . $idViaje . ', ' . $kilometros . ', ' . $combustible . ', ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', 
                ' . $fee . ', ' . $latitud . ', ' . $longitud . ', ' . $total . ')';

        return $this->database->query($sql);

    }

    public function calcularTotal ($kilometros, $combustible, $viaticos, $peajes, $extras, $fee)
    {
        $precioKilometro = $this->database->obtenerPrecioPorKm();
        $precioLitro = $this->database->obtenerPrecioPorLitro();
        $precioPeaje = $this->database->obtenerPrecioDePeaje();

        $kilometrosFinal = $kilometros * $precioKilometro;
        $combustibleFinal = $combustible * $precioLitro;
        $peajeFinal = $peajes * $precioPeaje;

        $total = $peajeFinal + $kilometrosFinal + $combustibleFinal + $viaticos + $extras + $fee;

        return $total;
    }

    public function obtenerReportes($idProforma)
    {
        return $this->database->obtenerReportesDelViajePorIdProforma($idProforma);
    }

    public function obtenerDatosChoferPorIdProforma($idProforma){

        return $this->database->mostrarDatosChoferPorIdProforma($idProforma);

    }

}