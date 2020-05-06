<?php
require('includes/db.php');
require('includes/functions.php');

$user ;
$hashkey = $_GET["varify"];
$activityname = "asdasdasdsad";
$activitytype = "Course";
$numofhours = '00';
if(isset($_GET["cuid"])){
    $userID = $_GET["cuid"] ; 
    $activitytype = "Course";
    $user = getUserCourses(" where users_courses.ID=$userID and hashkey='$hashkey' ","array");
    $activityname = $user["Coursename"];
    $numofhours = $user["numofhours"];
}elseif(isset($_GET["coid"])){
     $userID = $_GET["coid"] ; 
     $activitytype = "Conference";
     $user = getUserConf(" where users_conferance.ID=$userID and hashkey='$hashkey' ","array");
     $activityname = $user["Conferancename"];
}

if(isset($user)){
	$username = $user['engname'];
	require('includes/fpdf.php');
	class PDF extends FPDF
	{
	// Page header
		function Header()
		{
			// Logo
			//$this->Image('logo.png',10,6,30);
			// Arial bold 15
			$this->SetFont('Arial','B',15);
			// Move to the right
			$this->Cell(80);
			// Title
			//$this->Cell(30,10,'Course Certificate',0,0,'C');
			// Line break
			$this->Ln(20);
		}
	// Page footer
		function Footer()
		{
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Page number
			//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	// Instanciation of inherited class
	$pdf = new PDF('L','pt','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',25);
	$pdf->SetTextColor(10,62,78);
	$pdf->Image('images/certificate.png',0,0,850);
	
	//$pdf->Cell(830,400,ucwords($username),0,0,'C');
	$pdf->SetY(250);
	$pdf->SetX(284);
	$pdf->MultiCell(0, 0, ucwords($username), 0);

	$pdf->Ln(30);
	$pdf->SetFont('Arial','I',15);
	
	//$pdf->Cell(760,400,'Has participated the '.$activitytype.' activity entitled',0,0,'C');
	$pdf->Ln(30);
	$pdf->SetFont('Arial','B',15);
	$pdf->SetY(313);
	$pdf->SetX(280);
	
	$pdf->MultiCell(500, 20, ucwords($activityname), 0,'C');
	//$pdf->Cell(1275,400,ucwords($activityname),0,0,'C');
	$pdf->SetY(377);
	$pdf->SetX(160);
	//$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,3,$numofhours,0,0,'C');
	$pdf->Output();
}else{
	echo "Wrong Link ";
}


?>