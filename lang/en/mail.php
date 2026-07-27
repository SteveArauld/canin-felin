<?php

return [

    'footer' => [
        'automatic' => 'This message was sent automatically from :site.',
        'no_reply' => 'Automatic confirmation message. Feel free to reply to this e-mail if you have any question.',
        'internal' => 'Internal notification — reply directly to the visitor to get in touch.',
    ],

    'labels' => [
        'name' => 'Full name',
        'email' => 'E-mail address',
        'phone' => 'Phone',
        'whatsapp' => 'WhatsApp',
        'subject' => 'Subject',
        'message' => 'Message',
        'date' => 'Request date',
        'city' => 'City / Region',
        'animal' => 'Animal',
        'breed' => 'Breed / Species',
        'requested_name' => 'Preferred name',
        'reference' => 'Reference',
        'comment' => 'Comment',
    ],

    'sections' => [
        'contact_details' => 'Visitor details',
        'client_details' => 'Client details',
        'message' => 'Message',
        'summary' => 'Summary',
        'request' => 'Request details',
    ],

    'contact_user' => [
        'subject' => 'We have received your message',
        'preheader' => 'Your message has been forwarded to our team.',
        'eyebrow' => 'Acknowledgement',
        'heading' => 'Your message has been received',
        'subheading' => 'Our team will get back to you within 24 to 48 hours.',
        'panel_title' => 'Hello :name,',
        'panel_body' => 'Thank you for contacting us about “:subject”. Your request has been recorded and a member of our team is handling it personally.',
        'next_steps_title' => 'What happens next',
        'next_steps_body' => 'We will get back to you by e-mail or phone as soon as possible. In the meantime, feel free to browse the animals currently available.',
        'cta' => 'See available animals',
    ],

    'contact_admin' => [
        'subject' => 'New contact message — :subject',
        'preheader' => 'New message from :name received through the contact form.',
        'eyebrow' => 'Contact form',
        'heading' => 'New contact message',
        'subheading' => 'Received on :date through the website.',
        'panel_title' => 'Request from :name',
        'panel_body' => 'Subject: :subject',
        'reply_cta' => 'Reply by e-mail',
        'whatsapp_cta' => 'Contact on WhatsApp',
    ],

    'order_user' => [
        'subject' => 'Your request for :animal has been recorded',
        'preheader' => 'We have received your request for :animal.',
        'eyebrow' => 'Adoption request',
        'heading' => 'Your request has been recorded',
        'subheading' => 'We will contact you very shortly.',
        'panel_title' => 'Hello :name,',
        'panel_body' => 'Thank you for your interest in :animal. Your request has been forwarded to our breeding team.',
        'next_steps_title' => 'What happens next',
        'next_steps_body' => 'We will contact you within the next few hours to confirm availability, answer your questions and walk you through the handover process.',
        'cta' => 'Back to the website',
    ],

    'order_admin' => [
        'subject' => 'New adoption request — :animal',
        'preheader' => 'New request from :name for :animal.',
        'eyebrow' => 'New request',
        'heading' => 'New adoption request',
        'subheading' => 'Received on :date through the website.',
        'panel_title' => ':animal — request from :name',
        'panel_body' => 'To be handled in priority: contact the client to confirm availability.',
        'whatsapp_cta' => 'Contact the client on WhatsApp',
        'whatsapp_note' => 'Reply quickly to maximise the chances of converting the request.',
        'whatsapp_message' => 'Hello :name, I am contacting you about your request regarding :animal.',
    ],

];
