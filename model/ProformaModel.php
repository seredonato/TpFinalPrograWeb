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

        $sql = 'INSERT INTO carga (tipo, peso_neto, hazard, clase_imoclass, subclase_imosubclass, reefer, temperatura)
                VALUES ("' . $tipo . '", ' . $peso . ', "' . $hazardSi . '", "' . $imoClass . '", "' . $imoSubClass . '",  "' . $temperaturaSi . '", ' . $temperatura . ')';

        $this->database->query($sql);

        return $this->database->cargaReturneaId($tipo, $peso, $hazardSi);
    }

    public function guardarCosteoEstimadoReturneaId($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $extras, $hazardSi, $hazardClass, $reeferCosto, $fee, $total)
    {

        if ($hazardSi=="si"){

            $sql = 'INSERT INTO costeo_estimado (kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, clase_imoclass, reefer, fee, total)
                VALUES (' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', "' . $hazardSi . '", "' . $hazardClass . '", ' . $reeferCosto . ',  ' . $fee . ', ' . $total . ')';

        } elseif ($hazardSi=="no"){

            $sql = 'INSERT INTO costeo_estimado (kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, reefer, fee, total)
                VALUES (' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', "' . $hazardSi . '", ' . $reeferCosto . ',  ' . $fee . ', ' . $total . ')';
        }

        $this->database->query($sql);

        return $this->database->costeoEstimadoReturneaId($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $hazardSi);
    }

    public function enlazarProformaATablas($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer)
    {
        $sql = 'INSERT INTO proforma (id_pedido_cliente, id_viaje, id_carga, id_costeo_estimado, id_chofer)
                VALUES (' . $idPedido . ', ' . $idViaje . ', ' . $idCarga . ', ' . $idCosteoEstimado . ', ' . $idChofer . ')';

        return $this->database->query($sql);
    }

    public function mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer){
        return $this->database->mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer);
}
}