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

    public function execute()
    {
        $idPedido = $_GET["id"];

        $pedido = $this->pedidoModel->mostrarPedidoPorId($idPedido);

        $proforma = $this->proformaModel->mostrarProformaPorId($pedido["id_proforma"]);

        $carga = $this->cargaModel->mostrarCargaPorId($proforma["id_carga"]);

        $viaje = $this->viajeModel->mostrarViajePorId($proforma["id_viaje"]);

        $imoClass = $this->imoClassModel->mostrarImoClassPorClase($carga["clase_imoclass"]);

        $imoSubClass = $this->imoSubClassModel->mostrarImoSubClassPorSubClase($carga["subclase_imosubclass"]);

        $chofer = $this->choferModel->mostrarChoferPorId($proforma["id_chofer"]);


        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(0);
        $pdf->SetRightMargin(0);
        $pdf->SetTopMargin(0);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 15);
        $pdf->Cell(0,15,'        ' .
            $pdf->Image('public/images/logoheaderBlancoYNegro.png',12,1,0,13).
            'Fecha: '. $proforma["fecha"]. '                     '.
            'PROFORMA DE VIAJE',1,1,'C');
        $pdf->Ln(2);
        $pdf->SetLeftMargin(3);
        $pdf->SetRightMargin(3);
        $pdf->SetFontSize(10);
        $pdf->Cell(90,10,'Pedido Del Cliente',1,1,'C');
        $pdf->SetFontSize(8);
        $pdf->Cell(90,10,'Nombre: '. $pedido["nombre_cliente"],0,1,'');
        $pdf->Cell(90,10,'Fecha: '. $pedido["fecha_pedido"],0,1,'');
        $pdf->Cell(90,10,'Cuit: '. $pedido["cuit_cliente"],0,1,'');
        $pdf->Cell(90,10,'Direccion: '. $pedido["direccion_cliente"],0,1,'');
        $pdf->Cell(90,10,'Telefono: '. $pedido["telefono_cliente"],0,1,'');
        $pdf->Cell(90,10,'Email: '. $pedido["email_cliente"],0,1,'');
        $pdf->Cell(90,10,'Direccion de carga: '. $pedido["contacto1"],0,1,'');
        $pdf->Cell(90,10,'Direccion de llegada: '. $pedido["contacto2"],0,1,'');








        /*for ($i = 1; $i <= 40; $i++) {
            $pdf->Cell(0, 10, utf8_decode('Imprimiendo línea número ' . $i), 0, 1);


        }*/




        $pdf->Output();
    }
}
