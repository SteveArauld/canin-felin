{{-- Tableau d'informations : contient des <x-mail.row> --}}
@php $t = config('company.mail'); @endphp
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
       style="border:1px solid {{ $t['border'] }}; border-radius:6px; margin:0 0 28px 0;">
    {{ $slot }}
</table>
