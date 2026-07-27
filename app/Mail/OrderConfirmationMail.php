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
        $fromAddress = config('mail.from.address');
        $fromName = config('mail.from.name') ?: config('company.name');

        // Le sujet dépend du destinataire : équipe interne ou client
        $subject = __(
            $this->isAdmin ? 'mail.order_admin.subject' : 'mail.order_user.subject',
            ['animal' => $this->animal->nom]
        );

        $mail = $this->from($fromAddress, $fromName);

        // La notification interne permet de répondre directement au client
        if ($this->isAdmin && !empty($this->orderData['email'])) {
            $mail->replyTo($this->orderData['email'], $this->orderData['nom'] ?? null);
        }

        return $mail
                    ->subject($subject)
                    ->view('emails.order-confirmation')
                    ->with([
                        'orderData' => $this->orderData,
                        'animal' => $this->animal,
                        'isAdmin' => $this->isAdmin,
                    ]);
    }
}