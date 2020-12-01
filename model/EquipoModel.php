<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarEquipo($año_fabricacion, $estadoEquipo, $patente, $nro_chasis)
    {

        $equipoObtenidoPatente = $this->database->devolverEquipoPorPatente($patente);

        if ($año_fabricacion == null || $estadoEquipo == null || $patente == null || $nro_chasis == null) {
            return "Ingrese todos los requerimientos";
        }
        if ($año_fabricacion == " " || $estadoEquipo == " " || $patente == " " || $nro_chasis == " ") {
            return "Ingrese todos los requerimientos";
        } else
            if (is_null($equipoObtenidoPatente)) {
                if (is_numeric($nro_chasis)) {
                    $sql = "INSERT INTO equipo (año_fabricacion,estado,patente,nro_chasis)
        VALUES ('" . $año_fabricacion . "','" . $estadoEquipo . "','" . $patente . "'," . $nro_chasis . ")";
                    return $this->database->query($sql);
                } else {
                    return "Ingrese sólo números en el campo número de chasis";
                }
            } else {
                return "Patente ya existente";
            }
    }


    public function mostrarEquipos()
    {
        return $this->database->devolverEquipos();
    }

    public function eliminarEquipo($id)
    {
        return $this->database->eliminarEquipo($id);
    }

    public function asginarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo)
    {
        return $this->database->asignarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo);
    }

    public function modificaEquipo($id, $patente, $nro_chasis, $estadoEquipo)
    {
        return $this->database->modificarEquipo($id, $patente, $nro_chasis, $estadoEquipo);
    }


}