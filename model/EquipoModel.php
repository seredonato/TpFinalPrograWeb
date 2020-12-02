<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarEquipo($año_fabricacion, $estadoEquipo, $patente)
    {
        $eliminado = "no";
        $equipoObtenidoPatente = $this->database->devolverEquipoPorPatente($patente);

        if ($año_fabricacion == null || $estadoEquipo == null || $patente == null ) {
            return "Ingrese todos los requerimientos";
        }
        if ($año_fabricacion == " " || $estadoEquipo == " " || $patente == " ") {
            return "Ingrese todos los requerimientos";
        } else
            if (is_null($equipoObtenidoPatente)) {
                    $sql = "INSERT INTO equipo (año_fabricacion,estado,patente,eliminado)
        VALUES ('" . $año_fabricacion . "','" . $estadoEquipo . "','" . $patente . "','" . $eliminado . "')";

                    return $this->database->query($sql);
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

    public function modificaEquipo($id, $patente, $estadoEquipo,$fecha)
    {
        return $this->database->modificarEquipo($id, $patente, $estadoEquipo,$fecha);
    }


}