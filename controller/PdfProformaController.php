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
        $pdf->SetFillColor(200,200,200);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'b', 15);
        $pdf->Cell(0,15,'        ' .
            $pdf->Image('public/images/logoheaderBlancoYNegro.png',12,1,0,13).
            'Fecha: '. $proforma["fecha"]. '                     '.
            'PROFORMA DE VIAJE',1,1,'C');
        $pdf->Ln(2);
        $pdf->SetRightMargin(3);
        $pdf->SetLeftMargin(3);
        $pdf->SetFont('helvetica','b', 12);
        $pdf->Cell(100,8,'Pedido',1,1,'C',6);
        $pdf->SetFont('helvetica','', 9);
        $pdf->Cell(40,5,'Nombre',1,0,'');
        $pdf->Cell(60,5,$pedido["nombre_cliente"],1,1,'C');
        $pdf->Cell(40,5,'Fecha',1,0,'');
        $pdf->Cell(60,5,$pedido["fecha_pedido"],1,1,'C');
        $pdf->Cell(40,5,'CUIT',1,0,'');
        $pdf->Cell(60,5,$pedido["cuit_cliente"],1,1,'C');
        $pdf->Cell(40,5,'Direccion',1,0,'');
        $pdf->Cell(60,5,$pedido["direccion_cliente"],1,1,'C');
        $pdf->Cell(40,5,'Telefono',1,0,'');
        $pdf->Cell(60,5,$pedido["telefono_cliente"],1,1,'C');
        $pdf->Cell(40,5,'Email',1,0,'');
        $pdf->Cell(60,5,$pedido["email_cliente"],1,1,'C');
        $pdf->Cell(40,5,'Direccion de carga',1,0,'');
        $pdf->Cell(60,5,$pedido["contacto1"],1,1,'C');
        $pdf->Cell(40,5,'Direccion de llegada',1,0,'');
        $pdf->Cell(60,5,$pedido["contacto2"],1,1,'C');

        $pdf->SetXY(106,17);
        $pdf->SetRightMargin(0);
        $pdf->SetLeftMargin(0);
        $pdf->SetFont('helvetica','b', 12);
        $pdf->Cell(100,8,'Viaje',1,1,'C',6);
        $pdf->SetFont('helvetica','', 9);
        $pdf->SetXY(106,25);
        $pdf->Cell(40,5,'Origen',1,0,'');
        $pdf->Cell(60,5,$viaje["origen"],1,1,'C');
        $pdf->SetXY(106,30);
        $pdf->Cell(40,5,'Destino',1,0,'');
        $pdf->Cell(60,5,$viaje["destino"],1,1,'C');
        $pdf->SetXY(106,35);
        $pdf->Cell(40,5,'Fecha de carga',1,0,'');
        $pdf->Cell(60,5,$viaje["fecha_carga"],1,1,'C');
        $pdf->SetXY(106,40);
        $pdf->Cell(40,5,'Horario de carga',1,0,'');
        $pdf->Cell(60,5,$viaje["tiempo_carga"],1,1,'C');
        $pdf->SetXY(106,45);
        $pdf->Cell(40,5,'Fecha de llegada',1,0,'');
        $pdf->Cell(60,5,$viaje["fecha_llegada"],1,1,'C');
        $pdf->SetXY(106,50);
        $pdf->Cell(40,5,'Horario de llegada',1,0,'');
        $pdf->Cell(60,5,$viaje["tiempo_llegada"],1,1,'C');
        $pdf->SetXY(106,55);
        $pdf->Cell(40,5,'',1,0,'');
        $pdf->Cell(60,5,'',1,1,'');
        $pdf->SetXY(106,60);
        $pdf->Cell(40,5,'',1,0,'');
        $pdf->Cell(60,5,'',1,1,'');
        $pdf->Ln(2);















        /*for ($i = 1; $i <= 40; $i++) {
            $pdf->Cell(0, 10, utf8_decode('Imprimiendo línea número ' . $i), 0, 1);


        }*/




        $pdf->Output();
    }
}
