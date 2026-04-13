<style>
    /* Navbar principale - Version Noire Élégante */
    .navbar-main.navbar-dark {
        background: #000000;
        box-shadow: 0 4px 30px rgba(255, 255, 255, 0.05);
        position: sticky;
        top: 0;
        z-index: 1000;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .navbar-main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .navbar-main-content {
        width: 100%;
    }

    .navbar-main-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 80px;
    }

    /* Logo */
    .logo-column {
        flex: 0 0 auto;
        padding-right: 30px;
    }

    .navbar-logo-wrapper {
        display: flex;
        align-items: center;
    }

    .navbar-logo-link {
        display: block;
        transition: all 0.3s ease;
    }

    .navbar-logo-link:hover {
        transform: scale(1.05);
        filter: brightness(1.2);
    }

    .navbar-logo {
        width: 80px;
        height: auto;
        filter: drop-shadow(0 4px 6px rgba(255, 255, 255, 0.1));
    }

    /* Menu colonne */
    .menu-column {
        flex: 1;
    }

    .navbar-menu-wrapper {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    /* Menu desktop */
    .navbar-menu {
        display: block;
    }

    .navbar-menu-list {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-menu-item {
        position: relative;
    }

    .navbar-menu-link {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        color: #ffffff;
        font-weight: 500;
        font-size: 0.95rem;
        text-decoration: none;
        border-radius: 30px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        letter-spacing: 0.3px;
        opacity: 0.9;
    }

    .navbar-menu-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: #ffffff;
        transition: width 0.3s ease;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    .navbar-menu-link:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.1);
        opacity: 1;
        transform: translateY(-1px);
    }

    .navbar-menu-link:hover::before {
        width: 60%;
    }

    .navbar-menu-link.active {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.15);
        opacity: 1;
        font-weight: 600;
        box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
    }

    .navbar-menu-link.active::before {
        width: 60%;
        background: #ffffff;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.7);
    }

    /* Bouton menu mobile */
    .navbar-mobile-toggle {
        display: none;
        background: none;
        border: 1px solid rgba(255, 255, 255, 0.2);
        cursor: pointer;
        padding: 12px;
        flex-direction: column;
        gap: 6px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar-mobile-toggle:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .navbar-hamburger-line {
        width: 25px;
        height: 2px;
        background: #ffffff;
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    /* Menu mobile overlay */
    .navbar-mobile-overlay {
        position: fixed;
        top: 0;
        right: -100%;
        width: 100%;
        max-width: 400px;
        height: 100vh;
        background: #0a0a0a;
        box-shadow: -5px 0 50px rgba(0, 0, 0, 0.5);
        transition: right 0.3s ease;
        z-index: 1001;
        overflow-y: auto;
        border-left: 1px solid rgba(255, 255, 255, 0.05);
    }

    .navbar-mobile-overlay.active {
        right: 0;
    }

    .navbar-mobile-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background: #000000;
    }

    .navbar-mobile-logo {
        width: 60px;
        height: auto;
        filter: brightness(1.2);
    }

    .navbar-mobile-close {
        background: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 2rem;
        color: #ffffff;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
        line-height: 1;
    }

    .navbar-mobile-close:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    .navbar-mobile-menu-list {
        list-style: none;
        padding: 20px;
        margin: 0;
    }

    .navbar-mobile-menu-item {
        margin-bottom: 10px;
    }

    .navbar-mobile-menu-link {
        display: block;
        padding: 15px 20px;
        color: #ffffff;
        font-weight: 500;
        text-decoration: none;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .navbar-mobile-menu-link:hover,
    .navbar-mobile-menu-link.active {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.2);
        transform: translateX(5px);
        box-shadow: 0 2px 20px rgba(255, 255, 255, 0.05);
    }

    /* Overlay background */
    .navbar-overlay-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .navbar-overlay-bg.active {
        opacity: 1;
        visibility: visible;
    }

    /* Responsive design */
    @media (max-width: 1024px) {
        .navbar-menu-list {
            gap: 0.1rem;
        }

        .navbar-menu-link {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 768px) {
        .navbar-main-container {
            padding: 0 20px;
        }

        .navbar-menu {
            display: none;
        }

        .navbar-mobile-toggle {
            display: flex;
        }

        .navbar-main-row {
            min-height: 70px;
        }

        .navbar-logo {
            width: 60px;
        }
    }

    @media (max-width: 480px) {
        .navbar-main-container {
            padding: 0 15px;
        }

        .navbar-logo {
            width: 50px;
        }

        .navbar-mobile-overlay {
            max-width: 100%;
        }
    }
    /* Style moderne pour la navbar */
    .navbar-section {
        background: linear-gradient(135deg, rgb(251, 139, 67) 0%, rgb(251, 139, 67) 100%);
        padding: 0.5rem 0;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .navbar-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .navbar-content {
        width: 100%;
    }

    .navbar-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .navbar-column {
        flex: 1;
        min-width: 250px;
    }

    .navbar-action-wrapper {
        display: flex;
        justify-content: center;
    }

    .navbar-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        background: white;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .navbar-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    .navbar-btn-whatsapp {
        color: #25D366;
        border: 2px solid #25D366;
    }

    .navbar-btn-whatsapp:hover {
        background: #25D366;
        color: white;
    }

    .navbar-btn-email {
        color: #667eea;
        border: 2px solid #667eea;
    }

    .navbar-btn-email:hover {
        background: #667eea;
        color: white;
    }

    .navbar-icon {
        width: 20px;
        height: 20px;
        transition: transform 0.3s ease;
    }

    .navbar-btn:hover .navbar-icon {
        transform: scale(1.1);
    }

    .navbar-text {
        font-size: 0.95rem;
        line-height: 1.2;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .navbar-row {
            flex-direction: column;
            gap: 0.5rem;
        }

        .navbar-column {
            width: 100%;
            min-width: auto;
        }

        .navbar-btn {
            width: 100%;
            justify-content: center;
            padding: 0.6rem 1rem;
        }

        .navbar-text {
            font-size: 0.85rem;
        }
    }

    @media (max-width: 480px) {
        .navbar-container {
            padding: 0 10px;
        }

        .navbar-btn {
            padding: 0.5rem 0.75rem;
        }
    }
</style>


<button type="button" aria-controls="rmp-container-2694" aria-label="{{ __('menu.menu_trigger_aria') }}"
        id="rmp_menu_trigger-2694"
        class="rmp_menu_trigger rmp-menu-trigger-boring rmp-mobile-device-menu">
    <span class="rmp-trigger-box">
        <span class="responsive-menu-pro-inner"></span>
    </span>
</button>
<div id="rmp-container-2694" class="rmp-container rmp-container rmp-slide-left">
    <div id="rmp-menu-title-2694" class="rmp-menu-title">
        <span class="rmp-menu-title-link"> <span> {{ __('menu.menu_title') }}</span> </span>
    </div>

    <div id="rmp-menu-wrap-2694" class="rmp-menu-wrap">
        <ul id="rmp-menu-2694" class="rmp-menu" role="menubar" aria-label="{{ __('menu.primary_menu_aria') }}">
            <li id="rmp-menu-item-568"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home
                current-menu-item page_item page-item-315 current_page_item rmp-menu-item
                  rmp-menu-top-level-item
{{ request()->routeIs('home') ? 'rmp-menu-current-item' : '' }}
                        "
                role="none">
                <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="rmp-menu-item-link menu-link"
                   role="menuitem">{{ __('menu.home_link') }}</a>
            </li>
            <li id="rmp-menu-item-2038"
                class="menu-item menu-item-type-post_type menu-item-object-page rmp-menu-item rmp-menu-top-level-item

{{ request()->routeIs('quienes') ? 'rmp-menu-current-item' : '' }}"
                role="none">
                <a href="{{ route('quienes', ['lang' => app()->getLocale()]) }}" class="rmp-menu-item-link menu-link"
                   role="menuitem">{{ __('menu.about_link') }}</a>
            </li>
            <li id="rmp-menu-item-564"
                class="menu-item menu-item-type-post_type menu-item-object-page rmp-menu-item rmp-menu-top-level-item

{{ request()->routeIs('venta') ? 'rmp-menu-current-item' : '' }}"
                role="none">
                <a href="{{ route('venta', ['lang' => app()->getLocale()]) }}" class="rmp-menu-item-link menu-link"
                   role="menuitem">{{ __('menu.puppies_sale_link') }}</a>
            </li>
            <li id="rmp-menu-item-2614"
                class="menu-item menu-item-type-post_type menu-item-object-page rmp-menu-item rmp-menu-top-level-item

{{ request()->routeIs('envio') ? 'rmp-menu-current-item' : '' }}"
                role="none">
                <a href="{{ route('envio', ['lang' => app()->getLocale()]) }}" class="rmp-menu-item-link menu-link"
                   role="menuitem">{{ __('menu.shipping_link') }}</a>
            </li>
            <li id="rmp-menu-item-2613"
                class="menu-item menu-item-type-post_type menu-item-object-page rmp-menu-item rmp-menu-top-level-item

{{ request()->routeIs('garantia') ? 'rmp-menu-current-item' : '' }}"
                role="none">
                <a href="{{ route('garantia', ['lang' => app()->getLocale()]) }}" class="rmp-menu-item-link menu-link"
                   role="menuitem">{{ __('menu.health_guarantee_link') }}</a>
            </li>
            <li id="rmp-menu-item-563"
                class="menu-item menu-item-type-post_type menu-item-object-page rmp-menu-item rmp-menu-top-level-item

{{ request()->routeIs('referencias') ? 'rmp-menu-current-item' : '' }}"
                role="none">
                <a href="{{ route('referencias', ['lang' => app()->getLocale()]) }}"
                   class="rmp-menu-item-link menu-link" role="menuitem">{{ __('menu.references_link') }}</a>
            </li>
            <li id="rmp-menu-item-562"
                class="menu-item menu-item-type-post_type menu-item-object-page rmp-menu-item rmp-menu-top-level-item

{{ request()->routeIs('contacto') ? 'rmp-menu-current-item' : '' }}"
                role="none">
                <a href="{{ route('contacto', ['lang' => app()->getLocale()]) }}" class="rmp-menu-item-link menu-link"
                   role="menuitem">{{ __('menu.contact_link') }}</a>
            </li>
        </ul>
    </div>
</div>

@if(request()->is('/') || Route::currentRouteName() === 'home')

    <section id="navbar-modern" class="navbar-section">
        <div class="navbar-container">
            <div class="navbar-content">
                <div class="navbar-row">
                    <!-- Colonne WhatsApp -->
                    <div class="navbar-column">
                        <div class="navbar-action-wrapper">
                            <a class="navbar-btn navbar-btn-whatsapp"
                               href="https://wa.me/393508724295?text={{ urlencode(__('whatsapp_message')) }}"
                               target="_blank"
                               rel="noopener">
                                <svg class="navbar-icon" viewBox="0 0 24 24" width="20" height="20">
                                    <path fill="currentColor" d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23z"/>
                                    <path fill="currentColor" d="M16.6 14.52c-.26.74-1.48 1.36-2.42 1.45-.65.06-1.3-.12-2.84-.73-2.11-.83-3.42-2.86-3.52-2.99-.11-.13-1.16-1.54-1.16-2.93 0-1.4.74-2.09 1-2.38.26-.29.57-.36.76-.36.18 0 .36.01.52.01.17 0 .4-.06.63.48.23.54.8 1.87.87 2 .07.14.12.3.02.48-.09.18-.15.3-.3.48-.15.18-.3.36-.15.66.15.3.66 1.1 1.42 1.78.98.87 1.8 1.14 2.06 1.26.26.12.41.1.56-.06.15-.16.66-.77.84-1.03.18-.26.36-.22.61-.13.25.09 1.56.74 1.83.87.27.13.45.2.52.31.07.11.07.66-.19 1.4z"/>
                                </svg>
                                <span class="navbar-text">WhatsApp:+39 350 872 4295</span>
                            </a>
                        </div>
                    </div>

                    <!-- Colonne Email -->
                    <div class="navbar-column">
                        <div class="navbar-action-wrapper">
                            <a class="navbar-btn navbar-btn-email"
                               href="mailto:contatto@centrocucciolimilano.it"
                               target="_self"
                               rel="noopener">
                                <svg class="navbar-icon" viewBox="0 0 24 24" width="20" height="20">
                                    <path fill="currentColor" d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                                <span class="navbar-text">contatto@centrocucciolimilano.it</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif


<!-- NAVBAR MODERNE NOIRE -->
<section id="navbar-main" class="navbar-main navbar-dark">
    <div class="navbar-main-container">
        <div class="navbar-main-content">
            <div class="navbar-main-row">
                <!-- Logo -->
                <div class="navbar-main-column logo-column">
                    <div class="navbar-logo-wrapper">
                        <a class="navbar-logo-link" href="{{ route('home', ['lang' => app()->getLocale()]) }}">
                            <img class="navbar-logo"
                                 src="{{ asset("wp-content/logo/logon.png") }}"
                                 loading="lazy"
                                 alt="{{ __('header.logo_alt') }}"
                                 title="{{ __('header.logo_title') }}"
                                 draggable="false"/>
                        </a>
                    </div>
                </div>

                <!-- Menu de navigation -->
                <div class="navbar-main-column menu-column">
                    <div class="navbar-menu-wrapper">
                        <nav class="navbar-menu">
                            <ul class="navbar-menu-list">
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                       href="{{ route('home', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.home_link') }}
                                    </a>
                                </li>
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('quienes') ? 'active' : '' }}"
                                       href="{{ route('quienes', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.about_link') }}
                                    </a>
                                </li>
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('venta') ? 'active' : '' }}"
                                       href="{{ route('venta', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.puppies_sale_link') }}
                                    </a>
                                </li>
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('envio') ? 'active' : '' }}"
                                       href="{{ route('envio', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.shipping_link') }}
                                    </a>
                                </li>
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('garantia') ? 'active' : '' }}"
                                       href="{{ route('garantia', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.health_guarantee_link') }}
                                    </a>
                                </li>
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('referencias') ? 'active' : '' }}"
                                       href="{{ route('referencias', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.references_link') }}
                                    </a>
                                </li>
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link {{ request()->routeIs('contacto') ? 'active' : '' }}"
                                       href="{{ route('contacto', ['lang' => app()->getLocale()]) }}">
                                        {{ __('menu.contact_link') }}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu mobile overlay -->
    <div class="navbar-mobile-overlay" id="navbarMobileOverlay">
        <div class="navbar-mobile-header">
            <img class="navbar-mobile-logo"
                 src="{{ asset("wp-content/logo/logo.png") }}"
                 alt="{{ __('header.logo_alt') }}"/>
            <button class="navbar-mobile-close" id="navbarMobileClose">&times;</button>
        </div>
        <ul class="navbar-mobile-menu-list">
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('home') ? 'active' : '' }}"
                   href="{{ route('home', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.home_link') }}
                </a>
            </li>
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('quienes') ? 'active' : '' }}"
                   href="{{ route('quienes', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.about_link') }}
                </a>
            </li>
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('venta') ? 'active' : '' }}"
                   href="{{ route('venta', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.puppies_sale_link') }}
                </a>
            </li>
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('envio') ? 'active' : '' }}"
                   href="{{ route('envio', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.shipping_link') }}
                </a>
            </li>
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('garantia') ? 'active' : '' }}"
                   href="{{ route('garantia', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.health_guarantee_link') }}
                </a>
            </li>
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('referencias') ? 'active' : '' }}"
                   href="{{ route('referencias', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.references_link') }}
                </a>
            </li>
            <li class="navbar-mobile-menu-item">
                <a class="navbar-mobile-menu-link {{ request()->routeIs('contacto') ? 'active' : '' }}"
                   href="{{ route('contacto', ['lang' => app()->getLocale()]) }}">
                    {{ __('menu.contact_link') }}
                </a>
            </li>
        </ul>
    </div>
</section>
