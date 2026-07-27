@props([
    'href' => '#',
    'variant' => 'primary', // primary | whatsapp | outline
    'note' => null,
])
@php
    $t = config('company.mail');
    $styles = [
        'primary'  => ['bg' => $t['brand'],    'color' => '#ffffff', 'border' => $t['brand']],
        'whatsapp' => ['bg' => $t['whatsapp'], 'color' => '#ffffff', 'border' => $t['whatsapp']],
        'outline'  => ['bg' => '#ffffff',      'color' => $t['brand'], 'border' => '#c9d3dd'],
    ];
    $s = $styles[$variant] ?? $styles['primary'];
@endphp
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="btn" style="margin:0 0 14px 0;">
    <tr>
        <td align="center">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td bgcolor="{{ $s['bg'] }}" align="center"
                        style="background-color:{{ $s['bg'] }}; border:1px solid {{ $s['border'] }}; border-radius:6px;">
                        <a href="{{ $href }}"
                           style="display:inline-block; padding:14px 32px; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; font-size:15px; line-height:20px; font-weight:600; color:{{ $s['color'] }}; text-decoration:none;">
                            {{ $slot }}
                        </a>
                    </td>
                </tr>
            </table>
            @if($note)
                <p style="margin:12px 0 0 0; font-size:12px; line-height:18px; color:{{ $t['muted'] }};">{{ $note }}</p>
            @endif
        </td>
    </tr>
</table>
