<!-- FOOTER SIMPLE ET ÉLÉGANT -->
<footer class="footer-simple">
    <div class="footer-container">
        <!-- Ligne de séparation fine -->
        <div class="footer-separator"></div>

        <div class="footer-content">
            <!-- Logo et infos légales -->
            <div class="footer-brand">
                <img class="footer-logo"
                     src="{{ asset("wp-content/logo/logo.png") }}"
                     loading="lazy"
                     alt="{{ __('footer.logo_alt') }}"
                     width="100">

                <div class="footer-info">
                    <p><strong>Dulce Mascota SL</strong><br>
                        NIF : B74839261<br>
                        Registro Núcleo Zoológico : ES320540000287</p>
                </div>
            </div>

            <!-- Description courte -->
            <div class="footer-description">
                <p>{{ __('footer.description') }}</p>
            </div>

            <!-- Liens utiles en ligne -->
            <div class="footer-links">
                <a href="{{ route('venta', ['lang' => app()->getLocale()]) }}" class="footer-link">{{ __('footer.sale_link') }}</a>
                <span class="footer-sep">|</span>
                <a href="{{ route('quienes', ['lang' => app()->getLocale()]) }}" class="footer-link">{{ __('footer.about_link') }}</a>
                <span class="footer-sep">|</span>
                <a href="{{ route('contacto', ['lang' => app()->getLocale()]) }}" class="footer-link">{{ __('footer.contact_link') }}</a>
                <span class="footer-sep">|</span>
                <a href="{{ route('privacidad', ['lang' => app()->getLocale()]) }}" class="footer-link">{{ __('footer.privacy_link') }}</a>
                <span class="footer-sep">|</span>
                <a href="{{ route('devoluciones', ['lang' => app()->getLocale()]) }}" class="footer-link">{{ __('footer.returns_link') }}</a>
                <span class="footer-sep">|</span>
                <button class="footer-link footer-link-btn">{{ __('footer.cookies_link') }}</button>
            </div>

            <!-- Boutons de contact -->
            <div class="footer-contact">
                <a href="https://wa.me/34613313103?text={{ urlencode(__('whatsapp_message')) }}"
                   class="footer-btn-wa"
                   target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23z"/>
                        <path d="M16.6 14.52c-.26.74-1.48 1.36-2.42 1.45-.65.06-1.3-.12-2.84-.73-2.11-.83-3.42-2.86-3.52-2.99-.11-.13-1.16-1.54-1.16-2.93 0-1.4.74-2.09 1-2.38.26-.29.57-.36.76-.36.18 0 .36.01.52.01.17 0 .4-.06.63.48.23.54.8 1.87.87 2 .07.14.12.3.02.48-.09.18-.15.3-.3.48-.15.18-.3.36-.15.66.15.3.66 1.1 1.42 1.78.98.87 1.8 1.14 2.06 1.26.26.12.41.1.56-.06.15-.16.66-.77.84-1.03.18-.26.36-.22.61-.13.25.09 1.56.74 1.83.87.27.13.45.2.52.31.07.11.07.66-.19 1.4z"/>
                    </svg>
                    {{ __('footer.whatsapp_button') }}
                </a>

                <a href="mailto:atencionalcliente@dulcemascota.eu" class="footer-btn-email">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    {{ __('footer.contact_us_button') }}
                </a>
            </div>

            <!-- Copyright -->
            <div class="footer-copyright">
                <em><strong>{{ __('footer.copyright') }}</strong></em>
            </div>
        </div>
    </div>
</footer>

<!-- BOUTON WHATSAPP FLOTTANT -->
<a href="https://wa.me/34613313103?text={{ urlencode(__('whatsapp_message')) }}"
   class="floating-wa"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="WhatsApp">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
        <path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23z"/>
        <path d="M16.6 14.52c-.26.74-1.48 1.36-2.42 1.45-.65.06-1.3-.12-2.84-.73-2.11-.83-3.42-2.86-3.52-2.99-.11-.13-1.16-1.54-1.16-2.93 0-1.4.74-2.09 1-2.38.26-.29.57-.36.76-.36.18 0 .36.01.52.01.17 0 .4-.06.63.48.23.54.8 1.87.87 2 .07.14.12.3.02.48-.09.18-.15.3-.3.48-.15.18-.3.36-.15.66.15.3.66 1.1 1.42 1.78.98.87 1.8 1.14 2.06 1.26.26.12.41.1.56-.06.15-.16.66-.77.84-1.03.18-.26.36-.22.61-.13.25.09 1.56.74 1.83.87.27.13.45.2.52.31.07.11.07.66-.19 1.4z"/>
    </svg>
    <span class="wa-tooltip">WhatsApp</span>
</a>

<style>
    /* Footer Simple et Élégant */
    .footer-simple {
        background: #f5f5f5;
        padding: 40px 0 20px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-separator {
        height: 1px;
        background: #ddd;
        margin-bottom: 30px;
    }

    .footer-content {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    /* Logo et infos */
    .footer-brand {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .footer-logo {
        width: 100px;
        height: auto;
    }

    .footer-info {
        color: #333;
        font-size: 14px;
        line-height: 1.6;
    }

    .footer-info p {
        margin: 0;
    }

    /* Description */
    .footer-description {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        max-width: 800px;
    }

    .footer-description p {
        margin: 0;
    }

    /* Liens */
    .footer-links {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .footer-link {
        color: #333;
        text-decoration: none;
        transition: color 0.2s;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        font-size: 14px;
    }

    .footer-link:hover {
        color: #25D366;
        text-decoration: underline;
    }

    .footer-link-btn {
        color: #333;
    }

    .footer-sep {
        color: #999;
        font-size: 14px;
    }

    /* Boutons de contact */
    .footer-contact {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin: 10px 0;
    }

    .footer-btn-wa {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #25D366;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.2s;
    }

    .footer-btn-wa:hover {
        background: #128C7E;
    }

    .footer-btn-email {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #667eea;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.2s;
    }

    .footer-btn-email:hover {
        background: #5a67d8;
    }

    /* Copyright */
    .footer-copyright {
        color: #999;
        font-size: 13px;
        text-align: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #ddd;
    }

    /* ========== BOUTON WHATSAPP FLOTTANT ========== */
    .floating-wa {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #25D366;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        z-index: 1000;
        cursor: pointer;
    }

    .floating-wa:hover {
        background: #128C7E;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
    }

    .floating-wa svg {
        width: 32px;
        height: 32px;
    }

    /* Tooltip au survol */
    .wa-tooltip {
        position: absolute;
        right: 70px;
        background: #333;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.2s, visibility 0.2s;
        pointer-events: none;
    }

    .wa-tooltip::after {
        content: '';
        position: absolute;
        right: -5px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent #333;
    }

    .floating-wa:hover .wa-tooltip {
        opacity: 1;
        visibility: visible;
    }

    /* Responsive pour mobile */
    @media (max-width: 768px) {
        .footer-brand {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-links {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .footer-sep {
            display: none;
        }

        .footer-contact {
            flex-direction: column;
        }

        .footer-btn-wa,
        .footer-btn-email {
            width: 100%;
            justify-content: center;
        }

        /* Ajustement du bouton flottant sur mobile */
        .floating-wa {
            width: 55px;
            height: 55px;
            bottom: 15px;
            right: 15px;
        }

        .floating-wa svg {
            width: 28px;
            height: 28px;
        }
    }
</style>