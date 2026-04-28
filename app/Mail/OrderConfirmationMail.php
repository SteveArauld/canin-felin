<?php

namespace App\Mail;

use App\Models\Animal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $orderData;
    public Animal $animal;
    public bool $isAdmin;

    public function __construct(array $orderData, Animal $animal, bool $isAdmin = false)
    {
        $this->orderData = $orderData;
        $this->animal = $animal;
        $this->isAdmin = $isAdmin;
    }

    public function envelope(): Envelope
    {
        $subject = $this->isAdmin
            ? 'Nouvelle demande d\'adoption - ' . $this->animal->nom
            : 'Confirmation de votre demande - ' . $this->animal->nom;

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmation',
            with: [
                'orderData' => $this->orderData,
                'animal' => $this->animal,
                'isAdmin' => $this->isAdmin,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}