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
        $this->Rect(0,0,240,50,'F');
        $this->Image('assets/img/logo.jpg',210,15,20,20,'jpg');
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
$pdf = new PDF('p','mm', array(240,300));

$pdf->setmargins(10,10,10);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setfont('times','B',12);


$pdf->cell(0,0,'Activos Registrados Entre : '.$I.' Hasta '.$O.'',0,0,'S');

$pdf->Ln(20);

$pdf->SetFont('Times','B',12);

$pdf->Cell(0,5,'ACTIVOS',0,5,'C');
$pdf->Ln(10);

$pdf->SetFont('Helvetica','',10);
$pdf->SetDrawcolor( 10, 11, 11 );
$pdf->SetFillColor(49, 105, 168);
$pdf->SetTextColor(255,255,255);
$pdf->cell(15,6,"ID",1,0,'C',1);
$pdf->cell(24,6,"Serial",1,0,'C',1);
$pdf->cell(22,6,"Sede",1,0,'C',1);
$pdf->cell(22,6,"Proveedor",1,0,'C',1);
$pdf->cell(22,6,"Categoria",1,0,'C',1);
$pdf->cell(22,6,"Estado",1,0,'C',1);
$pdf->cell(29,6,"Nombre",1,0,'C',1);
$pdf->cell(22,6,"Precio",1,0,'C',1);
$pdf->cell(20,6,"Cantidad",1,0,'C',1);
$pdf->SetFillColor( 255, 189, 94 );
$pdf->SetTextColor(0,0,0);
$pdf->cell(20,6,"Fecha",1,1,'C',1);




$query = "SELECT idActivo,Nserial,NombreSede,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Precio,Cantidad,Fecha_registro FROM activos INNER JOIN sede ON Sede_idSede = idSede INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN estado ON Estado_idEstado = idEstado  where Fecha_registro BETWEEN '".$I."' AND '".$O."'";



$datos=mysqli_query($con3,$query);
$pdf->settextcolor(40,40,40);

while($row = mysqli_fetch_array($datos))
{
$pdf->SetFillColor(240,240,240);
$pdf->Cell(15, 6, $row["idActivo"], 1,0,1,'C');

$pdf->Cell(24, 6, $row["Nserial"], 1,0,1,'C');

$pdf->Cell(22, 6, $row["NombreSede"], 1,0,1,'C');

$pdf->Cell(22, 6, $row["NombreProveedor"], 1,0,1,'C');

$pdf->Cell(22, 6, $row["NombreCategoria"], 1,0,1,'C');

$pdf->Cell(22, 6, $row["NombreEstado"], 1,0,1,'C');

$pdf->Cell(29, 6, $row["NombreActivo"], 1,0,1,'C');

$pdf->Cell(22, 6, '$'. $row["Precio"], 1,0,1,'C');

$pdf->Cell(20, 6, $row["Cantidad"], 1,0,1,'C');
$pdf->SetFillColor( 255, 189, 94 );
$pdf->Cell(20, 6, $row["Fecha_registro"], 1,1,1, 'C');

}



$pdf->Output();

?>
