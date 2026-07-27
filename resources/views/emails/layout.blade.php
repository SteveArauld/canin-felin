@php
    $c = config('company');
    $t = $c['mail'];
    $siteUrl = rtrim(config('app.url'), '/');
    $waNumber = preg_replace('/\D/', '', $c['whatsapp']);
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="color-scheme" content="light only" />
    <meta name="supported-color-schemes" content="light only" />
    <title>@yield('title', $c['name'])</title>
    <!--[if mso]>
    <style type="text/css">
        table, td, div, p, a { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
    <style type="text/css">
        body, table, td, p, a { -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
        table { border-collapse:collapse !important; }
        img { border:0; outline:none; text-decoration:none; -ms-interpolation-mode:bicubic; }
        a { color:{{ $t['brand'] }}; }
        @media only screen and (max-width:620px) {
            .wrapper      { padding:16px 12px !important; }
            .card         { border-radius:0 !important; }
            .pad          { padding-left:22px !important; padding-right:22px !important; }
            .pad-y        { padding-top:26px !important; padding-bottom:26px !important; }
            .h1           { font-size:22px !important; line-height:30px !important; }
            .logo         { width:132px !important; }
            .btn a        { display:block !important; }
            .stack        { display:block !important; width:100% !important; }
            .row-label    { padding-bottom:2px !important; }
        }
    </style>
</head>
<body style="margin:0; padding:0; width:100%; background-color:{{ $t['canvas'] }};">

{{-- Pré-en-tête : texte d'aperçu affiché dans la boîte de réception --}}
<div style="display:none; font-size:1px; color:{{ $t['canvas'] }}; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
    @yield('preheader', $c['name'])
    &#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;
</div>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="{{ $t['canvas'] }}" style="background-color:{{ $t['canvas'] }};">
    <tr>
        <td align="center" class="wrapper" style="padding:32px 16px;">

            <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" class="card"
                   style="width:600px; max-width:600px; background-color:#ffffff; border:1px solid {{ $t['border'] }}; border-radius:10px; overflow:hidden; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">

                {{-- ============ EN-TÊTE ============ --}}
                <tr>
                    <td bgcolor="{{ $t['brand'] }}" align="center" class="pad pad-y"
                        style="background-color:{{ $t['brand'] }}; padding:36px 40px 32px 40px;">

                        <a href="{{ $siteUrl }}" style="text-decoration:none;">
                            <img src="{{ $siteUrl }}/{{ $c['logo'] }}"
                                 alt="{{ $c['name'] }}"
                                 width="150" class="logo"
                                 style="width:150px; max-width:100%; height:auto; display:block; margin:0 auto 22px auto;" />
                        </a>

                        @hasSection('eyebrow')
                            <p style="margin:0 0 10px 0; font-size:11px; line-height:14px; font-weight:700; letter-spacing:1.6px; text-transform:uppercase; color:{{ $t['accent'] }};">
                                @yield('eyebrow')
                            </p>
                        @endif

                        <h1 class="h1" style="margin:0; font-size:25px; line-height:33px; font-weight:600; color:#ffffff; letter-spacing:-0.2px;">
                            @yield('heading')
                        </h1>

                        @hasSection('subheading')
                            <p style="margin:12px 0 0 0; font-size:15px; line-height:23px; color:rgba(255,255,255,0.82);">
                                @yield('subheading')
                            </p>
                        @endif
                    </td>
                </tr>

                {{-- Filet doré de séparation --}}
                <tr>
                    <td bgcolor="{{ $t['accent'] }}" height="3" style="background-color:{{ $t['accent'] }}; height:3px; line-height:3px; font-size:0;">&nbsp;</td>
                </tr>

                {{-- ============ CONTENU ============ --}}
                <tr>
                    <td class="pad pad-y" style="padding:36px 40px; font-size:15px; line-height:24px; color:{{ $t['text'] }};">
                        @yield('content')
                    </td>
                </tr>

                {{-- ============ PIED DE PAGE ============ --}}
                <tr>
                    <td bgcolor="#fafbfc" class="pad" align="center"
                        style="background-color:#fafbfc; border-top:1px solid {{ $t['border'] }}; padding:28px 40px 30px 40px;">

                        <p style="margin:0 0 6px 0; font-size:14px; line-height:20px; font-weight:600; color:{{ $t['brand'] }};">
                            {{ $c['name'] }}
                        </p>
                        <p style="margin:0 0 14px 0; font-size:12px; line-height:18px; color:{{ $t['muted'] }};">
                            {{ $c['tagline'] }}
                        </p>

                        <p style="margin:0 0 14px 0; font-size:13px; line-height:20px; color:{{ $t['muted'] }};">
                            <a href="mailto:{{ $c['email'] }}" style="color:{{ $t['brand'] }}; text-decoration:none;">{{ $c['email'] }}</a>
                            <span style="color:{{ $t['border'] }};">&nbsp;|&nbsp;</span>
                            <a href="https://wa.me/{{ $waNumber }}" style="color:{{ $t['brand'] }}; text-decoration:none;">{{ $c['phone'] }}</a>
                            <span style="color:{{ $t['border'] }};">&nbsp;|&nbsp;</span>
                            <a href="{{ $siteUrl }}" style="color:{{ $t['brand'] }}; text-decoration:none;">{{ str_replace(['https://', 'http://'], '', $siteUrl) }}</a>
                        </p>

                        <p style="margin:0; padding-top:14px; border-top:1px solid {{ $t['border'] }}; font-size:11px; line-height:17px; color:#9ca3af;">
                            @yield('footnote', __('mail.footer.automatic', ['site' => str_replace(['https://', 'http://'], '', $siteUrl)]))
                        </p>
                    </td>
                </tr>

            </table>

            <p style="margin:18px 0 0 0; font-size:11px; line-height:16px; color:#9ca3af; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">
                &copy; {{ date('Y') }} {{ $c['name'] }}
            </p>

        </td>
    </tr>
</table>

</body>
</html>
