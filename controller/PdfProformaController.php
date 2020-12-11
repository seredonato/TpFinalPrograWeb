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
    private $equipoModel;
    private $proformaModel;
    private $loginModel;
    private $render;


    public function __construct($pedidoModel, $usuarioModel, $imoClassModel, $imoSubClassModel, $cargaModel, $viajeModel, $equipoModel, $proformaModel,$loginModel,$render)
    {
        $this->pedidoModel = $pedidoModel;
        $this->usuarioModel = $usuarioModel;
        $this->imoClassModel = $imoClassModel;
        $this->imoSubClassModel = $imoSubClassModel;
        $this->cargaModel = $cargaModel;
        $this->viajeModel = $viajeModel;
        $this->equipoModel = $equipoModel;
        $this->proformaModel = $proformaModel;
        $this->loginModel = $loginModel;
        $this->render = $render;
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

                $equipo = $this->equipoModel->mostrarEquipoPorId($proforma["id_equipo"]);

                $costeoEstimado = $this->proformaModel->mostrarCosteoEstimadoPorIdDeProforma($proforma["id"]);

                $total = $this->proformaModel->calcularTotal($costeoEstimado["kilometros"], $costeoEstimado["combustible"], $costeoEstimado["viaticos"], $costeoEstimado["peajes_pesajes"], $costeoEstimado["extras"], $costeoEstimado["fee"], $costeoEstimado["hazard"], $costeoEstimado["reefer"]);


                $pdf = new FPDF();
                $pdf->AliasNbPages();
                $pdf->SetLeftMargin(5);
                $pdf->SetRightMargin(5);
                $pdf->SetTopMargin(10);
                $pdf->SetFillColor(200, 200, 200);
                $pdf->AddPage();
                $pdf->SetFont('helvetica', 'b', 25);
                $pdf->Cell(0, 21, 'PROFORMA', 0, 0, 'C');
                $pdf->SetFont('helvetica', '', 13);
                $pdf->SetXY(5, 20);
                $pdf->Cell(0, 22, 'FECHA: ' . $proforma["fecha"], 0, 0, 'C');
                $pdf->SetXY(5, 25);
                $pdf->Cell(0, 24, utf8_decode('Nº DE FACTURA: ' . $proforma["id"]), 0, 0, 'C');
                $pdf->SetXY(5, 32);
                $pdf->Cell(0, 22, 'TELEFONO : 1196464212', 0, 0, 'C');
                $pdf->SetXY(5, 2);
                $pdf->Cell(50, 50, '', 1, 0, '');
                $pdf->Image('public/images/logoheaderBlancoYNegro.png', 6, 7, 0, 35);
                $pdf->SetXY(155, 2);
                $pdf->Cell(50, 50, '', 1, 0, '');
                $pdf->Image('public/imgQr/' . $proforma["id"] . '.png', 157, 4, 0, 46);
                $pdf->Ln(2);

                //PEDIDO

                $pdf->SetRightMargin(5);
                $pdf->SetLeftMargin(5);
                $pdf->SetFont('helvetica', 'b', 12);
                $pdf->SetXY(5, 60);
                $pdf->Cell(100, 8, 'PEDIDO SOLICITADO', 0, 1, 'C', 6);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->Cell(40, 5, 'NOMBRE', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["nombre_cliente"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'FECHA', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["fecha_pedido"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'CUIT', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["cuit_cliente"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'DIRECCION', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["direccion_cliente"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'TELEFONO', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["telefono_cliente"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'EMAIL', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["email_cliente"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'DIRECCION DE CARGA ORIGINAL', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["contacto1"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'DIRECCION DE LLEGADA ORIGINAL', 0, 0, '');
                $pdf->Cell(60, 5, $pedido["contacto2"], 0, 1, 'C');

                // VIAJE

                $pdf->SetXY(106, 60);
                $pdf->SetRightMargin(0);
                $pdf->SetLeftMargin(0);
                $pdf->SetFont('helvetica', 'b', 12);
                $pdf->Cell(100, 8, 'INFORMACION DEL VIAJE', 0, 1, 'C', 6);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->SetXY(106, 68);
                $pdf->Cell(40, 5, 'ORIGEN', 0, 0, '');
                $pdf->Cell(60, 5, $viaje["origen"], 0, 1, 'C');
                $pdf->SetXY(106, 73);
                $pdf->Cell(40, 5, 'DESTINO', 0, 0, '');
                $pdf->Cell(60, 5, $viaje["destino"], 0, 1, 'C');
                $pdf->SetXY(106, 78);
                $pdf->Cell(40, 5, 'FECHA DE CARGA', 0, 0, '');
                $pdf->Cell(60, 5, $viaje["fecha_carga"], 0, 1, 'C');
                $pdf->SetXY(106, 83);
                $pdf->Cell(40, 5, 'HORARIO DE CARGA', 0, 0, '');
                $pdf->Cell(60, 5, $viaje["tiempo_carga"], 0, 1, 'C');
                $pdf->SetXY(106, 88);
                $pdf->Cell(40, 5, 'FECHA DE LLEGADA', 0, 0, '');
                $pdf->Cell(60, 5, $viaje["fecha_llegada"], 0, 1, 'C');
                $pdf->SetXY(106, 93);
                $pdf->Cell(40, 5, 'HORARIO DE LLEGADA', 0, 0, '');
                $pdf->Cell(60, 5, $viaje["tiempo_llegada"], 0, 1, 'C');
                $pdf->SetXY(106, 98);
                $pdf->Cell(40, 5, 'NOMBRE DEL CHOFER', 0, 0, '');
                $pdf->Cell(60, 5, $usuarioChofer["nombre"] . ' ' . $usuarioChofer["apellido"], 0, 1, 'C');
                $pdf->SetXY(106, 103);
                $pdf->Cell(40, 5, 'DNI', 0, 0, '');
                $pdf->Cell(60, 5, $usuarioChofer["dni"], 0, 1, 'C');
                $pdf->Ln(2);

                // EQUIPO

                $pdf->SetRightMargin(3);
                $pdf->SetLeftMargin(3);
                $pdf->SetFont('helvetica', 'b', 12);
                $pdf->Cell(100, 8, 'FLETE/EQUIPO DE TRANSPORTE', 0, 1, 'C', 6);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->Cell(40, 5, 'MARCA (tractor)', 0, 0, '');
                $pdf->Cell(60, 5, $equipo["marca"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'MODELO (tractor)', 0, 0, '');
                $pdf->Cell(60, 5, $equipo["modelo"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'PATENTE (tractor)', 0, 0, '');
                $pdf->Cell(60, 5, $equipo["t_patente"], 0, 1, 'C');
                $pdf->Cell(40, 5, utf8_decode('Nº MOTOR'), 0, 0, '');
                $pdf->Cell(60, 5, $equipo["nro_motor"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'CHASIS (tractor)', 0, 0, '');
                $pdf->Cell(60, 5, $equipo["t_chasis"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'TIPO DE ACOPLADO', 0, 0, '');
                $pdf->Cell(60, 5, utf8_decode($equipo["tipo_acoplado"]), 0, 1, 'C');
                $pdf->Cell(40, 5, 'PATENTE (acoplado)', 0, 0, '');
                $pdf->Cell(60, 5, $equipo["a_patente"], 0, 1, 'C');
                $pdf->Cell(40, 5, 'CHASIS (acoplado)', 0, 0, '');
                $pdf->Cell(60, 5, $equipo["a_chasis"], 0, 1, 'C');

                //CARGA

                $pdf->SetXY(106, 110);
                $pdf->SetRightMargin(0);
                $pdf->SetLeftMargin(0);
                $pdf->SetFont('helvetica', 'b', 12);
                $pdf->Cell(100, 8, 'INFORMACION DE LA CARGA', 0, 1, 'C', 6);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->SetXY(106, 118);
                $pdf->Cell(40, 5, 'TIPO DE CARGA', 0, 0, '');
                $pdf->Cell(60, 5, $carga["tipo"], 0, 1, 'C');
                $pdf->SetXY(106, 123);
                $pdf->Cell(40, 5, 'PESO', 0, 0, '');
                $pdf->Cell(60, 5, $carga["peso_neto"] . 'Kg', 0, 1, 'C');
                $pdf->SetXY(106, 128);
                $pdf->Cell(40, 5, 'HAZARD', 0, 0, '');
                $pdf->Cell(60, 5, $carga["hazard"], 0, 1, 'C');
                $pdf->SetXY(106, 133);
                if ($carga["hazard"] == "si") {
                    $pdf->Cell(40, 5, 'CLASE DEL HAZARD', 0, 0, '');
                    $pdf->Cell(60, 5, $carga["clase_imoclass"], 0, 1, 'C');
                    $pdf->SetXY(106, 138);
                    $pdf->Cell(40, 5, 'SUBCLASE DEL HAZARD', 0, 0, '');
                    $pdf->Cell(60, 5, $carga["subclase_imosubclass"], 0, 1, 'C');

                } elseif ($carga["hazard"] == "no") {
                    $pdf->Cell(40, 5, 'CLASE DEL HAZARD', 0, 0, '');
                    $pdf->Cell(60, 5, 'X', 0, 1, 'C');
                    $pdf->SetXY(106, 138);
                    $pdf->Cell(40, 5, 'SUBCLASE DEL HAZARD', 0, 0, '');
                    $pdf->Cell(60, 5, 'X', 0, 1, 'C');
                }
                $pdf->SetXY(106, 143);
                $pdf->Cell(40, 5, 'REFRIGERACION', 0, 0, '');
                $pdf->Cell(60, 5, $carga["reefer"], 0, 1, 'C');
                $pdf->SetXY(106, 148);
                if ($carga["reefer"] == "si") {

                    $pdf->Cell(40, 5, 'TEMPERATURA', 0, 0, '');
                    $pdf->Cell(60, 5, utf8_decode($carga["temperatura"] . ' Cº'), 0, 1, 'C');
                    $pdf->SetXY(106, 153);
                    $pdf->Cell(40, 5, '', 0, 0, '');
                    $pdf->Cell(60, 5, '', 0, 1, '');
                } elseif ($carga["reefer"] == "no") {
                    $pdf->Cell(40, 5, 'REFRIGERACION', 0, 0, '');
                    $pdf->Cell(60, 5, "X", 0, 1, 'C');
                    $pdf->SetXY(106, 153);
                    $pdf->Cell(40, 5, '', 0, 0, '');
                    $pdf->Cell(60, 5, '', 0, 1, '');
                }

                //HAZARD
                if ($carga["hazard"] == "si") {
                    $pdf->SetRightMargin(3);
                    $pdf->SetLeftMargin(3);
                    $pdf->Cell(0, 8, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->SetFont('helvetica', 'b', 12);
                    $pdf->Cell(0, 8, 'EN CASO DE QUE LA CARGA TENGA HAZARD', 0, 1, 'C', 6);
                    $pdf->SetFont('helvetica', '', 9);
                    $pdf->Cell(40, 5, 'CARGA DE CLASE TIPO', 0, 0, '');
                    $pdf->Cell(144, 5, $carga["clase_imoclass"], 0, 1, 'C');
                    $pdf->Cell(40, 5, 'DESCRIPCION CLASE', 0, 0, '');
                    $pdf->Cell(144, 5, utf8_decode($imoClass["descripcion"]), 0, 1, 'C');
                    $pdf->Cell(40, 5, 'SUB-CLASE DESIGNADA', 0, 0, '');
                    $pdf->Cell(144, 5, $carga["subclase_imosubclass"], 0, 1, 'C');
                    $pdf->Cell(40, 10, 'DESCRIPCION', 0, 0, '');
                    $pdf->MultiCell(144, 10, utf8_decode($imoSubClass["descripcion"]), 0, 'C');
                    $pdf->Cell(0, 8, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');


                // COSTEO

                $pdf->SetRightMargin(3);
                $pdf->SetLeftMargin(3);
                $pdf->SetFont('helvetica', 'b', 12);
                $pdf->Cell(0, 8, 'SUMATORIA DE COSTOS', 0, 1, 'C', 6);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->Cell(40, 5, 'CARGO POR LOS KILOMETROS A RECORRER', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["kilometro"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'CARGO POR COMBUSTIBLE', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["combustible"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'CARGO POR HAZARD CORRESPONDIENTE', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["hazard"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'CARGO POR REFRIGERACION', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["reefer"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'VIATICOS', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["viatico"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'PEAJES', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["peaje"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'EXTRAS', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["extras"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'FEE', 0, 0, '');
                $pdf->Cell(0, 5, '$ ' . $total["fee"], 0, 1, 'R');
                $pdf->Cell(40, 5, 'TOTAL', 0, 0, '', 1);
                $pdf->Cell(0, 5, '$ ' . $total["total"], 0, 1, 'R', 1);
                } else {
                    $pdf->Cell(0, 10, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->SetRightMargin(3);
                    $pdf->SetLeftMargin(3);
                    $pdf->SetFont('helvetica', 'b', 12);
                    $pdf->Cell(0, 8, 'SUMATORIA DE COSTOS', 0, 1, 'C', 6);
                    $pdf->SetFont('helvetica', '', 9);
                    $pdf->Cell(40, 5, 'CARGO POR LOS KILOMETROS A RECORRER', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["kilometro"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'CARGO POR COMBUSTIBLE', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["combustible"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'CARGO POR HAZARD CORRESPONDIENTE', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["hazard"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'CARGO POR REFRIGERACION', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["reefer"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'VIATICOS', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["viatico"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'PEAJES', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["peaje"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'EXTRAS', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["extras"], 0, 1, 'R');
                    $pdf->Cell(40, 5, 'FEE', 0, 0, '');
                    $pdf->Cell(0, 5, '$ ' . $total["fee"], 0, 1, 'R');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, '', 0, 1, '');
                    $pdf->Cell(40, 5, 'TOTAL', 0, 0, '', 1);
                    $pdf->Cell(0, 5, '$ ' . $total["total"], 0, 1, 'R', 1);
                    $pdf->Cell(0, 10, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');

                }

                $pdf->Output();
            }else{
                echo $this->render->render("view/inicio.php", $data);
            }
        }else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }
}
