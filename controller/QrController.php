<?php


class QrController
{
    private $render;
    private $qrModel;

    public function __construct($render, $qrModel)
    {
        $this->render = $render;
        $this->qrModel = $qrModel;
    }

    public function execute()
    {
        echo $this->render->render("view/enviarQrView.php");
    }

    public function decodificarQr(){
        $archivo = $_FILES['qrimage']['tmp_name'];
        $textDecodificado = $this->qrModel->decodificarQrDesdeArchivo($archivo);

        header("Location: ".$textDecodificado);
        exit();
    }
}