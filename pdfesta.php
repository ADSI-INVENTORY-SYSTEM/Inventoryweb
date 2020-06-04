<?php

session_start();
require_once("ConexionDatos.php");

require("Fpdf/Fpdf.php");



$I=$_POST['Estado_idEstado'];
//$O=$_POST['o'];

																														

$conbsd=new conexiondatos();
$con3=$conbsd->conectar();


$pdf= new FPDF('p','mm', array(500,500));
$pdff=new FPDF();


$pdf->setmargins(40,0);
$pdf->aliasnbpages();

$pdf->addpage('');

$pdf->settextcolor(0x00,0x00,0x00);
$pdf->setfont("courier","u",25);
$pdf->setxy(60,30);
$pdf->multicell(100,20, utf8_decode('Activos'),0,'C');
$pdf->Cell(100,20,'Reporte generado por:|'.$_SESSION['usuari'].'',0,'C');
$pdf->multicell(100,20, utf8_decode(''),0,'C');
$pdf->Cell(100,20,'Cargo:|'.$_SESSION['rol'].'',0,'C');
$pdf->multicell(100,20, utf8_decode(''),0,'C');





$pdf->settextcolor(0x00,0x00,0x00);
$pdf->setfont("Arial","b",9);
$pdf->cell(300,6,'Datos del Activo',1,1,'C');






$pdf->cell(30,5,"iD",1,0,'C');

$pdf->cell(40,5,"Serial",1,0,'C');

$pdf->cell(30,5,"Sede",1,0,'C');

$pdf->cell(30,5,"Proveedor",1,0,'C');

$pdf->cell(30,5,"Categoria",1,0,'C');

$pdf->cell(35,5,"Estado",1,0,'C');

$pdf->cell(35,5,"Nombre",1,0,'C');

$pdf->cell(35,5,"Precio",1,0,'C');

$pdf->cell(35,5,"Cantidad",1,1,'C');






$query = "SELECT idActivo,Nserial,NombreSede,NombreProveedor,NombreCategoria,NombreEstado,NombreActivo,Precio,Cantidad FROM activos INNER JOIN sede ON Sede_idSede = idSede INNER JOIN proveedor ON Proveedor_idProveedor = idProveedor INNER JOIN categoria ON Categoria_idcategoria = idcategoria INNER JOIN estado ON Estado_idEstado = idEstado  where Estado_idEstado='".$I."'";



$datos=mysqli_query($con3,$query);

while($row = mysqli_fetch_array($datos))
{
$pdf->Cell(30, 5, $row["idActivo"], 1,0, 'C');

$pdf->Cell(40, 5, $row["Nserial"], 1,0, 'C');

$pdf->Cell(30, 5, $row["NombreSede"], 1,0, 'C');

$pdf->Cell(30, 5, $row["NombreProveedor"], 1,0, 'C');

$pdf->Cell(30, 5, $row["NombreCategoria"], 1,0, 'C');

$pdf->Cell(35, 5, $row["NombreEstado"], 1,0, 'C');

$pdf->Cell(35, 5, $row["NombreActivo"], 1,0, 'C');

$pdf->Cell(35, 5, '$'. $row["Precio"], 1,0, 'C');

$pdf->Cell(35, 5, $row["Cantidad"], 1,1, 'C');

}



$pdf->Output();

?>
