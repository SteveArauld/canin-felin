@extends('emails.layout')

@section('title', __('mail.contact_user.subject'))
@section('preheader', __('mail.contact_user.preheader'))
@section('eyebrow', __('mail.contact_user.eyebrow'))
@section('heading', __('mail.contact_user.heading'))
@section('subheading', __('mail.contact_user.subheading'))
@section('footnote', __('mail.footer.no_reply'))

@section('content')

    <x-mail.panel variant="success" :title="__('mail.contact_user.panel_title', ['name' => $data['nom']])">
        {{ __('mail.contact_user.panel_body', ['subject' => $data['sujet']]) }}
    </x-mail.panel>

    <x-mail.heading>{{ __('mail.sections.summary') }}</x-mail.heading>

    <x-mail.data>
        <x-mail.row :label="__('mail.labels.subject')">{{ $data['sujet'] }}</x-mail.row>
        <x-mail.row :label="__('mail.labels.date')">{{ $data['date'] }}</x-mail.row>
        <x-mail.row :label="__('mail.labels.message')" :block="true" :last="true">{{ $data['message'] }}</x-mail.row>
    </x-mail.data>

    <x-mail.panel variant="neutral" :title="__('mail.contact_user.next_steps_title')">
        {{ __('mail.contact_user.next_steps_body') }}
    </x-mail.panel>

    <x-mail.button :href="rtrim(config('app.url'), '/')">
        {{ __('mail.contact_user.cta') }}
    </x-mail.button>

@endsection
