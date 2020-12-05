<?php
include_once("public/fpdf/fpdf.php");

class PdfProformaController
{

    private $pedidoModel;
    private $usuarioModel;
    private $imoClassModel;
    private $imoSubClassModel;
    private $cargaModel;
    private $viajeModel;
    private $proformaModel;

    public function __construct($pedidoModel, $usuarioModel, $imoClassModel, $imoSubClassModel, $cargaModel, $viajeModel, $proformaModel)
    {
        $this->pedidoModel = $pedidoModel;
        $this->usuarioModel = $usuarioModel;
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

        if (isset($carga["clase_imoclass"])) {
            $imoClass = $this->imoClassModel->mostrarImoClassPorClase($carga["clase_imoclass"]);
        }
        if (isset($carga["subclase_imosubclass"])) {
            $imoSubClass = $this->imoSubClassModel->mostrarImoSubClassPorSubClase($carga["subclase_imosubclass"]);
        }
        $usuarioChofer = $this->usuarioModel->mostrarChoferPorId($proforma["id_usuario"]);


        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(0);
        $pdf->SetRightMargin(0);
        $pdf->SetTopMargin(0);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'b', 15);
        $pdf->Cell(0, 15, '        ' .
            $pdf->Image('public/images/logoheaderBlancoYNegro.png', 12, 1, 0, 13) .
            'Fecha: ' . $proforma["fecha"] . '                     ' .
            'PROFORMA DE VIAJE', 1, 1, 'C');
        $pdf->Ln(2);

        //PEDIDO

        $pdf->SetRightMargin(3);
        $pdf->SetLeftMargin(3);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'PEDIDO SOLICITADO', 1, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(40, 5, 'Nombre', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["nombre_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Fecha', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["fecha_pedido"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'CUIT', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["cuit_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["direccion_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Telefono', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["telefono_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Email', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["email_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de carga', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto1"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de llegada', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto2"], 1, 1, 'C');

        // VIAJE

        $pdf->SetXY(106, 17);
        $pdf->SetRightMargin(0);
        $pdf->SetLeftMargin(0);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'INFORMACION DEL VIAJE', 1, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetXY(106, 25);
        $pdf->Cell(40, 5, 'Origen', 1, 0, '');
        $pdf->Cell(60, 5, $viaje["origen"], 1, 1, 'C');
        $pdf->SetXY(106, 30);
        $pdf->Cell(40, 5, 'Destino', 1, 0, '');
        $pdf->Cell(60, 5, $viaje["destino"], 1, 1, 'C');
        $pdf->SetXY(106, 35);
        $pdf->Cell(40, 5, 'Fecha de carga', 1, 0, '');
        $pdf->Cell(60, 5, $viaje["fecha_carga"], 1, 1, 'C');
        $pdf->SetXY(106, 40);
        $pdf->Cell(40, 5, 'Horario de carga', 1, 0, '');
        $pdf->Cell(60, 5, $viaje["tiempo_carga"], 1, 1, 'C');
        $pdf->SetXY(106, 45);
        $pdf->Cell(40, 5, 'Fecha de llegada', 1, 0, '');
        $pdf->Cell(60, 5, $viaje["fecha_llegada"], 1, 1, 'C');
        $pdf->SetXY(106, 50);
        $pdf->Cell(40, 5, 'Horario de llegada', 1, 0, '');
        $pdf->Cell(60, 5, $viaje["tiempo_llegada"], 1, 1, 'C');
        $pdf->SetXY(106, 55);
        $pdf->Cell(40, 5, '', 1, 0, '');
        $pdf->Cell(60, 5, '', 1, 1, '');
        $pdf->SetXY(106, 60);
        $pdf->Cell(40, 5, '', 1, 0, '');
        $pdf->Cell(60, 5, '', 1, 1, '');
        $pdf->Ln(2);

        // EQUIPO

        $pdf->SetRightMargin(3);
        $pdf->SetLeftMargin(3);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'FLETE/EQUIPO DE TRANSPORTE', 1, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(40, 5, 'Nombre', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["nombre_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Fecha', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["fecha_pedido"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'CUIT', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["cuit_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["direccion_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Telefono', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["telefono_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Email', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["email_cliente"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de carga', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto1"], 1, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de llegada', 1, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto2"], 1, 1, 'C');

        //CARGA

        $pdf->SetXY(106, 67);
        $pdf->SetRightMargin(0);
        $pdf->SetLeftMargin(0);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'INFORMACION DE LA CARGA', 1, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetXY(106, 75);
        $pdf->Cell(40, 5, 'Tipo de carga', 1, 0, '');
        $pdf->Cell(60, 5, $carga["tipo"], 1, 1, 'C');
        $pdf->SetXY(106, 80);
        $pdf->Cell(40, 5, 'Peso', 1, 0, '');
        $pdf->Cell(60, 5, $carga["peso_neto"] . 'Kg', 1, 1, 'C');
        $pdf->SetXY(106, 85);
        $pdf->Cell(40, 5, 'Hazard', 1, 0, '');
        $pdf->Cell(60, 5, $carga["hazard"], 1, 1, 'C');
        $pdf->SetXY(106, 90);
        $pdf->Cell(40, 5, 'Clase del Hazard', 1, 0, '');
        $pdf->Cell(60, 5, $carga["clase_imoclass"], 1, 1, 'C');
        $pdf->SetXY(106, 95);
        $pdf->Cell(40, 5, 'Subclase del Hazard', 1, 0, '');
        $pdf->Cell(60, 5, $carga["subclase_imosubclass"], 1, 1, 'C');
        $pdf->SetXY(106, 100);
        $pdf->Cell(40, 5, 'Refrigeracion', 1, 0, '');
        $pdf->Cell(60, 5, $carga["reefer"], 1, 1, 'C');
        $pdf->SetXY(106, 105);
        $pdf->Cell(40, 5, 'Refrigeracion', 1, 0, '');
        $pdf->Cell(60, 5, $carga["temperatura"], 1, 1, 'C');
        $pdf->SetXY(106, 110);
        $pdf->Cell(40, 5, '', 1, 0, '');
        $pdf->Cell(60, 5, '', 1, 1, '');
        $pdf->Ln(2);

        //HAZARD

        $pdf->SetRightMargin(3);
        $pdf->SetLeftMargin(3);
        $pdf->Cell(0, 8, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(0, 8, 'EN CASO DE QUE LA CARGA TENGA HAZARD', 1, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(60, 5, 'Carga de clase tipo', 1, 0, '');
        $pdf->Cell(144, 5, $carga["clase_imoclass"], 1, 1, 'C');
        $pdf->Cell(60, 5, 'Descripcion Clase', 1, 0, '');
        $pdf->Cell(144, 5, utf8_decode($imoClass["descripcion"]), 1, 1, 'C');
        $pdf->Cell(60, 5, 'Sub-Clase designada', 1, 0, '');
        $pdf->Cell(144, 5, $carga["subclase_imosubclass"], 1, 1, 'C');
        $pdf->Cell(60, 10, 'Descripcion', 1, 0, '');
        $pdf->MultiCell(144, 10, utf8_decode($imoSubClass["descripcion"]), 1, 'C');
        $pdf->Cell(0, 8, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
        $pdf->Ln(2);


        $pdf->Output();
    }
}
