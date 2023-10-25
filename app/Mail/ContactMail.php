<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->from($this->formData['email']) // Utilisez l'e-mail de l'expéditeur
                    ->to('ekpomachi@gmail.com') // Adresse de destination
                    ->subject('Nouveau message de contact reçu')
                    ->view('emails.contact'); // Vue qui affiche le contenu de l'e-mail
    }

}
