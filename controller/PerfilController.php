<?php


class PerfilController
{
    private $render;
    private $usuarioModel;
    private $loginModel;

    public function __construct($render, $usuarioModel, $loginModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
        $this->loginModel = $loginModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        if ($data["login"]) {
            $rol = $this->loginModel->getRolDeUsuario($_SESSION["nombreUsuario"]);
            $valorDelRol = $this->loginModel->confirmarRolUsuario($rol);
            $valorAdmin = $this->loginModel->confirmarAdmin($valorDelRol);
            $valorChofer = $this->loginModel->confirmarChofer($valorDelRol);
            $valorMecanico = $this->loginModel->confirmarMecanico($valorDelRol);
            $valorSupervisor = $this->loginModel->confirmarSupervisor($valorDelRol);

            $data["valorAdmin"] = $valorAdmin;
            $data["valorChofer"] = $valorChofer;
            $data["valorMecanico"] = $valorMecanico;
            $data["valorSupervisor"] = $valorSupervisor;

            $usuario = $this->usuarioModel->mostrarUsuarioPorNombreDeUsuario($_SESSION["nombreUsuario"]);

            $data["id"] = $usuario["id"];
            $data["usuario"] = $usuario["usuario"];
            $data["nombre"] = $usuario["nombre"];
            $data["email"] = $usuario["email"];
            $data["fecha_nacimiento"] = $usuario["fecha_nacimiento"];
            $data["rol"] = $usuario["rol"];
            $data["imagen"] = $usuario["imagen"];
            $data["apellido"] = $usuario["apellido"];
            $data["dni"] = $usuario["dni"];
            $data["tipo_licencia"] = $usuario["tipo_licencia"];

            echo $this->render->render("view/perfilView.php", $data);

        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

        }

        public function cambiarImagenPerfil()
        {

            $data["login"] = $this->loginModel->ifSesionIniciada();

            if ($data["login"]) {
                $rol = $this->loginModel->getRolDeUsuario($_SESSION["nombreUsuario"]);
                $valorDelRol = $this->loginModel->confirmarRolUsuario($rol);
                $valorAdmin = $this->loginModel->confirmarAdmin($valorDelRol);
                $valorChofer = $this->loginModel->confirmarChofer($valorDelRol);
                $valorMecanico = $this->loginModel->confirmarMecanico($valorDelRol);
                $valorSupervisor = $this->loginModel->confirmarSupervisor($valorDelRol);

                $data["valorAdmin"] = $valorAdmin;
                $data["valorChofer"] = $valorChofer;
                $data["valorMecanico"] = $valorMecanico;
                $data["valorSupervisor"] = $valorSupervisor;

                $id = $_GET["id"];

                if ($imagen = $_FILES["imagen"]["error"] <= 0) {

                    $destination = "/public/images/" . $_FILES["imagen"]["name"];

                    move_uploaded_file($_FILES["imagen"]["tmp_name"], "public/images/" . $_FILES["imagen"]["name"]);

                    $this->usuarioModel->cambiarImagenPerfil($id, $destination);

                    $usuario = $this->usuarioModel->mostrarUsuarioPorNombreDeUsuario($_SESSION["nombreUsuario"]);

                    $data["id"] = $usuario["id"];
                    $data["usuario"] = $usuario["usuario"];
                    $data["nombre"] = $usuario["nombre"];
                    $data["email"] = $usuario["email"];
                    $data["fecha_nacimiento"] = $usuario["fecha_nacimiento"];
                    $data["rol"] = $usuario["rol"];
                    $data["imagen"] = $usuario["imagen"];
                    $data["apellido"] = $usuario["apellido"];
                    $data["dni"] = $usuario["dni"];
                    $data["tipo_licencia"] = $usuario["tipo_licencia"];

                    echo $this->render->render("view/perfilView.php", $data);
                }
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        }

}