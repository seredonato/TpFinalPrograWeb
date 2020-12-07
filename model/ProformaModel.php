<?php

class ProformaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarViajeReturneaId($origen, $destino, $fechaCarga, $horaCarga, $fechaLlegada, $horaLlegada)
    {

        $sql = 'INSERT INTO viaje (origen, destino, fecha_carga, tiempo_carga, fecha_llegada, tiempo_llegada)
                VALUES ("' . $origen . '", "' . $destino . '", "' . $fechaCarga . '", "' . $horaCarga . '", "' . $fechaLlegada . '", "' . $horaLlegada . '")';

        $this->database->query($sql);
        return $this->database->viajeReturneaId($origen, $destino, $fechaCarga, $fechaLlegada);

    }

    public function guardarCargaReturneaId($tipo, $peso, $hazardSi, $imoClass, $imoSubClass, $temperaturaSi, $temperatura)
    {
        if ($hazardSi == "si" && $temperaturaSi == "si") {
            $sql = 'INSERT INTO carga (tipo, peso_neto, hazard, clase_imoclass, subclase_imosubclass, reefer, temperatura)
                VALUES ("' . $tipo . '", ' . $peso . ', "' . $hazardSi . '", "' . $imoClass . '", "' . $imoSubClass . '",  "' . $temperaturaSi . '", ' . $temperatura . ')';
        } elseif ($hazardSi == "no" && $temperaturaSi == "si") {
            $sql = 'INSERT INTO carga (tipo, peso_neto, hazard, reefer, temperatura)
                VALUES ("' . $tipo . '", ' . $peso . ', "' . $hazardSi . '", "' . $temperaturaSi . '", ' . $temperatura . ')';
        } elseif ($hazardSi == "si" && $temperaturaSi == "no") {
            $sql = 'INSERT INTO carga (tipo, peso_neto, hazard, clase_imoclass, subclase_imosubclass, reefer)
                VALUES ("' . $tipo . '", ' . $peso . ', "' . $hazardSi . '", "' . $imoClass . '", "' . $imoSubClass . '",  "' . $temperaturaSi . '")';
        } elseif ($hazardSi == "no" && $temperaturaSi == "no") {
            $sql = 'INSERT INTO carga (tipo, peso_neto, hazard, reefer)
                VALUES ("' . $tipo . '", ' . $peso . ', "' . $hazardSi . '", "' . $temperaturaSi . '")';
        }
        $this->database->query($sql);

        return $this->database->cargaReturneaId($tipo, $peso, $hazardSi);
    }

    public function devolverCostoReefer($temperaturaSi)
    {
        if ($temperaturaSi == "si") {
            $costo = $this->database->mostrarCostoTemperatura();
            return $costo;
        } elseif ($temperaturaSi == "no") {
            $costo = 0;
            return $costo;
        }
    }

    public function guardarCosteoEstimadoReturneaId($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $extras, $hazardSi, $imoClass, $reeferCosto, $fee)
    {

        if ($hazardSi == "si") {
            $hazardCosto = $this->database->devolverCostoHazard($imoClass);
            $total = $this->calcularTotal($kilometros, $combustible, $viaticos, $peajes, $extras, $fee , $hazardCosto, $reeferCosto);

            $sql = 'INSERT INTO costeo_estimado (id_viaje, kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, reefer, fee, total)
                VALUES (' . $idViaje . ',' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ',' . $hazardCosto . ', ' . $reeferCosto . ',  ' . $fee . ', ' . $total . ')';

        } elseif ($hazardSi == "no") {
            $hazardCosto =  0;
            $total = $this->calcularTotal($kilometros, $combustible, $viaticos, $peajes, $extras, $fee , $hazardCosto, $reeferCosto);

            $sql = 'INSERT INTO costeo_estimado (id_viaje, kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, reefer, fee, total)
                VALUES (' . $idViaje . ',' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', ' . $hazardCosto . ', ' . $reeferCosto . ',  ' . $fee . ', ' . $total . ')';
        }

        $this->database->query($sql);

        return $this->database->costeoEstimadoReturneaId($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $hazardCosto);
    }

    public function enlazarProformaATablas($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer, $idEquipo)
    {
        $sql = 'INSERT INTO proforma (fecha, id_pedido_cliente, id_viaje, id_carga, id_costeo_estimado, id_usuario, $id_equipo)
                VALUES (curdate(), ' . $idPedido . ', ' . $idViaje . ', ' . $idCarga . ', ' . $idCosteoEstimado . ', ' . $idChofer . ', ' . $idEquipo . ')';

        return $this->database->query($sql);
    }

    public function mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer, $idEquipo)
    {
        return $this->database->mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer, $idEquipo);
    }


    public function mostrarProformaPorId($id)
    {
        return $this->database->mostrarProformaPorId($id);
    }

    public function calcularTotal($kilometros, $combustible, $viaticos, $peajes, $extras, $fee, $hazardCosto, $reeferCosto){
        $precioKilometro = $this->database->obtenerPrecioPorKm();
        $precioLitro = $this->database->obtenerPrecioPorLitro();
        $precioPeaje = $this->database->obtenerPrecioDePeaje();

        $kilometrosFinal = $kilometros * $precioKilometro;
        $combustibleFinal = $combustible * $precioLitro;
        $peajeFinal = $peajes * $precioPeaje;

        $total = $peajeFinal + $kilometrosFinal + $combustibleFinal + $viaticos + $extras + $fee + $hazardCosto + $reeferCosto;

        return $total;
    }
}