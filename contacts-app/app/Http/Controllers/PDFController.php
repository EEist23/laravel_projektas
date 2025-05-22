<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'PDF Dokumento Pavadinimas',
            'date' => date('Y-m-d'),
            'content' => 'Tai yra sugeneruotas PDF dokumentas Laravel 10+ versijoje.'
        ];

        $pdf = Pdf::loadView('pdf.document', $data);
        return $pdf->download('dokumentas.pdf'); // arba stream() jei norite rodyti naršyklėje
    }
}

