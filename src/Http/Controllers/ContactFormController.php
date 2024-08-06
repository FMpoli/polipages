<?php

namespace Detit\Polipages\Http\Controllers;

use Illuminate\Http\Request;
use Detit\Polipages\Mail\ContactFormMail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function index(Request $request)
    {
        // Valida i dati del form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'from' => 'required|email|max:255',
            'message' => 'required|string',
            'subject' => 'required|string',
            'consent' => 'required|accepted',
        ]);

        // Crea l'istanza della Mailable e imposta il mittente
        $email = new ContactFormMail($validatedData);
        $email->from($validatedData['from'], $validatedData['name']);

        // Invia l'email
        Mail::to($request['send_to'])->send($email);

        // Redirect o ritorna una risposta (es. JSON per un form in AJAX)
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
