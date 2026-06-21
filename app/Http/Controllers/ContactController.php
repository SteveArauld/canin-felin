<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormAdminMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contacto');
    }

    public function send(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'nom' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'sujet' => 'required|string|in:adoption,information,complaint,other',
            'message' => 'required|string|min:10|max:5000',
            'consent' => 'required|accepted',
        ], [
            'nom.required' => __('form.validation.name_required'),
            'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
            'email.required' => __('form.validation.email_required'),
            'email.email' => __('form.validation.email_invalid'),
            'sujet.required' => __('contact.select_subject_valid'),
            'sujet.in' => 'Le sujet sélectionné est invalide.',
            'message.required' => __('contact.fill_message'),
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
            'consent.required' => __('contact.consent_required'),
            'consent.accepted' => __('contact.consent_required'),
        ]);

        // Traduire le sujet
        $sujets = [
            'adoption' => __('contact.adoption'),
            'information' => __('contact.information'),
            'complaint' => __('contact.complaint'),
            'other' => __('contact.other'),
        ];

        $data = [
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'] ?? 'Non renseigné',
            'sujet' => $sujets[$validated['sujet']] ?? $validated['sujet'],
            'message' => $validated['message'],
            'date' => now()->format('d/m/Y H:i'),
        ];

        try {
            // Email à l'admin
            $adminEmail = config('mail.admin_email', 'contact@canin-felin.com');
            Mail::to($adminEmail)->send(new ContactFormAdminMail($data));

            // Email de confirmation à l'utilisateur (optionnel)
            Mail::to($data['email'])->send(new ContactFormMail($data));

            return redirect()->route('contact')->with('success', __('contact.success_message'));
        } catch (\Exception $e) {
            \Log::error('Erreur envoi email contact: ' . $e->getMessage());
            return redirect()->route('contact')
                ->with('error', 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer.')
                ->withInput();
        }
    }
}