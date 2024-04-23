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
    public function TablaGenerica(array $objetos, string $name): void
    {
        $name = strtoupper($name);
        $this->_pdf->AddPage();
        $this->_pdf->AliasNbPages();
        $this->_pdf->SetFont('Arial', 'B', 16);
        $this->_pdf->Cell(0, 10, "TABLA DE " . $name, 0, 1, 'C');
        $this->_pdf->SetTextColor(255, 0, 0);
        $this->_pdf->SetFont("Arial", "B", 14);
        foreach ($objetos as $objeto) {
            foreach ($objeto as $key => $value) {
                $this->_pdf->Cell(40, 10, $key, 1, 0, "C");
            }
            break;
        }
        $this->_pdf->Ln();
        $this->_pdf->SetFont("Arial", "", 12);
        $this->_pdf->SetTextColor(0, 0, 255);
        $count = 0;
        foreach ($objetos as $objeto) {
            $count++;
            foreach ($objeto as $key => $value) {
                if ($key == "created_at" || $key == "updated_at") {
                    $this->_pdf->Cell(40, 10, preg_split("/T/", $value)[0], 1, 0, "C");
                } else {
                    $this->_pdf->Cell(40, 10,  $value, 1, 0, "C");
                }
            }
            if ($count == 10) {
                $this->_pdf->AddPage();
                $count = 0;
            }

            $this->_pdf->Ln();
        }
        $this->_pdf->Output('D', 'miarchivo.pdf', true);
        $this->_pdf->Close();
    }
}
