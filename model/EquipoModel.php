<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarEquipo($año_fabricacion,$estadoEquipo,$patente,$nro_chasis)
    {
        $sql = "INSERT INTO equipo (año_fabricacion,estado,patente,nro_chasis)
        VALUES ('". $año_fabricacion."',". $estadoEquipo .",'".$patente."',". $nro_chasis.")";

        return $this->database->query($sql);

    }

    public function registrarTractor($nro_motor,$marca,$modelo,$calendario,$kilometraje)
    {
        $sql = "INSERT INTO tractor (marca,modelo,calendario_service,nro_motor,kilometraje)
        VALUES ('". $marca."','". $modelo."','".$calendario."',". $nro_motor.",". $kilometraje.")";

        return $this->database->query($sql);

    }

    public function registrarAcoplado($acoplado)
    {
        $sql = "INSERT INTO acoplado (tipo_acoplado)
        VALUES ('". $acoplado."')";

        return $this->database->query($sql);
    }

    public function mostrarEquipos(){
        return $this->database->devolverEquipos();
    }
    public function mostrarTractor(){
        return $this->database->devolverTractor();
    }

    public function mostrarAcoplado(){
        return $this->database->devolverAcoplado();
    }


    public function eliminarEquipo($id){
        return $this->database->eliminarEquipo($id);
    }

    public function asginarAcopladoTractor($id_acoplado,$id_tractor,$id_equipo){
        return $this->database->asignarAcopladoTractor($id_acoplado,$id_tractor,$id_equipo);
    }

    public function modificaEquipo($id,$patente,$nro_chasis,$estadoEquipo){
        return $this->database->modificarEquipo($id,$patente,$nro_chasis,$estadoEquipo);
    }

    public function modificarAcoplado($id,$tipo){
        return $this->database->modificarAcoplado($id,$tipo);
    }

    public function eliminarAcoplado($id){
        return $this->database->eliminarAcoplado($id);
    }

    public function modificarTractor($id,$marca,$modelo,$nro_motor){
        return $this->database->modificarTractor($id,$marca,$modelo,$nro_motor);
    }

    public function eliminarTractor($id){
        return $this->database->eliminarTractor($id);
    }


}