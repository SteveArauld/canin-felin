<?php

/*
|--------------------------------------------------------------------------
| Identité de l'élevage
|--------------------------------------------------------------------------
| Source unique utilisée par l'en-tête et le pied de page des e-mails,
| afin que toutes les notifications restent cohérentes.
*/

return [

    'name' => env('COMPANY_NAME', 'Élevage d\'animaux ASSOCIU FERRU DI CAVALLU'),
    'tagline' => env('COMPANY_TAGLINE', 'Éleveurs éthiques en France'),

    'email' => env('ADMIN_EMAIL', 'contact@canin-felin.com'),
    'phone' => env('COMPANY_PHONE', '06 44 69 59 82'),
    'whatsapp' => env('COMPANY_WHATSAPP', '33644695982'),

    'logo' => 'assets/logo/logon.png',

    /*
    | Charte graphique des e-mails.
    */
    'mail' => [
        'brand' => '#14314f',
        'brand_dark' => '#0e2439',
        'brand_light' => '#f1f5f9',
        'accent' => '#b98a3c',
        'whatsapp' => '#25d366',
        'text' => '#1f2937',
        'muted' => '#6b7280',
        'border' => '#e5e7eb',
        'canvas' => '#f4f6f8',
    ],

];
