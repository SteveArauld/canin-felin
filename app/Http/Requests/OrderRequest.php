<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'nullable|string|max:255',
            'race_animal' => 'required|string|max:255',
            'nom_animal' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'commentaire' => 'nullable|string|max:1000',
            'slug_animal' => 'required|string|max:255',
            'image_animal' => 'nullable|string|max:255',
            'type_animal' => 'nullable|string|in:chien,chat,perroquet', // Ajout pour distinguer l'espèce
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // Nom du client
            'nom.string' => 'Le nom doit être du texte.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            // Race/Espèce de l'animal
            'race_animal.required' => 'La race ou l\'espèce de l\'animal est obligatoire.',
            'race_animal.string' => 'La race ou l\'espèce doit être du texte.',
            'race_animal.max' => 'La race ou l\'espèce ne doit pas dépasser 255 caractères.',

            // Nom de l'animal
            'nom_animal.required' => 'Le nom de l\'animal est obligatoire.',
            'nom_animal.string' => 'Le nom de l\'animal doit être du texte.',
            'nom_animal.max' => 'Le nom de l\'animal ne doit pas dépasser 255 caractères.',

            // Email
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.max' => 'L\'adresse e-mail ne doit pas dépasser 255 caractères.',

            // WhatsApp
            'whatsapp.required' => 'Le numéro WhatsApp est obligatoire.',
            'whatsapp.string' => 'Le numéro WhatsApp doit être du texte.',
            'whatsapp.max' => 'Le numéro WhatsApp ne doit pas dépasser 20 caractères.',

            // Ville/Région
            'ville.required' => 'La ville ou la région est obligatoire.',
            'ville.string' => 'La ville ou la région doit être du texte.',
            'ville.max' => 'La ville ou la région ne doit pas dépasser 255 caractères.',

            // Commentaire
            'commentaire.string' => 'Le commentaire doit être du texte.',
            'commentaire.max' => 'Le commentaire ne doit pas dépasser 1000 caractères.',

            // Slug
            'slug_animal.required' => 'L\'identifiant de l\'animal est requis.',
            'slug_animal.string' => 'L\'identifiant de l\'animal doit être du texte.',
            'slug_animal.max' => 'L\'identifiant de l\'animal ne doit pas dépasser 255 caractères.',

            // Type d'animal (optionnel)
            'type_animal.in' => 'Le type d\'animal doit être : chien, chat ou perroquet.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nom' => 'nom',
            'race_animal' => 'race ou espèce de l\'animal',
            'nom_animal' => 'nom de l\'animal',
            'email' => 'adresse e-mail',
            'whatsapp' => 'numéro WhatsApp',
            'ville' => 'ville ou région',
            'commentaire' => 'commentaire',
            'slug_animal' => 'identifiant de l\'animal',
            'image_animal' => 'image de l\'animal',
            'type_animal' => 'type d\'animal',
        ];
    }
}