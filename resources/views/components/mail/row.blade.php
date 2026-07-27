@props([
    'label' => '',
    'last' => false,   // supprime la bordure basse sur la dernière ligne
    'block' => false,  // valeur longue : label au-dessus, texte préformaté en dessous
])
@php
    $t = config('company.mail');
    $border = $last ? 'none' : '1px solid ' . $t['border'];
    $labelStyle = 'margin:0; font-size:11px; line-height:15px; font-weight:700; letter-spacing:0.8px; text-transform:uppercase; color:' . $t['muted'] . ';';
    $valueStyle = 'margin:0; font-size:15px; line-height:22px; color:' . $t['text'] . ';';
@endphp
@if($block)
    <tr>
        <td colspan="2" style="padding:14px 18px; border-bottom:{{ $border }};">
            <p style="{{ $labelStyle }} margin-bottom:7px;">{{ $label }}</p>
            <p style="{{ $valueStyle }} white-space:pre-wrap;">{{ $slot }}</p>
        </td>
    </tr>
@else
    <tr>
        <td width="38%" class="stack row-label" valign="top"
            style="padding:13px 18px; border-bottom:{{ $border }}; background-color:#fafbfc;">
            <p style="{{ $labelStyle }}">{{ $label }}</p>
        </td>
        <td width="62%" class="stack" valign="top"
            style="padding:13px 18px; border-bottom:{{ $border }};">
            <p style="{{ $valueStyle }}">{{ $slot }}</p>
        </td>
    </tr>
@endif
