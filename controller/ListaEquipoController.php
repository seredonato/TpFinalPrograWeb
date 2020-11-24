<?php


class ListaEquipoController
{
    private $render;
    private $loginModel;
    private $equipoModel;


    public function __construct($render,$loginModel,$equipoModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->equipoModel = $equipoModel;

    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        $data["tractores"] = $this->equipoModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php", $data);

    }

    public function registroEquipo(){
        $año_fabricacion = $_POST["año_fabricacion"];
        $estadoEquipo = $_POST["estadoEquipo"];
        $patente = $_POST["patente"];
        $nro_chasis = $_POST["nro_chasis"];

        $result = $this->equipoModel->registrarEquipo($año_fabricacion,$estadoEquipo,$patente,$nro_chasis);
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        $data["tractores"] = $this->equipoModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php",$data);
    }

    public function registroTractor(){
        $nro_motor = $_POST["nro_motor"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $calendario = $_POST["calendario"];
        $kilometraje = $_POST["kilometraje"];

        $result = $this->equipoModel->registrarTractor($nro_motor,$marca,$modelo,$calendario,$kilometraje);
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        $data["tractores"] = $this->equipoModel->mostrarTractor();
        echo $this->render->render("view/listaEquipoView.php",$data);
    }

    public function registroAcoplado(){
        $acoplado = $_POST["acoplado"];

        $result = $this->equipoModel->registrarAcoplado( $acoplado);
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        $data["tractores"] = $this->equipoModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php",$data);

    }


    public function eliminarEquipo(){

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $id = $_GET["id"];

        $this->equipoModel->eliminarEquipo($id);
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        $data["tractores"] = $this->equipoModel->mostrarTractor();

        echo $this->render->render("view/listaEquipoView.php", $data);
    }

    public function asginarAcopladoTractor(){
        $acoplado_id = $_POST["acoplado"];
        $tractor_id = $_POST["tractor"];
        $equipo_id = $_POST["id"];

        $result = $this->equipoModel->asginarAcopladoTractor($acoplado_id,$tractor_id,$equipo_id);
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        $data["tractores"] = $this->equipoModel->mostrarTractor();
        echo $this->render->render("view/listaEquipoView.php",$data);
    }


}