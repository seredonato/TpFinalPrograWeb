<?php


class QrController
{
    private $render;
    private $qrModel;
    private $loginModel;

    public function __construct($render, $qrModel, $loginModel)
    {
        $this->render = $render;
        $this->qrModel = $qrModel;
        $this->loginModel = $loginModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        echo $this->render->render("view/enviarQrView.php", $data);
    }

    public function decodificarQr(){
        $archivo = $_FILES['qrimage']['tmp_name'];
        $textDecodificado = $this->qrModel->decodificarQrDesdeArchivo($archivo);

        header("Location: ".$textDecodificado);
        exit();
    }
}