<?php
include_once("public/fpdf/fpdf.php");

class PdfReporteController
{
    private $reporteModel;
    private $render;
    private $loginModel;

    public function __construct($render,$reporteModel,$loginModel)
    {
        $this->reporteModel = $reporteModel;
        $this->render = $render;
        $this->loginModel = $loginModel;
    }


    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        if (isset($_SESSION["nombreUsuario"])) {
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

            if ($valorDelRol == 4) {

                $idProforma = $_GET["id"];

                $reportes = $this->reporteModel->obtenerReportes($idProforma);

                $chofer = $this->reporteModel->obtenerDatosChoferPorIdProforma($idProforma);

                $pdf = new FPDF();
                $pdf->AliasNbPages();
                $pdf->SetLeftMargin(5);
                $pdf->SetRightMargin(5);
                $pdf->SetTopMargin(10);
                $pdf->SetFillColor(200, 200, 200);
                $pdf->SetAutoPageBreak(0, 0);

                foreach ($reportes as $reporte) {

                    $pdf->AddPage();
                    $pdf->SetFont('helvetica', 'b', 25);
                    $pdf->Cell(0, 36, 'REPORTE', 0, 0, 'C');
                    $pdf->SetFont('helvetica', '', 13);
                    $pdf->SetXY(5, 20);
                    $pdf->Cell(0, 40, 'FECHA: ' . $reporte["fecha"], 0, 0, 'C');
                    $pdf->SetXY(150, 15);
                    $pdf->SetFont('helvetica', 'u', 14);
                    $pdf->Cell(0, 24, utf8_decode('Nº DE VIAJE: ' . $reporte["id_viaje"]), 0, 0, 'C');
                    $pdf->SetXY(5, 32);
                    $pdf->SetXY(5, 2);
                    $pdf->Cell(50, 50, '', 0, 0, '');
                    $pdf->Image('public/images/logoheader.png', 6, 7, 0, 40);
                    $pdf->SetXY(155, 2);

                    //DATOS
                    $pdf->SetRightMargin(5);
                    $pdf->SetLeftMargin(5);
                    $pdf->SetFont('helvetica', 'b', 18);
                    $pdf->SetFillColor(234, 149, 58);
                    $pdf->SetXY(5, 60);
                    $pdf->Cell(0, 10, 'DATOS', 1, 1, 'C', 6);
                    $pdf->SetFont('helvetica', '', 15);
                    $pdf->Cell(0, 15, 'Kilometros: ' . $reporte["kilometros"], 0, 0, 'C');
                    $pdf->SetXY(5, 75);
                    $pdf->Cell(0, 25, 'Combustible: ' . $reporte["combustible"], 0, 0, 'C');
                    $pdf->SetXY(5, 82);
                    $pdf->Cell(0, 30, 'Viaticos: ' . $reporte["viaticos"], 0, 0, 'C');
                    $pdf->SetXY(5, 90);
                    $pdf->Cell(0, 35, 'Peajes y Pesajes: ' . $reporte["peajes_pesajes"], 0, 0, 'C');
                    $pdf->SetXY(5, 98);
                    $pdf->Cell(0, 40, 'Extras: ' . $reporte["extras"], 0, 0, 'C');
                    $pdf->SetXY(5, 105);
                    $pdf->Cell(0, 45, 'Fee: ' . $reporte["fee"], 0, 0, 'C');
                    $pdf->SetFont('helvetica', 'b', 17);
                    $pdf->SetXY(5, 112);
                    $pdf->Cell(0, 55, 'Total: ' . $reporte["total"], 0, 0, 'C');

                    //POSICIÓN
                    $pdf->SetRightMargin(5);
                    $pdf->SetLeftMargin(5);
                    $pdf->SetFont('helvetica', 'b', 18);
                    $pdf->SetFillColor(234, 149, 58);
                    $pdf->SetXY(5, 155);
                    $pdf->Cell(0, 10, utf8_decode('POSICIÓN'), 1, 1, 'C', 6);
                    $pdf->SetFont('helvetica', 'b', 13);
                    $pdf->Cell(0, 15, utf8_decode('Para ver la ubicación copie la latitud y longitud y péguelo en el buscador de Google Maps'), 0, 0, 'C');
                    $pdf->SetFont('helvetica', 'b', 15);
                    $pdf->SetXY(5, 174);
                    $pdf->Cell(0, 20, 'Latitud: ' . $reporte["latitud"], 0, 0, '');
                    $pdf->SetXY(10, 174);
                    $pdf->Cell(0, 20, 'Longitud: ' . $reporte["longitud"], 0, 0, 'R');
                    $pdf->SetXY(10, 183);
                    $pdf->SetFont('helvetica', 'i', 14);
                    $pdf->Cell(0, 20, 'Ejemplo: -33.67859,-69.65280', 0, 0, 'C');


                    $pdf->SetRightMargin(5);
                    $pdf->SetLeftMargin(5);
                    $pdf->SetFont('helvetica', 'b', 18);
                    $pdf->SetFillColor(234, 149, 58);
                    $pdf->SetXY(5, 207);
                    $pdf->Cell(0, 10, 'DATOS DEL CHOFER', 1, 1, 'C', 6);
                    $pdf->SetFont('helvetica', '', 15);

                    $pdf->Cell(0, 15, 'Id: ' . $chofer["id"], 0, 0, 'C');
                    $pdf->SetXY(5, 222);
                    $pdf->Cell(0, 20, 'Nombre: ' . $chofer["nombre"], 0, 0, 'C');
                    $pdf->SetXY(5, 225);
                    $pdf->Cell(0, 30, 'Apellido: ' . $chofer["apellido"], 0, 0, 'C');
                    $pdf->SetXY(5, 232);
                    $pdf->Cell(0, 35, 'D.N.I: ' . $chofer["dni"], 0, 0, 'C');
                    $pdf->SetXY(5, 241);
                    $pdf->Cell(0, 35, 'Email: ' . $chofer["email"], 0, 0, 'C');
                    $pdf->SetXY(5, 250);
                    $pdf->Cell(0, 35, 'Tipo De Licencia: ' . $chofer["tipo_licencia"], 0, 0, 'C');
                    $pdf->SetXY(5, 260);
                    $pdf->SetFont('helvetica', 'i', 16);
                    $pdf->Cell(0, 50, utf8_decode('Página ' . $pdf->PageNo()), 0, 0, 'R');

                }
                $pdf->Output();
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);

    }
}
}