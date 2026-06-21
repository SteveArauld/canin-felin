<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('✅ Confirmation de votre message - Élevage d\'animaux ASSOCIU FERRU DI CAVALLU')
                    ->markdown('emails.contact-user')
                    ->with('data', $this->data);
    }
}