<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;
    public $cachorro;
    public $isAdmin;

    public function __construct($orderData, $cachorro, $isAdmin = false)
    {
        $this->orderData = $orderData;
        $this->cachorro = $cachorro;
        $this->isAdmin = $isAdmin;
    }

    public function build()
    {
        $subject = $this->isAdmin
            ? 'Nuevo Pedido Recibido - ' . $this->cachorro['nombre']
            : 'Confirmación de tu Pedido - ' . $this->cachorro['nombre'];

        return $this->subject($subject)
            ->view('emails.order-confirmation')
            ->with([
                'orderData' => $this->orderData,
                'cachorro' => $this->cachorro,
                'isAdmin' => $this->isAdmin,
            ]);
    }
}
