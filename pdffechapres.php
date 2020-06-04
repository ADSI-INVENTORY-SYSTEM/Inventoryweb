<?php

session_start();
require_once("ConexionDatos.php");

require("Fpdf/Fpdf.php");



$I=$_POST['inicial'];
$O=$_POST['final'];

																														

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
$pdf->cell(220,6,'Datos del Activo',1,1,'C');






$pdf->cell(30,5,"iD",1,0,'C');

$pdf->cell(40,5,"Serial",1,0,'C');

$pdf->cell(50,5,"Nombre Solicitante",1,0,'C');

$pdf->cell(50,5,"Fecha Entrega",1,0,'C');

$pdf->cell(50,5,"Fecha Devolucion",1,1,'C');





$query = "SELECT idPrestamo,Nombres,Nserial,Fecha_Entrega,Fecha_Devolucion FROM prestamo INNER JOIN activos ON Activos_idActivo = idActivo INNER JOIN usuarios ON Usuarios_idUsuario = idUsuario  where Fecha_Entrega BETWEEN '".$I."' AND '".$O."'";



$datos=mysqli_query($con3,$query);

while($row = mysqli_fetch_array($datos))
{
$pdf->Cell(30, 5, $row["idPrestamo"], 1,0, 'C');

$pdf->Cell(40, 5, $row["Nserial"], 1,0, 'C');

$pdf->Cell(50, 5, $row["Nombres"], 1,0, 'C');

$pdf->Cell(50, 5, $row["Fecha_Entrega"], 1,0, 'C');

$pdf->Cell(50, 5, $row["Fecha_Devolucion"], 1,1, 'C');

}



$pdf->Output();

?>
