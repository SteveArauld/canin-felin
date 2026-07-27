<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Limitation du nombre d'envois
    |--------------------------------------------------------------------------
    | Nombre maximum de soumissions autorisées par adresse IP sur la fenêtre
    | indiquée (en minutes), pour chaque formulaire public.
    */

    'throttle' => [
        'contact' => [
            'max' => (int) env('ANTISPAM_CONTACT_MAX', 3),
            'minutes' => (int) env('ANTISPAM_CONTACT_MINUTES', 60),
        ],
        'order' => [
            'max' => (int) env('ANTISPAM_ORDER_MAX', 5),
            'minutes' => (int) env('ANTISPAM_ORDER_MINUTES', 60),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Mots-clés bloqués
    |--------------------------------------------------------------------------
    | Une soumission contenant l'un de ces termes dans un champ de texte libre
    | est rejetée. Termes en minuscules, la comparaison est insensible à la casse.
    */

    'keywords' => [
        'seo service',
        'seo services',
        'backlink',
        'link building',
        'guest post',
        'crypto',
        'bitcoin',
        'binary option',
        'forex',
        'casino',
        'viagra',
        'cialis',
        'porn',
        'xxx',
        'escort',
        'loan offer',
        'make money online',
        'work from home',
        'increase your traffic',
        'rank on google',
        'web design offer',
        'bulk email',
        'telegram.me',
        't.me/',
        'bit.ly',
        'tinyurl',
    ],

    /*
    |--------------------------------------------------------------------------
    | Domaines e-mail jetables
    |--------------------------------------------------------------------------
    */

    'disposable_domains' => [
        'mailinator.com',
        'yopmail.com',
        'yopmail.fr',
        'guerrillamail.com',
        'sharklasers.com',
        'trashmail.com',
        'tempmail.com',
        'temp-mail.org',
        '10minutemail.com',
        'getnada.com',
        'dispostable.com',
        'maildrop.cc',
        'fakeinbox.com',
        'throwawaymail.com',
        'mohmal.com',
        'moakt.com',
        'emailondeck.com',
        'spam4.me',
    ],

];
