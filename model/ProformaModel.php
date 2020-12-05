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

    public function guardarCosteoEstimadoReturneaId($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $extras, $hazardSi, $hazardClass, $reeferCosto, $fee, $total)
    {

        if ($hazardSi == "si") {

            $sql = 'INSERT INTO costeo_estimado (kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, clase_imoclass, reefer, fee, total)
                VALUES (' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', "' . $hazardSi . '", "' . $hazardClass . '", ' . $reeferCosto . ',  ' . $fee . ', ' . $total . ')';

        } elseif ($hazardSi == "no") {

            $sql = 'INSERT INTO costeo_estimado (kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, reefer, fee, total)
                VALUES (' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', "' . $hazardSi . '", ' . $reeferCosto . ',  ' . $fee . ', ' . $total . ')';
        }

        $this->database->query($sql);

        return $this->database->costeoEstimadoReturneaId($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $hazardSi);
    }

    public function enlazarProformaATablas($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer)
    {
        $sql = 'INSERT INTO proforma (fecha, id_pedido_cliente, id_viaje, id_carga, id_costeo_estimado, id_usuario)
                VALUES (curdate(), ' . $idPedido . ', ' . $idViaje . ', ' . $idCarga . ', ' . $idCosteoEstimado . ', ' . $idChofer . ')';

        return $this->database->query($sql);
    }

    public function mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer)
    {
        return $this->database->mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer);
    }


    public function mostrarProformaPorId($id)
    {
        return $this->database->mostrarProformaPorId($id);
    }

}