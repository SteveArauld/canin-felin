<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>{{ $isAdmin ? __('email.title.admin') : __('email.title.user') }}</title>
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

<?php
// Traitement des données avant affichage
$whatsappRaw = is_array($orderData['whatsapp'])
    ? ($orderData['whatsapp'][0] ?? '')
    : $orderData['whatsapp'];
$whatsappClean = preg_replace('/[^0-9]/', '', $whatsappRaw);
$clientNameEncoded = urlencode($orderData['nom']);
$animalNameEncoded = urlencode($animal->nom);
$animalTypeIcon = match($animal->type ?? '') {
    'chien' => '🐕',
    'chat' => '🐈',
    'perroquet' => '🦜',
    default => '🐾'
};
?>

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
                                         alt="Canin-Felin"
                                         width="180"
                                         style="width:180px; max-width:100%; height:auto;"
                                         class="logo"
                                         onerror="this.style.display='none'">
                                </td>
                            </tr>
                        </table>
                        <h1 style="color:#ffffff; font-size:28px; font-weight:800; margin:0; letter-spacing:-0.5px;">
                            {{ $isAdmin ? '📋 Nouvelle demande' : '✨ Demande reçue' }}
                        </h1>
                        <p style="color:rgba(255,255,255,0.9); font-size:15px; margin:15px 0 0 0; line-height:1.5;">
                            {{ $isAdmin ? __('email.admin.subtitle', ['name' => $orderData['nom']]) : __('email.user.subtitle') }}
                        </p>
                    </td>
                </tr>

                <!-- ========== CONTENU ========== -->
                <tr>
                    <td style="padding:40px 30px;" class="inner-padding">

                        <!-- Message de bienvenue -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f0f7ff" style="background:#f0f7ff; border-left:5px solid #1e3a5f; border-radius:16px; margin-bottom:35px;">
                            <tr>
                                <td style="padding:22px 25px;">
                                    @if(!$isAdmin)
                                        <p style="margin:0 0 10px 0; font-weight:700; font-size:20px; color:#1e3a5f;">
                                            🎉 Bonjour {{ $orderData['nom'] }} !
                                        </p>
                                        <p style="margin:0; color:#2c4c7c; font-size:16px; line-height:1.5;">
                                            Merci pour votre intérêt pour <strong style="color:#1e3a5f;">{{ $animal->nom }}</strong>.
                                            Nous sommes ravis que vous souhaitiez lui offrir un foyer plein d'amour.
                                        </p>
                                    @else
                                        <p style="margin:0 0 10px 0; font-weight:700; font-size:20px; color:#1e3a5f;">
                                            📋 Nouvelle demande d'achat
                                        </p>
                                        <p style="margin:0; color:#2c4c7c; font-size:16px;">
                                            ✨ Client : <strong>{{ $orderData['nom'] }}</strong>
                                        </p>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <!-- Carte animal -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f8fafc" style="background:#f8fafc; border-radius:24px; margin-bottom:35px; text-align:center;">
                            <tr>
                                <td style="padding:30px; text-align:center;">
                                    @if(!empty($orderData['image_animal']))
                                        <img src="{{ asset($orderData['image_animal']) }}"
                                             alt="{{ $animal->nom }}"
                                             width="140" height="140"
                                             style="width:140px; height:140px; border-radius:50%; object-fit:cover; border:4px solid #ffffff; box-shadow:0 8px 20px rgba(0,0,0,0.12); margin-bottom:18px;">
                                    @else
                                        <div style="width:140px; height:140px; border-radius:50%; background:linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%); margin:0 auto 18px auto; display:flex; align-items:center; justify-content:center; font-size:56px; box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                                            {{ $animalTypeIcon }}
                                        </div>
                                    @endif
                                    <h2 style="font-size:26px; font-weight:800; color:#0f172a; margin:12px 0 8px 0;">{{ $animal->nom }}</h2>
                                    <p style="color:#64748b; font-size:15px; margin:0;">
                                        {{ $animal->race->nom ?? $orderData['race_animal'] }}
                                        @if($animal->type)
                                            <span style="color:#94a3b8;">•</span> {{ ucfirst($animal->type) }}
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Titre détails -->
                        <h3 style="font-size:20px; font-weight:800; color:#0f172a; margin:35px 0 20px 0; padding-bottom:12px; border-bottom:3px solid #e2e8f0;">
                            📋 Détails de la demande
                        </h3>

                        <!-- Grille détails modernisée -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f8fafc" style="background:#f8fafc; border-radius:20px; overflow:hidden;">
                            <tr>
                                <td style="padding:25px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">

                                        <!-- Ligne 1 -->
                                        <tr>
                                            <td width="50%" style="padding:12px 12px 12px 0; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">{{ $animalTypeIcon }}</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Animal</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $animal->nom }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="50%" style="padding:12px 0 12px 12px; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">🏷️</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Race / Espèce</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $animal->race->nom ?? $orderData['race_animal'] }}</p>
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
                                                        <span style="font-size:22px;">✏️</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Nom souhaité</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $orderData['nom_animal'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="50%" style="padding:12px 0 12px 12px; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">👤</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Client</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $orderData['nom'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Ligne 3 -->
                                        <tr>
                                            <td width="50%" style="padding:12px 12px 12px 0; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">📧</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Email</p>
                                                            <p style="font-size:14px; font-weight:500; margin:0;">
                                                                <a href="mailto:{{ $orderData['email'] }}" style="color:#1e3a5f; text-decoration:none; word-break:break-all;">{{ $orderData['email'] }}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="50%" style="padding:12px 0 12px 12px; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">💬</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">WhatsApp</p>
                                                            <p style="font-size:15px; font-weight:500; margin:0;">
                                                                <a href="https://wa.me/{{ $whatsappClean }}" style="color:#25D366; text-decoration:none;">{{ $whatsappRaw }}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Ligne 4 -->
                                        <tr>
                                            <td width="50%" style="padding:12px 12px 12px 0; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">📍</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Ville / Région</p>
                                                            <p style="font-size:16px; font-weight:700; color:#0f172a; margin:0;">{{ $orderData['ville'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="50%" style="padding:12px 0 12px 12px; vertical-align:top;" class="details-cell">
                                                <div style="background:#ffffff; border-radius:16px; padding:14px 16px; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                                                    <div style="display:flex; align-items:center; gap:12px;">
                                                        <span style="font-size:22px;">📅</span>
                                                        <div>
                                                            <p style="font-size:10px; font-weight:700; text-transform:uppercase; color:#94a3b8; margin:0 0 4px 0; letter-spacing:0.5px;">Date</p>
                                                            <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ now()->format('d/m/Y à H:i') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Commentaire -->
                                        @if(!empty($orderData['commentaire']))
                                            <tr>
                                                <td style="padding:12px 0 0 0;" colspan="2">
                                                    <div style="background:#fffbeb; border-left:4px solid #f59e0b; border-radius:16px; padding:18px 20px;">
                                                        <div style="display:flex; gap:14px;">
                                                            <span style="font-size:22px;">💭</span>
                                                            <div>
                                                                <p style="font-size:11px; font-weight:700; text-transform:uppercase; color:#b45309; margin:0 0 8px 0; letter-spacing:0.5px;">Message</p>
                                                                <p style="font-size:15px; color:#0f172a; margin:0; line-height:1.5;">{{ $orderData['commentaire'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Message client -->
                        @if(!$isAdmin)
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e0f2fe" style="background:#e0f2fe; border-radius:20px; margin:30px 0 20px 0;">
                                <tr>
                                    <td style="padding:20px 25px;">
                                        <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;">
                                            <span style="font-size:28px;">📞</span>
                                            <div>
                                                <p style="margin:0 0 6px 0; font-weight:800; color:#075985; font-size:16px;">Prochaines étapes</p>
                                                <p style="margin:0; color:#075985; font-size:15px; line-height:1.5;">Dans les prochaines heures, nous vous contacterons pour confirmer la disponibilité et répondre à toutes vos questions.</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        @endif

                        <!-- Bouton WhatsApp Admin -->
                        @if($isAdmin)
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" style="padding:20px 0 10px 0;">
                                        <a href="https://wa.me/{{ $whatsappClean }}?text=Bonjour%20{{ $clientNameEncoded }}%2C%20je%20vous%20contacte%20concernant%20votre%20demande%20pour%20{{ $animalNameEncoded }}.%20Je%20reste%20à%20votre%20disposition%20pour%20échanger."
                                           style="display:inline-block; background:#25D366; color:#ffffff; padding:16px 36px; border-radius:60px; text-decoration:none; font-weight:700; font-size:16px; text-align:center; box-shadow:0 6px 16px rgba(37,211,102,0.35); transition:transform 0.2s ease;"
                                           class="button">
                                            💬 Contacter le client via WhatsApp
                                        </a>
                                        <p style="font-size:13px; color:#64748b; margin:18px 0 0 0;">
                                            ⚡ Répondez dès que possible pour confirmer la disponibilité
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        @endif

                    </td>
                </tr>

                <!-- ========== FOOTER ========== -->
                <tr>
                    <td bgcolor="#f8fafc" style="background:#f8fafc; border-top:1px solid #e2e8f0; padding:30px 30px; text-align:center; border-radius:0 0 28px 28px;">
                        <img src="{{ asset('images/logo-color.png') }}"
                             alt="Canin-Felin"
                             width="140"
                             style="width:140px; max-width:100%; height:auto; margin-bottom:18px;"
                             onerror="this.style.display='none'">

                        <p style="font-size:14px; font-weight:700; color:#1e3a5f; margin:0 0 8px 0; letter-spacing:-0.2px;">
                            Canin-Felin - Éleveurs éthiques en France
                        </p>
                        <p style="color:#64748b; font-size:13px; margin:0 0 5px 0;">
                            📍 <a href="{{ config('app.url') }}" style="color:#1e3a5f; text-decoration:none; font-weight:500;">{{ config('app.url') }}</a>
                        </p>
                        <p style="color:#94a3b8; font-size:12px; margin:10px 0 0 0;">
                            📧 {{ env('ADMIN_EMAIL', 'contact@Canin-Felin.com') }} | 💬 +33 7 56 88 24 95
                        </p>
                        <p style="color:#cbd5e1; font-size:11px; margin:18px 0 0 0; border-top:1px solid #e2e8f0; padding-top:18px;">
                            {{ __('email.footer.message') }}
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>