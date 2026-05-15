<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Animal;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function processOrder(OrderRequest $request, $lang, $slug)
    {
        try {
            $orderData = $request->validated();

            // Récupérer l'animal depuis la base de données
            $animal = Animal::with('races')
                ->where('slug', $slug)
                ->first();

            if (!$animal) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => __('controller.animal.not_found')]);
            }

            if (is_array($orderData['whatsapp'])) {
                $orderData['whatsapp'] = $orderData['whatsapp'][0] ?? '';
            }



            Mail::to($orderData['email'])->send(new OrderConfirmationMail($orderData, $animal, false));


            // Envoyer l'email de notification à l'admin
            $adminEmail = env('ADMIN_EMAIL', 'contact@Canin-Felin.com');
            Mail::to($adminEmail)
                ->send(new OrderConfirmationMail($orderData, $animal, true));

            // Optionnel : Sauvegarder la commande dans la base de données
            // Order::create([...]);

            return redirect()->back()
                ->with('success', __('controller.order.success'));

        } catch (\Exception $e) {
            Log::error('Order processing error: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => __('controller.order.error')]);
        }
    }
}