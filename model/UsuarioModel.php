<?php


class UsuarioModel
{
    private $database;


    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarUsuarios(){

        return $this->database->devolverUsuarios();

    }

    public function modificarRolUsuario($idUsuario, $rol){

        return $this->database->modificarRolUsuario($idUsuario, $rol);

    }

    public function eliminarUsuario($id){

        return $this->database->eliminarUsuario($id);

    }

}