<?php


class ProformaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarViaje($origen, $destino, $fechaCarga, $horaCarga, $fechaLlegada, $horaLlegada){

        $sql = 'INSERT INTO viaje (origen, destino, fecha_carga, tiempo_carga, fecha_llegada, tiempo_llegada)
                VALUES ("' . $origen . '", "' . $destino . '", "' . $fechaCarga . '", "' . $horaCarga . '", "' . $fechaLlegada . '", "' . $horaLlegada . '", )';

        return $this->database->query($sql);

    }

    public function guardarCarga($tipo, $peso, $hazardSi, $imoClass, $imoSubClass, $temperaturaSi, $temperatura){

        $sql = 'INSERT INTO carga (tipo, peso_neto, hazard, clase_imoclass, subclase_imosubclass, reefer, temperatura)
                VALUES ("' . $tipo . '", ' . $peso . ', "' . $hazardSi . '", "' . $imoClass . '", "' . $imoSubClass . '",  "' . $temperaturaSi . '", ' . $temperatura . ')';

        return $this->database->query($sql);
    }

    public function guardarCosteoEstimado($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $extras, $hazardClass, $reeferCosto, $total){

        if (isset($hazardClass)){
            $hazard = "si";
        } else {
            $hazard = "no";
        }

        $sql = 'INSERT INTO costeo_estimado (kilometros, combustible, tiempo_salida, tiempo_llegada, viaticos, peajes_pesajes, extras, hazard, clase_imoclass, reefer, fee, total)
                VALUES (' . $kilometros . ', ' . $combustible . ', "' . $horaSalida . '", "' . $horaLlegada . '", ' . $viaticos . ', ' . $peajes . ', ' . $extras . ', "' . $hazard . '" , "' . $hazardClass . '", ' . $reeferCosto . ', ' . $total . ')';

        return $this->database->query($sql);
}
}