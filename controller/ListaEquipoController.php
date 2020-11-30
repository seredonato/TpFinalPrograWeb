<?php


class ListaEquipoController
{
    private $render;
    private $loginModel;
    private $equipoModel;
    private $acopladoModel;
    private $tractorModel;


    public function __construct($render,$loginModel,$equipoModel,$acopladoModel,$tractorModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->equipoModel = $equipoModel;
        $this->acopladoModel = $acopladoModel;
        $this->tractorModel = $tractorModel;

    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php", $data);

    }

    public function registroEquipo()
    {
        $año_fabricacion = $_POST["año_fabricacion"];
        $estadoEquipo = $_POST["estadoEquipo"];
        $patente = $_POST["patente"];
        $nro_chasis = $_POST["nro_chasis"];
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        $result = $this->equipoModel->registrarEquipo($año_fabricacion, $estadoEquipo, $patente, $nro_chasis);
        if ($result == "Patente ya existente") {
            $data["registroEquipoError"] = $result;
            echo $this->render->render("view/listaEquipoView.php", $data);
        }if ($result == "Ingrese todos los requerimientos"){
            $data["registroEquipoError"] = $result;
            echo $this->render->render("view/listaEquipoView.php", $data);
        }
        if ($result == "Ingrese sólo números en el campo número de chasis" ){
            $data["registroEquipoError"] = $result;
            echo $this->render->render("view/listaEquipoView.php", $data);
        }
        else {
            $data["equipos"] = $this->equipoModel->mostrarEquipos();
            echo $this->render->render("view/listaEquipoView.php", $data);
        }
    }

    public function eliminarEquipo(){

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $id = $_GET["id"];

        $this->equipoModel->eliminarEquipo($id);
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php", $data);
    }

    public function asginarAcopladoTractor(){
        $acoplado_id = $_POST["acoplado"];
        $tractor_id = $_POST["tractor"];
        $equipo_id = $_POST["id"];

        $result = $this->equipoModel->asginarAcopladoTractor($acoplado_id,$tractor_id,$equipo_id);
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        $data["tractores"] = $this->tractorModel->mostrarTractor();
        echo $this->render->render("view/listaEquipoView.php",$data);
    }

    public function modificarEquipo(){
        $id = $_POST["id"];
        $patente = $_POST["patente"];
        $nro_chasis = $_POST["nro_chasis"];
        $estadoEquipo= $_POST["estadoEquipo"];

        $result = $this->equipoModel->modificaEquipo($id,$patente,$nro_chasis,$estadoEquipo);

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php",$data);
    }
}