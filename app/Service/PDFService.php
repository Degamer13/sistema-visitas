<?php

namespace App\Service;

use App\FPDF\PDF;
use App\Interface\IPDF;
use Fpdf\Fpdf;

class PDFService implements IPDF
{
    private Fpdf $_pdf;
    public function __construct()
    {
        $this->_pdf = new PDF('P', 'mm', 'letter');
    }
    private function HeaderPdf(): void
    {
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial', 'B', 12);
        $filepath = public_path() . '/assets/pdf/icon.jpg';
        if (file_exists($filepath)) {
            $this->_pdf->Image($filepath, '10','10','30','30');
        }
        $this->_pdf->Cell(0,10,"Fecha: ". date("d/m/Y"), 0, 1,'R');
        $this->_pdf->Cell(0,10,"Hora: ". date("h:i a"), 0, 1,'R');
        $this->_pdf->ln();
    }
    public function TablaGenerica(array $objetos, string $name) : void
    {
        $this->HeaderPdf();
        $this->_pdf->AliasNbPages();
        $this->_pdf->SetFont('Arial', 'B', 16);

        $this->_pdf->Cell(0, 10, "TABLA DE " . $name, 0, 1, 'C');
        $this->_pdf->SetTextColor(255,0,0);
        $this->_pdf->SetFont("Arial", "B", 14);
        foreach ($objetos as $objeto) {
            foreach ($objeto as $key => $value) {
                $this->_pdf->Cell(40, 10, $key, 1, 0,"C");
            }
            break;
        }
        $this->_pdf->Ln();
        $this->_pdf->SetFont("Arial", "", 12);
        $this->_pdf->SetTextColor(0,0,255);

        foreach ($objetos as $objeto) {
            foreach ($objeto as $key => $value) {
                if ($key == "created_at" || $key == "updated_at") {
                    $this->_pdf->Cell(40, 10, preg_split("/T/", $value)[0], 1,0,"C");
                } else {
                    $this->_pdf->Cell(40, 10,  $value, 1, 0,"C");
                }
            }
            $this->_pdf->Ln();
        }
        $this->_pdf->Output('D', 'miarchivo.pdf', true);
        $this->_pdf->Close();
    }
}
