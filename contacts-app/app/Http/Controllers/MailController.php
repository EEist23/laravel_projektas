<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmissionMail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('recipient@example.com')->send(new FormSubmissionMail($formData));

        return redirect()->back()->with('success', 'Jūsų žinutė sėkmingai išsiųsta!');
    }
}
