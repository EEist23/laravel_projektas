<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->subject('Nauja kontaktų forma')
                    ->view('emails.form-submission');
    }
}
