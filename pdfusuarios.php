<?php

session_start();
require_once("ConexionDatos.php");
require("Fpdf/fpdf.php");
require("scripts.php");


$I=$_POST['Rol_idRol'];
//$O=$_POST['o'];

																														

$conbsd=new conexiondatos();
$con3=$conbsd->conectar();


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFillColor(49, 105, 168);
        $this->Rect(0,0,300,50,'F');
        $this->Image('assets/img/logo.jpg',250,15,20,20,'jpg');
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
$pdf = new PDF('p','mm', array(290,300));

$pdf->setmargins(10,10,10);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setfont('times','B',12);

$consu = "SELECT NombreRol FROM usuarios  INNER JOIN rol ON Rol_idRol = idRol where Rol_idRol='".$I."'";
$data=mysqli_query($con3,$consu);
$sql = mysqli_fetch_array($data);

$pdf->cell(0,0,'Usuarios Que Se Encuentran En El Rol De: '.$sql["NombreRol"].'',0,0,'S');

$pdf->Ln(20);

$pdf->SetFont('Times','B',12);

$pdf->Cell(0,5,'Usuarios '.$sql["NombreRol"].'',0,5,'C');
$pdf->Ln(10);

$pdf->SetFont('Helvetica','',10);
$pdf->SetDrawcolor( 10, 11, 11 );
$pdf->SetFillColor(49, 105, 168);
$pdf->SetTextColor(255,255,255);
$pdf->cell(10,6,"ID",1,0,'C',1);
$pdf->cell(15,6,"Sede",1,0,'C',1);
$pdf->cell(25,6,"Rol",1,0,'C',1);
$pdf->cell(35,6,"Tipo identificacion",1,0,'C',1);
$pdf->cell(25,6,"Identificacion",1,0,'C',1);
$pdf->cell(30,6,"Nombres",1,0,'C',1);
$pdf->cell(35,6,"Apellidos",1,0,'C',1);
$pdf->cell(35,6,"Direccion",1,0,'C',1);
$pdf->cell(25,6,"Telefono",1,0,'C',1);
$pdf->cell(20,6,"Ambiente",1,0,'C',1);
$pdf->cell(20,6,"Fecha Reg.",1,1,'C',1);
/*$pdf->Ln(20);
$pdf->cell(20,6,"Correo",1,0,'C',1);
$pdf->cell(20,6,"Usuario",1,0,'C',1);
$pdf->cell(20,6,"Fecha Registro",1,1,'C',1);*/







$query = "SELECT idUsuario, NombreSede,NombreRol,NombreIdentificacion,Identificacion ,Nombres,Apellidos,Direccion,Telefono,Correo,Usuario,Ambiente,Fecha_Registro From usuarios INNER JOIN rol ON Rol_idRol = idRol INNER JOIN tipoidentificacion ON TipoIdentificacion_idTipoIdentificacion = idTipoidentificacion INNER JOIN sede ON Sede_idSede = idSede  where Rol_idRol='".$I."'";



$datos=mysqli_query($con3,$query);


$pdf->settextcolor(40,40,40);

while($row = mysqli_fetch_array($datos))
{
$pdf->SetFillColor(240,240,240);
$pdf->Cell(10, 6, $row["idUsuario"], 1,0,1,'C');
$pdf->Cell(15, 6, $row["NombreSede"], 1,0,1,'C');
$pdf->Cell(25, 6, $row["NombreRol"], 1,0,1,'C');
$pdf->Cell(35, 6, $row["NombreIdentificacion"], 1,0,1,'C');
$pdf->Cell(25, 6, $row["Identificacion"], 1,0,1,'C');
$pdf->Cell(30, 6, $row["Nombres"], 1,0,1,'C');
$pdf->Cell(35, 6, $row["Apellidos"], 1,0,1,'C');
$pdf->Cell(35, 6, $row["Direccion"], 1,0,1,'C');
$pdf->Cell(25, 6, $row["Telefono"], 1,0,1,'C');
$pdf->Cell(20, 6, $row["Ambiente"], 1,0,1,'C');
$pdf->Cell(20, 6, $row["Fecha_Registro"], 1,1,1,'C');
/*
$pdf->Cell(20, 6, $row["Correo"], 1,0,1,'C');
$pdf->Cell(20, 6, $row["Usuario"], 1,0,1,'C');
$pdf->Cell(20, 6, $row["Fecha_Registro"], 1,1,1,'C');*/

}



$pdf->Output();

?>
