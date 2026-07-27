@props([
    'title' => null,
    'variant' => 'brand', // brand | success | warning | neutral
])
@php
    $t = config('company.mail');
    $variants = [
        'brand'   => ['bg' => '#f2f6fa', 'bar' => $t['brand'],  'title' => $t['brand'],  'text' => '#33546f'],
        'success' => ['bg' => '#f1faf5', 'bar' => '#1f9d63',    'title' => '#12633e',    'text' => '#1c6a48'],
        'warning' => ['bg' => '#fdf8ee', 'bar' => $t['accent'], 'title' => '#8a6320',    'text' => '#6f5320'],
        'neutral' => ['bg' => '#f7f8fa', 'bar' => '#cbd2da',    'title' => $t['text'],   'text' => $t['muted']],
    ];
    $v = $variants[$variant] ?? $variants['brand'];
@endphp
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="{{ $v['bg'] }}"
       style="background-color:{{ $v['bg'] }}; border-left:3px solid {{ $v['bar'] }}; border-radius:0 6px 6px 0; margin:0 0 28px 0;">
    <tr>
        <td style="padding:20px 22px;">
            @if($title)
                <p style="margin:0 0 8px 0; font-size:17px; line-height:24px; font-weight:600; color:{{ $v['title'] }};">
                    {{ $title }}
                </p>
            @endif
            <div style="font-size:15px; line-height:23px; color:{{ $v['text'] }};">
                {{ $slot }}
            </div>
        </td>
    </tr>
</table>
