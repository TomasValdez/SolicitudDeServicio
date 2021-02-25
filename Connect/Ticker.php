<?php 
function servicio(){
    $correo=$_POST['email'];
    if (!empty($correo) ){
        return $correo;      
    } 
}

function correo(){
return  $kill=$_POST['kill'];
}


require ('../pfdf/fpdf.php');


$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10,utf8_decode('¡Hola,'.correo()));

$pdf->Cell(40,100,utf8_decode('¡Hola,'.servicio()));

$pdf -> Output();






?>