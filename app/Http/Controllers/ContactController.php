<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Mostra la pagina contatti
    public function showForm()
    {
        return view('contacts');
    }

    // Gestisce l’invio del form contatti
    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Esempio: invio mail, oppure salvataggio in DB...
        // Mail::raw($request->message, function($msg) use ($request) {
        //     $msg->to('admin@blog.com')->subject("Contatto da {$request->name}");
        // });

        return redirect()->back()->with('message', 'Messaggio inviato correttamente!');
    }
}
