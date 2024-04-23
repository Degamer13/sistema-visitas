<?php

namespace App\Service;

use App\FPDF\PDF;
use App\Interface\IPDF;
use Fpdf\Fpdf;

use function PHPUnit\Framework\matchesRegularExpression;

class PDFService implements IPDF
{
    private Fpdf $_pdf;
    public function __construct()
    {
        $this->_pdf = new PDF('P', 'mm', 'A3');
    }
    public function TablaGenerica(array $objetos, string $name, bool $time): void
    {
        $name = strtoupper($name);
        $ancho_tabla = 200; // Por ejemplo

        // Coordenadas para centrar la tabla en la página
        $centro_x = ($this->_pdf->GetPageWidth() - $ancho_tabla) / 2;
        $this->_pdf->SetFillColor(0, 0, 128); // Azul oscuro
        $this->_pdf->AddPage();
        $this->_pdf->AliasNbPages();
        $this->_pdf->SetFont('Arial', 'B', 16);
        $this->_pdf->Cell(0, 10, "TABLA DE " . $name, 0, 1, 'C');
        $this->_pdf->SetTextColor(255);
        $this->_pdf->SetFont("Arial", "B", 14);

        foreach ($objetos as $objeto) {
            $countp = 0;
            if (!$time) {
                unset($objeto["created_at"]);
            }
            foreach ($objeto as $key => $value) {

                $countp++;
            }
            break;
        }

        foreach ($objetos as $objeto) {
            if ($countp < 6) {
                $this->_pdf->SetX($centro_x);
            }
            foreach ($objeto as $key => $value) {
                if ($key == "created_at") {
                    $key = ucfirst("Creado En");
                } else if ($key == "updated_at") {
                    $key = ucfirst("Actualizado En");
                }
                
                 else {
                    $key = ucfirst(join(" de ", preg_split("/_/", $key)));
                }
                $this->_pdf->Cell(strlen($key) * 4, 10, $key, 1, 0, "C", true);
            }
            break;
        }
        $this->_pdf->Ln();
        $this->_pdf->SetFont("Arial", "", 12);
        $this->_pdf->SetTextColor(0);

        $count = 0;
        foreach ($objetos as $objeto) {
            $count++;


            if ($countp < 6) {
                $this->_pdf->SetX($centro_x);
            }
            foreach ($objeto as $key => $value) {
                if ($key == "created_at") {
                    $key = "CREADO EN";
                } else if ($key == "updated_at") {
                    $key = "ACTUALIZADO EN";
                } else {
                    $key = strtoupper(join(" de ", preg_split("/_/", $key)));
                }
                $this->_pdf->Cell(strlen($key) * 4, 10, preg_split("/T/", $value)[0] ?? $value, 1, 0, "C");
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
