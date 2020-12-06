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
        $pdf->SetLeftMargin(5);
        $pdf->SetRightMargin(5);
        $pdf->SetTopMargin(10);
        $pdf->SetFillColor(200, 200, 200);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'b', 25);
        $pdf->Cell(0, 21,'PROFORMA', 0, 0, 'C');
        $pdf->SetFont('helvetica', '', 13);
        $pdf->SetXY(5, 20);
        $pdf->Cell(0, 22, 'FECHA: ' . $proforma["fecha"], 0, 0, 'C');
        $pdf->SetXY(5, 25);
        $pdf->Cell(0, 24, utf8_decode('Nº DE FACTURA: '. $proforma["id"]), 0, 0, 'C');
        $pdf->SetXY(5, 32);
        $pdf->Cell(0, 22,'TELEFONO : 1196464212' , 0, 0, 'C');
        $pdf->SetXY(5, 2);
        $pdf->Cell(50, 50,'', 1, 0, '');
        $pdf->Image('public/images/logoheaderBlancoYNegro.png', 6, 7, 0, 35);
        $pdf->SetXY(155, 2);
        $pdf->Cell(50, 50,'', 1, 0, '');
        $pdf->SetXY(155, 2);
        $pdf->Cell(50, 50,'QR', 0, 0, 'C');
        $pdf->Ln(2);

        //PEDIDO

        $pdf->SetRightMargin(5);
        $pdf->SetLeftMargin(5);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->SetXY(5, 60);
        $pdf->Cell(100, 8, 'PEDIDO SOLICITADO', 0, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(40, 5, 'Nombre', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["nombre_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Fecha', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["fecha_pedido"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'CUIT', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["cuit_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["direccion_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Telefono', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["telefono_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Email', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["email_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de carga original', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto1"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de llegada original', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto2"], 0, 1, 'C');

        // VIAJE

        $pdf->SetXY(106, 60);
        $pdf->SetRightMargin(0);
        $pdf->SetLeftMargin(0);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'INFORMACION DEL VIAJE', 0, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetXY(106, 68);
        $pdf->Cell(40, 5, 'Origen', 0, 0, '');
        $pdf->Cell(60, 5, $viaje["origen"], 0, 1, 'C');
        $pdf->SetXY(106, 73);
        $pdf->Cell(40, 5, 'Destino', 0, 0, '');
        $pdf->Cell(60, 5, $viaje["destino"], 0, 1, 'C');
        $pdf->SetXY(106, 78);
        $pdf->Cell(40, 5, 'Fecha de carga', 0, 0, '');
        $pdf->Cell(60, 5, $viaje["fecha_carga"], 0, 1, 'C');
        $pdf->SetXY(106, 83);
        $pdf->Cell(40, 5, 'Horario de carga', 0, 0, '');
        $pdf->Cell(60, 5, $viaje["tiempo_carga"], 0, 1, 'C');
        $pdf->SetXY(106, 88);
        $pdf->Cell(40, 5, 'Fecha de llegada', 0, 0, '');
        $pdf->Cell(60, 5, $viaje["fecha_llegada"], 0, 1, 'C');
        $pdf->SetXY(106, 93);
        $pdf->Cell(40, 5, 'Horario de llegada', 0, 0, '');
        $pdf->Cell(60, 5, $viaje["tiempo_llegada"], 0, 1, 'C');
        $pdf->SetXY(106, 98);
        $pdf->Cell(40, 5, '', 0, 0, '');
        $pdf->Cell(60, 5, '', 0, 1, '');
        $pdf->SetXY(106, 103);
        $pdf->Cell(40, 5, '', 0, 0, '');
        $pdf->Cell(60, 5, '', 0, 1, '');
        $pdf->Ln(2);

        // EQUIPO

        $pdf->SetRightMargin(3);
        $pdf->SetLeftMargin(3);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'FLETE/EQUIPO DE TRANSPORTE', 0, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->Cell(40, 5, 'Nombre', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["nombre_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Fecha', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["fecha_pedido"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'CUIT', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["cuit_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["direccion_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Telefono', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["telefono_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Email', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["email_cliente"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de carga', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto1"], 0, 1, 'C');
        $pdf->Cell(40, 5, 'Direccion de llegada', 0, 0, '');
        $pdf->Cell(60, 5, $pedido["contacto2"], 0, 1, 'C');

        //CARGA

        $pdf->SetXY(106, 110);
        $pdf->SetRightMargin(0);
        $pdf->SetLeftMargin(0);
        $pdf->SetFont('helvetica', 'b', 12);
        $pdf->Cell(100, 8, 'INFORMACION DE LA CARGA', 0, 1, 'C', 6);
        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetXY(106, 118);
        $pdf->Cell(40, 5, 'Tipo de carga', 0, 0, '');
        $pdf->Cell(60, 5, $carga["tipo"], 0, 1, 'C');
        $pdf->SetXY(106, 123);
        $pdf->Cell(40, 5, 'Peso', 0, 0, '');
        $pdf->Cell(60, 5, $carga["peso_neto"] . 'Kg', 0, 1, 'C');
        $pdf->SetXY(106, 128);
        $pdf->Cell(40, 5, 'Hazard', 0, 0, '');
        $pdf->Cell(60, 5, $carga["hazard"], 0, 1, 'C');
        $pdf->SetXY(106, 133);
        if ($carga["hazard"] == "si") {
            $pdf->Cell(40, 5, 'Clase del Hazard', 0, 0, '');
            $pdf->Cell(60, 5, $carga["clase_imoclass"], 0, 1, 'C');
            $pdf->SetXY(106, 138);
            $pdf->Cell(40, 5, 'Subclase del Hazard', 0, 0, '');
            $pdf->Cell(60, 5, $carga["subclase_imosubclass"], 0, 1, 'C');

        } elseif ($carga["hazard"] == "no") {
            $pdf->Cell(40, 5, 'Clase del Hazard', 0, 0, '');
            $pdf->Cell(60, 5, 'X', 0, 1, 'C');
            $pdf->SetXY(106, 138);
            $pdf->Cell(40, 5, 'Subclase del Hazard', 0, 0, '');
            $pdf->Cell(60, 5, 'X', 0, 1, 'C');
        }
        $pdf->SetXY(106, 143);
        $pdf->Cell(40, 5, 'Refrigeracion', 0, 0, '');
        $pdf->Cell(60, 5, $carga["reefer"], 0, 1, 'C');
        $pdf->SetXY(106, 148);
        if ($carga["reefer"] == "si") {

            $pdf->Cell(40, 5, 'Refrigeracion', 0, 0, '');
            $pdf->Cell(60, 5, $carga["temperatura"], 0, 1, 'C');
            $pdf->SetXY(106, 153);
            $pdf->Cell(40, 5, '', 0, 0, '');
            $pdf->Cell(60, 5, '', 0, 1, '');
            $pdf->Ln(2);
        }elseif ( $carga["reefer"] == "no"){
            $pdf->Cell(40, 5, 'Refrigeracion', 0, 0, '');
            $pdf->Cell(60, 5, "X", 0, 1, 'C');
            $pdf->SetXY(106, 153);
            $pdf->Cell(40, 5, '', 0, 0, '');
            $pdf->Cell(60, 5, '', 0, 1, '');
            $pdf->Ln(2);
        }

        //HAZARD
        if ($carga["hazard"] == "si") {
            $pdf->SetRightMargin(3);
            $pdf->SetLeftMargin(3);
            $pdf->Cell(0, 8, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->SetFont('helvetica', 'b', 12);
            $pdf->Cell(0, 8, 'EN CASO DE QUE LA CARGA TENGA HAZARD', 0, 1, 'C', 6);
            $pdf->SetFont('helvetica', '', 9);
            $pdf->Cell(40, 5, 'Carga de clase tipo', 0, 0, '');
            $pdf->Cell(144, 5, $carga["clase_imoclass"], 0, 1, 'C');
            $pdf->Cell(40, 5, 'Descripcion Clase', 0, 0, '');
            $pdf->Cell(144, 5, utf8_decode($imoClass["descripcion"]), 0, 1, 'C');
            $pdf->Cell(40, 5, 'Sub-Clase designada', 0, 0, '');
            $pdf->Cell(144, 5, $carga["subclase_imosubclass"], 0, 1, 'C');
            $pdf->Cell(40, 10, 'Descripcion', 0, 0, '');
            $pdf->MultiCell(144, 10, utf8_decode($imoSubClass["descripcion"]), 0, 'C');
            $pdf->Cell(0, 8, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->Ln(2);
        }

        $pdf->Output();
    }
}
