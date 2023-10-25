<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Laravel\Socialite\Facades\Socialite;
class ContactController extends Controller
{
    public function __invoke(ContactRequest $request){
        $formData = [
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
        ];

        Mail::to('ekpomachi@gmail.com')->send(new ContactMail($formData));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Vous recevrez une réponse par e-mail.');
    }

}
