<?php

namespace App\Service;

use App\Interface\IPDF;
use Fpdf\Fpdf;

class PDFService implements IPDF
{
    private Fpdf $_pdf;
    public function __construct()
    {
        $this->_pdf = new Fpdf('P', 'mm', 'A3');
    }
    private function ConfigPdf(): void
    {
        $this->_pdf->AddFont("Arial", "I");
    }
    public function TablaGenerica(array $objeto): void
    {
        $this->ConfigPdf();
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial', 'B', 16);
        $this->_pdf->Cell(40, 10, '¡Hola, Mundo!');
        $this->_pdf->Output();
    }
}
