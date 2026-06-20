<?php

namespace App\Mail;

use App\Models\Animal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Récupérer l'adresse et le nom depuis .env
        $fromAddress = env('MAIL_FROM_ADDRESS', 'contact@canin-felin.com');
        $fromName = env('MAIL_FROM_NAME', 'élevages d\'animaux ASSOCIU FERRU DI CAVALLU');

        // Définir le sujet selon le type d'email
        $subject = $this->isAdmin
            ? 'Nouvelle demande d\'adoption - ' . $this->animal->nom
            : 'Confirmation de votre demande - ' . $this->animal->nom;

        return $this->from($fromAddress, $fromName)
                    ->subject($subject)
                    ->view('emails.order-confirmation')
                    ->with([
                        'orderData' => $this->orderData,
                        'animal' => $this->animal,
                        'isAdmin' => $this->isAdmin,
                    ]);
    }
}