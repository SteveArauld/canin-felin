<?php

return [

    'footer' => [
        'automatic' => 'Message envoyé automatiquement depuis le site :site.',
        'no_reply' => 'Message automatique de confirmation. Vous pouvez répondre à cet e-mail si vous avez une question.',
        'internal' => 'Notification interne — répondez directement au visiteur pour lui écrire.',
    ],

    'labels' => [
        'name' => 'Nom complet',
        'email' => 'Adresse e-mail',
        'phone' => 'Téléphone',
        'whatsapp' => 'WhatsApp',
        'subject' => 'Sujet',
        'message' => 'Message',
        'date' => 'Date de la demande',
        'city' => 'Ville / Région',
        'animal' => 'Animal',
        'breed' => 'Race / Espèce',
        'requested_name' => 'Nom souhaité',
        'reference' => 'Référence',
        'comment' => 'Commentaire',
    ],

    'sections' => [
        'contact_details' => 'Coordonnées du visiteur',
        'client_details' => 'Coordonnées du client',
        'message' => 'Message',
        'summary' => 'Récapitulatif',
        'request' => 'Détails de la demande',
    ],

    // Accusé de réception envoyé au visiteur du formulaire de contact
    'contact_user' => [
        'subject' => 'Nous avons bien reçu votre message',
        'preheader' => 'Votre message a bien été transmis à notre équipe.',
        'eyebrow' => 'Accusé de réception',
        'heading' => 'Votre message a bien été reçu',
        'subheading' => 'Notre équipe vous répond sous 24 à 48 heures.',
        'panel_title' => 'Bonjour :name,',
        'panel_body' => 'Merci de nous avoir contactés au sujet de « :subject ». Votre demande est enregistrée et un membre de notre équipe la traite personnellement.',
        'next_steps_title' => 'La suite',
        'next_steps_body' => 'Nous revenons vers vous par e-mail ou par téléphone dans les plus brefs délais. En attendant, vous pouvez consulter nos animaux actuellement disponibles.',
        'cta' => 'Voir les animaux disponibles',
    ],

    // Notification interne du formulaire de contact
    'contact_admin' => [
        'subject' => 'Nouveau message de contact — :subject',
        'preheader' => 'Nouveau message de :name reçu depuis le formulaire de contact.',
        'eyebrow' => 'Formulaire de contact',
        'heading' => 'Nouveau message de contact',
        'subheading' => 'Reçu le :date via le site internet.',
        'panel_title' => 'Demande de :name',
        'panel_body' => 'Sujet : :subject',
        'reply_cta' => 'Répondre par e-mail',
        'whatsapp_cta' => 'Contacter sur WhatsApp',
    ],

    // Confirmation de commande envoyée au client
    'order_user' => [
        'subject' => 'Votre demande pour :animal a bien été enregistrée',
        'preheader' => 'Nous avons reçu votre demande pour :animal.',
        'eyebrow' => 'Demande d\'adoption',
        'heading' => 'Votre demande est enregistrée',
        'subheading' => 'Nous vous contactons très rapidement.',
        'panel_title' => 'Bonjour :name,',
        'panel_body' => 'Merci de l\'intérêt que vous portez à :animal. Votre demande a bien été transmise à notre équipe d\'élevage.',
        'next_steps_title' => 'La suite',
        'next_steps_body' => 'Nous vous contactons dans les prochaines heures pour confirmer la disponibilité, répondre à vos questions et vous présenter les modalités de remise.',
        'cta' => 'Retourner sur le site',
    ],

    // Notification interne de nouvelle demande
    'order_admin' => [
        'subject' => 'Nouvelle demande d\'adoption — :animal',
        'preheader' => 'Nouvelle demande de :name pour :animal.',
        'eyebrow' => 'Nouvelle demande',
        'heading' => 'Nouvelle demande d\'adoption',
        'subheading' => 'Reçue le :date via le site internet.',
        'panel_title' => ':animal — demande de :name',
        'panel_body' => 'À traiter en priorité : contactez le client pour confirmer la disponibilité.',
        'whatsapp_cta' => 'Contacter le client sur WhatsApp',
        'whatsapp_note' => 'Répondez rapidement pour maximiser les chances de concrétiser la demande.',
        'whatsapp_message' => 'Bonjour :name, je vous contacte au sujet de votre demande concernant :animal.',
    ],

];
