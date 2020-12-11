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

    public function modificarLicenciaUsuario($idUsuario, $licencia){
        return $this->database->modificarLicenciaUsuario($idUsuario, $licencia);
    }

    public function eliminarUsuario($id){

        return $this->database->eliminarUsuario($id);

    }

    public function cambiarImagenPerfil($id, $destination){
        $sql = 'UPDATE usuario
                SET imagen = "' . $destination . '" WHERE id=' . $id;

        return $this->database->query($sql);
    }

    public function mostrarUsuarioPorNombreDeUsuario($nombreUsuario){
        return $this->database->mostrarUsuarioPorNombreDeUsuario($nombreUsuario);
    }

    public function mostrarChoferes(){
        return $this->database->mostrarChoferes();
    }

    public function mostrarChoferPorId($id){
        return $this->database->mostrarChoferPorId($id);
    }

}