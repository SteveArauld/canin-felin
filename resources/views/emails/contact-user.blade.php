<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>✅ Confirmation de votre message</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .inner-padding { padding: 25px 20px !important; }
            .header-padding { padding: 30px 20px !important; }
            .details-cell { display: block !important; width: 100% !important; padding: 5px 0 !important; }
            .button { display: block !important; width: 100% !important; text-align: center !important; }
            .logo { width: 140px !important; }
        }
    </style>
</head>
<body style="margin:0; padding:0; background:#eef2f6; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; -webkit-font-smoothing: antialiased;">

<!-- Conteneur principal -->
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#eef2f6">
    <tr>
        <td align="center" style="padding: 40px 20px;">
            <table width="100%" max-width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:28px; box-shadow:0 12px 40px rgba(0,0,0,0.08);" class="container">

                <!-- ========== HEADER ========== -->
                <tr>
                    <td bgcolor="#1e3a5f" style="background:linear-gradient(135deg, #1e3a5f 0%, #2c4c7c 100%); border-radius:28px 28px 0 0; padding:40px 30px; text-align:center;" class="header-padding">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" style="padding-bottom:20px;">
                                    <img src="{{ asset('assets/logo/logon.png') }}"
                                         alt="Élevage d'animaux ASSOCIU FERRU DI CAVALLU"
                                         width="180"
                                         style="width:180px; max-width:100%; height:auto;"
                                         class="logo"
                                         onerror="this.style.display='none'">
                                </td>
                            </tr>
                        </table>
                        <h1 style="color:#ffffff; font-size:28px; font-weight:800; margin:0; letter-spacing:-0.5px;">
                            ✅ Message bien reçu !
                        </h1>
                        <p style="color:rgba(255,255,255,0.9); font-size:15px; margin:15px 0 0 0; line-height:1.5;">
                            Nous avons bien reçu votre message et nous vous en remercions.
                        </p>
                    </td>
                </tr>

                <!-- ========== CONTENU ========== -->
                <tr>
                    <td style="padding:40px 30px;" class="inner-padding">

                        <!-- Message de bienvenue -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f0fdf4" style="background:#f0fdf4; border-left:5px solid #10b981; border-radius:16px; margin-bottom:35px;">
                            <tr>
                                <td style="padding:22px 25px;">
                                    <p style="margin:0 0 10px 0; font-weight:700; font-size:20px; color:#065f46;">
                                        🎉 Bonjour {{ $data['nom'] }} !
                                    </p>
                                    <p style="margin:0; color:#047857; font-size:16px; line-height:1.5;">
                                        Votre message concernant <strong>{{ $data['sujet'] }}</strong> a bien été envoyé. Notre équipe va l'étudier et vous répondra dans les plus brefs délais (généralement sous 24 à 48 heures).
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Récapitulatif -->
                        <h3 style="font-size:20px; font-weight:800; color:#0f172a; margin:35px 0 20px 0; padding-bottom:12px; border-bottom:3px solid #e2e8f0;">
                            📋 Récapitulatif de votre message
                        </h3>

                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f8fafc" style="background:#f8fafc; border-radius:20px; overflow:hidden;">
                            <tr>
                                <td style="padding:25px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding:10px 0;">
                                                <p style="font-size:11px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0;">Sujet</p>
                                                <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $data['sujet'] }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0;">
                                                <p style="font-size:11px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0;">Votre message</p>
                                                <div style="background:#ffffff; border-radius:12px; padding:16px; margin-top:4px;">
                                                    <p style="font-size:15px; color:#334155; margin:0; line-height:1.6; white-space:pre-wrap;">{{ $data['message'] }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px 0;">
                                                <p style="font-size:11px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0;">Date d'envoi</p>
                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $data['date'] }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Prochaines étapes -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e0f2fe" style="background:#e0f2fe; border-radius:20px; margin:30px 0 20px 0;">
                            <tr>
                                <td style="padding:20px 25px;">
                                    <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;">
                                        <span style="font-size:28px;">📞</span>
                                        <div>
                                            <p style="margin:0 0 6px 0; font-weight:800; color:#075985; font-size:16px;">Prochaines étapes</p>
                                            <p style="margin:0; color:#075985; font-size:15px; line-height:1.5;">Dans les prochaines heures, nous vous contacterons pour répondre à votre demande. En attendant, n'hésitez pas à consulter nos chiots et chatons disponibles.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- Bouton site -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" style="padding:15px 0;">
                                    <a href="{{ config('app.url') }}"
                                       style="display:inline-block; background:#1e3a5f; color:#ffffff; padding:16px 36px; border-radius:60px; text-decoration:none; font-weight:700; font-size:16px; text-align:center; box-shadow:0 6px 16px rgba(30,58,95,0.35);"
                                       class="button">
                                        🌐 Visiter notre site
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <!-- Contact -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" style="padding:10px 0;">
                                    <p style="font-size:14px; color:#64748b; margin:0;">
                                        📧 <a href="mailto:contact@canin-felin.com" style="color:#1e3a5f; text-decoration:none;">contact@canin-felin.com</a> &nbsp;|&nbsp;
                                        💬 <a href="https://wa.me/33644695982" style="color:#25D366; text-decoration:none;">06 44 69 59 82</a>
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- ========== FOOTER ========== -->
                <tr>
                    <td bgcolor="#f8fafc" style="background:#f8fafc; border-top:1px solid #e2e8f0; padding:30px 30px; text-align:center; border-radius:0 0 28px 28px;">
                        <img src="{{ asset('assets/logo/logon.png') }}"
                             alt="Élevage d'animaux ASSOCIU FERRU DI CAVALLU"
                             width="140"
                             style="width:140px; max-width:100%; height:auto; margin-bottom:18px;"
                             onerror="this.style.display='none'">

                        <p style="font-size:14px; font-weight:700; color:#1e3a5f; margin:0 0 8px 0;">
                            Élevage d'animaux ASSOCIU FERRU DI CAVALLU
                        </p>
                        <p style="color:#64748b; font-size:13px; margin:0 0 5px 0;">
                            📍 <a href="{{ config('app.url') }}" style="color:#1e3a5f; text-decoration:none; font-weight:500;">{{ config('app.url') }}</a>
                        </p>
                        <p style="color:#94a3b8; font-size:12px; margin:10px 0 0 0;">
                            📧 contact@canin-felin.com | 💬 06 44 69 59 82
                        </p>
                        <p style="color:#cbd5e1; font-size:11px; margin:18px 0 0 0; border-top:1px solid #e2e8f0; padding-top:18px;">
                            Ceci est un email automatique, merci de ne pas y répondre directement.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>