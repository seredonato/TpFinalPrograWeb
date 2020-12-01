<?php
include_once ("public/fpdf/fpdf.php");

class PdfProformaController
{

    private $pedidoModel;
    private $choferModel;
    private $imoClassModel;
    private $imoSubClassModel;
    private $cargaModel;
    private $viajeModel;
    private $proformaModel;

    public function __construct($pedidoModel, $choferModel, $imoClassModel, $imoSubClassModel, $cargaModel, $viajeModel, $proformaModel)
    {
        $this->pedidoModel = $pedidoModel;
        $this->choferModel = $choferModel;
        $this->imoClassModel = $imoClassModel;
        $this->imoSubClassModel = $imoSubClassModel;
        $this->cargaModel = $cargaModel;
        $this->viajeModel = $viajeModel;
        $this->proformaModel = $proformaModel;
    }

    public function execute(){
        $idPedido = $_GET["id"];

        $pedido = $this->pedidoModel->mostrarPedidoPorId($idPedido);

        $proforma = $this->proformaModel->mostrarProformaPorId($pedido["id_proforma"]);

        $carga = $this->cargaModel->mostrarCargaPorId($proforma["id_carga"]);

        $viaje = $this->viajeModel->mostrarViajePorId($proforma["id_viaje"]);

        $imoClass = $this->imoClassModel->mostrarImoClassPorClase($carga["clase_imoclass"]);

        $imoSubClass = $this->imoSubClassModel->mostrarImoSubClassPorSubClase($carga["subclase_imosubclass"]);






        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'' . $id . '');
        $pdf->Output();


    }
}