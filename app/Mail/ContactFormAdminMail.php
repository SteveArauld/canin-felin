<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormAdminMail extends Mailable
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
                    ->replyTo($this->data['email'], $this->data['nom'])
                    ->subject('📩 Nouveau message de contact - ' . $this->data['sujet'])
                    ->markdown('emails.contact-admin')
                    ->with('data', $this->data);
    }
}