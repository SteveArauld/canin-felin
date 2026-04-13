<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $isAdmin ? __('email.title.admin') : __('email.title.user') }}</title>
</head>
<body style="margin:0; padding:0; background:#e9ecef; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
    <!--[if (gte mso 9)|(IE)]>
    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
    <![endif]-->
    
    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e9ecef">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <!-- Conteneur principal -->
                <table width="100%" max-width="580" cellpadding="0" cellspacing="0" border="0" style="max-width:580px; width:100%; background:#ffffff; border-radius:24px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                    
                    <!-- HEADER -->
                    <tr>
                        <td bgcolor="#667eea" style="background:linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius:24px 24px 0 0; padding:40px 30px; text-align:center;">
                            <h1 style="color:#ffffff; font-size:28px; font-weight:700; margin:0; letter-spacing:-0.5px;">
                                {{ $isAdmin ? '🐾 ' . __('email.header.admin') : '✨ ' . __('email.header.user') }}
                            </h1>
                            <p style="color:rgba(255,255,255,0.9); font-size:14px; margin:10px 0 0 0;">
                                {{ $isAdmin ? __('email.admin.subtitle', ['name' => $orderData['nombre']]) : __('email.user.subtitle') }}
                            </p>
                        </td>
                    </tr>
                    
                    <!-- CONTENU -->
                    <tr>
                        <td style="padding:35px 30px;">
                            
                            @if(!$isAdmin)
                            <!-- Message client -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fef3e8" style="background:#fef3e8; border-left:4px solid #f59e0b; border-radius:16px; margin-bottom:30px;">
                                <tr>
                                    <td style="padding:20px;">
                                        <p style="margin:0 0 8px 0; font-weight:600; font-size:18px; color:#92400e;">
                                            🎉 {{ __('email.greeting', ['name' => $orderData['nombre']]) }}
                                        </p>
                                        <p style="margin:0; color:#92400e;">
                                            {{ __('email.thanks', ['pet' => $cachorro['nombre']]) }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            @else
                            <!-- Message admin -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fef3e8" style="background:#fef3e8; border-left:4px solid #f59e0b; border-radius:16px; margin-bottom:30px;">
                                <tr>
                                    <td style="padding:20px;">
                                        <p style="margin:0 0 8px 0; font-weight:600; font-size:18px; color:#92400e;">
                                            📋 {{ __('email.admin.new_order') }}
                                        </p>
                                        <p style="margin:0; color:#92400e;">
                                            ✨ {{ __('email.admin.client_info', ['name' => $orderData['nombre']]) }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            @endif
                            
                            <!-- Carte de l'animal -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f8fafc" style="background:#f8fafc; border-radius:20px; margin-bottom:30px; text-align:center;">
                                <tr>
                                    <td style="padding:20px; text-align:center;">
                                        @if(!empty($cachorro['imagenes']))
                                        <img src="{{ url($cachorro['imagenes'][0]) }}" alt="{{ $cachorro['nombre'] }}" width="150" height="150" style="width:150px; height:150px; border-radius:50%; object-fit:cover; border:4px solid #ffffff; margin-bottom:15px;">
                                        @endif
                                        <h2 style="font-size:24px; font-weight:700; color:#1e293b; margin:10px 0 5px 0;">{{ $cachorro['nombre'] }}</h2>
                                        <p style="color:#64748b; font-size:14px; margin:0;">{{ $cachorro['raza'] }}</p>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Titre section -->
                            <h3 style="font-size:20px; font-weight:700; color:#1e293b; margin:25px 0 15px 0; padding-bottom:10px; border-bottom:2px solid #e2e8f0;">📋 {{ __('email.details.title') }}</h3>
                            
                            <!-- Grille des détails -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f8fafc" style="background:#f8fafc; border-radius:20px; margin:20px 0;">
                                
                                <tr>
                                    <td style="padding:20px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td width="50%" style="padding:8px 12px 8px 0; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">🐕</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.pet') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $cachorro['nombre'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="50%" style="padding:8px 0 8px 12px; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">🐾</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.breed') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $cachorro['raza'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 12px 8px 0; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">✏️</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.requested_name') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $orderData['nombre_cachorro'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:8px 0 8px 12px; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">🏷️</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.requested_breed') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $orderData['raza_cachorro'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 12px 8px 0; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">👤</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.client') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $orderData['nombre'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:8px 0 8px 12px; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">📧</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.email') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">
                                                                    <a href="mailto:{{ $orderData['email'] }}" style="color:#667eea; text-decoration:none;">{{ $orderData['email'] }}</a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 12px 8px 0; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">💬</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.whatsapp') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">
                                                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $orderData['whatsapp']) }}" style="color:#25D366; text-decoration:none;">{{ $orderData['whatsapp'] }}</a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding:8px 0 8px 12px; vertical-align:top;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">📍</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.city') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ $orderData['ciudad'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:8px 12px 8px 0; vertical-align:top;" colspan="2">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">📅</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#64748b; margin:0 0 4px 0;">{{ __('email.details.date') }}</p>
                                                                <p style="font-size:15px; font-weight:600; color:#0f172a; margin:0;">{{ now()->format('d/m/Y H:i') }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            @if(!empty($orderData['comentario']))
                                            <tr>
                                                <td style="padding:12px; background:#fff7ed; border-left:4px solid #f59e0b; border-radius:12px; margin-top:10px;" colspan="2">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td width="36" style="width:36px; vertical-align:top;">
                                                                <span style="font-size:20px;">💭</span>
                                                            </td>
                                                            <td style="vertical-align:top;">
                                                                <p style="font-size:11px; font-weight:600; text-transform:uppercase; color:#b45309; margin:0 0 4px 0;">{{ __('email.details.comment') }}</p>
                                                                <p style="font-size:14px; color:#0f172a; margin:0;">{{ $orderData['comentario'] }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            
                            @if(!$isAdmin)
                            <!-- Message pour le client -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e0f2fe" style="background:#e0f2fe; border-radius:12px; margin:20px 0;">
                                <tr>
                                    <td style="padding:15px;">
                                        <p style="margin:0; color:#075985; font-size:14px;">
                                            <strong>📞 {{ __('email.user.next_steps') }}</strong><br>
                                            {{ __('email.user.questions') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            @else
                            <!-- Bouton WhatsApp pour l'admin -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" style="padding:10px 0;">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $orderData['whatsapp']) }}?text=Hola%20{{ urlencode($orderData['nombre']) }}%2C%20soy%20de%20Dulce%20Mascota%20En%20Venta.%20Me%20pongo%20en%20contacto%20contigo%20por%20la%20solicitud%20de%20{{ urlencode($cachorro['nombre']) }}.%20¿Podemos%20hablar%3F" 
                                           style="display:inline-block; background:#25D366; color:#ffffff; padding:14px 28px; border-radius:50px; text-decoration:none; font-weight:600; font-size:16px; text-align:center;">
                                            💬 {{ __('email.admin.whatsapp_button') }}
                                        </a>
                                        <p style="font-size:13px; color:#64748b; margin:12px 0 0 0;">
                                            {{ __('email.admin.action') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            @endif
                            
                        </td>
                    </tr>
                    
                    <!-- FOOTER -->
                    <tr>
                        <td bgcolor="#f8fafc" style="background:#f8fafc; border-top:1px solid #e2e8f0; padding:25px 30px; text-align:center; border-radius:0 0 24px 24px;">
                            <p style="font-size:20px; font-weight:700; color:#667eea; margin:0 0 10px 0;">🐾 Centro Cuccioli Milano En Venta</p>
                            <p style="color:#64748b; font-size:12px; margin:5px 0;">
                                📍 <a href="{{ config('app.url') }}" style="color:#667eea; text-decoration:none;">{{ config('app.url') }}</a>
                            </p>
                            <p style="color:#94a3b8; font-size:11px; margin:10px 0 0 0;">
                                {{ __('email.footer.message') }}
                            </p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
    
    <!--[if (gte mso 9)|(IE)]>
            </td>
        </tr>
    </table>
    <![endif]-->
</body>
</html>