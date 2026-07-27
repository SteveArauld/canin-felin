@extends('emails.layout')

@php
    $t = config('company.mail');

    $whatsappRaw = is_array($orderData['whatsapp'])
        ? ($orderData['whatsapp'][0] ?? '')
        : $orderData['whatsapp'];
    $whatsappClean = preg_replace('/\D/', '', $whatsappRaw);

    $race = $animal->race->nom ?? $orderData['race_animal'];
    $date = now()->format('d/m/Y à H:i');
    $key = $isAdmin ? 'mail.order_admin' : 'mail.order_user';
@endphp

@section('title', __($key . '.subject', ['animal' => $animal->nom]))
@section('preheader', __($key . '.preheader', ['animal' => $animal->nom, 'name' => $orderData['nom']]))
@section('eyebrow', __($key . '.eyebrow'))
@section('heading', __($key . '.heading'))
@section('subheading', $isAdmin
    ? __('mail.order_admin.subheading', ['date' => $date])
    : __('mail.order_user.subheading'))
@section('footnote', $isAdmin ? __('mail.footer.internal') : __('mail.footer.no_reply'))

@section('content')

    <x-mail.panel
        :variant="$isAdmin ? 'brand' : 'success'"
        :title="__($key . '.panel_title', ['name' => $orderData['nom'], 'animal' => $animal->nom])">
        {{ __($key . '.panel_body', ['animal' => $animal->nom]) }}
    </x-mail.panel>

    {{-- ===== Fiche de l'animal concerné ===== --}}
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fafbfc"
           style="background-color:#fafbfc; border:1px solid {{ $t['border'] }}; border-radius:6px; margin:0 0 28px 0;">
        <tr>
            <td align="center" style="padding:26px 22px;">
                @if(!empty($orderData['image_animal']))
                    <img src="{{ asset($orderData['image_animal']) }}"
                         alt="{{ $animal->nom }}"
                         width="150"
                         style="width:150px; max-width:100%; height:auto; border-radius:6px; border:1px solid {{ $t['border'] }}; display:block; margin:0 auto 16px auto;" />
                @endif
                <p style="margin:0 0 4px 0; font-size:20px; line-height:27px; font-weight:600; color:{{ $t['brand'] }};">
                    {{ $animal->nom }}
                </p>
                <p style="margin:0; font-size:13px; line-height:19px; color:{{ $t['muted'] }};">
                    {{ $race }}@if(!empty($animal->type)) &nbsp;&middot;&nbsp; {{ ucfirst($animal->type) }}@endif
                </p>
            </td>
        </tr>
    </table>

    {{-- ===== Détails de la demande ===== --}}
    <x-mail.heading>{{ __('mail.sections.request') }}</x-mail.heading>

    <x-mail.data>
        <x-mail.row :label="__('mail.labels.animal')">{{ $animal->nom }}</x-mail.row>
        <x-mail.row :label="__('mail.labels.breed')">{{ $race }}</x-mail.row>

        @if(!empty($orderData['nom_animal']) && $orderData['nom_animal'] !== $animal->nom)
            <x-mail.row :label="__('mail.labels.requested_name')">{{ $orderData['nom_animal'] }}</x-mail.row>
        @endif

        <x-mail.row :label="__('mail.labels.date')" :last="!$isAdmin && empty($orderData['commentaire'])">{{ $date }}</x-mail.row>

        @if(!empty($orderData['commentaire']))
            <x-mail.row :label="__('mail.labels.comment')" :block="true" :last="!$isAdmin">{{ $orderData['commentaire'] }}</x-mail.row>
        @endif
    </x-mail.data>

    {{-- ===== Coordonnées : uniquement dans la notification interne ===== --}}
    @if($isAdmin)
        <x-mail.heading>{{ __('mail.sections.client_details') }}</x-mail.heading>

        <x-mail.data>
            <x-mail.row :label="__('mail.labels.name')">{{ $orderData['nom'] }}</x-mail.row>

            <x-mail.row :label="__('mail.labels.email')">
                <a href="mailto:{{ $orderData['email'] }}" style="color:{{ $t['brand'] }}; text-decoration:none; word-break:break-all;">{{ $orderData['email'] }}</a>
            </x-mail.row>

            <x-mail.row :label="__('mail.labels.whatsapp')">
                <a href="https://wa.me/{{ $whatsappClean }}" style="color:{{ $t['brand'] }}; text-decoration:none;">{{ $whatsappRaw }}</a>
            </x-mail.row>

            <x-mail.row :label="__('mail.labels.city')" :last="true">{{ $orderData['ville'] }}</x-mail.row>
        </x-mail.data>

        <x-mail.button
            variant="whatsapp"
            :note="__('mail.order_admin.whatsapp_note')"
            :href="'https://wa.me/' . $whatsappClean . '?text=' . rawurlencode(__('mail.order_admin.whatsapp_message', ['name' => $orderData['nom'], 'animal' => $animal->nom]))">
            {{ __('mail.order_admin.whatsapp_cta') }}
        </x-mail.button>
    @else
        <x-mail.panel variant="neutral" :title="__('mail.order_user.next_steps_title')">
            {{ __('mail.order_user.next_steps_body') }}
        </x-mail.panel>

        <x-mail.button :href="rtrim(config('app.url'), '/')">
            {{ __('mail.order_user.cta') }}
        </x-mail.button>
    @endif

@endsection
