@php $t = config('company.mail'); @endphp
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 14px 0;">
    <tr>
        <td style="padding:0 0 10px 0; border-bottom:1px solid {{ $t['border'] }};">
            <p style="margin:0; font-size:12px; line-height:16px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; color:{{ $t['brand'] }};">
                {{ $slot }}
            </p>
        </td>
    </tr>
</table>
