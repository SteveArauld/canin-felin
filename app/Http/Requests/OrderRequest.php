<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'ciudad' => 'required|string|max:255',
            'comentario' => 'nullable|string|max:1000',
            'raza_cachorro' => 'required|string|max:255',
            'nombre_cachorro' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no debe exceder 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.max' => 'El correo electrónico no debe exceder 255 caracteres.',
            'whatsapp.required' => 'El número de WhatsApp es obligatorio.',
            'whatsapp.string' => 'El número de WhatsApp debe ser texto.',
            'whatsapp.max' => 'El número de WhatsApp no debe exceder 20 caracteres.',
            'ciudad.required' => 'La ciudad/región es obligatoria.',
            'ciudad.string' => 'La ciudad/región debe ser texto.',
            'ciudad.max' => 'La ciudad/región no debe exceder 255 caracteres.',
            'comentario.string' => 'El comentario debe ser texto.',
            'comentario.max' => 'El comentario no debe exceder 1000 caracteres.',
            'raza_cachorro.required' => 'La raza del cachorro es obligatoria.',
            'raza_cachorro.string' => 'La raza del cachorro debe ser texto.',
            'raza_cachorro.max' => 'La raza del cachorro no debe exceder 255 caracteres.',
            'nombre_cachorro.required' => 'El nombre del cachorro es obligatorio.',
            'nombre_cachorro.string' => 'El nombre del cachorro debe ser texto.',
            'nombre_cachorro.max' => 'El nombre del cachorro no debe exceder 255 caracteres.',
        ];
    }
}
