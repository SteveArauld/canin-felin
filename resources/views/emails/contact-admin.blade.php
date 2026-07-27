@extends('emails.layout')

@php
    $phoneClean = preg_replace('/\D/', '', $data['telephone'] ?? '');
    $brand = config('company.mail.brand');
@endphp

@section('title', __('mail.contact_admin.subject', ['subject' => $data['sujet']]))
@section('preheader', __('mail.contact_admin.preheader', ['name' => $data['nom']]))
@section('eyebrow', __('mail.contact_admin.eyebrow'))
@section('heading', __('mail.contact_admin.heading'))
@section('subheading', __('mail.contact_admin.subheading', ['date' => $data['date']]))
@section('footnote', __('mail.footer.internal'))

@section('content')

    <x-mail.panel :title="__('mail.contact_admin.panel_title', ['name' => $data['nom']])">
        {{ __('mail.contact_admin.panel_body', ['subject' => $data['sujet']]) }}
    </x-mail.panel>

    <x-mail.heading>{{ __('mail.sections.contact_details') }}</x-mail.heading>

    <x-mail.data>
        <x-mail.row :label="__('mail.labels.name')">{{ $data['nom'] }}</x-mail.row>

        <x-mail.row :label="__('mail.labels.email')">
            <a href="mailto:{{ $data['email'] }}" style="color:{{ $brand }}; text-decoration:none; word-break:break-all;">{{ $data['email'] }}</a>
        </x-mail.row>

        <x-mail.row :label="__('mail.labels.phone')">
            @if($phoneClean)
                <a href="tel:{{ $phoneClean }}" style="color:{{ $brand }}; text-decoration:none;">{{ $data['telephone'] }}</a>
            @else
                {{ $data['telephone'] }}
            @endif
        </x-mail.row>

        <x-mail.row :label="__('mail.labels.subject')">{{ $data['sujet'] }}</x-mail.row>

        <x-mail.row :label="__('mail.labels.date')" :last="true">{{ $data['date'] }}</x-mail.row>
    </x-mail.data>

    <x-mail.heading>{{ __('mail.sections.message') }}</x-mail.heading>

    <x-mail.quote>{{ $data['message'] }}</x-mail.quote>

    <x-mail.button :href="'mailto:' . $data['email'] . '?subject=' . rawurlencode('Re: ' . $data['sujet'])">
        {{ __('mail.contact_admin.reply_cta') }}
    </x-mail.button>

    @if($phoneClean)
        <x-mail.button variant="whatsapp" :href="'https://wa.me/' . $phoneClean">
            {{ __('mail.contact_admin.whatsapp_cta') }}
        </x-mail.button>
    @endif

@endsection
