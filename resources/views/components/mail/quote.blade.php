{{-- Bloc de texte libre saisi par le visiteur (retours à la ligne préservés) --}}
@php $t = config('company.mail'); @endphp
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fafbfc"
       style="background-color:#fafbfc; border:1px solid {{ $t['border'] }}; border-left:3px solid {{ $t['accent'] }}; border-radius:0 6px 6px 0; margin:0 0 28px 0;">
    <tr>
        <td style="padding:20px 22px;">
            <p style="margin:0; font-size:15px; line-height:24px; color:{{ $t['text'] }}; white-space:pre-wrap;">{{ $slot }}</p>
        </td>
    </tr>
</table>
