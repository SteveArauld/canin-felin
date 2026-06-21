<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>📩 Nouveau message de contact</title>
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
                            📩 Nouveau message de contact
                        </h1>
                        <p style="color:rgba(255,255,255,0.9); font-size:15px; margin:15px 0 0 0; line-height:1.5;">
                            Un visiteur a envoyé un message depuis le formulaire de contact
                        </p>
                    </td>
                </tr>

                <!-- ========== CONTENU ========== -->
                <tr>
                    <td style="padding:40px 30px;" class="inner-padding">

                        <!-- Alerte info -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f0f7ff" style="background:#f0f7ff; border-left:5px solid #1e3a5f; border-radius:16px; margin-bottom:35px;">
                            <tr>
                                <td style="padding:22px 25px;">
                                    <p style="margin:0 0 10px 0; font-weight:700; font-size:20px; color:#1e3a5f;">
                                        📋 Nouveau message
                                    </p>
                                    <p style="margin:0; color:#2c4c7c; font-size:16px;">
                                        De : <strong>{{ $data['nom'] }}</strong> • {{ $data['date'] }}
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Titre détails -->
                        <h3 style="font-size:20px; font-weight:800; color:#0f172a; margin:35px 0 20px 0; padding-bottom:12px; border-bottom:3px solid #e2e8f0;">
                            📋 Informations du contact
                        </h3>

                        <!-- Grille détails -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f8fafc" style="background:#f8fafc; border-radius:20px; overflow:hidden;">
                            <tr>
                                <td style="padding:25px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">

                                        <!-- Ligne 1 -->
                                        <tr>
                                            <td width="50%" style="padding:12px 12px 12px 0; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">👤</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Nom complet</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $data['nom'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="50%" style="padding:12px 0 12px 12px; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">📧</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Email</p>
                                                            <p style="font-size:14px; font-weight:500; margin:0;">
                                                                <a href="mailto:{{ $data['email'] }}" style="color:#1e3a5f; text-decoration:none; word-break:break-all;">{{ $data['email'] }}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Ligne 2 -->
                                        <tr>
                                            <td width="50%" style="padding:12px 12px 12px 0; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">📱</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Téléphone</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $data['telephone'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="50%" style="padding:12px 0 12px 12px; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">🏷️</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Sujet</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $data['sujet'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Ligne 3 - Date -->
                                        <tr>
                                            <td width="50%" style="padding:12px 12px 12px 0; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">📅</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Date</p>
                                                            <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $data['date'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Message -->
                        <h3 style="font-size:20px; font-weight:800; color:#0f172a; margin:35px 0 20px 0; padding-bottom:12px; border-bottom:3px solid #e2e8f0;">
                            💬 Message
                        </h3>

                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fffbeb" style="background:#fffbeb; border-left:4px solid #f59e0b; border-radius:20px; margin-bottom:25px;">
                            <tr>
                                <td style="padding:25px;">
                                    <p style="font-size:16px; color:#1e293b; margin:0; line-height:1.6; white-space:pre-wrap;">{{ $data['message'] }}</p>
                                </td>
                            </tr>
                        </table>

                        <!-- Boutons d'action -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" style="padding:15px 0;">
                                    <a href="mailto:{{ $data['email'] }}?subject=Re: {{ urlencode($data['sujet']) }}"
                                       style="display:inline-block; background:#1e3a5f; color:#ffffff; padding:16px 36px; border-radius:60px; text-decoration:none; font-weight:700; font-size:16px; text-align:center; box-shadow:0 6px 16px rgba(30,58,95,0.35); margin-bottom:12px;"
                                       class="button">
                                        📧 Répondre par email
                                    </a>
                                </td>
                            </tr>
                            @php
                                $whatsappClean = preg_replace('/[^0-9]/', '', $data['telephone']);
                            @endphp
                            @if($whatsappClean)
                            <tr>
                                <td align="center" style="padding:0 0 15px 0;">
                                    <a href="https://wa.me/{{ $whatsappClean }}?text=Bonjour%20{{ urlencode($data['nom']) }}%2C%20nous%20avons%20bien%20reçu%20votre%20message%20concernant%20{{ urlencode($data['sujet']) }}."
                                       style="display:inline-block; background:#25D366; color:#ffffff; padding:16px 36px; border-radius:60px; text-decoration:none; font-weight:700; font-size:16px; text-align:center; box-shadow:0 6px 16px rgba(37,211,102,0.35);"
                                       class="button">
                                        💬 Contacter via WhatsApp
                                    </a>
                                </td>
                            </tr>
                            @endif
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

                        <p style="font-size:14px; font-weight:700; color:#1e3a5f; margin:0 0 8px 0; letter-spacing:-0.2px;">
                            Élevage d'animaux ASSOCIU FERRU DI CAVALLU
                        </p>
                        <p style="color:#64748b; font-size:13px; margin:0 0 5px 0;">
                            📍 <a href="{{ config('app.url') }}" style="color:#1e3a5f; text-decoration:none; font-weight:500;">{{ config('app.url') }}</a>
                        </p>
                        <p style="color:#94a3b8; font-size:12px; margin:10px 0 0 0;">
                            📧 contact@canin-felin.com | 💬 06 44 69 59 82
                        </p>
                        <p style="color:#cbd5e1; font-size:11px; margin:18px 0 0 0; border-top:1px solid #e2e8f0; padding-top:18px;">
                            Ceci est un email automatique du système de notifications.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>