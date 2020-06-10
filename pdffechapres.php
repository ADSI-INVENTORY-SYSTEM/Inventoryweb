<?php

session_start();
require_once("ConexionDatos.php");
require("Fpdf/fpdf.php");




$I=$_POST['inicial'];
$O=$_POST['final'];

																														

$conbsd=new conexiondatos();
$con3=$conbsd->conectar();


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFillColor(49, 105, 168);
        $this->Rect(0,0,220,50,'F');
        $this->Image('assets/img/logo.jpg',180,15,20,20,'jpg');
        $this->SetFont('Times','B',12);
        $this->SetTextColor(255,255,255);
        $this->Cell(0,5,utf8_decode('INVENTORY SYSTEM WEB'),0,5,'C');
        $this->Ln(5);
        date_default_timezone_set("america/bogota");
        $this->cell(0,0,'Fecha: '.date('d/m/Y').'',0);
        $this->Ln(7);
        $this->cell(0,0,'Hora: '.date('H:i').'',0);
        $this->Ln(7);
        $this->cell(0,0,'Autor: '.$_SESSION['usuari'].'');
        $this->Ln(7);
        $this->cell(0,0,'Cargo: '.$_SESSION['rol'].'');
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        $this->SetTextColor(40,40,40);
        $this->write(5,'Bogota, Colombia');
        // Número de página
        $this->Cell(0,10, $this->PageNo().'/{nb}',0,0,'C');
    }
}
    
// Creación del objeto de la clase heredada
$pdf = new PDF('p','mm','letter');

$pdf->setmargins(10,10,10);
$pdf->AliasNbPages();
$pdf->AddPage('portrait','letter');

$pdf->setfont('times','B',12);

$pdf->cell(0,0,'Prestamos Registrados Entre : '.$I.' Hasta '.$O.'',0,0,'S');

$pdf->Ln(20);

$pdf->SetFont('Times','B',12);

$pdf->Cell(0,5,'PRESTAMOS',0,5,'C');
$pdf->Ln(10);

$pdf->SetFont('Helvetica','',10);
$pdf->SetDrawcolor( 10, 11, 11 );
$pdf->SetFillColor(49, 105, 168);
$pdf->SetTextColor(255,255,255);
$pdf->cell(40,6,"ID",1,0,'C',1);
$pdf->cell(40,6,"Serial",1,0,'C',1);
$pdf->cell(40,6,"Nombre Solicitante",1,0,'C',1);
$pdf->cell(40,6,"Fecha Entrega",1,0,'C',1);
$pdf->cell(40,6,"Fecha Devolucion",1,1,'C',1);

$query = "SELECT idPrestamo,Nombres,Nserial,Fecha_Entrega,Fecha_Devolucion FROM prestamo INNER JOIN activos ON Activos_idActivo = idActivo INNER JOIN usuarios ON Usuarios_idUsuario = idUsuario  where Fecha_Entrega BETWEEN '".$I."' AND '".$O."'";

$datos=mysqli_query($con3,$query);
$pdf->settextcolor(40,40,40);

while($row = mysqli_fetch_array($datos))
{
$pdf->SetFillColor(240,240,240);
$pdf->Cell(40, 5, $row["idPrestamo"], 1,0,1, 'C');

$pdf->Cell(40, 5, $row["Nserial"], 1,0,1, 'C');

$pdf->Cell(40, 5, $row["Nombres"], 1,0,1, 'C');

$pdf->Cell(40, 5, $row["Fecha_Entrega"], 1,0,1, 'C');

$pdf->Cell(40, 5, $row["Fecha_Devolucion"], 1,1,1, 'C');

}



$pdf->Output();

?>
