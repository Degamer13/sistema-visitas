<?php

namespace App\FPDF;

use FPDF;

class PDF extends FPDF
{
    public function Footer(){
         // Posición a 1.5 cm del final
         $this->SetY(-15);
         // Arial italic 8
         $this->SetFont('Arial', 'I', 8);
         // Número de página
         $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    public function Header(){
        $this->SetFont('Arial', 'B', 12);
        $filepath = public_path() . '/assets/pdf/icon.jpg';
        if (file_exists($filepath)) {
            $this->Image($filepath, '10','10','30','30');
        }
        $this->Cell(0,10,"Fecha: ". date("d/m/Y"), 0, 1,'R');
        $this->Cell(0,10,"Hora: ". date("h:i a"), 0, 1,'R');
        $this->ln();
    }
}
