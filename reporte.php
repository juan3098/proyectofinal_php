<?php

include('php/conexion.php');

require('reportes/fpdf.php');

class PDF extends FPDF {

    function Header() {

        $this->setFont('Arial', 'B', 18);
        $this->Cell(60);
        $this->Cell(70, 10, 'Listado de Clientes', 0, 0, 'C');
        $this->Ln(20);

        $this->Cell(70, 10,'Nombre', 1, 0, 'C', 0);
        $this->Cell(65, 10,'Direccion', 1, 0, 'C', 0);
        $this->Cell(55, 10,'Telefono', 1, 1, 'C', 0);

    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);


$consulta = "SELECT * FROM clientes";
$resultado = mysqli_query($con, $consulta);

while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(70, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
    $pdf->Cell(65, 10, utf8_decode($row['direccion']), 1, 0, 'C', 0);
    $pdf->Cell(55, 10, $row['telefono'], 1, 1, 'C', 0);
}

$pdf->Output();

?>