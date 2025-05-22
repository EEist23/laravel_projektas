<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        $data = [
            'title' => 'PDF El. Paštu',
            'date' => date('Y-m-d'),
            'content' => 'Tai yra PDF failas, pridėtas prie šio el. laiško.'
        ];

        $pdf = Pdf::loadView('pdf.document', $data);
        
        return $this->subject('Jūsų PDF Dokumentas')
                    ->view('emails.pdfmail')
                    ->attachData($pdf->output(), "dokumentas.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}

